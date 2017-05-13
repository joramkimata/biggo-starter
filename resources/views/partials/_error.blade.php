@if(Session::has('error'))
	<div class="alert alert-danger flush">
		{{Session::get('error')}}
	</div>
@endif	

<!-- jQuery -->
<script src="{{url('BACKEND/vendors/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript">
	$('.flush').delay(4000).fadeOut();
</script>