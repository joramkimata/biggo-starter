<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\Rolepermission;


class RolesController extends Controller
{
    public function store(){
		$all = (request()->all());
		$roleName = $all['roleName'];
		$status   = $all['status'];
		
		$check = Role::where('role_name', $roleName)->count();
		
		if($check){
			return response()->json(['error'=>true, 'msg'=>'Role already registred']);
		}else{
			$nr = new Role;
			$nr->role_name = $roleName;
			$nr->status = $status;
			$nr->save();
			return response()->json(['error'=>false, 'msg'=>'']);
		}
	}

	public function rolePermsStore(){
		sleep(1);
		$all = request()->all();
		$roleId = $all['roleId'];
		Rolepermission::where('role_id', $roleId)->delete();

		if(request()->has('perms')){
			$perms  = $all['perms'];
			for ($i=0; $i < count($perms); $i++) { 
				$perm_id = $perms[$i];
				$rp = new Rolepermission;
				$rp->role_id       = $roleId;
				$rp->permission_id = $perm_id;
				$rp->save(); 
			}
		}

		
	}
	
	public function permissions(){
		$roleId = request('roleId');
		return view('roles.permissions', compact('roleId'));
	}
	
	public function refreshWith(){
		return redirect()->back()->with('success', 'Successfully Added!');
	}
	
	public function edit($id){
		$role = Role::find($id);
		return view('roles.edit', compact('role'));
	}
	
	public function update($id){
		$all = (request()->all());
		$roleName = $all['roleName'];
		$status   = $all['status'];
		
		$check = Role::where('role_name', $roleName)->where('id', $id)->count();
		
		if($check){
			//update
			$nr = Role::find($id);
			$nr->role_name = $roleName;
			$nr->status = $status;
			$nr->save();
			return response()->json(['error'=>false, 'msg'=>'']);
		}else{
			$check_ = Role::where('role_name', $roleName)->where('id', '!=',$id)->count();
			if($check_){
				return response()->json(['error'=>true, 'msg'=>'Role already registred']);
			}else{
				//update
				$nr = Role::find($id);
				$nr->role_name = $roleName;
				$nr->status = $status;
				$nr->save();
				return response()->json(['error'=>false, 'msg'=>'']);
			}
		}
	}
	
	public function destroy($id){
		Role::find($id)->delete();
		$check = Rolepermission::where('role_id',$id)->count();
		if($check != 0){
			$perms =  Rolepermission::where('role_id',$id)->get();
			foreach($perms as $p){
				$p->delete();
			}
		}
	}
	
}
