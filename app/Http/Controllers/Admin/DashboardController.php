<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $userCount = User::count();
        $userActiveCount = User::where("status", 1)->count();
        $productCount = Product::count();
        $productActiveCount = Product::where("status", 1)->count();
        $productLatests = Product::where("status", 1)->limit(10)->latest()->get();
        return view('admin.dashboard', compact('productLatests', 'userCount', 'userActiveCount', 'productCount','productActiveCount'));
    }
}
