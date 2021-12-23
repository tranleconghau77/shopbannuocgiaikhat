@extends('welcome')
@section('content')
<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">Features Items</h2>
    @foreach($product_by_category_id as $key=>$all_pro)
    <a href="{{URL::to('/product-details/'.$all_pro->product_id)}}">
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{url('backend/uploads/product', $all_pro->product_image)}}" alt="" />
                        <h2>{{number_format($all_pro->product_price)}}<span style="font-size:16px">đ</span></h2>
                        <p>{{$all_pro->product_name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                            cart</a>
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
    </a>
    @endforeach
</div>
<!--features_items-->
@endsection