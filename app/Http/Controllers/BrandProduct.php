<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;

session_start();

class BrandProduct extends Controller
{
    public function add_brand_product()
    {
        return view('admin.add_brand_product');
    }

    public function all_brand_product()
    {
        $all_brand_product = DB::table('tbl_brand')->get();
        return view('admin.all_brand_product')->with('all_brand_product', $all_brand_product);
    }

    public function save_brand_product(Request $request)
    {
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_desc'] = $request->brand_desc;
        $data['brand_status'] = $request->brand_status;
        $data['brand_slug'] = strtolower($request->brand_name);

        DB::table('tbl_brand')->insert($data);
        Session::put('message', 'Add brand product successfully.');
        return redirect('/add-brand-product');
    }

    public function active_brand_status($brand_id)
    {
        DB::table('tbl_brand')->where('brand_id',$brand_id)->update(['brand_status' => 1]);
        Session::put('message','Update display sucessfully.');
        return redirect('/all-brand-product');
    }
    
    public function unactive_brand_status($brand_id)
    {
        DB::table('tbl_brand')->where('brand_id',$brand_id)->update(['brand_status' => 0]);
        Session::put('message','Update display sucessfully.');
        return redirect('/all-brand-product');

    }

    public function edit_brand_product($brand_id)
    {
        $edit_value = DB::table('tbl_brand')->where('brand_id',$brand_id)->first();
        return view('admin.edit_brand_product')->with('edit_value', $edit_value);
    }

    public function update_brand_product(Request $request,$brand_id)
    {
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_desc'] = $request->brand_desc;

        DB::table('tbl_brand')->where('brand_id',$brand_id)->update($data);
        Session::put('message', 'Update brand product successfully.');
        return redirect('/all-brand-product');
    }

    public function delete_brand_product($brand_id)
    {

        DB::table('tbl_brand')->where('brand_id',$brand_id)->delete();
        Session::put('message', 'Delete brand product successfully.');
        return redirect('/all-brand-product');
    }
}