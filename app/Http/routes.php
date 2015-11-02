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


//room type
Route::get('/roomtype/add', 'RoomTypeController@create');
Route::get('/roomtype', 'RoomTypeController@index');
Route::post('/roomtype', 'RoomTypeController@store');

//room
Route::get('/room/add', 'RoomController@create');
Route::get('/room', 'RoomController@index');
Route::post('/room', 'RoomController@store');

//Route::get('roo',function(){
//    return \App\Room::find(1)->roomType;
//});