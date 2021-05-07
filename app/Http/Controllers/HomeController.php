<?php

namespace App\Http\Controllers;

use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $bestsellers = Product::where('payCount','>=',100)
                        ->orderBy('id','desc')
                        ->latest()
                        ->get();

        $mostPopular = Product::where('viewCount','>=',100)
        ->orderBy('id','desc')
        ->latest()
        ->get();
                        
        $latestProducts = Product::latest()->get();

        return view('home',compact('bestsellers','mostPopular','latestProducts'));
    }

    public function single(Product $product)
    {   
        return view('single',compact('product'));
    }

}
