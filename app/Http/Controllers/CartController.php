<?php

namespace App\Http\Controllers;
// use Gloudemans\Shoppingcart\Facades\Cart;
use DB;
use Illuminate\Http\Request;
use Session;


session_start();


class CartController extends Controller
{
    public function save_cart(Request $request){
        $all_brand=DB::table('tbl_brand')->where('brand_status','1')->get();
        $all_category=DB::table('tbl_category_product')->where('category_status','1')->get();
        $all_product=DB::table('tbl_product')->where('product_status','1')->get();
        
        $data = $request->all();
        
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    {
                        
                        $is_avaiable++;
                        $cart[$key]['product_qty']=$data['cart_product_qty'];                        
                        Session::put('cart',$cart);
                    }
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
            }
            

        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],

            );
            Session::put('cart',$cart);
        }

        Session::save();
    
        return redirect('/show-cart');
    }

    public function show_cart(){
        
        
        $all_brand=DB::table('tbl_brand')->where('brand_status','1')->get();
        $all_category=DB::table('tbl_category_product')->where('category_status','1')->get();
        $all_product=DB::table('tbl_product')->where('product_status','1')->get();
        return view('pages.cart.show_cart')->with('all_category',$all_category)->with('all_brand',$all_brand)->with('all_product',$all_product);
    }

    public function add_cart_ajax(Request $request){
        
        $data = $request->all();
        echo "<pre>";
        print_r($data);
        echo "</pre>";

        
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                   
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],

            );
            Session::put('cart',$cart);

        }
        Session::save();

    }

    public function delete_cart_product($session_id){
        $cart=Session::get('cart');
        if($cart){
            foreach($cart as $key=>$val){
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            Session::save();
            return redirect('/show-cart')->with('message','Delete product successfully');
        }
        else{
            return redirect('/show-cart')->with('message','Cannot delete product');

        }
        
    }

    public function update_cart(Request $request){
        $data=$request->all();
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        
        $cart=Session::get('cart');

        echo "<pre>";
        print_r($cart);
        echo "</pre>";
        if($cart){
            foreach($data['cart_qty']as $key=>$qty){
                foreach($cart as $session=>$val){
                    if($val['session_id']==$key){
                        $cart[$session]['product_qty']=$qty;
                    }
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Update cart successfully');
        }
        else{
            return redirect()->back()->with('message','Update cart successfully');
        }
    }


    
}