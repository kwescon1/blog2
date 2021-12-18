<?php

namespace App\Modules\Post\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface PostRepositoryInterface
{
    public function trashedPosts(): ?Collection;

    public function userTrashedPosts(): ?Collection;

    public function userPosts(): ?Collection;

    public function destroy($id): void;

    public function restorePost($id): void;

    public function allPosts(): ?Collection;

    public function getByCategory($name, $status): ?\Illuminate\Pagination\LengthAwarePaginator;
    public function getBySlug($slug): ?object;
    public function getRecentPostsIndexPage($status): ?Collection;
    public function getRecentPosts($slug, $status): ?Collection;

    public function getRelatedPosts($post, $status): ?Collection;

    public function getPosts($status): ?Collection;

    public function search($param): ?\Illuminate\Pagination\LengthAwarePaginator;
}
