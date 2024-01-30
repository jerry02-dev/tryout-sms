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



Route::apiResources(['user' => 'API\UserController']);
Route::apiResources(['course' => 'API\CourseController']);
Route::apiResources(['event' => 'API\EventController']);

Route::get('list', 'API\CourseController@list');
Route::get('list-event', 'API\CourseController@event_list');