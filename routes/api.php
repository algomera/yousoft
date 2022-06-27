<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
    
    Route::get('practices',  'ApiController@getPracticeList');

    Route::get('photos', 'ApiController@get_photo');
    Route::post('photos', 'ApiController@create_photo');

    Route::get('videos', 'ApiController@get_video');
    Route::post('videos', 'ApiController@create_video');

    Route::get('anagrafiche', 'ApiController@get_anagrafiche');

	Route::get('ape', 'ApiController@get_ape');
});

/**Route for login API */
Route::post('login', 'ApiController@login');


