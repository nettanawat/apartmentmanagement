<?php

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

Route::get('/', function () {
    return view('master');
});

//customer
Route::get('/customer/add', 'CustomerController@create');
Route::get('/customer', 'CustomerController@index');
Route::post('/customer', 'CustomerController@store');
Route::put('/customer/{id}', 'CustomerController@update');
Route::get('/customer/{slug}', 'CustomerController@show');
Route::get('/customer/{slug}/edit', 'CustomerController@edit');
Route::delete('/customer/{id}', 'CustomerController@destroy');


//address
Route::get('/address/add', 'AddressController@create');
Route::get('/address', 'AddressController@index');
Route::post('/address', 'AddressController@store');


//floor
Route::get('/floor/add', 'FloorController@create');
Route::get('/floor', 'FloorController@index');
Route::post('/floor', 'FloorController@store');
Route::get('/floor/{slug}/edit', 'FloorController@edit');
Route::put('/floor/{id}', 'FloorController@update');
Route::delete('/floor/{id}', 'FloorController@destroy');


//room type
Route::get('/roomtype/add', 'RoomTypeController@create');
Route::get('/roomtype', 'RoomTypeController@index');
Route::post('/roomtype', 'RoomTypeController@store');
Route::put('/roomtype/{id}', 'RoomTypeController@update');
Route::get('/roomtype/{slug}/edit', 'RoomTypeController@edit');
Route::delete('/roomtype/{id}', 'RoomTypeController@destroy');


//room
Route::get('/room/add', 'RoomController@create');
Route::get('/room', 'RoomController@index');
Route::get('/room/{slug}/edit', 'RoomController@edit');
Route::put('/room/{id}', 'RoomController@update');
Route::post('/room', 'RoomController@store');
Route::delete('/room/{id}', 'RoomController@destroy');


//rental
Route::get('/rental/check-in/filter/{slug}', 'RentController@selectRoom');
Route::post('/rental/check-in', 'RentController@store');
Route::get('/rental', 'RentController@index');
Route::get('/rental/check-in/addcustomer/{slug}', 'RentController@create');


//Error
Route::get('/error/pagenotfound', function () {
    return view('errors.showNotAvailable');
});


//Route::get('roo',function(){
//    return \App\Room::find(1)->roomType;
//});