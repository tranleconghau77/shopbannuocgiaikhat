@extends('welcome')
@section('content')

@foreach($product as $pro)

<div class="product-details">
    <!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{url('backend/uploads/product', $pro->product_image)}}" alt="" width="100" height="180" />
            <!-- <h3>ZOOM</h3> -->
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <!-- <div class="carousel-inner">
                <div class="item active">
                    <a href=""><img src="{{url('backend/uploads/product', $pro->product_image)}}" width="80"
                            height="auto" alt=""></a>
                    <a href=""><img src="{{url('backend/uploads/product', $pro->product_image)}}" width="80"
                            height="auto" alt=""></a>
                    <a href=""><img src="{{url('backend/uploads/product', $pro->product_image)}}" width="80"
                            height="auto" alt=""></a>
                </div>
                <div class="item">
                    <a href=""><img src="{{url('backend/uploads/product', $pro->product_image)}}" alt="" width="80"
                            height="auto"></a>
                    <a href=""><img src="{{url('backend/uploads/product', $pro->product_image)}}" alt="" width="80"
                            height="auto"></a>
                    <a href=""><img src="{{url('backend/uploads/product', $pro->product_image)}}" alt="" width="80"
                            height="auto"></a>
                </div>
                <div class="item">
                    <a href=""><img src="{{url('backend/uploads/product', $pro->product_image)}}" alt="" width="80"
                            height="auto"></a>
                    <a href=""><img src="{{url('backend/uploads/product', $pro->product_image)}}" alt="" width="80"
                            height="auto"></a>
                    <a href=""><img src="{{url('backend/uploads/product', $pro->product_image)}}" alt="" width="80"
                            height="auto"></a>
                </div>

            </div> -->

            <!-- Controls -->
            <!-- <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a> -->
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information">
            <!--/product-information-->
            <h2>{{$pro->product_name}}</h2>
            <p>Code:{{$pro->product_id}}</p>
            <form method="POST" action="{{URL::to('/save-cart')}}">
                {{csrf_field()}}
                <span>
                    <h2>{{number_format($pro->product_price)}}<span style="font-size:16px; float:none">đ</span></h2>
                    <label>Quantity:</label>
                    <input type="number" name="cart_product_qty" min="1" value="1" />
                    <input type="hidden" class="" value="{{$pro->product_id}}" name="cart_product_id">
                    <input type="hidden" class="" value="{{$pro->product_name}}" name="cart_product_name">
                    <input type="hidden" class="" value="{{$pro->product_image}}" name="cart_product_image">
                    <input type="hidden" class="" value="{{$pro->product_price}}" name="cart_product_price">
                    <button type="submit" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Add to cart
                    </button>
                </span>
            </form>
            <p><b>Availability:</b> In Stock</p>
            <p><b>Condition:</b> New</p>
            <p><b>Brand:</b> {{$pro->brand_name}}</p>
            <p><b>Category:</b> {{$pro->category_name}}</p>
            <b>Rating: </b> <img src="{{asset('frontend/resource/images/product-details/rating.png')}}" alt=""
                width="50" height="auto" />
            <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
        </div>
        <!--/product-information-->
    </div>
</div>
<!--/product-details-->

<div class="category-tab shop-details-tab">
    <!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#details" data-toggle="tab">Description</a></li>
            <li><a href="#companyprofile" data-toggle="tab">Details</a></li>
            <li><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="details">
            <p style="margin:20px">{!!$pro->product_desc!!}</p>
        </div>

        <div class="tab-pane fade" id="companyprofile">
            <p style="margin:20px">{!!$pro->product_content!!}</p>
        </div>

        <div class="tab-pane fade " id="reviews">
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur.</p>
                <p><b>Write Your Review</b></p>

                <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name" />
                        <input type="email" placeholder="Email Address" />
                    </span>
                    <textarea name=""></textarea>
                    <b>Rating: </b> <img src="{{asset('frontend/resource/images/product-details/rating.png')}}" alt=""
                        width="50" height="auto" />
                    <button type="button" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
<!--/category-tab-->
@endforeach
@endsection