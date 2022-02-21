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

    public function getByAuthor($name, $status): ?\Illuminate\Pagination\LengthAwarePaginator
    {
        return $this->model()->where('status', $status)->whereHas('user', function ($q) use ($name) {
            $q->where('username', $name);
        })->with('category')->latest()->paginate(6);
    }

    public function getBySlug($slug): ?object
    {
        // return $this->model()->whereIn('status', [1, 2])->where('slug', $slug)->first();
        return $this->model()->where('slug', $slug)->first();
    }

    public function getRecentPostsIndexPage($status): ?Collection
    {
        //posts should not be in posts of first five or last four for index page

        $ids = $this->getFirstFivePosts($status)->pluck('id');

        return $this->model()->latest()->where('status', $status)->whereNotIn('id', $ids)->limit(12)->get();
    }

    public function getRecentPosts($slug, $status): ?Collection
    {
        return $this->model()->latest()->where('status', $status)->where('slug', '!=', $slug)->limit(4)->get();
    }

    public function getRelatedPosts($post, $status): ?Collection
    {
        return $this->model()->inRandomOrder()->with('category')->where('status', $status)->where('slug', '!=', $post->slug)->whereHas('tags', function ($q) use ($post) {
            $q->whereIn('name', $post->tags->pluck('name'));
        })->orWhereHas('category', function ($w) use ($post) {
            $w->where('name', $post->category->name);
        })->limit(4)->get();

        //try where cateory
    }


    //get first 5 records for home page header
    public function getFirstFivePosts($status): ?Collection
    {
        return $this->model()->latest()->where('status', $status)->with('category')->limit(5)->get();
    }

    //get last 4 records for home page footer
    public function getLastFourPosts($status): ?Collection
    {
        $ids = $this->getFirstFivePosts($status)->pluck('id');

        $ids2 = $this->getRecentPostsIndexPage($status)->pluck('id');

        $new = $ids->merge($ids2);

        return $this->model()->latest()->where('status', $status)->whereNotIn('id', $new)->with('category')->limit(4)->get();
    }

    public function search($param): ?\Illuminate\Pagination\LengthAwarePaginator
    {
        return $this->model()->latest()->whereIn('status', [1, 2])->whereHas('tags', function ($q) use ($param) {
            $q->where("name", "LIKE", "%$param%");
        })->orWhere("title", "LIKE", "%$param%")->paginate(9);
    }
}
