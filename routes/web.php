<?php

use App\Systemsetting;



Route::get('/', function () {
    
    if(Systemsetting::count()){
    	return view('login');
    }else{
    	return view('bootApp');
    }

})->name('login');

Route::post('app/doLogin', 'AppController@doLogin')->name('app.doLogin');
Route::get('app/registerAdmin', 'AppController@registerAdmin')->name('app.registerAdmin');
Route::post('app/doRegister', 'AppController@doRegister')->name('app.doRegister');
Route::get('app/refresh', 'AppController@refresh')->name('app.refresh');
Route::get('app/updated', 'AppController@updated')->name('app.updated');
Route::post('system/store', 'AppController@system_store')->name('system.store');
Route::get('system/refresh', 'AppController@system_refresh')->name('system.refresh');


Route::group(['middleware' => 'auth'], function() {
    Route::get('dashboard', 'AppController@dashboard')->name('app.dashboard');
    Route::get('app/logout', 'AppController@logout')->name('app.logout');

    //
    Route::get('configure/system', 'ConfigureController@systemUpdate')->name('configure.system');
    Route::get('configure/system/info', 'ConfigureController@systemUpdate')->name('configure.system.info');
	Route::get('app/users', 'UserController@manage')->name('app.users');
	Route::post('users/store', 'UserController@store')->name('users.store');
	Route::get('users/refreshWith', 'UserController@refreshWith')->name('users.refreshWith');
	Route::post('users/edit/{id}', 'UserController@edit')->name('users.edit');
	Route::post('users/update/{id}', 'UserController@update')->name('users.update');

	
	Route::get('configure/roles', 'ConfigureController@manageRoles')->name('configure.roles');
	Route::get('configure/perms', 'ConfigureController@managePerms')->name('configure.perms');
	Route::post('roles/store', 'RolesController@store')->name('roles.store');
	Route::get('roles/permissions', 'RolesController@permissions')->name('roles.permissions');
	Route::post('roles/edit/{id}', 'RolesController@edit')->name('roles.edit');
	Route::post('roles/update/{id}', 'RolesController@update')->name('roles.update');
	Route::post('roles/delete/{id}', 'RolesController@destroy')->name('roles.destroy');
	Route::get('roles/refreshWith', 'RolesController@refreshWith')->name('roles.refreshWith');
	Route::post('roles/permissions/store', 'RolesController@rolePermsStore')->name('roles.permissions.store');
	//
	Route::post('permissions/store', 'PermissionController@store')->name('permissions.store');
	Route::post('permissions/edit/{id}', 'PermissionController@edit')->name('permissions.edit');
	Route::post('permissions/update/{id}', 'PermissionController@update')->name('permissions.update');
	Route::post('permissions/delete/{id}', 'PermissionController@destroy')->name('permissions.destroy');
	Route::get('permissions/refreshWith', 'PermissionController@refreshWith')->name('permissions.refreshWith');
	Route::get('permissions/getAllParents', 'PermissionController@getAllParents')->name('permissions.getAllParents');
	
	

});