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
                        <input type="hidden" class="" value="" name="">
                        <a href="{{URL::to('/product-details/'.$all_pro->product_id)}}">
                            <img src="{{url('backend/uploads/product', $all_pro->product_image)}}" alt="" width="100"
                                height="180" />
                            <h2>{{$all_pro->product_price}}<span style="font-size:16px">đ</span></h2>
                            <p>{{$all_pro->product_name}}</p>
                        </a>
                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                            to cart</button>
                    </form>

                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                </ul>
            </div>
        </div>
    </div>

    @endforeach


</div>
<!--features_items-->
@endsection