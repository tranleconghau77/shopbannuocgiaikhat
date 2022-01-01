<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;

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

        $all_category_product = Category::all();
        return view('admin.all_category_product')->with('all_category_product', $all_category_product);
    }

    public function edit_category_product($category_id)
    {
        $this->AuthLogin();

        $edit_value=Category::find($category_id);
        return view('admin.edit_category_product')->with('edit_value', $edit_value);
    }
    public function update_category_product(Request $request,$category_id)
    {
        $this->AuthLogin();

        $data = Category::find($category_id);
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;

        $data->save();
        Session::put('message', 'Update category product successfully.');
        return redirect('/all-category-product');
    }

    public function delete_category_product($category_id)
    {
        $this->AuthLogin();
        $data=Category::find($category_id);
        $data->delete();
        Session::put('message', 'Delete category product successfully.');
        return redirect('/all-category-product');
    }
    public function save_category_product(Request $request)
    {
        $this->AuthLogin();

        $data = new Category();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        $data['meta_keywords'] = strtolower($request->category_product_name);
        $data['slug_category_product'] = strtolower($request->category_product_name);

        $data->save();
        Session::put('message', 'Add category product successfully.');
        return redirect('/add-category-product');
    }

    public function active_category_status($category_id)
    {
        $this->AuthLogin();

        
        Category::where('category_id',$category_id)->update(['category_status' => 1]);
        Session::put('message','Update display sucessfully.');
        return redirect('/all-category-product');
    }
    
    public function unactive_category_status($category_id)
    {
        $this->AuthLogin();
        Product::where('category_id',$category_id)->update(['product_status' => 0]);
        Category::where('category_id',$category_id)->update(['category_status' => 0]);

        Session::put('message','Update display sucessfully.');
        return redirect('/all-category-product');

    }

    //End BE UI Admin page

    //Start FE UI 
    public function show_category_home($category_id){
       
        $all_brand=Brand::all()->where('brand_status','1');
        $all_product=Product::all()->where('product_status','1');
        $all_category=Category::all()->where('category_status','1');
        $product_by_category_id = Product::with('category')->where('category_id',$category_id)->where('product_status','1')->get();
        return view('pages.category.show_category')->with('all_category',$all_category)->with('all_brand',$all_brand)->with('product_by_category_id',$product_by_category_id)->with('all_product',$all_product); 
    }

    
}