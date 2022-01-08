<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customers;
use App\Models\Order;


use Illuminate\Http\Request;
use Session;


session_start();

class AuthController extends Controller
{
    //LOGIN page FE
    public function login(){
        $all_brand=Brand::where('brand_status','1')->get();
        $all_category=Category::where('category_status','1')->get();
        $all_product=Product::where('product_status','1')->get();
        return view('pages.auth.login')->with('all_category',$all_category)->with('all_brand',$all_brand)->with('all_product',$all_product);
    }

    public function save_login(Request $request){
        $data=$request->all();
  
        $email_account=$request->email_account;
        $password_account=md5($request->password_account);

        $cart=Session::get('cart');
        $customer=Customers::where('customer_email',$email_account)->where('customer_password',$password_account)->first();
        
        

        if($customer){
            Session::put('customer_id',$customer->customer_id);
            Session::put('customer_name',$customer->customer_name);
            if($cart){
                $customer_id=Session::get('customer_id');
                $product_by_order_id=Order::join('tbl_customers','tbl_customers.customer_id','=','tbl_order.customer_id')
                ->join('tbl_order_details','tbl_order_details.order_id','=','tbl_order.order_id')
                ->join('tbl_product','tbl_product.product_id','=','tbl_order_details.product_id')
                ->where('tbl_order.customer_id',$customer_id)
                ->select('tbl_product.product_id','tbl_product.product_price','tbl_product.product_image','tbl_product.product_name')

                ->distinct()
                ->get();
                Session::put('product_by_order_id',$product_by_order_id);
                return redirect('/checkout');
            }
            if($cart==null){
                $customer_id=Session::get('customer_id');
                $product_by_order_id=Order::join('tbl_customers','tbl_customers.customer_id','=','tbl_order.customer_id')
                ->join('tbl_order_details','tbl_order_details.order_id','=','tbl_order.order_id')
                ->join('tbl_product','tbl_product.product_id','=','tbl_order_details.product_id')
                ->where('tbl_order.customer_id',$customer_id)
                ->select('tbl_product.product_id','tbl_product.product_price','tbl_product.product_image','tbl_product.product_name')
                ->distinct()
                ->get();
                Session::put('product_by_order_id',$product_by_order_id);
                return redirect('/home');

            }
        }
        
        Session::put('message','User name or password is wrong');
        return redirect('/login');
    }

    public function register(){
        $all_brand=Brand::where('brand_status','1')->get();
        $all_category=Category::where('category_status','1')->get();
        $all_product=Product::where('product_status','1')->get();
        return view('pages.auth.register')->with('all_category',$all_category)->with('all_brand',$all_brand)->with('all_product',$all_product);
    }

    public function save_customer(Request $request){
        
        $check_email=Customers::where('customer_email',$request->customer_email)->count();
        
        if($check_email==null){
            $data= array();
            $data['customer_name']=$request->customer_name;
            $data['customer_phone']=$request->customer_phone;
            $data['customer_email']=$request->customer_email;
            $data['customer_password']=md5($request->customer_password);
    
            $customer_id=Customers::insertGetId($data);
            
            Session::put('customer_id',$customer_id);
            Session::put('customer_name',$request->customer_name);
            $cart=Session::get('cart');
            if($cart){
                return redirect('/checkout');
            }
            return redirect('/home');
        }
        Session::put('message','Email already exists');
        return redirect('/register');
    }
    
    public function logout(){
            Session::flush();
            return redirect('/login');
        
    }
}