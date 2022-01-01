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

    public function order_place(Request $request){
        $all_brand=DB::table('tbl_brand')->where('brand_status','1')->get();
        $all_category=DB::table('tbl_category_product')->where('category_status','1')->get();
        $all_product=DB::table('tbl_product')->where('product_status','1')->get();
        
        //insert data into payment table
        $data= array();
        $data['payment_method']=$request->payment_option;
        $data['payment_status']="Waiting";
        $payment_id=DB::table('tbl_payment')->insertGetId($data);

        //insert data into order table
        $order_data= array();
        $order_data['customer_id']=Session::get('customer_id');
        $order_data['shipping_id']=Session::get('shipping_id');
        $order_data['payment_id']=$payment_id;
        $order_data['order_total']=Session::get('total_money');
        $order_data['order_status']="Waiting";
        $order_id=DB::table('tbl_order')->insertGetId($order_data);
        
        //insert data into order_details
        $cart=Session::get('cart');
        foreach($cart as $key=>$v_cart){
            $order_details_data= array();
            $order_details_data['order_id']=$order_id;
            $order_details_data['product_id']=$v_cart['product_id'];
            $order_details_data['product_name']=$v_cart['product_name'];
            $order_details_data['product_price']=$v_cart['product_price'];
            $order_details_data['product_sales_quantity']=$v_cart['product_qty'];
            $order_details_data=DB::table('tbl_order_details')->insertGetId($order_details_data);
        }
        

        if($data['payment_method']==1){
            echo"ATM";
        }elseif($data['payment_method']==2){
            Session::flush();
            return view('pages.checkout.handcash')->with('all_category',$all_category)->with('all_brand',$all_brand)->with('all_product',$all_product);
        }
        else{
            echo"Paypal";
        }
    }

    
}