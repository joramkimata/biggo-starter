<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
   public function manage(){
	   return view('users.manage');
   }
   
   public function edit($id){
	   $user = User::find($id);
	   return view('users.edit', compact('user'));
   }
   
   public function update($id){
	   $fullName = request('fullName');
	   $email    = request('email');
	   $mobile   = request('mobile');
	   $username = request('username');
	   $role     = request('role');
	   $status   = request('status');
	   
	   $check    = User::where('username', $username)->where('id', $id)->count();
	   
	   if($check){
		   //upddate
		   $user            = User::find($id);
		   $user->name      = $fullName;
		   $user->email     = $email;
		   $user->role      = $role;
		   $user->username  = $username;
		   $user->mobile    = $mobile;
		   $user->active    = $status;
		   $user->save();
		   return response()->json(['msg'=>'Successfully Updated', 'error'=>false]);
	   }else{
		   $check_ = User::where('username', $username)->where('id','!=', $id)->count();
		   if($check_){
				return response()->json(['msg'=>'User already registered', 'error'=>true]);
		   }else{
			   //updated
			   $user            = User::find($id);
			   $user->name      = $fullName;
			   $user->email     = $email;
			   $user->role      = $role;
			   $user->username  = $username;
			   $user->mobile    = $mobile;
			   $user->active    = $status;
			   $user->save();
			   return response()->json(['msg'=>'Successfully Updated', 'error'=>false]);
		   }
	   }
   }
   
   public function destroy($id){
	   $user = User::find($id);
	   if($user->username != "admin"){
		   $user->delete();
	   }
	   
   }
   
   public function store(){
	   $fullName = request('fullName');
	   $email    = request('email');
	   $mobile   = request('mobile');
	   $username = request('username');
	   $password = request('password');
	   $role     = request('role');
	   $status   = request('status');
	   
	   $check    = User::where('username', $username)->count();
	   
	   if($check){
		   return response()->json(['msg'=>'User already registered', 'error'=>true]);
	   }else{
		   $user            = new User;
		   $user->name      = $fullName;
		   $user->email     = $email;
		   $user->password  = bcrypt($password);
		   $user->role      = $role;
		   $user->username  = $username;
		   $user->mobile    = $mobile;
		   $user->active    = $status;
		   $user->save();
		   return response()->json(['msg'=>'Successfully Added', 'error'=>false]);
	   }
	   
   }
   
   public function refreshWith(){
	   return redirect()->back()->with('success', 'Successfully Added');
   }
}
