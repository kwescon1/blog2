<?php

namespace App\Providers;


use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Modules\Post\Services\PostService;
use App\Modules\User\Services\UserService;
use App\Modules\Roles\Services\RoleService;
use App\Modules\Search\Services\SearchService;
use App\Modules\Comment\Services\CommentService;
use App\Modules\Category\Services\CategoryService;
use App\Modules\Contact\Services\ContactUsService;
use App\Modules\Dashboard\Services\DashboardService;
use App\Modules\Post\Contracts\PostServiceInterface;
use App\Modules\User\Contracts\UserServiceInterface;
use App\Modules\Roles\Contracts\RoleServiceInterface;
use App\Modules\Permissions\Services\PermissionService;
use App\Modules\Search\Contracts\SearchServiceInterface;
use App\Modules\Comment\Contracts\CommentServiceInterface;
use App\Modules\Category\Contracts\CategoryServiceInterface;
use App\Modules\Contact\Contracts\ContactUsServiceInterface;
use App\Modules\Dashboard\Contracts\DashboardServiceInterface;
use App\Modules\Permissions\Contracts\PermissionServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        // $this->app->bind(ClientServiceInterface::class, ClientService::class);
        $this->app->bind(DashboardServiceInterface::class, DashboardService::class);
        $this->app->bind(RoleServiceInterface::class, RoleService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
        $this->app->bind(PermissionServiceInterface::class, PermissionService::class);
        $this->app->bind(ClientServiceInterface::class, ClientService::class);
        $this->app->bind(PostServiceInterface::class, PostService::class);
        $this->app->bind(CommentServiceInterface::class, CommentService::class);
        $this->app->bind(SearchServiceInterface::class, SearchService::class);
        $this->app->bind(ContactUsServiceInterface::class, ContactUsService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();
    }
}
