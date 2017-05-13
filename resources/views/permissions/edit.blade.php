
<?php 

$rowId =  $permission->id;

?>

<form role="form" id="registerForm_Perm_Edit">

	{!!csrf_field()!!}

	<div class="form-group">
		<label for="permissionName">Permission Name: </label>
		<input type="text" required class="form-control validate[required]" data-errormessage-value-missing="Permission name is required!" value="{{$permission->perm_name}}" data-prompt-position="bottomRight" id="permissionName" name="permissionName" placeholder="Enter Permission Name">
	</div>
	
	<div class="form-group">
		<label for="permissionDetail">Permission Description: </label>
		<textarea required class="form-control validate[required]" data-errormessage-value-missing="Permission Description is required!"  data-prompt-position="bottomRight" id="permissionDetail" name="permissionDetail" placeholder="Enter Permission Name">{{$permission->detail}}</textarea>
	</div>
	
	
	<div class="form-group">
		<label for="permissionType">Permission Type: {!! labelIT($permission->isparent, ['Child', 'Parent']) !!}</label>
		<select class="form-control validate[required]" data-errormessage-value-missing="Permission Type is required!" id="permissionTypeEdit" name="permissionTypeEdit" data-prompt-position="bottomRight">
			@if($permission->isparent == 1)
			<option value="1">Parent</option>
			<option value="0">Child</option>
			@else
			<option value="0">Child</option>	
			<option value="1">Parent</option>
			@endif	
		</select>
	</div>
	
	<div id="permissionParentEdit">
		@if($permission->permParent != 0)
		<div class="form-group">
			<label for="status">Permission Parent: </label>
			<select class="form-control validate[required]" data-errormessage-value-missing="Permission Parent is required!" id="permParent" name="permParent" data-prompt-position="bottomRight">
				<option value="">--Select Permision Parent Here--</option>
				@foreach($perms as $p)
					<option value="{{$p->id}}">{{$p->perm_name}}</option>
				@endforeach
			</select>
		</div>
		@endif
	</div>
	
	<div class="form-group">
		<label for="routeName">Route: <label class="label label-warning">{{$permission->routename}}</label> </label>
		<?php
				$routeCollection = Route::getRoutes();
			?>
		<select class="form-control validate[required]" data-errormessage-value-missing="Route is required!" id="routeName" name="routeName" data-prompt-position="bottomRight">
			<option value="{{$permission->routename}}">{{$permission->routename}}</option>
			@foreach ($routeCollection as $value) 
					@if(getUnsignedRoutes($value->getName()))
					<option value="{{$value->getName()}}">{{$value->getName()}}</option>
					@endif
			@endforeach
			
			
		</select>
	</div>
	
	<div class="form-group">
		<label for="faIcon">fa-Icon: <label class="fa {{$permission->faicon}}"></label> </label>
		<input type="text" required class="form-control validate[required]" data-errormessage-value-missing="faIcon is required!" value="{{$permission->faicon}}" data-prompt-position="bottomRight" id="faIcon" name="faIcon" placeholder="Enter faIcon">
	</div>
	
	<div class="form-group">
		<label for="isnavMenu">Show as Navigation Menu: </label>
		<select class="form-control validate[required]" data-errormessage-value-missing="Navigation Men is required!" id="isnavMenu" name="isnavMenu" data-prompt-position="bottomRight">
			@if($permission->isnavMenu == 1)
			<option value="1">Yes</option>
			<option value="0">No</option>
			@else
			<option value="0">No</option>	
			<option value="1">Yes</option>
			@endif
		</select>
	</div>
	
	<div class="form-group">
		<label for="status">Status: </label>
		<select class="form-control validate[required]" data-errormessage-value-missing="Status is required!" id="status" name="status" data-prompt-position="bottomRight">
			@if($permission->status == 1)
			<option value="1">Activated</option>
			<option value="0">Blocked</option>
			@else
			<option value="0">Blocked</option>
			<option value="1">Activated</option>		
			@endif
		</select>
	</div>
	
	<hr/>
	
	@include('partials._buttonSave', ['btnId'=>'savePermEdit', 'title'=>'Update Permission'])
	
	
	


</form>


<!-- jQuery -->
<script src="{{url('BACKEND/vendors/jquery/dist/jquery.min.js')}}"></script>

@include('partials._saveFunc', ["btnID" => "savePermEdit", "formID"=>"registerForm_Perm_Edit", "route"=>"permissions.update", "routeWith"=>"app.updated", "rowId"=>$rowId, "update"=>true])


					