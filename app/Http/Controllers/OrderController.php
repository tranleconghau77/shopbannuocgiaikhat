<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Order_Details;
use App\Models\Shipping;



session_start();

class OrderController extends Controller
{
    //Manage order BE
    public function AuthLogin(){
        $admin_id=Session::get('admin_id');

        if(!$admin_id){
            return redirect('/admin')->send('them thanh cong');
        }
        return redirect('/dashboard');
    }
    
    public function manage_order(){
        $this->AuthLogin();
        
        $all_order = Order::join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
        return view('admin.manage_order')->with('all_order', $all_order);
        
    }

    public function view_order($order_id){
        $this->AuthLogin();
        
        $order_by_id =Order::join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->where('tbl_order.order_id','=',$order_id)
        ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_order_details.*')
        ->orderby('tbl_order.order_id','desc')->get();

        return view('admin.view_order')->with('order_by_id', $order_by_id);   
    }

    public function delete_order($order_id){
        $this->AuthLogin();
        Order_Details::where('order_id',$order_id)->delete();
        $shipping_id=DB::table('tbl_order')->where('order_id',$order_id)->first();
        $id_shipping=$shipping_id->shipping_id;
        Shipping::where('shipping_id',$id_shipping)->delete();
        Order::where('order_id',$order_id)->delete();
       
        return redirect('/manage-order');
        
    }
}