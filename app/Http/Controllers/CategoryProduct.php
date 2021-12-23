<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;

session_start();

class CategoryProduct extends Controller
{

    //Start UI BE Admin page
    public function AuthLogin(){
        $admin_id=Session::get('admin_id');

        if(!$admin_id){
            return redirect('/admin')->send('them thanh cong');
        }
        return redirect('/dashboard');
    }
    
    public function add_category_product()
    {
        $this->AuthLogin();
        return view('admin.add_category_product');
    }

    public function all_category_product()
    {
        $this->AuthLogin();

        $all_category_product = DB::table('tbl_category_product')->get();
        //$manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('admin.all_category_product')->with('all_category_product', $all_category_product);
    }

    public function save_category_product(Request $request)
    {
        $this->AuthLogin();

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        $data['meta_keywords'] = strtolower($request->category_product_name);
        $data['slug_category_product'] = strtolower($request->category_product_name);

        DB::table('tbl_category_product')->insert($data);
        Session::put('message', 'Add category product successfully.');
        return redirect('/add-category-product');
    }

    public function active_category_status($category_id)
    {
        $this->AuthLogin();

        DB::table('tbl_product')->where('category_id',$category_id)->update(['product_status' => 1]);
        DB::table('tbl_category_product')->where('category_id',$category_id)->update(['category_status' => 1]);
        Session::put('message','Update display sucessfully.');
        return redirect('/all-category-product');
    }
    
    public function unactive_category_status($category_id)
    {
        $this->AuthLogin();

        DB::table('tbl_product')->where('category_id',$category_id)->update(['product_status' => 0]);
        DB::table('tbl_category_product')->where('category_id',$category_id)->update(['category_status' => 0]);
        Session::put('message','Update display sucessfully.');
        return redirect('/all-category-product');

    }

    public function edit_category_product($category_id)
    {
        $this->AuthLogin();

        $edit_value = DB::table('tbl_category_product')->where('category_id',$category_id)->first();
        return view('admin.edit_category_product')->with('edit_value', $edit_value);
    }

    public function update_category_product(Request $request,$category_id)
    {
        $this->AuthLogin();

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;

        DB::table('tbl_category_product')->where('category_id',$category_id)->update($data);
        Session::put('message', 'Update category product successfully.');
        return redirect('/all-category-product');
    }

    public function delete_category_product($category_id)
    {
        $this->AuthLogin();

        DB::table('tbl_category_product')->where('category_id',$category_id)->delete();
        Session::put('message', 'Delete category product successfully.');
        return redirect('/all-category-product');
    }
    //End BE UI Admin page

    //Start FE UI 
    public function show_category_home($category_id){
        $all_brand=DB::table('tbl_brand')->where('brand_status','1')->get();
        $all_product=DB::table('tbl_product')->where('product_status','1')->get();
        $all_category=DB::table('tbl_category_product')->where('category_status','1')->get();
        $product_by_category_id=DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_product.category_id',$category_id)->where('category_status','1')->get();
       // $all_product=DB::table('tbl_product')->where('product_status','1')->get();
        return view('pages.category.show_category')->with('all_category',$all_category)->with('all_brand',$all_brand)->with('product_by_category_id',$product_by_category_id)->with('all_product',$all_product); 
    }

    public function show_brand_home($brand_id){
        $all_brand=DB::table('tbl_brand')->where('brand_status','1')->get();
        $all_product=DB::table('tbl_product')->where('product_status','1')->get();
        $all_category=DB::table('tbl_category_product')->where('category_status','1')->get();
        $product_by_brand_id=DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->where('tbl_product.brand_id',$brand_id)->where('product_status','1')->get();
       // $all_product=DB::table('tbl_product')->where('product_status','1')->get();
        
      
       return view('pages.brand.show_brand')->with('all_category',$all_category)->with('all_brand',$all_brand)->with('product_by_brand_id',$product_by_brand_id)->with('all_product',$all_product); 
    }
}