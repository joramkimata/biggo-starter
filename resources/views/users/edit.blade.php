
<?php 

$rowId =  $user->id;

?>

<form role="form" id="registerForm_User_Edit" class="card-box">

	{!!csrf_field()!!}
	
	<input type="hidden" value="{{$rowId}}" name="rowId" />

	<div class="form-group">
		<label for="fullName">Full Name: </label>
		<input type="text" required class="form-control validate[required]" data-errormessage-value-missing="Full name is required!" value="{{$user->name}}" data-prompt-position="bottomRight" id="fullName" name="fullName" placeholder="Enter Full Name">
	</div>
	
	<div class="form-group">
		<label for="email">Email: </label>
		<input type="email" data-errormessage="Invalid Email" required data-errormessage-custom-error="Let me give you a hint: someone@nowhere.com"  class="form-control validate[required,custom[email]]" data-errormessage-value-missing="Email is required!" value="{{$user->email}}" data-prompt-position="bottomRight" id="email" name="email" placeholder="Enter Email">
	</div>
	
	<div class="form-group">
		<label for="mobile">Mobile: </label>
		<input type="text" required class="form-control validate[required,custom[phone]]" data-errormessage-value-missing="Mobile is required!" value="{{$user->mobile}}" data-prompt-position="bottomRight" id="mobile" name="mobile" placeholder="Enter Mobile Number">
	</div>
	
	<div class="form-group">
		<label for="username">Username: </label>
		<input type="text" required class="form-control validate[required]" data-errormessage-value-missing="Username is required!" value="{{$user->username}}" data-prompt-position="bottomRight" id="username" name="username" placeholder="Enter Username">
	</div>
	
	
	
	<div class="form-group">
		<label for="role">Role: <label class="label label-warning">{{\App\Role::find($user->role)->role_name}}</label> </label>
		<select class="form-control validate[required]" data-errormessage-value-missing="Role is required!" id="role" name="role" data-prompt-position="bottomRight">
			<option value="{{$user->role}}">{{\App\Role::find($user->role)->role_name}}</option>
			<?php
				$roles = App\Role::where('id', '!=', $user->role)->where('role_name', '!=', 'Developer')->get();
			?>
			<option value="">----------------------------------------------</option>
			@foreach($roles as $role)
			<option value="{{$role->id}}">{{$role->role_name}}</option>	
			@endforeach
			
		</select>
	</div>
	
	<div class="form-group">
		<label for="status">Status: {!!getStatus($user->active)!!}</label>
		<select class="form-control validate[required]" data-errormessage-value-missing="Status is required!" id="status" name="status" data-prompt-position="bottomRight">
			@if($user->active == 1)
			<option value="1">Activated</option>
			<option value="0">Blocked</option>
			@else
			<option value="0">Blocked</option>
			<option value="1">Activated</option>		
			@endif
		</select>
	</div>
	
	<hr/>
	
	@include('partials._buttonSave', ['btnId'=>'saveUserEdit', 'title'=>'Edit User Information', "btn"=>'success'])
	
	
	


</form>


<!-- jQuery -->
<script src="{{url('BACKEND/vendors/jquery/dist/jquery.min.js')}}"></script>

@include('partials._saveFunc', ["btnID" => "saveUserEdit", "formID"=>"registerForm_User_Edit", "route"=>"users.update", "routeWith"=>"app.updated", "rowId"=>$rowId, "update"=>true])



					