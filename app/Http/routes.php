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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


/***********************
 *
 *
 * Optional Parameter Route
 */


Route::get('/hello/{option?}',function($option=''){
    var_dump($option);
});

Route::get('/foo/bar','UriController@index');


/******************
 * Cookie 
 */

Route::get('/cookie/set','CookieController@setCookie');
Route::get('/cookie/get','CookieController@getCookie');


/****
 *
 * Blade
 *
 *

<html>

<head>
<title>Page Title</title>
</head>

<body>
This is the master sidebar.

<p>This is appended to the master sidebar.</p>

<div class = "container">
<h2>Virat Gandhi</h2>
<p>This is my body content.</p>
</div>

</body>
</html>
 *
 *
 Master **********
<html>

<head>
<title>@yield('title')</title>
</head>

<body>
@section('sidebar')
This is the master sidebar.
@show

<div class = "container">
@yield('content')
</div>

</body>
</html>
 *
 * Page
@extends('layouts.master')
@section('title', 'Page Title')

@section('sidebar')
@parent
<p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<h2>{{$name}}</h2>
<p>This is my body content.</p>
@endsection
 */

Route::get('blade', function () {
    return view('page',array('name' => 'Virat Gandhi'));
});



/*
 *
 *
 * Assign Route Name
 */


Route::get('/test', ['as'=>'testing',function(){
    return view('test2');
}]);

Route::get('redirect',function(){
    return redirect()->route('testing');
});


/***
 *
 * Redirection
 */

Route::get('rr','RedirectController@index');
Route::get('/redirectcontroller',function(){
    return redirect()->action('RedirectController@index');
});


/*
 *
 * Form
 */

Route::get('/form',function(){
    return view('form');
});

/******
 *
 * Localisation Support Multi-language
 */
Route::get('localization/{locale}','LocalizationController@index');

/***************************
 *
 * Session Controller
 */

Route::get('session/get','SessionController@accessSessionData');
Route::get('session/set','SessionController@storeSessionData');
Route::get('session/remove','SessionController@deleteSessionData');

/*
 *
 *
 * Form Validate
 */

Route::get('/validation','ValidationController@showform');
Route::post('/validation','ValidationController@validateform');

/*
 *
 * Upload File
 */
Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');


Route::get('ajax',function(){
    return view('message');
});
Route::post('/getmsg','AjaxController@index');


Route::get('/error',function(){
    abort(404);
});