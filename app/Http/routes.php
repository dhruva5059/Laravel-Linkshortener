<?php

Route::get('/', function () {
   return view('home');
});
Route::post('/createShortLink', array (
   'as' => 'createShortLink',
   'uses' => 'LinkController@createShortLink'
));
Route::get('/shortLink',array (
  'as' => 'getShortLink',
  'uses' => 'LinkController@getShortLink'
));

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
