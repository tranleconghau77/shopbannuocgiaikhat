@extends('welcome')
@section('content')
<section id="form" style="margin-top:0px">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>New User Signup!</h2>
                    <?php
                        $message=Session::get('message');
                        if($message){
                            echo "<p style='color:red;text-align:left;'>$message</p>";
                            Session::put('message',null);
                        }
                    ?>
                    <form action="{{URL::to('/save-customer')}}" method="POST">
                        {{csrf_field()}}
                        <input type="text" placeholder="User name" name="customer_name" />
                        <input type="email" placeholder="Email" name="customer_email" />
                        <input type="password" placeholder="Password" name="customer_password" />
                        <input type="number" placeholder="Phone" name="customer_phone" />
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->
@endsection