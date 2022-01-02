<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;

class HistoryController extends Controller
{
    //
    public function show_history(){
        $all_brand=Brand::where('brand_status','1')->get();
        $all_product=Product::where('product_status','1')->get();
        $all_category=Category::where('category_status','1')->get();
       return view('pages.history.show_history')->with('all_category',$all_category)->with('all_brand',$all_brand)->with('all_product',$all_product); 
    }
}