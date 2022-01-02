<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customers;
use App\Models\Payment;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\Order_Details;




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

        $customer_id=Customers::insertGetId($data);
        
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return redirect('/checkout');
    }

    public function checkout(){
        $all_brand=Brand::where('brand_status','1')->get();
        $all_product=Product::where('product_status','1')->get();
        $all_category=Category::where('category_status','1')->get();
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



        $shipping_id=Shipping::insertGetId($data);
        
        Session::put('shipping_id',$shipping_id);
        Session::put('shipping_name',$request->shipping_name);
        return redirect('/payment');
    }

    public function payment(){
        $all_brand=Brand::where('brand_status','1')->get();
        $all_product=Product::where('product_status','1')->get();
        $all_category=Category::where('category_status','1')->get();
        return view('pages.checkout.payment')->with('all_category',$all_category)->with('all_brand',$all_brand)->with('all_product',$all_product);
    }

    public function order_place(Request $request){
        $all_brand=Brand::where('brand_status','1')->get();
        $all_product=Product::where('product_status','1')->get();
        $all_category=Category::where('category_status','1')->get();
        
        //insert data into payment table
        $data= array();
        $data['payment_method']=$request->payment_option;
        $data['payment_status']="Waiting";
        $payment_id=Payment::insertGetId($data);

        //insert data into order table
        $order_data= array();
        $order_data['customer_id']=Session::get('customer_id');
        $order_data['shipping_id']=Session::get('shipping_id');
        $order_data['payment_id']=$payment_id;
        $order_data['order_total']=Session::get('total_money');
        $order_data['order_status']="Waiting";
        $order_id=Order::insertGetId($order_data);
        
        //insert data into order_details
        $cart=Session::get('cart');
        foreach($cart as $key=>$v_cart){
            $order_details_data= array();
            $order_details_data['order_id']=$order_id;
            $order_details_data['product_id']=$v_cart['product_id'];
            $order_details_data['product_name']=$v_cart['product_name'];
            $order_details_data['product_price']=$v_cart['product_price'];
            $order_details_data['product_sales_quantity']=$v_cart['product_qty'];
            $order_details_data=Order_Details::insertGetId($order_details_data);
        }
        

        if($data['payment_method']==1){
            echo"ATM";
        }elseif($data['payment_method']==2){
        $customer_id=Session::get('customer_id');
        $product_by_order_id=Order::join('tbl_customers','tbl_customers.customer_id','=','tbl_order.customer_id')
        ->join('tbl_order_details','tbl_order_details.order_id','=','tbl_order.order_id')
        ->join('tbl_product','tbl_product.product_id','=','tbl_order_details.product_id')
        ->where('tbl_order.customer_id',$customer_id)
        ->select('tbl_product.product_id','tbl_product.product_price','tbl_product.product_image','tbl_product.product_name')
        ->distinct()
        ->get();
        Session::put('product_by_order_id',$product_by_order_id);
            Session::put('cart',null);
            return view('pages.checkout.handcash')->with('all_category',$all_category)->with('all_brand',$all_brand)->with('all_product',$all_product);
        }
        else{
            echo"Paypal";
        }
    }

    
}