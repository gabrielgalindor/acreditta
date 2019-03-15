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

Route::get('muestratags', 'administracion\TagController@muestratags');
Route::get('tagsdisponibles', 'administracion\TagController@tagsdisponibles');
Route::get('agregartag', 'administracion\TagController@agregartag');
Route::get('eliminatag', 'administracion\TagController@eliminatag');

Route::get('getDemoDatesFromZoom', 'HomeController@getDemoDatesFromZoom');