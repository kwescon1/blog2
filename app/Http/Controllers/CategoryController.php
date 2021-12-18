<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Modules\Post\Contracts\PostServiceInterface;
use App\Modules\Category\Contracts\CategoryServiceInterface;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $categoryService;

    public function __construct(CategoryServiceInterface $categoryService, PostServiceInterface $postService)
    {
        $this->categoryService = $categoryService;
        $this->postService = $postService;

        $this->middleware(['auth', 'categories'])->except(['allCategories', 'show']);
    }

    public function index()
    {
        //
        $categories = $this->categoryService->index();

        $trashedCategories = $this->categoryService->trashedCategories();

        return  view('backend.categories', compact('categories', 'trashedCategories'));
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
    public function store(CategoryRequest $request)
    {
        //
        $data = $request->validated();

        $store = $this->categoryService->store($data);

        return redirect()->back()->with("success", "Category: $store->name Successfully Added");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        //
        $category = $name;
        $posts = $this->postService->getPostByCategory($name);

        $data = ['category' => $category, 'posts' => $posts];

        return view('frontend.category')->withData($data);
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
        $data = $this->categoryService->edit($id);

        return redirect()->back()->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        //
        $data = $request->validated();

        $this->categoryService->update($data, $id);

        return redirect()->back()->with("success", "Category Successfully Updated");
        //
    }

    /**
     * Soft delete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDeleteCat($id)
    {
        $this->categoryService->softDeleteCat($id);

        return redirect()->back()->with("success", "Category Soft Deleted Successfully");
    }

    public function restoreCat($id)
    {
        $this->categoryService->restoreCat($id);

        return redirect()->back()->with("success", "Category Restored Successfully");
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
        $this->categoryService->destroy($id);

        return redirect()->back()->with("success", "Category Permanently Deleted");
    }

    public function allCategories()
    {
        $categories = $this->categoryService->index();

        // return a view here
    }
}
