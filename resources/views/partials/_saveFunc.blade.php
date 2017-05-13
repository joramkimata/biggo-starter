@if(isset($update)==true)
<!-- jQuery -->
    <script src="{{url('BACKEND/vendors/jquery/dist/jquery.min.js')}}"></script>
@endif
      <script src="{{url('BACKEND/ve/js/languages/jquery.validationEngine-en.js')}}" type="text/javascript" charset="utf-8"></script>
  <script src="{{url('BACKEND/ve/js/jquery.validationEngine.js')}}" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="{{url('BACKEND/iztools/biggo.js')}}"></script>
	
	
	<script type="text/javascript">
function checkPassMatch(field, rules, i, options){
    var a=rules[i+2];
     if((field.val()) != ( $("#"+a).val() ) ){
       return "Password Mismatches"
     }
}
</script>
	

<script type="text/javascript">
$(function(){
  $('body').on('click', '#{{$btnID}}', function(){


      
    var validated = $('#{{$formID}}').validationEngine('validate');
    if(validated){
          var isFileUpload = false;
          var data;
          @if(isset($photo))
          
          if(Biggo.isFileValueSetted({{$photo}}) != undefined){
              var arr  = Biggo.serializeData({{$formID}});
              var arr2 = ["{{$photo}}"];
              isFileUpload = true;
              data = Biggo.prepareFormData(arr, arr2);
          }else{
              data = Biggo.serializeData({{$formID}});
          }
          
          @else
            data = Biggo.serializeData({{$formID}});
          @endif

          @if(Config::get('app.debug'))
            console.log(data);
          @endif  

          Biggo.applyOpacity({{$formID}});
          Biggo.enableEl({{$btnID}});

          @if(isset($rowId))
            var url = '{{route($route, $rowId)}}';
            
          @else
            var url = '{{route($route)}}';
          @endif

         

          var biggo = Biggo.talkToServer(url, data, isFileUpload).then(function(res){

            @if(isset($debug))
                Biggo.removeOpacity({{$formID}});
                Biggo.enableEl({{$btnID}});
				var error = JSON.stringify(res.msg);
				if(error == undefined){
					 Biggo.errorBox({{$formID}}, res);
				}else{
					 Biggo.errorBox({{$formID}}, error);
				}
               
                return;
            @endif

            Biggo.removeOpacity({{$formID}});
            Biggo.enableEl({{$btnID}});
            if(res.error){
                Biggo.showFeedBack({{$formID}}, res.msg, res.error);
            }else{

                     window.location = '{{route($routeWith)}}';

            }
        });

          @if(Config::get('app.debug'))
            biggo.fail(function(err){
                Biggo.removeOpacity({{$formID}});
                Biggo.enableEl({{$btnID}});
                var error = JSON.stringify(err);
                Biggo.errorBox({{$formID}}, error);
            });
          @endif

    }

  });
});
</script>