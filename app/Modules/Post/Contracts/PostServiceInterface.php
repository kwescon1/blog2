<?php

namespace App\Modules\Post\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface PostServiceInterface
{
    const STATUS_DRAFT = 0; //draft | unpublished
    const STATUS_PUBLISHED = 1; //published
    const STATUS_ARCHIVED = 2; //published

    public function store(array $data): ?Model;
    public function update(array $data, $id): ?Model;

    public function index(): ?Collection;
    public function trashedPosts(): ?Collection;

    public function userPosts(): ?Collection;
    public function userTrashedPosts(): ?Collection;

    public function show($id): ?object;

    public function softDeletePost($id): void;

    public function restorePost($id): void;

    public function destroy($id): void;

    public function changeStatus($id, $status): string;

    public function getPostByCategory($name): ?\Illuminate\Pagination\LengthAwarePaginator;
    public function getPostBySlug($slug): ?object;

    public function getRecentPosts($slug): ?Collection;

    public function getRelatedPosts($post): ?Collection;

    public function getRecentPostsIndexPage(): ?Collection;

    public function getFirstFivePosts(): ?Collection;
    public function getLastFourPosts(): ?Collection;
}
