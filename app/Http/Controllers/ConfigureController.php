<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigureController extends Controller
{
    public function systemUpdate(){
    	return view('system.update');
    }
	
	
	public function manageRoles(){
		return view('system.manageRoles');
	}
	
	public function managePerms(){
		return view('system.managePerms');
	}
	
}
