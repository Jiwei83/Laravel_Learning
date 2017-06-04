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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('users', function() {
//    $user = [
//        '0' => [
//            'first_name' => 'Jiwei',
//            'last_name' => 'Ma',
//            'location' => 'AU'
//        ],
//        '1' => [
//            'first_name' => 'Kric',
//            'last_name' => 'Zhang',
//            'location' => 'AU'
//        ]
//    ];
//
//    return $user;
//});
Route::get('users', ['uses' => 'UsersController@index']);
Route::get('users/create', ['uses' => 'UsersController@create']);
Route::post('users', ['uses' => 'UsersController@store']);