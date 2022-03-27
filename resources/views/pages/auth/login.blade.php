@extends('welcome')
@section('content')
<section id="form" style="margin-top:0px">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <!--login form-->
                    <h2>Login to your account</h2>
                    <?php
                $message=Session::get('message');
                if($message){
                    echo "<p style='color:red;text-align:left;'>$message</p>";
                    Session::put('message',null);
                }
                ?>
                    <form action="{{URL::to('/save-login')}}" method="post">
                        @csrf
                        <input type="email" name="email_account" placeholder="Email" />
                        <input type="password" name="password_account" placeholder="Password" />
                        <div>
                            <span>
                                <input type="checkbox" class="checkbox">
                                Keep me signed in
                            </span>
                            <a href="{{URL::to('/register')}}" style="margin-left:25px">Do you have account yet?</a>
                        </div>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div>
                <!--/login form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->
@endsection