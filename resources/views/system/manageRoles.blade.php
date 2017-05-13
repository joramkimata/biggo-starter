@extends('layout')

@section('title', 'Manage Roles')

@section('main')
	
	<div class="modal fade" id="modal-idx">
	  <div class="modal-dialog modal-lg">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title"><i class="fa fa-key"></i>  Permissions</h4>
		  </div>
		  <div class="modal-body" style="">
			<center>
			  <img class="loaderPerms" style="display:none" src="{{url('BACKEND/images/loader.gif')}}" />
			</center>
			<div id="perms_area"></div>
		  </div>
		</div>
	  </div>
	</div>

	<div class="row">

		<div class="col-sm-12">
			<div class="">
				<div class="row">
					<div class="col-md-3 card-box">
						<h4 class="m-t-0 header-title "><b><i class="fa fa-plus"></i> Add New Role</b></h4>
						<hr/>
						
						<form role="form" id="registerForm_Role">

							{!!csrf_field()!!}

							<div class="form-group">
								<label for="roleName">Role Name: </label>
								<input type="text" required class="form-control validate[required]" data-errormessage-value-missing="Role name is required!" value="" data-prompt-position="bottomRight" id="roleName" name="roleName" placeholder="Enter Role Name">
							</div>
							
							
							
							
							
							<div class="form-group">
								<label for="status">Status: </label>
								<select class="form-control validate[required]" data-errormessage-value-missing="Status is required!" id="status" name="status" data-prompt-position="bottomRight">
									<option value="">--Select Status Here--</option>
									<option value="1">Activated</option>
									<option value="0">Blocked</option>
								</select>
							</div>
							
							<hr/>
							
							@include('partials._buttonSave', ['btnId'=>'saveRole', 'title'=>'Add New Role'])
							
							
							


						</form>
					</div>
					<div class="col-md-6 card-box">
					
						<?php 
						
							$data = \App\Role::orderBy('created_at', 'DESC')->get();
							
							
							$dxX = [];
							
							foreach($data as $d){
								$dx = [];
								$dx['id']        = $d->id;
								$dx['role_name'] = $d->role_name;
								$dx['perms']     = '<a data-toggle="modal" class="role_permissions" roleId="' .$d->id .'" href="#modal-idx">Permissions</a>';
								$dx['status']    = $d->status;
								
								
								$dxX[] = (object)$dx;
							} 
						
						?>
					
						@include('partials._success')
						@include('partials._datatables', ["columns"=>["Role Name", "Permissions", "Status", "Actions"], "mapEls"=>["role_name", "perms", "status"], "data"=>$dxX, "modal"=>"normal", "url_edit"=>"roles/edit", "url_delete" =>"roles/delete", "refreshWix"=>"roles.refreshWith", "isTaggedHtml"=>true])

					</div>
					
				</div>
			</div>
		</div>

	</div>


@stop


@section('custom-scripts')

<script>
$(function(){
	$('body').on('click', '.role_permissions', function(){
		var roleId = $(this).attr('roleId');
		$('.loaderPerms').show();
		$('#perms_area').html('');
		$.get('{{route('roles.permissions')}}', {roleId:roleId}, function(res){
			$('.loaderPerms').hide();
			$('#perms_area').html(res);
		});
	});	
	
	// $('body').on('click', '.main', function(){
	// 	var permName    = $(this).attr('permName');
	// 	var checkedPer  = $(this).prop('checked'); 
	// 	$('.child_' + permName).each(function(i,k){
	// 		if(checkedPer == true){
	// 			$(this).prop('checked', true);
	// 		}else{
	// 			$(this).prop('checked', false);
	// 		}
				
	// 	});
	// });
	
	// $('body').on('click', '.child', function(){
	// 	var permName    = $(this).attr('permName');
	// 	var checkedCh  = $(this).prop('checked'); 
	// 	if(checkedCh == false){
	// 		$('#' + permName).prop('checked', false);
	// 	}else{
	// 		$('.child_' + permName).each(function(i,k){
				
	// 			var cChild = $(this).prop('checked');
				
	// 			if(cChild == true){
	// 				$('#' + permName).prop('checked', true);
	// 			}else{
	// 				$('#' + permName).prop('checked', false);
	// 			}
				
					
	// 		});
	// 	}
	// });
	
	$('body').on('click', '#saveRolePerms', function(){
		var formdata = $('#rolePerms').serializeArray();
		formdata.push({
			name: '_token',
			value: '{{csrf_token()}}'
		});
		Biggo.applyOpacity('#rolePerms');
		Biggo.disableEl('#saveRolePerms');
		$('#loaderPerms').show();
		$.post('{{route('roles.permissions.store')}}', formdata, function(res){
			Biggo.showFeedBack('#rolePerms', 'Updated successfully!', false);
			Biggo.removeOpacity('#rolePerms');
			Biggo.enableEl('#saveRolePerms');
			$('#loaderPerms').hide();

		});
	});
	
});
</script>

@include('partials._saveFunc', ['btnID'=>'saveRole', 'formID'=>'registerForm_Role', 'route'=>'roles.store', 'routeWith'=>'roles.refreshWith'])

@stop