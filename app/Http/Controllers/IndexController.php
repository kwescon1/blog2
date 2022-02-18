<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Modules\Post\Contracts\PostServiceInterface;
use App\Modules\User\Contracts\UserServiceInterface;
use App\Modules\Category\Contracts\CategoryServiceInterface;

class IndexController extends Controller
{
    public function __construct(CategoryServiceInterface $categoryService, PostServiceInterface $postService, UserServiceInterface $userService)
    {
        $this->categoryService = $categoryService;
        $this->postService = $postService;
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $firstFivePosts = $this->postService->getFirstFivePosts()->toArray();

        $lastFourPosts = $this->postService->getlastFourPosts()->toArray();

        return view('frontend.index', ['firstFive' => $firstFivePosts, 'posts' => $lastFourPosts]);
    }

    public function recent()
    {
        return PostResource::collection($this->postService->getRecentPostsIndexPage());
    }

    public function categories($name)
    {
        $category = $name;
        $posts = $this->postService->getPostByCategory($name);

        $data = ['category' => $category, 'posts' => $posts];

        return view('frontend.category')->withData($data);
    }

    public function post($slug)
    {
        $post = $this->postService->getPostBySlug($slug);

        if ($post->status == 0) {
            abort(404);
        }

        $recentPosts = $this->postService->getRecentPosts($post->slug);

        $relatedPosts = $this->postService->getRelatedPosts($post)->toArray();

        return view('frontend.detail', ['post' => $post, 'recentPosts' => $recentPosts, 'relatedPosts' => $relatedPosts]);
    }

    public function authorPosts($username)
    {
        $author = $this->userService->showUsername($username);

        $posts = $this->postService->getPostByAuthor($username);

        return view('frontend.author_posts', ['posts' => $posts, 'author' => $author]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
