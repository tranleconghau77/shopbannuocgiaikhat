<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;

session_start();

class CheckoutController extends Controller
{
    //Login-checkout cart
    

    public function add_customer(Request $request){
        $data= array();
        $data['customer_name']=$request->customer_name;
        $data['customer_phone']=$request->customer_phone;
        $data['customer_email']=$request->customer_email;
        $data['customer_password']=md5($request->customer_password);

        $customer_id=DB::table('tbl_customers')->insertGetId($data);
        
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return redirect('/checkout');
    }

    public function checkout(){
        $all_brand=DB::table('tbl_brand')->where('brand_status','1')->get();
        $all_category=DB::table('tbl_category_product')->where('category_status','1')->get();
        $all_product=DB::table('tbl_product')->where('product_status','1')->get();
        return view('pages.checkout.show_checkout')->with('all_category',$all_category)->with('all_brand',$all_brand)->with('all_product',$all_product);
    }

    public function save_shipping_information(Request $request){
        $data= array();
        $data['shipping_name']=$request->shipping_name;
        $data['shipping_phone']=$request->shipping_phone;
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_address']=$request->shipping_address;
        $data['shipping_notes']=$request->shipping_notes;
        $data['shipping_method']=$request->shipping_method;



        $shipping_id=DB::table('tbl_shipping')->insertGetId($data);
        
        Session::put('shipping_id',$shipping_id);
        Session::put('shipping_name',$request->shipping_name);
        return redirect('/payment');
    }

    public function payment(){
        $all_brand=DB::table('tbl_brand')->where('brand_status','1')->get();
        $all_category=DB::table('tbl_category_product')->where('category_status','1')->get();
        $all_product=DB::table('tbl_product')->where('product_status','1')->get();
        return view('pages.checkout.payment')->with('all_category',$all_category)->with('all_brand',$all_brand)->with('all_product',$all_product);
    }

    
}