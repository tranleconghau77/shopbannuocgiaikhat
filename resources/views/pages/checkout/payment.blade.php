@extends('welcome')
@section('content')
<section id="cart_items">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Payment</li>
        </ol>
    </div>
    <!--/breadcrums-->


    <div class="review-payment">
        <h2>Review & Payment</h2>
    </div>
    <div class="table-responsive cart_info" style="margin-bottom:0">
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
                    <?php 
                    $productId=Session::get('productId');
                    $product_quantity=Session::get('product_quantity');
                    $cart=Session::get('cart');
                    // if($cart==null);
                    // {
                    //     $cart=[];
                    // }
                    $total_money=0;
                    ?>
                    @foreach( $cart as $key =>$val)
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
                                <input class="cart_quantity_input" type="number" readonly
                                    name="cart_qty[{{$val['session_id']}}]" value="{{$val['product_qty']}}" size="1"
                                    min="1">
                            </div>
                        </td>
                        <td class="cart_total">
                            <h4><a href=""></a></h4>
                            <p class="cart_total_price">{{number_format($subtotal)}}</p>
                        </td>

                    </tr>

                    <!--Cart total-->
                    <?php
                        $total_money=$total_money+$subtotal; 
                    ?>

                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <h4><a href=""></a></h4>
                            <h4>Total money:</h4>
                        </td>
                        <td>
                            <h3>{{number_format($total_money)}}đ</h3>
                            <?php
                                Session::put('total_money',$total_money);
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div>
        <h4>Choose option payment:</h4>
    </div>
    <div>
        <form action="{{URL::to('/order-place')}}" method="POST">
            {{csrf_field()}}
            <div class="payment-options" style="margin-top:0">
                <span>
                    <label><input type="checkbox" name="payment_option" value="1"> ATM</label>
                </span>
                <span>
                    <label><input type="checkbox" name="payment_option" value="2"> Cash</label>
                </span>
                <span>
                    <label><input type="checkbox" name="payment_option" value="3"> Paypal</label>
                </span>
                <input type="submit" name="send_order" style="margin:0" value="ORDER"
                    class="check_out btn btn-default btn-sm">

            </div>
        </form>
    </div>

</section>
<!--/#cart_items-->
@endsection