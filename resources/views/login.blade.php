<!DOCTYPE html>
<html>
    
<!-- Mirrored from coderthemes.com/minton_1.6/blue_hori/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jun 2016 12:39:07 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="">

        <title>Login</title>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css">

        <script src="assets/js/modernizr.min.js"></script>

       
       

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        
    </head>
    <body>


        <div class="wrapper-page">

            @include('partials._logo')

            <form class="form-horizontal m-t-20" action="{{route('app.doLogin')}}" method="POST">

                @include('partials._error')
                @include('partials._success')

                {!! csrf_field() !!}

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="username" type="text" required="" placeholder="Username">
                        <i class="md md-account-circle form-control-feedback l-h-34"></i>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="password" type="password" required="" placeholder="Password">
                        <i class="md md-vpn-key form-control-feedback l-h-34"></i>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        
                        <hr/>

                    </div>
                </div>

                <div class="form-group text-right m-t-20">
                    <div class="col-xs-12">
                        <button style="background-color: #0c6d40; color: white" class="btn btn-block btn-custom w-md waves-effect waves-light" type="submit">Log In
                        </button>
                    </div>
                </div>

                @if(App\HelperX::noAdminYet())

                <center>
                    <a href="{{route('app.registerAdmin')}}"> Register Admin</a>
                </center>

                @endif
                
            </form>
        </div>

        
    	<script>
            var resizefunc = [];
        </script>

        <!-- Main  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- Custom main Js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
	
	</body>

<!-- Mirrored from coderthemes.com/minton_1.6/blue_hori/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jun 2016 12:39:07 GMT -->
</html>