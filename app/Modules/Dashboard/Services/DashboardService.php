<?php

namespace App\Modules\Dashboard\Services;

use App\Modules\Post\Contracts\PostServiceInterface;
use App\Modules\User\Contracts\UserServiceInterface;
use App\Modules\Category\Contracts\CategoryServiceInterface;
use App\Modules\Dashboard\Contracts\DashboardServiceInterface;

class DashboardService  implements DashboardServiceInterface
{
    private $userService;
    private $categoryService;

    public function __construct(UserServiceInterface $userService, CategoryServiceInterface $categoryService, PostServiceInterface $postService)
    {
        $this->userService = $userService;
        $this->categoryService = $categoryService;
        $this->postService = $postService;
    }

    public function data()
    {
        $posts = $this->postService->index('posts');

        $archivedPosts = collect($posts)->filter(function ($payload) {

            return $payload->status == 2;
        });

        $publishedPosts = collect($posts)->filter(function ($payload) {

            return $payload->status == 1;
        });

        $drafts = collect($posts)->filter(function ($payload) {

            return $payload->status == 0;
        });

        $userPosts = collect($posts)->filter(function ($payload) {

            return $payload->user_id == auth()->user()->id;
        });

        $userArchivedPosts = collect($posts)->filter(function ($payload) {

            return $payload->status == 2 && $payload->user_id == auth()->user()->id;
        });

        $userPublishedPosts = collect($posts)->filter(function ($payload) {

            return $payload->status == 1 && $payload->user_id == auth()->user()->id;
        });

        $userDrafts = collect($posts)->filter(function ($payload) {

            return $payload->status == 0 && $payload->user_id == auth()->user()->id;
        });




        $data = [
            'posts' => $posts,
            'archivedPosts' => $archivedPosts,
            'publishedPosts' => $publishedPosts,
            'drafts' => $drafts,
            'user_posts' => $userPosts,
            'user_archivedPosts' => $userArchivedPosts,
            'user_publishedPosts' => $userPublishedPosts,
            'user_Drafts' => $userDrafts
            // 'users' => $this->userService->index(),
            // 'categories' => $this->categoryService->index()

        ];

        return $data;
    }
}
