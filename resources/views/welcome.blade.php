<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{secure_asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{secure_asset('frontend/css/word_animation.css')}}" rel="stylesheet" />
    <link href="{{secure_asset('frontend/css/card_animation.css')}}" rel="stylesheet" />
    <link href="{{secure_asset('frontend/css/fontawesome.min.css')}}" rel="stylesheet" />
    <link href="{{secure_asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet" />
    <link href="{{secure_asset('frontend/css/price-range.css')}}" rel="stylesheet" />
    <link href="{{secure_asset('frontend/css/animate.css')}}" rel="stylesheet" />
    <link href="{{secure_asset('frontend/css/main.css')}}" rel="stylesheet" />
    <link href="{{secure_asset('frontend/css/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{secure_asset('frontend/css/responsive.css')}}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.js"
        integrity="sha512-HNbo1d4BaJjXh+/e6q4enTyezg5wiXvY3p/9Vzb20NIvkJghZxhzaXeffbdJuuZSxFhJP87ORPadwmU9aN3wSA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>



</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
        <div class="header_top" style="background:#22b4b7">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fas fa-phone"></i> +84336333375</a></li>
                                <li><a href="#"><i class="fas fa-envelope"></i> hautlc19@uef.edu.vn</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="#"><img src="frontend/resource/images/home/logo.png" alt="" with="60"
                                    height="60" /></a>
                        </div>

                        <!--Get customer location not yet-->
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa"
                                    data-toggle="dropdown">
                                    HO CHI MINH
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">DONG HA</a></li>
                                    <li><a href="#">HA NOI</a></li>
                                </ul>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa"
                                    data-toggle="dropdown">
                                    VND
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">EURO</a></li>
                                    <li><a href="#">DOLLAR</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <!-- <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li> -->
                                <?php 
                                        $customer_id=Session::get('customer_id');
                                            if($customer_id!=NULL){
                                ?>
                                <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a>
                                    <?php 
                                        }else{
                                ?>
                                <li><a href="{{URL::to('/login-checkout')}}"><i
                                            class="fa fa-crosshairs"></i>Checkout</a></li>
                                <?php
                                            }
                                        ?>
                                </li>
                                <li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a>
                                </li>
                                <li><a href="{{URL::to('/history')}}"><i class="fas fa-history"></i>History</a>
                                </li>
                                <?php 
                                        $customer_id=Session::get('customer_id');
                                            if($customer_id!=NULL){
                                        ?>

                                <li><a href="{{URL::to('/logout')}}"><i class="fa fa-lock"></i>Log out</a></li>
                                <?php 
                                            }else{
                                                ?>
                                <li><a href="{{URL::to('/login')}}"><i class="fa fa-lock"></i>Log in</a></li>
                                <?php
                                            }
                                        ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="/home" class="active">Home</a></li>
                                <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{URL::to('/home')}}">Products</a></li>
                                        <?php
                                   $customer_id = Session::get('customer_id');
                                   $shipping_id = Session::get('shipping_id');
                                   if($customer_id!=NULL && $shipping_id==NULL){ 
                                 ?>
                                        <li><a href="{{URL::to('/checkout')}}">
                                                Payment</a></li>

                                        <?php
                                 }elseif($customer_id!=NULL && $shipping_id!=NULL){
                                 ?>
                                        <li><a href="{{URL::to('/payment')}}">
                                                Payment</a></li>
                                        <?php 
                                }else{
                                ?>
                                        <li><a href="{{URL::to('/login')}}"> Payment</a>
                                        </li>
                                        <?php
                                 }
                                ?>

                                        <li><a href="{{URL::to('/show-cart')}}">Cart</a></li>
                                        <?php 
                                        $customer_id=Session::get('customer_id');
                                            if($customer_id!=NULL){
                                        ?>
                                        <li><a href="{{URL::to('/logout')}}">Log out</a></li>
                                        <?php 
                                            }else{
                                                ?>
                                        <li><a href="{{URL::to('/login')}}">Log in</a></li>
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                </li>
                                <!-- <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li>
                                <li><a href="404.html">404</a></li>
                                <li><a href="contact-us.html">Contact</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <form action="{{URL::to('/search-product')}}" method="post">
                            <div class="search_box pull-right">
                                {{csrf_field()}}
                                <input type="text" name="keywords" class="search-keywords" placeholder="Search" />
                                <input type="submit" class="btn btn-primary btn-sm button-search-keywords"
                                    value="Search" style="margin-top:0">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->

    <section id="slider">
        <!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1 class="slider-title">E-DRINK</h1>
                                    <h2>Time makes heros</h2>
                                    <p>The best website for BEER, WHISKY, WATER, BEVERAGE. </p>
                                    <a href="#"><button type="button" class="btn btn-default get">Get
                                            it
                                            now</button></a>
                                </div>
                                <div class="col-sm-6" style="height:200px !important;">
                                    <img src="{{asset('frontend/resource/images/home/sting-slider.jpg')}}"
                                        class="girl img-responsive" alt="" width="450" height="450" />

                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1 class="slider-title">E-DRINK</h1>
                                    <h2>Time makes heros</h2>
                                    <p>The best website for BEER, WHISKY, WATER, BEVERAGE. </p>
                                    <a href="#"><button type="button" class="btn btn-default get">Get
                                            it
                                            now</button></a>
                                </div>
                                <div class="col-sm-6" style="height:200px !important;">
                                    <img src="{{asset('frontend/resource/images/home/bia333-slider.jpg')}}"
                                        class="girl img-responsive" alt="" width="450" height="450" />
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-sm-6">
                                    <h1 class="slider-title">E-DRINK</h1>
                                    <h2>Time makes heros</h2>
                                    <p>The best website for BEER, WHISKY, WATER, BEVERAGE. </p>
                                    <a href="#"><button type="button" class="btn btn-default get">Get
                                            it
                                            now</button></a>
                                </div>
                                <div class="col-sm-6" style="height:200px !important;">
                                    <img src="{{asset('frontend/resource/images/home/aquafina-slider.jpeg')}}"
                                        class="girl img-responsive" alt="" />
                                </div>
                            </div>

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <?php
                            $current_page=Session::get('current_page');
                            if($current_page!="login"){
                        ?>
                        <h2>Categories</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
                            @foreach($all_category as $key=>$all_cate)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a
                                            href="{{URL::to('/category-product-home/'.$all_cate->category_id)}}">{{$all_cate->category_name}}</a>
                                    </h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--/category-products-->

                        <div class="brands_products">
                            <!--brands_products-->
                            <h2>Brands</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach($all_brand as $key=>$all_bra)
                                    <li><a href="{{URL::to('/brand-product-home/'.$all_bra->brand_id)}}">
                                            {{$all_bra->brand_name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!--/brands_products-->


                        <?php
                    }
                ?>
                    </div>
                </div>
                <div class="col-sm-9">
                    @yield('content')

                    <div class="recommended_items">
                        <!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>

                        <div class="owl-carousel owl-theme">
                            @foreach($all_product as $key => $all_pro)

                            <div class="item" style="padding:0px 15px">

                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <form action="{{URL::to('/product-details/'.$all_pro->product_id)}}">
                                                {{csrf_field()}}
                                                <div class="img">
                                                    <a href="{{URL::to('/product-details/'.$all_pro->product_id)}}">
                                                        <img src="{{url('backend/uploads/product', $all_pro->product_image)}}"
                                                            alt="" width="50" height="auto" />
                                                </div>
                                                <h4 style="color:orange">
                                                    {{number_format($all_pro->product_price)}}<span
                                                        style="font-size:16px; color:orange">đ</span>
                                                </h4>
                                                <p>{{$all_pro->product_name}}</p>
                                                </a>
                                                <button type="submit" class="btn btn-default check-out"><i
                                                        class="fas fa-info"></i>View Details</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                    <!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>



    <footer id="footer">
        <!--Footer-->
        <div class="footer-top">
            <!-- <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>e</span>-shopper</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="images/home/iframe1.png" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="images/home/iframe2.png" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="images/home/iframe3.png" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="images/home/iframe4.png" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="images/home/map.png" alt="" />
                            <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>

        <div class="footer-widget" style="margin:20px">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Online Help</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Order Status</a></li>
                                <li><a href="#">Change Location</a></li>
                                <li><a href="#">FAQ’s</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Quock Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">T-Shirt</a></li>
                                <li><a href="#">Mens</a></li>
                                <li><a href="#">Womens</a></li>
                                <li><a href="#">Gift Cards</a></li>
                                <li><a href="#">Shoes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privecy Policy</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">Billing System</a></li>
                                <li><a href="#">Ticket System</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Company Information</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Affillate Program</a></li>
                                <li><a href="#">Copyright</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i
                                        class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </footer>
    <!--/Footer-->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/recommand_product_slider.js')}}"></script>
    <script src="{{asset('frontend/js/option_payment.js')}}"></script>
    <script src="{{asset('frontend/js/advertising.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script>
    $(document).ready(function() {
        let count = 0;
        let temp_id = [];
        $('.add-to-cart').click(function() {
            var id = $(this).data('id_product');
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var _token = $('input[name="_token"]').val();

            const found = temp_id.findIndex(element => element == id);
            console.log(found);
            if (found !== -1) {
                swal("This product is already in your cart");
                console.log(temp_id);

            } else {
                $.ajax({
                    url: "{{URL('/add-cart-ajax')}}",
                    method: "post",

                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token,
                    },
                    success: function(data) {
                        swal({
                            title: "Added product successfully",
                            text: "Do you go the cart?",
                            icon: "success",
                            buttons: true,
                            dangerMode: true,
                        }).then((willDelete) => {
                            if (willDelete) {
                                window.location.href = '/show-cart';
                            } else {
                                return;
                            }
                        });;

                    }
                });
                temp_id.push(id);
                console.log(temp_id);

            }

        });
    });

    $('.button-search-keywords').click(function(e) {
        var keywords = $('.search-keywords').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{URL('/post-search-manager')}}",
            method: "post",
            data: {
                keywords: keywords,
                _token: _token,
            },
            success: function(data) {
                window.location.href = '/search-product';
            }
        });
    });
    </script>

</body>

</html>