<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;


session_start();

class AuthController extends Controller
{
    //LOGIN
    public function login(){
        $all_brand=DB::table('tbl_brand')->where('brand_status','1')->get();
        $all_category=DB::table('tbl_category_product')->where('category_status','1')->get();
        $all_product=DB::table('tbl_product')->where('product_status','1')->get();
        return view('pages.auth.login')->with('all_category',$all_category)->with('all_brand',$all_brand)->with('all_product',$all_product);
    }

    public function save_login(Request $request){
        $data=$request->all();
  
        $email_account=$request->email_account;
        $password_account=md5($request->password_account);

        $cart=Session::get('cart');
        $customer=DB::table('tbl_customers')->where('customer_email',$email_account)->where('customer_password',$password_account)->first();
        

        if($customer){
            Session::put('customer_id',$customer->customer_id);
            Session::put('customer_name',$customer->customer_name);
            if($cart){
                return redirect('/checkout');
            }
            if($cart==null){
                return redirect('/home');

            }
        }
        Session::put('message','User name or password is wrong');
        return redirect('/login');
    }

    public function register(){
        $all_brand=DB::table('tbl_brand')->where('brand_status','1')->get();
        $all_category=DB::table('tbl_category_product')->where('category_status','1')->get();
        $all_product=DB::table('tbl_product')->where('product_status','1')->get();
        return view('pages.auth.register')->with('all_category',$all_category)->with('all_brand',$all_brand)->with('all_product',$all_product);
    }

    public function save_customer(Request $request){
        $data= array();
        $check_email=DB::table('tbl_customers')->where('customer_email',$request->customer_email)->count();
        
        if($check_email==null){
            $data['customer_name']=$request->customer_name;
            $data['customer_phone']=$request->customer_phone;
            $data['customer_email']=$request->customer_email;
            $data['customer_password']=md5($request->customer_password);
    
            $customer_id=DB::table('tbl_customers')->insertGetId($data);
            
            Session::put('customer_id',$customer_id);
            Session::put('customer_name',$request->customer_name);
            $cart=Session::get('cart');
            if($cart){
                return redirect('/checkout');
            }
            return redirect('/trang-chu');
        }
        Session::put('message','User name already exists');
        return redirect('/register');
    }
    
    public function logout(){
            Session::flush();
            return redirect('/login');
        
    }
}