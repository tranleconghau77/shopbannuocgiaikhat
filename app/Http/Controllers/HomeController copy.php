<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Session;

session_start();



class HomeController extends Controller
{
    public function index()
    {
        $all_brand=DB::table('tbl_brand')->where('brand_status','1')->get();
        $all_category=DB::table('tbl_category_product')->where('category_status','1')->get();
        $all_product=DB::table('tbl_product')->where('product_status','1')->get();
        return view('pages.home')->with('all_category',$all_category)->with('all_brand',$all_brand)->with('all_product',$all_product);
        
    }
}