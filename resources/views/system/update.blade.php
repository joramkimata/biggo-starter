@extends('layout')

@section('title', 'Configure System')

@section('main')

    
                <div class="row">

<div class="col-sm-12">
                        <div class="">
                            <div class="row">
                                <div class="col-md-4 card-box">
                                    <h4 class="m-t-0 header-title "><b><i class="fa fa-edit"></i> Update System Information</b></h4>
                                    <hr/>
                                    @include('partials._success')
                                    <form role="form" id="registerForm_App">

                                        {!!csrf_field()!!}

                                        <div class="form-group">
                                            <label for="appName">Application Name: </label>
                                            <input type="text" required class="form-control validate[required]" data-errormessage-value-missing="Application name is required!" value="{{lapp()->app_name}}" data-prompt-position="bottomRight" id="appName" name="appName" placeholder="Enter Application Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="appPowerBy">Powered By Title: </label>
                                            <input type="text" required class="form-control validate[required]" data-errormessage-value-missing="Powered By Title is required!"  value="{{lapp()->powerby}}" data-prompt-position="bottomRight" id="appPowerBy" name="appPowerBy" placeholder="Enter Powered By Title">
                                        </div>
                                        <div class="form-group">
                                            <label for="appCopyRight">Copyright Title: </label>
                                            <input type="text" required class="form-control"  value="{{lapp()->foot_title}}"  id="appCopyRight" name="appCopyRight" placeholder="Enter Copyright Title">
                                        </div>
                                        <div class="form-group">
                                            <label for="appLogo">Logo: </label>
                                            <input type="file" id="appLogo" name="appLogo" class="filestyle" data-buttonName="btn-primary">
                                        </div>
                                        <div class="form-group">
                                            <label for="appCopyRight">Text Editor: </label>
                                            <select class="form-control" id="appTextEditor" name="appTextEditor">
                                                @if(lapp()->editor == "advance")
                                                    <option value="advance">Advance Editor</option>
                                                    <option value="basic">Basic Editor</option>
                                                @else
                                                    <option value="basic">Basic Editor</option>
                                                    <option value="advance">Advance Editor</option>
                                                    
                                                @endif
                                            </select>
                                        </div>
                                        <br/><hr/>
                                        
                                        <button type="button" id="systemSave" class="btn btn-purple waves-effect waves-light"><i class="fa fa-save"></i> UPDATE INFORMATION</button>





                                    </form>
                                </div>
                                <div class="col-md-2 card-box">
                                    <div id="logo-placeholder"></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                </div>
           

@stop


@section('custom-scripts')

<script type="text/javascript" src="{{url('BACKEND/iztools/biggo.js')}}"></script>
<script type="text/javascript">
    
    $(function(){
        Biggo.changePhotoDiv('appLogo', 'logo-placeholder', 190, 170, '{{lapp()->logo}}');
    });

</script>


@include('partials._saveFunc', ["btnID" => "systemSave", "formID"=>"registerForm_App", "route"=>"system.store", "routeWith"=>"app.refresh", "photo"=>"appLogo"])

@stop




