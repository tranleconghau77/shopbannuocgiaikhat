<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;

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
        
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
        return view('admin.manage_order')->with('all_order', $all_order);
        
    }

    public function view_order($order_id){
        $this->AuthLogin();
        
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->where('tbl_order.order_id','=',$order_id)
        ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_order_details.*')
        ->orderby('tbl_order.order_id','desc')->get();

        // echo "<pre>";
        // print_r($order_by_id);
        // echo "</pre>";
        return view('admin.view_order')->with('order_by_id', $order_by_id);   
    }

    public function delete_order($order_id){
        $this->AuthLogin();
        DB::table('tbl_order_details')->where('order_id',$order_id)->delete();
        $shipping_id=DB::table('tbl_order')->where('order_id',$order_id)->first();
        $id_shipping=$shipping_id->shipping_id;
        DB::table('tbl_shipping')->where('shipping_id',$id_shipping)->delete();
        DB::table('tbl_order')->where('order_id',$order_id)->delete();

        // echo "<pre>";
        // print_r($shipping_id);
        // echo "</pre>";
       
        return redirect('/manage-order');
        
    }
}