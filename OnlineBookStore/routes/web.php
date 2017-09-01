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

use App\Entity\Member;
use App\Tool\SMS\SendTemplateSMS;
//
////Route::get('/', function () {
////    return view('welcome');
////});
//
////基础路由
//Route::get('basic1', function() {
//    return 'basic1';
//});
//
//Route::post('basic2', function() {
//    return 'basic2';
//});
//
////多请求路由
//Route::match(['get', 'post'], 'multi1', function() {
//    return 'multi1';
//});
//
//Route::any('multi2', function() {
//    return 'multi2';
//});
//
////路由参数
////Route::get('user/{id}', function($id) {
////    return 'User-' . $id;
////});
//
////Route::get('user/{name?}', function($name = null) {
////    return 'Username-' . $name;
////});
//
////Route::get('user/{name?}', function($name = null) {
////    return 'Username-' . $name;
////})->where('name', '[A-Za-z]+');
//
//
//Route::get('user/{id}/{name?}', function($id, $name = null) {
//    return 'Username-' . $name . 'Userid-' . $id;
//})->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);
//
////路由群组
//Route::group(['prefix' => 'member'], function() {
//    Route::get('user/{id}/{name?}', function($id, $name = null) {
//        return 'Username-' . $name . 'Userid-' . $id;
//    })->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);
//});
//
////路由中输出视图
//Route::get('view', function () {
//    return view('welcome');
//});
//
////路由与控制器关联 二者相同
//Route::get('member/info', 'MemberController@info');
//Route::get('member/info', ['uses' => 'MemberController@info']);
////传给控制器参数
//Route::get('member/{id}', 'MemberController@info')
//->where('id', '[0-9]+');
//
//Route::get('test', 'StudentController@test1');
//Route::get('query1', 'StudentController@query1');
//Route::get('query2', 'StudentController@query2');
//Route::get('query3', 'StudentController@query3');
//Route::get('query4', 'StudentController@query4');

Route::get('/login', 'View\MemberController@toLogin');

Route::get('/register', 'View\MemberController@toRegister');

Route::any('service/validate_code/create', 'Service\ValidateController@create');

Route::any('service/validate_phone/send', 'Service\ValidateController@sendSMS');

Route::any('service/register', 'Service\MemberController@register');























