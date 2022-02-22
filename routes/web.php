<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register' => false, 'login' => false]);

Route::get('panel/admin/insydervoice', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);

Route::post('loginUser', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('registerUser');


Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');


    //categories
    Route::get("softdelete/{id}/back-categories", [\App\Http\Controllers\CategoryController::class, 'softDeleteCat'])->name('softDelete.back-category');

    Route::get("restore/{id}/categories", [\App\Http\Controllers\CategoryController::class, 'restoreCat'])->name('restore.back-category');



    //roles
    Route::get("softdelete/{id}/back-roles", [\App\Http\Controllers\RoleController::class, 'softDeleteRole'])->name('softDelete.back-role');

    Route::get("restore/{id}/roles", [\App\Http\Controllers\RoleController::class, 'restoreRole'])->name('restore.back-role');

    Route::resource('back-roles', \App\Http\Controllers\RoleController::class);

    //users
    // Route::get("edit/profile");

    Route::get("softdelete/{id}/back-users", [\App\Http\Controllers\UserController::class, 'softDeleteUser'])->name('softDelete.back-user');

    Route::get("restore/{id}/users", [\App\Http\Controllers\UserController::class, 'restoreUser'])->name('restore.back-user');

    Route::get('change/password', [\App\Http\Controllers\UserController::class, 'changePassword'])->name('password.change');
    Route::post('change/{id}/password', [\App\Http\Controllers\UserController::class, 'storePassword'])->name('change.password');
    Route::get('edit/{id}/profile', [\App\Http\Controllers\UserController::class, 'editProfile'])->name('editProfile');

    Route::post('edit/{id}/profile', [\App\Http\Controllers\UserController::class, 'storeProfile'])->name('edit.profile');

    Route::resource('back-users', \App\Http\Controllers\UserController::class);

    //posts
    Route::get("softdelete/{id}/posts", [\App\Http\Controllers\PostController::class, 'softDeletePost'])->name('softDelete.post');

    Route::get("restore/{id}/posts", [\App\Http\Controllers\PostController::class, 'restorePost'])->name('restore.post');

    Route::get("status/{id}/change/{status}", [\App\Http\Controllers\PostController::class, 'changeStatus'])->name('status.change');

    Route::get('my-posts', [\App\Http\Controllers\PostController::class, 'userPosts'])->name('user.posts');
    Route::resource('posts', \App\Http\Controllers\PostController::class);
    Route::resource('back-categories', \App\Http\Controllers\CategoryController::class);
});

Route::resource('contacts', \App\Http\Controllers\ContactUsController::class);


//index page
Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('frontendHome');

//categories
Route::get('/category/{name}', [\App\Http\Controllers\IndexController::class, 'categories'])->name('category');

//posts
Route::get('/post/{slug}', [\App\Http\Controllers\IndexController::class, 'post'])->name('details');

//search
Route::get('/search', [\App\Http\Controllers\SearchController::class, '__invoke'])->name('search.post');


Route::get('contact-us', function () {
    return view('frontend.contact');
})->name('contactUs');


Route::get('about-us', function () {
    return view('frontend.about');
})->name('about');

Route::get('author-posts/{username}', [\App\Http\Controllers\IndexController::class, 'authorPosts'])->name("authorPosts");


// 
Route::get('privacy-policy', function () {
    return view('frontend.privacy_policy');
})->name('privacy-policy');
