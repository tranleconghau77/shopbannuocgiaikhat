<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;

session_start();

class CategoryProduct extends Controller
{
    public function add_category_product()
    {
        return view('admin.add_category_product');
    }

    public function all_category_product()
    {
        $all_category_product = DB::table('tbl_category_product')->get();
        //$manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('admin.all_category_product')->with('all_category_product', $all_category_product);
    }

    public function save_category_product(Request $request)
    {
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
        DB::table('tbl_category_product')->where('category_id',$category_id)->update(['category_status' => 1]);
        Session::put('message','Update display sucessfully.');
        return redirect('/all-category-product');
    }
    
    public function unactive_category_status($category_id)
    {
        DB::table('tbl_category_product')->where('category_id',$category_id)->update(['category_status' => 0]);
        Session::put('message','Update display sucessfully.');
        return redirect('/all-category-product');

    }

    public function update_category_product(Request $request)
    {
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
}