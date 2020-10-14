<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Post; //direccionamiento a la clase post

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


Route::get('/miprimerenrutamiento', function () {
    return "Hola que tal";
});

//TABLA COMMENTS
Route::get('comments/', 'CommentController@index');

Route::get('comments/{id}', 'CommentController@find');

Route::post('comments', 'CommentController@create');

Route::put('comments/{id}', 'CommentController@update');

Route::delete('comments/{id}', 'CommentController@delete');

//TABLA POSTS
Route::get('posts/', 'PostController@index');

Route::get('posts/{id}', 'PostController@find');

Route::post('posts', 'PostController@create');

Route::put('posts/{id}', 'PostController@update');

Route::delete('posts/{id}', 'PostController@delete');

//TABLA USERS
Route::get('users/', 'UserController@index');

Route::get('users/{id}', 'UserController@find');

Route::post('users', 'UserController@create');

Route::put('users/{id}', 'UserController@update');

Route::delete('users/{id}', 'UserController@delete');


