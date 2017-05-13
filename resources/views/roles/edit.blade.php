
<?php 

$rowId =  $role->id;

?>

<form role="form" id="registerForm_Role_Edit">

	{!!csrf_field()!!}

	<div class="form-group">
		<label for="roleName">Role Name: </label>
		<input type="text" required class="form-control validate[required]" data-errormessage-value-missing="Role name is required!" value="{{$role->role_name}}" data-prompt-position="bottomRight" id="roleName" name="roleName" placeholder="Enter Role Name">
	</div>
	
	
	
	
	
	<div class="form-group">
		<label for="status">Status: {!!getStatus($role->status)!!}</label>
		<select class="form-control validate[required]" data-errormessage-value-missing="Status is required!" id="status" name="status" data-prompt-position="bottomRight">
			@if($role->status == 1)
			<option value="1">Activated</option>
			<option value="0">Blocked</option>
			@else
			<option value="0">Blocked</option>
			<option value="1">Activated</option>		
			@endif
		</select>
	</div>
	
	<hr/>
	
	@include('partials._buttonSave', ['btnId'=>'saveRoleEdit', 'title'=>'Update Role'])
	
	
	


</form>

<!-- jQuery -->
<script src="{{url('BACKEND/vendors/jquery/dist/jquery.min.js')}}"></script>

@include('partials._saveFunc', ["btnID" => "saveRoleEdit", "formID"=>"registerForm_Role_Edit", "route"=>"roles.update", "routeWith"=>"app.updated", "rowId"=>$rowId, "update"=>true])

