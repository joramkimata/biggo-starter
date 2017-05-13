<!DOCTYPE html>
<html>
    
<!-- Mirrored from coderthemes.com/minton_1.6/blue_hori/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jun 2016 12:39:07 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>Register Administrator</title>

        <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('assets/css/core.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('assets/css/components.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('assets/css/pages.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('assets/css/menu.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('assets/css/responsive.css')}}" rel="stylesheet" type="text/css">

        <script src="{{url('assets/js/modernizr.min.js')}}"></script>

        <link rel="stylesheet" type="text/css" href="{{url('BACKEND/ve/css/validationEngine.jquery.css')}}">
        

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

            <form class="form-horizontal m-t-20" id="register_form" action="{{route('app.doRegister')}}" method="POST">

                @include('partials._success')
                @include('partials._error')

                {!! csrf_field() !!}
                
                <div class="form-group">
                    <div class="col-xs-12">
                        <input  type="text" required="" name="fullname"
                        placeholder="Your Name" class="form-control validate[required]"  data-errormessage-value-missing="Your Name is required!"
                        >
                        <i class="md md-account-circle form-control-feedback l-h-34"></i>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control validate[required, custom[email]]"  data-errormessage-value-missing="Email is required!" type="email" required="" name="email" placeholder="Email">
                        <i class="md md-email form-control-feedback l-h-34"></i>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control validate[required]"  data-errormessage-value-missing="Username is required!" type="text" required="" name="username" placeholder="Username">
                        <i class="md md-account-circle form-control-feedback l-h-34"></i>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control validate[required]"  data-errormessage-value-missing="Password is required!" type="password" name="password" required="" placeholder="Password">
                        <i class="md md-vpn-key form-control-feedback l-h-34"></i>
                    </div>
                </div>

                

                <div class="form-group text-right m-t-20">
                    <div class="col-xs-12">
                        <button id="register" style="background-color: #0c6d40; color: white" class="btn btn-block btn-custom waves-effect waves-light w-md" type="button">Register</button>
                    </div>
                    @include('partials._saveFunc', ["btnID" => "register", "formID"=>"register_form", "route"=>"app.doRegister", "routeWith"=>"app.refresh"])
                </div>

                <div class="form-group m-t-30">
                    <div class="col-sm-12 text-center">
                        <a href="{{url('/')}}" class="text-muted">Already have account?</a>
                    </div>
                </div>
            </form>

        </div>

        
    	<script>
            var resizefunc = [];
        </script>

        <!-- Main  -->
        
	
	</body>

<!-- Mirrored from coderthemes.com/minton_1.6/blue_hori/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jun 2016 12:39:07 GMT -->
</html>