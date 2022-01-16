<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;

use App\Models\Customers;
use Illuminate\Http\Request;
use Session;

session_start();

class SearchController extends Controller
{
    public function AuthLogin(){
        $admin_id=Session::get('admin_id');

        if(!$admin_id){
            return redirect('/admin')->send('successfully');
        }
        return redirect('/dashboard');
    }
    //Search BE
    // Search Product
    public function post_search_manager(Request $request){
        $data=$request->keywords;
        $data =Session::put('keywords',$data);

    }
    public function result_search_product_manager(){
        $this->AuthLogin();
        $data =Session::get('keywords');
        $all_product = Product::join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->where('product_name','like','%'.$data.'%')->get();

        return view('admin.all_product')->with('all_product', $all_product);
    }

    //Search Brand
    public function result_search_brand_manager()
    {
       
        $data =Session::get('keywords');

        $this->AuthLogin();
        $all_brand_product=Brand::where('brand_name','like','%'.$data.'%')->get();
        return view('admin.all_brand_product')->with('all_brand_product', $all_brand_product);
    }
    
    //Search Category
    public function result_search_category_manager()
    {   
        $data =Session::get('keywords');
            $this->AuthLogin();
            $all_category_product=Category::where('category_name','like','%'.$data.'%')->get();
            return view('admin.all_category_product')->with('all_category_product', $all_category_product);
        
    }

    public function result_search_order_manager()
    {   
        $data =Session::get('keywords');
            $this->AuthLogin();
            $all_order=Order::join('tbl_customers','tbl_customers.customer_id','=','tbl_order.customer_id')->where('customer_name','like','%'.$data.'%')->get();
            $all_product = Product::join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->where('product_name','like','%'.$data.'%')->get();
            return view('admin.manage_order')->with('all_order', $all_order);
        
    }
    //End BE

    //Search FE
    public function search_product(){

                
        $data =Session::get('keywords');

        $all_brand=Brand::where('brand_status','1')->get();
        $all_product=Product::where('product_status','1')->get();
        $all_category=Category::where('category_status','1')->get();

        $result_search=Product::where('product_status','1')->where('product_name','like','%'.$data.'%')->get();
        
        return view('pages.product.search_product')->with('all_product',$all_product)->with('all_brand',$all_brand)->with('all_category',$all_category)->with('result_search',$result_search);
    }
}