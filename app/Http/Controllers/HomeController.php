<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customers;
use Illuminate\Http\Request;
use Session;

// session_start();



class HomeController extends Controller
{
    public function index()
    {   
        Session::put('current_page',null);

        $all_brand=Brand::where('brand_status','1')->get();
        $all_category=Category::where('category_status','1')->get();
        $all_product=Product::where('product_status','1')->get();
        return view('pages.home')->with('all_category',$all_category)->with('all_brand',$all_brand)->with('all_product',$all_product);
        
    }
}