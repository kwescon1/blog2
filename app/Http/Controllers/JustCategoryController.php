<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Category\Contracts\CategoryServiceInterface;

class JustCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function cats()
    {
        //
        return $this->categoryService->index();
    }
}
