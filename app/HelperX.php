<?php

namespace App;

use App\Systemsetting;
use App\User;

class HelperX {

    public static function createDeveloper(){
        $new_role_check = Role::where('role_name', 'Developer')->count();
        if(!$new_role_check){
            $new_role = new Role;
            $new_role->role_name = 'Developer';
            $new_role->status = 1;
            $new_role->save();

            $np = 0;

            $new_perm_check = Permission::where('perm_name', 'Configure')->count();
            if(!$new_perm_check){
                $new_perm = new Permission;
                $new_perm->perm_name = 'Configure';
                $new_perm->isparent  = 1;
                $new_perm->status    = 1;
                $new_perm->routename = 'configure.system';
                $new_perm->faicon    = 'fa-wrench';
                $new_perm->isnav     = 1;
                $new_perm->detail    = 'Configure the system';
                $new_perm->save();
                $new_roleperm_check  = Rolepermission::where('role_id', $new_role->id)->where('permission_id', $new_perm->id)->count();
                if(!$new_roleperm_check){
                    $new_roleperm = new Rolepermission;
                    $new_roleperm->role_id = $new_role->id;
                    $new_roleperm->permission_id = $new_perm->id;
                    $new_roleperm->save();
                    $np = $new_perm->id;
                }                
            }
            $new_perm_check2 = Permission::where('perm_name', 'Roles')->count();
            if(!$new_perm_check2){
                $new_perm2 = new Permission;
                $new_perm2->perm_name  = 'Roles';
                $new_perm2->isparent   = 0;
                $new_perm2->status     = 1;
                $new_perm2->routename  = 'configure.roles';
                $new_perm2->faicon     = 'fa-lock';
                $new_perm2->isnav      = 1;
                $new_perm2->detail     = 'Manage Roles';
                $new_perm2->permParent = $np;
                $new_perm2->save();
                $new_roleperm_check2  = Rolepermission::where('role_id', $new_role->id)->where('permission_id', $new_perm2->id)->count();
                if(!$new_roleperm_check2){
                    $new_roleperm2 = new Rolepermission;
                    $new_roleperm2->role_id = $new_role->id;
                    $new_roleperm2->permission_id = $new_perm2->id;
                    $new_roleperm2->save();
                }                
            }
            $new_perm_check3 = Permission::where('perm_name', 'Permissions')->count();
            if(!$new_perm_check3){
                $new_perm3 = new Permission;
                $new_perm3->perm_name  = 'Permissions';
                $new_perm3->isparent   = 0;
                $new_perm3->status     = 1;
                $new_perm3->routename  = 'configure.perms';
                $new_perm3->faicon     = 'fa-key';
                $new_perm3->isnav      = 1;
                $new_perm3->detail     = 'Manage Permissions';
                $new_perm3->permParent = $np;
                $new_perm3->save();
                $new_roleperm_check3  = Rolepermission::where('role_id', $new_role->id)->where('permission_id', $new_perm3->id)->count();
                if(!$new_roleperm_check3){
                    $new_roleperm3 = new Rolepermission;
                    $new_roleperm3->role_id = $new_role->id;
                    $new_roleperm3->permission_id = $new_perm3->id;
                    $new_roleperm3->save();
                }                
            }

             $new_perm_check4 = Permission::where('perm_name', 'Edit Permissions')->count();
            if(!$new_perm_check4){
                $new_perm4 = new Permission;
                $new_perm4->perm_name  = 'Edit Permissions';
                $new_perm4->isparent   = 0;
                $new_perm4->status     = 1;
                $new_perm4->routename  = 'permissions.edit';
                $new_perm4->faicon     = 'fa-edit';
                $new_perm4->isnav      = 0;
                $new_perm4->detail     = 'Permissions Edit';
                $new_perm4->permParent = $np;
                $new_perm4->save();
                $new_roleperm_check4  = Rolepermission::where('role_id', $new_role->id)->where('permission_id', $new_perm4->id)->count();
                if(!$new_roleperm_check4){
                    $new_roleperm4 = new Rolepermission;
                    $new_roleperm4->role_id = $new_role->id;
                    $new_roleperm4->permission_id = $new_perm4->id;
                    $new_roleperm4->save();
                }                
            }


        }
        return $new_role->id;
    }

     public static function activeRoute($route)
    {

        if (Route::currentRouteName() == $route) {
            return "active";
        } else {
            return "";
        }
    }

    public static function noAdminYet(){
        $check = User::where('role', 1)->count();
        if(!$check){
            return true;
        }
        return false;
    }

    public static function uplodFileThenReturnPath($fileStringInput, $destinationPath='uploads/companylogos/')
    {
        $file            = request()->file($fileStringInput);
        $archivo         = value(function () use ($file) {
            $filename = str_random(10) . '.' . $file->getClientOriginalExtension();
            return strtolower($filename);
        });
        $filename = $archivo; //str_random(6) . '_' . $file->getClientOriginalName();
        $url      = $destinationPath . $filename;
        try {
            $uploadSuccess = $file->move($destinationPath, $filename);
            if ($uploadSuccess) {
                $path = url($url);
                return $path;
            }
        } catch (Exception $ex) {
            return $ex->getMessage(); 
        }
    }

    public static function getEditor(){
        $editor = HelperX::getSystem()->editor;
        if($editor != "advance"){
            return '';
        }else{
            return 'summernote';
        }
        
    }


    public static function getStatus($s)
    {
        if ($s == 1) {
            return "<label class='label label-success'>Active</label>";
        } else {
            return "<label class='label label-danger'>Blocked</label>";
        }
    }
    public static function updateLogouttime() {
        $check = LoginHistory::where('user_id', Auth::user()->id)->count();

        if ($check == 0) {
            $ln = new LoginHistory;
            $ln->user_id = Auth::user()->id;
            $ln->logouttime = Carbon::now();
            $ln->save();
        } else {
            $check1 = LoginHistory::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->where('logouttime', '=', '0000-00-00 00:00:00')->first();
            if (count($check1)) {
                $check1->logouttime = Carbon::now();
                $check1->save();
            } else {
                $check1->logouttime = Carbon::now();
                $check1->save();
            }
        }
    }

    public static function updateLogintime() {
        $check = LoginHistory::where('user_id', Auth::user()->id)->count();

        if ($check == 0) {
            $ln = new LoginHistory;
            $ln->user_id = Auth::user()->id;
            $ln->logintime = Carbon::now();
            $ln->save();
        } else {
            $check = LoginHistory::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->where('logouttime', '=', '0000-00-00 00:00:00')->first();
            if (count($check)) {
                //$check->logouttime = Carbon::now();
                //$check->save();
                $ln = new LoginHistory;
                $ln->user_id = Auth::user()->id;
                $ln->logintime = Carbon::now();
                $ln->save();
            } else {
                $ln = new LoginHistory;
                $ln->user_id = Auth::user()->id;
                $ln->logintime = Carbon::now();
                $ln->save();
            }
        }
    }

    public static function getSystem(){
        $system = Systemsetting::find(1);
        return $system;
    }

    public static function getRole($uid){
        $role = Role::find(User::find($uid)->role_id)->role_name;
        return $role;
    }

    public static function getLoginTime($user_id) {
        $check = LoginHistory::where('user_id', $user_id)->orderBy('id', 'DESC')->first();
        if (count($check)) {
            return "<label class='label label-success'>" . $check->logintime . "</label>";
        } else {
            return "<label class='label label-danger'>Never Login</label>";
        }
    }

    public static function getLogoutTime($user_id) {
        $check = LoginHistory::where('user_id', $user_id)->orderBy('id', 'DESC')->where('logouttime', '!=', '0000-00-00 00:00:00')->first();
        if (count($check)) {
            return "<label class='label label-success'>" . $check->logouttime . "</label>";
        } else {
            $check = LoginHistory::where('user_id', $user_id)->orderBy('id', 'DESC')->where('logouttime', '=', '0000-00-00 00:00:00')->where('logintime', '!=', '0000-00-00 00:00:00')->first();
            if (count($check)) {
                return "<label class='label label-primary'>Still in System</label>";
            } else {
                return "<label class='label label-danger'>Never Logout</label>";
            }
        }
    }
}