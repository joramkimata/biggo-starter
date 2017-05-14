<!DOCTYPE html>
<html>
    
<!-- Mirrored from coderthemes.com/minton_1.6/blue_hori/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jun 2016 12:39:07 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">


        <title>Init System</title>

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

            <div class="text-center" id="initFeedBack" style="display: none">
                <h3 ><img src="{{url('img/loader.gif')}}" /> Initiatizing System ....</h3>
                <hr/>
            </div>

                                    <form role="form" id="registerForm_AppInit">

                                        {!! csrf_field() !!}

                                       
                                        
                                        <button type="button" id="systemInt" class="btn btn-block btn-primary waves-effect waves-light"><i class="fa fa-download"></i> INSTALL NOW</button>

                                        <hr/>
                                        <center>
                                             &copy; {{date('Y')}}, Izweb Technologies LTD
                                        </center>
                                    </form>

        </div>

        
    	<script>
            var resizefunc = [];
        </script>

        <!-- Main  -->

        <script src="{{url('assets/js/jquery.min.js')}}"></script>
        <script src="{{url('BACKEND/bf/src/bootstrap-filestyle.js')}}"></script>
        <script src="{{url('BACKEND/ve/js/languages/jquery.validationEngine-en.js')}}" type="text/javascript" charset="utf-8"></script>
         <script src="{{url('BACKEND/ve/js/jquery.validationEngine.js')}}" type="text/javascript" charset="utf-8"></script>
         <script type="text/javascript" src="{{url('BACKEND/iztools/biggo.js')}}"></script>


        <script type="text/javascript">
            $(function(){
                $('#systemInt').on('click', function(){
                    Biggo.disableEl(this);
                    $('#initFeedBack').show();
                    $.get('{{route('app.systemInt')}}', function(res){

                    });
                    $.ajax({
                       url: '{{route('app.systemInt')}}',
                       error: function(error) {
                            Biggo.enableEl('#systemInt');
                         //console.log(error)
                          //Biggo.showFeedBack('#initFeedBack', error.msg, error.error);
                       },
                       success: function(data) {

                            Biggo.enableEl('#systemInt');

                            if(data == 1){
                                $('#initFeedBack').hide();
                                Biggo.showFeedBack('#initFeedBack', 'Make Sure, DB connection is working,<br/><br/><i>Tip: check your .env file</i>');
                                setTimeout(function() {
                                    Biggo.enableEl('#systemInt');
                                }, 1000);
                            }else if(data == 2){
                                $('#initFeedBack').hide();
                                Biggo.showFeedBack('#initFeedBack', 'Make Sure, DB connection is working,<br/><br/><i>Tip: check your .env file</i>');
                            }else{
                                $('#initFeedBack').hide();
                                Biggo.showFeedBack('#initFeedBack', 'Successfully initialised!', false);
                                setTimeout(function() {
                                    window.location = "";
                                }, 2000);

                            }
                            
                          
                       },
                       type: 'GET'
                    });
                });
            })
        </script>
        
	
	</body>

<!-- Mirrored from coderthemes.com/minton_1.6/blue_hori/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jun 2016 12:39:07 GMT -->
</html>