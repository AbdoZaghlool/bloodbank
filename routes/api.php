<?php

use Illuminate\Http\Request;

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
Route::group(['prefix' => 'v1','namespace'=>'Api'], function () {

    Route::get('governorates','MainController@governorates');
    Route::get('cities','MainController@cities');
    Route::post('register','AuthController@register');
    Route::post('login','AuthController@login');
    Route::get('reset-password','AuthController@resetPassword');
    Route::get('contacts','MainController@contacts');
    Route::get('settings','MainController@settings');
    Route::get('categories','MainController@categories');
    Route::get('blood-types','MainController@bloodTypes');
    Route::get('donation-requests','MainController@donations');
    Route::get('donation-requests/{donation}','MainController@donation');


    Route::group(['middleware' => 'auth:api'], function () {

        Route::get('posts','PostController@index');
        Route::get('posts/{post}','postController@show');
        Route::get('profile','AuthController@profile');


    });

});
