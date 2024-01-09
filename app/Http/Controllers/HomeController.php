<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->limit(5)->get();
        //dd($products);
        return view('home', compact('products'));
    }
}
