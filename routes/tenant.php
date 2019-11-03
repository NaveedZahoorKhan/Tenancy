<?php

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider
| with the tenancy and web middleware groups. Good luck!
|
*/

Route::get('/app', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/createFirstUser', 'TenantUserController@createFirstUser');
Route::get('/clients', function (){
    return view('main.Clients');
});
Route::middleware('api')->prefix('api')->group(function (){

});
