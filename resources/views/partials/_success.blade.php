@if(Session::has('success'))
	<div class="alert alert-success flush">
		<i class="fa fa-check"> </i> {{Session::get('success')}}
	</div>
@endif	

<!-- jQuery -->
<script src="{{url('BACKEND/vendors/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript">
	$('.flush').delay(2000).fadeOut();
</script>