<?php

use App\State;
use App\Town;



use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */




///photos

Route::get('/', function () {
    return view('auth.login');
});








//Rutads Dedicadas  a gestion de usuarios
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

Route::get('home', ['as' => 'home', 'uses' => 'UsersController@home']);
Route::get('usuarios', ['as' => 'usuarios', 'uses' => 'UsersController@index']);
Route::delete('usuarios/{id}', ['as' => 'usuarios.destroy', 'uses' => 'UsersController@destroy']);
Route::get('crearusuario', ['as' => 'crearusuario', 'uses' => 'UsersController@create']);
Route::post('guardarusuario', ['as' => 'guardarusuario', 'uses' => 'UsersController@store']);
/*Route::get('api/users' ,function(){
return Datatables::eloquent(App\User::query())->make(true);
});*/




//Rutas Dedicadas a la gestion de vehiculos
Route::get('vehiculo', ['as' => 'vehiculo', 'uses' => 'VehiclesController@index']);
Route::delete('vehiculo/{id}', ['as' => 'vehiculo.destroy', 'uses' => 'VehiclesController@destroy']);
Route::get('crearvehiculo', ['as' => 'crearvehiculo', 'uses' => 'VehiclesController@create']);





//Rutas Dedicadas a la gestion de las apis de vehiculos

Route::get('getvehicle', ['as' => 'getvehicle', 'uses' => 'VehiclesController@getvehicle']);
Route::post('postvehicle', ['as' => 'postvehicle', 'uses' => 'VehiclesController@store']);

Route::get('fetchvehicle', ['as' => 'fetchvehicle', 'uses' => 'VehiclesController@update']);

Route::get('deletevehicle', ['as' => 'deletevehicle', 'uses' => 'VehiclesController@destroy']);



