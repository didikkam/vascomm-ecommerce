<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $productLatests = Product::where("status", 1)->limit(10)->latest()->get();
        $products = Product::where("status", 1)->limit(12)->latest()->get();
        return view('frontend.home', compact('productLatests', 'products'));
    }
}
