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

/*Route::get('/ping', function(){
    return ['pong' => true];
});*/

Route::post('/place/create', "placeController@create");
Route::get('/place/list', "placeController@list");

Route::post('/search', "searchController@search");

Route::get('/info/list', "infoController@list");

Route::get('/category', 'categoryController@list');
