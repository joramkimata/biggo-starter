@extends('layout')

@section('title', 'Manage Users')

@section('main')

	<div class="row">

		<div class="col-sm-12">
			<div class="">
				<div class="row">
					<div class="col-md-3 card-box">
						<h4 class="m-t-0 header-title "><b><i class="fa fa-plus"></i> Add New User</b></h4>
						<hr/>
						
						<form role="form" id="registerForm_User">

							{!!csrf_field()!!}

							<div class="form-group">
								<label for="fullName">Full Name: </label>
								<input type="text" required class="form-control validate[required]" data-errormessage-value-missing="Full name is required!" value="" data-prompt-position="bottomRight" id="fullName" name="fullName" placeholder="Enter Full Name">
							</div>
							
							<div class="form-group">
								<label for="email">Email: </label>
								<input type="email" data-errormessage="Invalid Email" required data-errormessage-custom-error="Let me give you a hint: someone@nowhere.com"  class="form-control validate[required,custom[email]]" data-errormessage-value-missing="Email is required!" value="" data-prompt-position="bottomRight" id="email" name="email" placeholder="Enter Email">
							</div>
							
							<div class="form-group">
								<label for="mobile">Mobile: </label>
								<input type="text" required class="form-control validate[required,custom[phone]]" data-errormessage-value-missing="Mobile is required!" value="" data-prompt-position="bottomRight" id="mobile" name="mobile" placeholder="Enter Mobile Number">
							</div>
							
							<div class="form-group">
								<label for="username">Username: </label>
								<input type="text" required class="form-control validate[required]" data-errormessage-value-missing="Username is required!" value="" data-prompt-position="bottomRight" id="username" name="username" placeholder="Enter Username">
							</div>
							
							<div class="form-group">
								<label for="password">Password: </label>
								<input type="password" required class="form-control validate[required,funcCall[checkPassMatch[cpassword]]]" data-errormessage-value-missing="Password is required!" value="" data-prompt-position="bottomRight" id="password" name="password" placeholder="Enter Password">
							</div>
							
							<div class="form-group">
								<label for="cpassword">Confirm Password: </label>
								<input type="password" required class="form-control validate[required,funcCall[checkPassMatch[password]]]" data-errormessage-value-missing="Confirm Password is required!" value="" data-prompt-position="bottomRight" id="cpassword" name="cpassword" placeholder="Enter Password Again">
							</div>
							
							<div class="form-group">
								<label for="role">Role: </label>
								<select class="form-control validate[required]" data-errormessage-value-missing="Role is required!" id="role" name="role" data-prompt-position="bottomRight">
									<?php
										$roles = App\Role::where('role_name', '!=', 'Developer')->get();
									?>
									<option value="">--Select Role Here--</option>
									@foreach($roles as $role)
									<option value="{{$role->id}}">{{$role->role_name}}</option>	
									@endforeach
									<!--<option value="1">Admin</option>
									<option value="2">Supervisor</option>
									<option value="3">Manager</option>
									<option value="4">Cashier</option>
									<option value="5">Chef</option>
									<option value="6">Store Keeper</option>
									<option value="7">Director</option>-->
								</select>
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
							
							@include('partials._buttonSave', ['btnId'=>'saveUser', 'title'=>'Add New User'])
							
							
							


						</form>
					</div>
					<div class="col-md-9 card-box">
					
						<?php 
						
							$data = \App\User::orderBy('created_at', 'DESC')->where('role', '!=', App\Role::where('role_name', '=', 'Developer')->first()->id)->get();
							
							//["name", "email", "mobile", "username", "status", "role"]
							
							$dxX = [];
							
							foreach($data as $d){
								$dx = [];
								$dx['id']        = $d->id;
								$dx['name']      = $d->name;
								$dx['email']     = $d->email;
								$dx['mobile']    = $d->mobile;
								$dx['username']  = $d->username;
								$dx['status']    = $d->active;
								$dx['role']      = \App\Role::find($d->role)->role_name;	 //getRole($d->role);
								
								$dxX[] = (object)$dx;
							} 
						
						?>
					
						@include('partials._success')
						@include('partials._datatables', ["columns"=>["Full Name", "Email", "Mobile", "Username", "Status", "Role", "Actions"], "mapEls"=>["name", "email", "mobile", "username", "status", "role"], "data"=>$dxX, "modal"=>"normal", "url_edit"=>"users/edit", "url_delete" =>"users/delete", "refreshWix"=>"users.refreshWith", "perms"=>['perm_name'=>'Users']])

					</div>
					
				</div>
			</div>
		</div>

	</div>


@stop


@section('custom-scripts')



@include('partials._saveFunc', ['btnID'=>'saveUser', 'formID'=>'registerForm_User', 'route'=>'users.store', 'routeWith'=>'users.refreshWith'])

@stop