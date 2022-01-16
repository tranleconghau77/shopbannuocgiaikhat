@extends('welcome')
@section('content')
<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">Features Items</h2>

    @foreach($all_product as $key=>$all_pro)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <form>
                        {{csrf_field()}}
                        <input type="hidden" class="cart_product_id_{{$all_pro->product_id}}"
                            value="{{$all_pro->product_id}}" name="">
                        <input type="hidden" class="cart_product_name_{{$all_pro->product_id}}"
                            value="{{$all_pro->product_name}}" name="">
                        <input type="hidden" class="cart_product_image_{{$all_pro->product_id}}"
                            value="{{$all_pro->product_image}}" name="">
                        <input type="hidden" class="cart_product_price_{{$all_pro->product_id}}"
                            value="{{$all_pro->product_price}}" name="">
                        <input type="hidden" class="cart_product_qty_{{$all_pro->product_id}}" value="1" name="">
                        <a href="{{URL::to('/product-details/'.$all_pro->product_id)}}">
                            <div class="img">
                                <img src="{{url('backend/uploads/product', $all_pro->product_image)}}" alt="" width="50"
                                    height="auto" />
                            </div>
                            <h2>{{number_format($all_pro->product_price)}}<span style="font-size:16px">đ</span></h2>
                            <p>{{$all_pro->product_name}}</p>
                        </a>
                        <button type="button" data-id_product="{{$all_pro->product_id}}" name="add-to-cart"
                            class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                            to cart</button>
                    </form>

                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <!-- <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li> -->
                </ul>
            </div>
        </div>
    </div>

    @endforeach


</div>
<!--features_items-->
@endsection