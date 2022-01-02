@extends('welcome')
@section('content')
<section id="cart_items">

    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Shopping Cart</li>
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
                    
                    ?>
    <?php
    if($cart){
        ?>
    <div class="table-responsive cart_info">
        <form action="{{URL('/update-cart')}}" method="POST">
            {{csrf_field()}}
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="name">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>

                    @foreach( Session::get('cart') as $key =>$val)
                    <?php
                        $subtotal= $val['product_price'] *$val['product_qty'];
                        if($val['product_id']==$productId){
                            if($val['product_qty']<=$product_quantity){
                                $val['product_qty']=$product_quantity;
                            }
                        }
                    ?>
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{asset('backend/uploads/product/'.$val['product_image'])}}" alt=""
                                    width="80" height="80"></a>
                        </td>
                        <td class="cart_name">
                            <h4><a href="">{{$val['product_name']}}</a></h4>
                            <p>Code: {{$val['product_id']}}</p>
                        </td>
                        <td class="cart_price">
                            <h4><a href=""></a></h4>
                            <p>{{number_format($val['product_price'])}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <input class="cart_quantity_input" type="number" name="cart_qty[{{$val['session_id']}}]"
                                    value="{{$val['product_qty']}}" size="1" min="1">
                            </div>
                        </td>
                        <td class="cart_total">
                            <h4><a href=""></a></h4>
                            <p class="cart_total_price">{{number_format($subtotal)}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete"
                                href="{{URL::to('/delete-cart-product/'.$val['session_id'])}}"><i
                                    class="fa fa-times"></i></a>
                        </td>
                    </tr>

                    <!--Cart total-->
                    <?php
                        $total_money=$total_money+$subtotal; 
                    ?>

                    @endforeach
                    <tr>
                        <td><input type="submit" name="update_qty" value=" Update"
                                class="check_out btn btn-default btn-sm"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="total_area">
                <ul>
                    <li>Cart Sub Total <span>{{number_format($total_money)}}</span></li>
                    <li>Eco Tax <span>0</span></li>
                    <li>Shipping Cost <span>Free</span></li>
                    <li>Total <span>{{number_format($total_money)}}</span></li>
                </ul>
                <!-- <a class="btn btn-default update" href="">Update</a> -->
                <?php 
                                        $customer_id=Session::get('customer_id');
                                            if($customer_id!=NULL){
                                ?>
                <li><a href="{{URL::to('/checkout')}}" class="btn btn-default update"> Checkout</a>
                    <?php 
                                        }else{
                                ?>
                <li><a href="{{URL::to('/login')}}" class="btn btn-default update">Checkout</a></li>
                <?php
                                            }
                                        ?>
            </div>
        </div>
    </div>
    <?php
    }else{
        ?>
    <h3 style="margin-bottom:200px">Please, buy something before go to the cart!</h3>
    <?php
    }
    ?>
</section>

@endsection