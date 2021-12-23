<?php

namespace App\Http\Controllers;
// use Gloudemans\Shoppingcart\Facades\Cart;
use DB;
use Illuminate\Http\Request;
use Session;
use Cart;

session_start();


class CartController extends Controller
{
    public function save_cart(Request $request){
        $all_brand=DB::table('tbl_brand')->where('brand_status','1')->get();
        $all_category=DB::table('tbl_category_product')->where('category_status','1')->get();
        $all_product=DB::table('tbl_product')->where('product_status','1')->get();

        $productId=$request->productid_hidden;
        $quantity=$request->quantity;
        $product_info=DB::table('tbl_product')->where('product_id',$productId)->get();

        $data['id']='10';
        $data['qty']=$quantity;
        $data['name']=$product_info->product_name;
        $data['price']=$product_info->product_price;
        $data['weight']='123';
        $data['options']['image']=$product_info->product_image;
        
    
        return redirect('/show-cart');
    }

    public function show_cart(){
        
        
        $all_brand=DB::table('tbl_brand')->where('brand_status','1')->get();
        $all_category=DB::table('tbl_category_product')->where('category_status','1')->get();
        $all_product=DB::table('tbl_product')->where('product_status','1')->get();
        return view('pages.cart.show_cart')->with('all_category',$all_category)->with('all_brand',$all_brand)->with('all_product',$all_product);

    }
}