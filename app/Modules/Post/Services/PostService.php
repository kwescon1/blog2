<?php

namespace App\Modules\Post\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Base\Services\CoreService;
use Illuminate\Database\Eloquent\Collection;
use App\Modules\Post\Contracts\PostServiceInterface;
use App\Modules\Tag\Contracts\TagRepositoryInterface;
use App\Modules\Post\Contracts\PostRepositoryInterface;
use App\Modules\Category\Contracts\CategoryRepositoryInterface;

class PostService extends CoreService implements PostServiceInterface
{

    public function __construct(PostRepositoryInterface $postRepository, TagRepositoryInterface $tagRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->tagRepository = $tagRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function store(array $data): ?Model
    {
        Gate::authorize('create', $this->postRepository->model());

        $tags = $data['tags'];

        unset($data['tags']);

        $size = ["800x549", "800x1166"];

        $paths = $this->processImage($data['image'], "posts", $size);

        $data['slug'] = Str::slug($data['title']);
        $data['image800x549'] = $paths[0];
        $data['image800x1166'] = $paths[1];
        $data['user_id'] = auth()->user()->id;
        $data['deleted_by'] = auth()->user()->id;


        if ($data['status'] == self::STATUS_PUBLISHED) {
            $data['published_at'] = now();
        }

        $post = $this->postRepository->create($data);

        $this->tags($post, $tags);

        return $post;
    }

    public function changeStatus($id, $status): string
    {
        $post =  $this->show($id);

        Gate::authorize('changeStatus', $post);

        switch ($status) {
            case '0':
                $this->postRepository->update($id, ['status' => $status, 'published_at' => $post->published_at]);
                return "Post Status changed to Draft";
                break;

            case '1':
                $this->postRepository->update($id, ['status' => $status, 'published_at' => $post->published_at]);
                return "Post Published";
                break;

            case '2':
                $this->postRepository->update($id, ['status' => $status]);
                return "Post Status Archived";
                break;

            default:
                $this->postRepository->update($id, ['status' => $status]);
                return "Post Status changed to Draft";
                break;
        }
    }

    public function update($data, $id): ?Model
    {

        $post = $this->show($id);

        Gate::authorize('update', $post);

        $tags = $data['tags'];

        $data['slug'] = Str::slug($data['title']);

        unset($data['tags']);

        if (array_key_exists("image", $data)) {

            $postData = [$post->image800x549, $post->image800x1166];

            $this->deleteImage($postData);

            $size = ["800x549", "800x1166"];

            $paths = $this->processImage($data['image'], "posts", $size);

            $data['image800x549'] = $paths[0];
            $data['image800x1166'] = $paths[1];
        }

        if ($data['status'] == self::STATUS_PUBLISHED && $post->published_at == "") {
            $data['published_at'] = now();
        }

        $post =  $this->postRepository->update($id, $data);

        $this->tags($post, $tags, "update");

        return $post;
    }


    private function tags($post, $tags, $default = "store")
    {
        if ($tags) {
            $tagList = array_filter(explode(",", $tags));
            //looping through tag array just created..

            foreach ($tagList as $item) {
                //if tag exists sync it or else create

                $tag = $this->tagRepository->createTag($item);
            }

            $tags = $this->tagRepository->attachTags($tagList);

            if ($default == "store") {
                $post->tags()->attach($tags);
            } else {
                $post->tags()->sync($tags);
            }
        }

        return;
    }

    public function userPosts(): ?Collection
    {
        //cache this
        return $this->cachePost(auth()->user()->id . "-posts", 60 * 24 * 60, $this->postRepository->userPosts());
    }

    public function userTrashedPosts(): ?Collection
    {
        // cache this
        return $this->cachePost(auth()->user()->id . "-trashed-posts", 60 * 24 * 60, $this->postRepository->userTrashedPosts());
    }

    public function index(): ?Collection
    {
        //cache this
        return $this->cachePost('index', 60 * 24 * 60, $this->postRepository->allPosts());
    }

    public function trashedPosts(): ?Collection
    {
        //cache this
        return $this->cachePost('trashedPosts', 60 * 24 * 60, $this->postRepository->trashedPosts());
    }

    public function show($id): ?object
    {
        return $this->postRepository->find($id);
    }

    public function softDeletePost($id): void
    {
        $post = $this->show($id);

        Gate::authorize('delete', $post);

        $this->postRepository->update($id, ['deleted_by' => auth()->user()->id]);
        $this->postRepository->delete($id);
    }

    public function restorePost($id): void
    {
        $this->postRepository->restorePost($id);
        return;
    }

    public function destroy($id): void
    {
        $post = $this->show($id);

        Gate::authorize('delete', $post);

        $this->postRepository->destroy($id);

        return;
    }

    public function getPostByCategory($name): ?\Illuminate\Pagination\LengthAwarePaginator
    {
        //abort if !exist cat
        $cat = $this->categoryRepository->model()->where('name', $name)->first();

        if (!$cat) {
            abort(404);
        }
        // cache this
        return $this->postRepository->getByCategory($name, self::STATUS_PUBLISHED);
    }

    public function getPostBySlug($slug): ?object
    {
        return $this->postRepository->getBySlug($slug);
    }

    public function getRecentPostsIndexPage(): ?Collection
    {
        //cache this
        return $this->cachePost('indexRecentPosts', 60 * 24 * 60, $this->postRepository->getRecentPostsIndexPage(self::STATUS_PUBLISHED));
    }

    //for post details page
    public function getRecentPosts($slug): ?Collection
    {
        //cache
        return $this->cachePost('postDetailsRecentPosts', 60 * 24 * 60, $this->postRepository->getRecentPosts($slug, self::STATUS_PUBLISHED));
    }

    //for post details page
    public function getRelatedPosts($post): ?Collection
    {
        return $this->postRepository->getRelatedPosts($post, self::STATUS_PUBLISHED);
    }

    //get first 9 records for homepage
    public function getPosts(): ?Collection
    {
        //cache
        return $this->cachePost('homePage', 60 * 24 * 60, $this->postRepository->getPosts(self::STATUS_PUBLISHED));
    }

    private function cachePost($cacheKey, $duration, $query)
    {
        return Cache::remember($cacheKey, $duration, function () use ($query) {
            return $query;
        });
    }
}
