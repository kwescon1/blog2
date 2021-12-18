<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Dashboard\Contracts\DashboardServiceInterface;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $dashboardService;

    public function __construct(DashboardServiceInterface $dashboardService)
    {
        $this->middleware('auth');
        $this->dashboardService = $dashboardService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('backend.home', ['data' => $this->dashboardService->data()]);
    }
}
