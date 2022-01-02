<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;



use Session;

session_start();

class BrandProduct extends Controller
{
    public function AuthLogin(){
        $admin_id=Session::get('admin_id');

        if(!$admin_id){
            return redirect('/admin')->send('them thanh cong');
        }
        return redirect('/dashboard');
    }
    
    public function add_brand_product()
    {
        $this->AuthLogin();

        return view('admin.add_brand_product');
    }

    public function all_brand_product()
    {
        $this->AuthLogin();
        $all_brand_product=Brand::all();
        return view('admin.all_brand_product')->with('all_brand_product', $all_brand_product);
    }

    public function save_brand_product(Request $request)
    {
        $this->AuthLogin();

        $data=new Brand();
        $data['brand_name'] = $request->brand_name;
        $data['brand_desc'] = $request->brand_desc;
        $data['brand_status'] = $request->brand_status;
        $data['brand_slug'] = strtolower($request->brand_name);

        $data->save();
        
        Session::put('message', 'Add brand product successfully.');
        return redirect('/add-brand-product');
    }

    public function active_brand_status($brand_id)
    {
        $this->AuthLogin();

        Brand::where('brand_id',$brand_id)->update(['brand_status' => 1]);
        
        Session::put('message','Update display sucessfully.');
        return redirect('/all-brand-product');
    }
    
    public function unactive_brand_status($brand_id)
    {
        $this->AuthLogin();

        Product::where('brand_id',$brand_id)->update(['product_status' => 0]);
        Brand::where('brand_id',$brand_id)->update(['brand_status' => 0]);
        
        Session::put('message','Update display sucessfully.');
        return redirect('/all-brand-product');

    }

    public function edit_brand_product($brand_id)
    {
        $this->AuthLogin();

        $edit_value = Brand::where('brand_id',$brand_id)->first();
        return view('admin.edit_brand_product')->with('edit_value', $edit_value);
    }

    public function update_brand_product(Request $request,$brand_id)
    {
        $this->AuthLogin();

        $data = Brand::find($brand_id);
        $data['brand_name'] = $request->brand_name;
        $data['brand_desc'] = $request->brand_desc;

        $data->save();
        Session::put('message', 'Update brand product successfully.');
        return redirect('/all-brand-product');
    }

    public function delete_brand_product($brand_id)
    {
        $this->AuthLogin();
        $data=Brand::find($brand_id);
        $data->delete();
        Session::put('message', 'Delete brand product successfully.');
        return redirect('/all-brand-product');
    }

    public function show_brand_home($brand_id){
        $all_brand=Brand::where('brand_status','1')->get();
        $all_product=Product::where('product_status','1')->get();
        $all_category=Category::where('category_status','1')->get();
        $product_by_brand_id=Product::with('brand')->where('brand_id',$brand_id)->where('product_status','1')->get();
      
       return view('pages.brand.show_brand')->with('all_category',$all_category)->with('all_brand',$all_brand)->with('product_by_brand_id',$product_by_brand_id)->with('all_product',$all_product); 
    }
}