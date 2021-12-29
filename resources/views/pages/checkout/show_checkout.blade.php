@extends('welcome')
@section('content')
<section id="cart_items">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Check out</li>
        </ol>
    </div>
    <!--/breadcrums-->


    <div class="register-req">
        <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
    </div>
    <!--/register-req-->

    <div class="shopper-informations">
        <div class="row">
            <div class="col-sm-12">
                <div class="shopper-info">
                    <p>Ship Information</p>
                    <form action="{{URL::to('/save-shipping-information')}}" method="post">
                        {{csrf_field()}}
                        <input type="text" placeholder="Send to" name="shipping_name" />
                        <input type="text" placeholder="Email" name="shipping_email" />
                        <input type="text" placeholder="Address" name="shipping_address" />
                        <input type="text" placeholder="Phone" name="shipping_phone" />
                        <input type="hidden" placeholder="" name="shipping_method" value="0" />

                        <div class="order-message">
                            <textarea name="shipping_notes"
                                placeholder="Notes about your order, Special Notes for Delivery"></textarea>
                            <input type="submit" name="send_order" value="Send" class="btn-sm btn btn-primary">

                    </form>
                </div>
            </div>
        </div>
    </div>


</section>
<!--/#cart_items-->
@endsection