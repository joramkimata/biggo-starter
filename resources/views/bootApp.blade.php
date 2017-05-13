<!DOCTYPE html>
<html>
    
<!-- Mirrored from coderthemes.com/minton_1.6/blue_hori/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jun 2016 12:39:07 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">


        <title>Configure System</title>

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

            <div class="text-center">
                <h3>Configure Our System...</h3>
                <hr/>
            </div>

                                    <form role="form" id="registerForm_App">

                                        {!! csrf_field() !!}

                                        <div class="form-group">
                                            <label for="appName">Application Name: </label>
                                            <input type="text" required class="form-control validate[required]" data-errormessage-value-missing="Application name is required!" value="" data-prompt-position="bottomRight" id="appName" name="appName" placeholder="Enter Application Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="appPowerBy">Powered By Title: </label>
                                            <input type="text" required class="form-control validate[required]" data-errormessage-value-missing="Powered By Title is required!" value="" data-prompt-position="bottomRight" id="appPowerBy" name="appPowerBy" placeholder="Enter Powered By Title">
                                        </div>
                                        <div class="form-group">
                                            <label for="appCopyRight">Copyright Title: </label>
                                            <input type="text" required class="form-control"  value=""  id="appCopyRight" name="appCopyRight" placeholder="Enter Copyright Title">
                                        </div>
                                        <div class="form-group">
                                            <label for="appLogo">Logo: </label>
                                            <input type="file" id="appLogo" name="appLogo" class="filestyle" data-buttonName="btn-primary">
                                        </div>
                                        <div class="form-group">
                                            <label for="appCopyRight">Text Editor: </label>
                                            <select class="form-control" id="appTextEditor" name="appTextEditor">
                                               
                                                    <option value="advance">Advance Editor</option>
                                                    <option value="basic">Basic Editor</option>
                                               
                                            </select>
                                        </div>
                                        <br/><hr/>
                                        
                                        <button type="button" id="systemSave" class="btn btn-block btn-primary waves-effect waves-light"><i class="fa fa-save"></i> SAVE CHANGES</button>
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
                $('#systemSave').on('click', function(){
                var registerForm = $('#registerForm_App').validationEngine('validate');
                if(registerForm){

                    var isFileUpload = false;
                    var data;
                    if(Biggo.isFileValueSetted(appLogo) != undefined){
                        var arr  = Biggo.serializeData(registerForm_App);
                        var arr2 = ["appLogo"];
                        isFileUpload = true;
                        data = Biggo.prepareFormData(arr, arr2);
                    }else{
                        data = Biggo.serializeData(registerForm_App);
                    }

                   Biggo.applyOpacity(registerForm_App);
                   Biggo.disableEl(systemSave);
                   Biggo.talkToServer('{{route("system.store")}}', data, isFileUpload).then(function(res){
                        Biggo.removeOpacity(registerForm_App);
                        Biggo.enableEl(systemSave);
                    
                        if(res.error){
                            Biggo.showFeedBack(registerForm_App, res.msg, res.error);
                        }else{
                            Biggo.resetForm(registerForm_App);
                            //Biggo.showFeedBack(registerForm_App, res.msg, res.error);
                            window.location = "{{route('system.refresh')}}"; 
                        }
                        
                   });
                }
            });
            })
        </script>
        
	
	</body>

<!-- Mirrored from coderthemes.com/minton_1.6/blue_hori/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jun 2016 12:39:07 GMT -->
</html>