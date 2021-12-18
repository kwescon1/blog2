<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Modules\Post\Contracts\PostServiceInterface;
use App\Modules\Category\Contracts\CategoryServiceInterface;

class PostController extends Controller
{
    public function __construct(CategoryServiceInterface $categoryService, PostServiceInterface $postService)
    {
        $this->categoryService = $categoryService;

        $this->postService = $postService;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'trashedPosts' =>   $this->postService->trashedPosts(),
            'posts' => $this->postService->index(),
        ];

        return  view('backend.posts')->withData($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userPosts()
    {
        //
        $data = [
            'trashedPosts' =>   $this->postService->userTrashedPosts(),
            'posts' => $this->postService->userPosts(),
        ];

        return  view('backend.posts')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
            'route_name' => 'posts.store',
            'type' => 'NEW POST',
            'categories' => $this->categoryService->index()
        ];

        return view('backend.create_post')->withData($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //
        $data = $request->validated();

        $post = $this->postService->store($data);

        if ($post->status == $this->postService::STATUS_DRAFT) {
            return redirect()->back()->with("success", "Post: " . $post->title . " successfully created but not published");
        } else {
            return redirect()->back()->with("success", "Post: " . $post->title . " successfully created and published");
        }
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
        $post = $this->postService->show($id);

        $data = [
            'post' => $post
        ];

        return view('backend.view_post')->withData($data);
    }

    public function changeStatus($id, $status)
    {
        $message = $this->postService->changeStatus($id, $status);

        return redirect()->back()->with("success", $message);
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
        $post = $this->postService->show($id);
        $data = [
            'route_name' => ["route" => 'posts.update', 'id' => $post->id],
            'type' => 'EDIT POST',
            'categories' => $this->categoryService->index(),
            'post' => $post
        ];

        return view('backend.create_post')->withData($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        //
        $data = $request->validated();

        $post = $this->postService->update($data, $id);

        if ($post->status == $this->postService::STATUS_DRAFT) {
            return redirect()->to(route('posts.create'))->with("success", "Post: " . $post->title . " successfully update but not published");
        } else {
            return redirect()->to(route('posts.create'))->with("success", "Post: " . $post->title . " successfully updated and published");
        }
    }

    /**
     * Soft delete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDeletePost($id)
    {
        $this->postService->softDeletePost($id);

        return redirect()->back()->with("success", "Post Soft Deleted Successfully");
    }

    public function restorePost($id)
    {
        $this->postService->restorePost($id);

        return redirect()->back()->with("success", "Post Restored Successfully");
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
        $this->postService->destroy($id);

        return redirect()->back()->with("success", "Post Permanently Deleted");
    }
}
