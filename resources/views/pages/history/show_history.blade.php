@extends('welcome')
@section('content')
<section id="cart_items">

    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">History</li>
        </ol>
    </div>
    <?php
                    $message = Session::get('message');
                    $cart=Session::get('cart');
                    $productId=Session::get('productId');
                    $product_quantity=Session::get('product_quantity');
                    if ($message) {
                        echo "<p class='position-center' style='color:red;text-align:left;'>$message</p>";
                        Session::put('message', null);
                    }
                    $total_money=0;
                    $product_by_order_id=Session::get('product_by_order_id');
                    $customer_id=Session::get('customer_id');
                    // echo "<pre>";
                    // print_r ($product_by_order_id);
                    // echo"</pre>";
                    ?>


    <div class="table-responsive cart_info">
        <form action="{{URL('/update-cart')}}" method="POST">
            {{csrf_field()}}
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <th class="image">Item</th>
                        <th class="name text-center">Name</th>
                        <th class="price text-center">Price</th>
                        <th class="quantity text-center">Quantity</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach( $product_by_order_id as $key =>$val)
                    <?php
                        $subtotal= $val->product_price *$val->product_sales_quantity;
                        if($val->product_id==$productId){
                            if($val->product_sales_quantity<=$product_quantity){
                                $val->product_sales_quantity=$product_quantity;
                            }
                        }
                        // echo "<pre>";
                        // print_r ($val->product_id);
                        // echo"</pre>";
                    ?>
                    <tr>
                        <td class="cart_product ">
                            <a href="{{URL::to('/product-details/'.$val->product_id)}}"><img
                                    src="{{asset('backend/uploads/product/'.$val->product_image)}}" alt="" width="80"
                                    height="80"></a>
                        </td>
                        <td class="cart_name text-center">
                            <h4><a href="{{URL::to('/product-details/'.$val->product_id)}}">{{$val->product_name}}</a>
                            </h4>

                        </td>

                        <td class="cart_price text-center">
                            <h4><a href=""></a></h4>
                            <p>{{number_format($val->product_price)}}</p>
                        </td>
                        <td class="cart_quantity" style="display:flex">
                            <div class="cart_quantity_button " style="margin:auto">
                                <input class="cart_quantity_input" type="number" readonly value="1" size="1" min="1">
                            </div>
                        </td>

                        <!-- <td class="cart_delete">
                            <a class="cart_quantity_delete"
                                href="{{URL::to('/delete-cart-product/'.$val['session_id'])}}"><i
                                    class="fa fa-times"></i></a>
                        </td> -->
                    </tr>

                    <!--Cart total-->
                    <?php
                        $total_money=$total_money+$subtotal; 
                    ?>

                    @endforeach

                </tbody>
            </table>
        </form>
    </div>


</section>

@endsection