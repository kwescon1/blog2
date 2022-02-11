<?php

namespace App\Modules\Post\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use App\Modules\Base\Repositories\BaseRepository;
use App\Modules\Post\Contracts\PostRepositoryInterface;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    public function allPosts(): ?Collection
    {
        return $this->model()->orderBy('created_at', 'desc')->get();
    }

    public function trashedPosts(): ?Collection
    {
        return $this->model()->onlyTrashed()->latest()->get();
    }

    public function userPosts(): ?Collection
    {
        return $this->model()->orderBy('created_at', 'desc')->where('user_id', auth()->user()->id)->get();
    }

    public function userTrashedPosts(): ?Collection
    {
        return $this->model()->onlyTrashed()->latest()->where('user_id', auth()->user()->id)->get();
    }

    public function destroy($id): void
    {
        $this->model()->onlyTrashed()->find($id)->forceDelete();

        return;
    }

    public function restorePost($id): void
    {
        $this->model()->withTrashed()->find($id)->restore();

        return;
    }

    public function getByCategory($name, $status): ?\Illuminate\Pagination\LengthAwarePaginator
    {
        return $this->model()->where('status', $status)->whereHas('category', function ($q) use ($name) {
            $q->where('name', $name);
        })->latest()->paginate(6);
    }

    public function getBySlug($slug): ?object
    {
        // return $this->model()->whereIn('status', [1, 2])->where('slug', $slug)->first();
        return $this->model()->where('slug', $slug)->first();
    }

    public function getRecentPostsIndexPage($status): ?Collection
    {
        //posts should not be in posts of get posts for index page

        $ids = $this->getPosts($status)->pluck('id');

        return $this->model()->latest()->where('status', $status)->whereNotIn('id', $ids)->limit(18)->get();
    }

    public function getRecentPosts($slug, $status): ?Collection
    {
        return $this->model()->latest()->where('status', $status)->where('slug', '!=', $slug)->limit(4)->get();
    }

    public function getRelatedPosts($post, $status): ?Collection
    {
        return $this->model()->inRandomOrder()->with('category')->where('status', $status)->where('slug', '!=', $post->slug)->whereHas('tags', function ($q) use ($post) {
            $q->whereIn('name', $post->tags->pluck('name'));
        })->limit(4)->get();

        //try where cateory
    }


    //get first 9 records for home page
    public function getPosts($status): ?Collection
    {
        return $this->model()->latest()->where('status', $status)->with('category')->limit(9)->get();
    }

    public function search($param): ?\Illuminate\Pagination\LengthAwarePaginator
    {
        return $this->model()->latest()->whereIn('status', [1, 2])->whereHas('tags', function ($q) use ($param) {
            $q->where("name", "LIKE", "%$param%");
        })->orWhere("title", "LIKE", "%$param%")->paginate(9);
    }
}
