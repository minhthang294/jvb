<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return Redirect::to('admin');
    }
    return view('welcome');
});
//login
Route::post('/admin', 'UserController@login');

Route::group(['middleware' => 'checkadmin'], function () {
    Route::get('/admin', function(){
        return view('admin.index');
    });
    //logout
    Route::get('/logout', 'UserController@logout');

    // admin
    Route::get('/admin/adduser', 'AdminController@addUser');
    Route::post('admin/storeuser', 'AdminController@storeUser');
    Route::get('/admin/listuser', 'AdminController@viewUsers');
    Route::get('/admin/edituser/{id}', 'AdminController@editUser');
    Route::patch('/admin/updateuser/{id}', 'AdminController@updateUser');
    Route::delete('/admin/delete/{id}', 'AdminController@deleteUser');
    Route::get('/admin/editprofile/{id}','UserController@editprofile');
    Route::patch('/admin/updateprofile/{id}','UserController@updateprofile');
    Route::post('/admin/changepass', 'UserController@updatepassword');
    Route::get('/admin/changepass/{id}', 'UserController@changepassword');
});

//edit user profile

