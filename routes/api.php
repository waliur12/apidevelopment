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

Route::apiResource('/student','API\StudentController');
Route::get('/courses', 'API\CourseController@index');
Route::post('/courses', 'API\CourseController@store');
Route::get('/courses/{id}', 'API\CourseController@show');
Route::put('/courses/{id}', 'API\CourseController@update');
Route::delete('/courses/{id}', 'API\CourseController@destroy');
Route::get('/coursesbystudent/{id}', 'API\CourseController@showCourseByStudent');
Route::post('/register', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login');
Route::post('/logout', 'API\AuthController@logout')->middleware('auth:api');
