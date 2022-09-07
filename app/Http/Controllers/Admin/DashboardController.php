<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductInfo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
       
        return view('Backend.dashboard');
    }
}
