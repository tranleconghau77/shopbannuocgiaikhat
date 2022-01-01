<?php

namespace App\Http\Controllers;

use DB;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Session;

session_start();

class ProductController extends Controller
{
    //Start BE UI Admin
    public function AuthLogin(){
        $admin_id=Session::get('admin_id');

        if(!$admin_id){
            return redirect('/admin')->send('them thanh cong');
        }
        return redirect('/dashboard');
    }
    
    public function add_product()
    {
        $this->AuthLogin();

        $all_category = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $all_brand = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        return view('admin.add_product')->with('all_category', $all_category)->with('all_brand',$all_brand);
    }

    public function all_product()
    {
        $this->AuthLogin();
        
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->get();
        return view('admin.all_product')->with('all_product', $all_product);
    }

    public function save_product(Request $request)
    {
        $this->AuthLogin();

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_status'] = $request->product_status;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_price'] = $request->product_price;
        $data['brand_id'] = $request->product_brand;
        $data['category_id'] = $request->product_category;
        $data['product_slug'] = strtolower($request->product_name);

        $get_image=$request->file('product_image');

        if($get_image){

            $pro_name = str_replace(' ', '', $request->product_name);
            $new_image='product'.$pro_name.$request->product_id.'.'.$get_image->getClientOriginalExtension();
            $get_image->move('backend/uploads/product',$new_image);
            $data['product_image']=$new_image;

            DB::table('tbl_product')->insert($data);
            Session::put('message', 'Add product successfully.');
            return redirect('/add-product');
            
        }

        DB::table('tbl_product')->insert($data);
        Session::put('message', 'Add  product successfully.');
        return redirect('/add-product');
    }

    public function active_product_status($product_id)
    {
        $this->AuthLogin();

        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status' => 1]);
        Session::put('message','Update display sucessfully.');
        return redirect('/all-product');
    }
    
    public function unactive_product_status($product_id)
    {
        $this->AuthLogin();

        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status' => 0]);
        Session::put('message','Update display sucessfully.');
        return redirect('/all-product');

    }

    public function edit_product($product_id)
    {
        $this->AuthLogin();

        $all_category = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $all_brand = DB::table('tbl_brand')->orderby('brand_id','desc')->get();

        $product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->where('product_id',$product_id)->first();
        
        // echo "<pre>";
        // echo $product;
        // echo"</pre>";
        return view('admin.edit_product')->with('product',$product)->with('all_category', $all_category)->with('all_brand',$all_brand);
        
    }

    public function update_product(Request $request,$product_id)
    {
        $this->AuthLogin();

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_status'] = $request->product_status;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_price'] = $request->product_price;
        $data['brand_id'] = $request->product_brand;
        $data['category_id'] = $request->product_category;
        $data['product_slug'] = strtolower($request->product_name);

        $get_image=$request->file('product_image');

        if($get_image){
            $pro_name = str_replace(' ', '', $request->product_name);
            $new_image='product'.$pro_name.$request->product_id.'.'.$get_image->getClientOriginalExtension();
            $data['product_image']=$new_image;

            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message', 'Update product successfully.');
            return redirect('/all-product');
            
        }

        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message', 'Update  product successfully.');
        return redirect('/all-product');
    }

    public function delete_product($product_id)
    {
        $this->AuthLogin();

        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message', 'Delete product successfully.');
        return redirect('/all-product');
    }
    //End BE UI Admin

    //Start FE UI pages
    public function product_details($product_id){
        $all_brand=DB::table('tbl_brand')->where('brand_status','1')->get();
        $all_category=DB::table('tbl_category_product')->where('category_status','1')->get();
        $all_product=DB::table('tbl_product')->where('product_status','1')->get();
        //$product=DB::table('tbl_product')->where('product_status','1')->where('product_id',$product_id)->get();
        $product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->where('product_id',$product_id)->get();
        return view('pages.product.product_details')->with('all_brand',$all_brand)->with('all_category',$all_category)->with('all_product',$all_product)->with('product',$product);
    }

    public function search_product(Request $request){
        $data=$request->keywords;

        $all_brand=DB::table('tbl_brand')->where('brand_status','1')->get();
        $all_product=DB::table('tbl_product')->where('product_status','1')->get();
        $all_category=DB::table('tbl_category_product')->where('category_status','1')->get();

        $result_search=DB::table('tbl_product')->where('product_status','1')->where('product_name','like','%'.$data.'%')->get();

      
        return view('pages.product.search_product')->with('all_product',$all_product)->with('all_brand',$all_brand)->with('all_category',$all_category)->with('result_search',$result_search);
    }
}