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

Route::apiResources([
    'tag' => 'API\TagController',
    'category' => 'API\CategoryController',
    'admin' => 'API\AdminController',
]);
Route::post('adminlogin', 'API\LoginController@adminlogin');
Route::post('categoryImage', 'API\CategoryController@categoryImage');
Route::post('deletecategoryImage', 'API\CategoryController@deleteCategoryImage');
