<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\ExternalService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(ExternalService $externalService)
    {
        $orders = collect($externalService->getOrders()->json()['data']);
        return view('home', compact('orders'));
    }
}
