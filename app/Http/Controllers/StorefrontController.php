<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StorefrontController extends Controller
{
    public function index()
    {
        $dbProducts = Product::where('stock', '>', 0)->latest()->take(8)->get();
        return view('welcome', compact('dbProducts'));
    }

    public function kids()
    {
        $products = Product::where('category', 'kids')->orWhere('category', 'like', '%kid%')->get();
        return view('navbar.kid', compact('products'));
    }

    public function brands()
    {
        // You can fetch particular brand collections here later.
        return view('navbar.brands');
    }
}
