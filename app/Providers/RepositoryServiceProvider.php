<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\Tag\Repositories\TagRepository;
use App\Modules\Post\Repositories\PostRepository;
use App\Modules\User\Repositories\UserRepository;
use App\Modules\Roles\Repositories\RoleRepository;
use App\Modules\Search\Repositories\SearchRepository;
use App\Modules\Tag\Contracts\TagRepositoryInterface;
use App\Modules\Comment\Repositories\CommentRepository;
use App\Modules\Post\Contracts\PostRepositoryInterface;
use App\Modules\User\Contracts\UserRepositoryInterface;
use App\Modules\Roles\Contracts\RoleRepositoryInterface;
use App\Modules\Category\Repositories\CategoryRepository;
use App\Modules\Contact\Repositories\ContactUsRepository;
use App\Modules\Search\Contracts\SearchRepositoryInterface;
use App\Modules\Comment\Contracts\CommentRepositoryInterface;
use App\Modules\Permissions\Repositories\PermissionRepository;
use App\Modules\Category\Contracts\CategoryRepositoryInterface;
use App\Modules\Contact\Contracts\ContactUsRepositoryInterface;
use App\Modules\Permissions\Contracts\PermissionRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(TagRepositoryInterface::class, TagRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->bind(ContactUsRepositoryInterface::class, ContactUsRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
