<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>

<head>
    <title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Login :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>

    <!-- bootstrap-css -->
    <link href="public/backend/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="public/backend/css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('backend/css/font.css')}}" type="text/css" />

    <!-- font-awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- //Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body>
    <div class="log-w3">
        <div class="w3layouts-main">
            <h2>Sign In Now</h2>
            <?php
                $message=Session::get('message');
                if($message){
                    echo "<p style='color:black;text-align:left;'>$message</p>";
                    Session::put('message',null);
                }
            ?>
            <form action="{{URL::to('/admin-dashboard')}}" method="post">
            @csrf
                <input type="text" class="ggg" name="admin_email" placeholder="User name" required="">
                <input type="password" class="ggg" name="admin_password" placeholder="Password" required="">
                
                <div class="clearfix"></div>
                <input type="submit" value="Sign In" name="login">
            </form>
            <!-- <p>Don't Have an Account ?<a href="{{URL::to('/register-admin')}}">Create an account</a></p> -->
        </div>
    </div>

    <script src="public/backend/js/bootstrap.js"></script>
    <script src="public/backend/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="public/backend/js/scripts.js"></script>
    <script src="public/backend/js/jquery.slimscroll.js"></script>
    <script src="public/backend/js/jquery.nicescroll.js"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="public/backend/js/jquery.scrollTo.js"></script>
</body>

</html>