<?php

Route::get('/', function () {
   return view('home');
});
Route::get('/home', function () {
   return view('home');
});
Route::post('/createShortLink', array (
   'as' => 'createShortLink',
   'uses' => 'LinkController@createShortLink'
));
Route::get('/test', array (
   'as' => 'xyz',
   'uses' => 'LinkController@xyz'
));
Route::get('/{shortLink}',array (
  'as' => 'getShortLink',
  'uses' => 'LinkController@getShortLink'
));


Route::group(['middleware' => ['web']], function () {
    //
});
