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

//TABLA COMMENTS MODIFICACIONES
Route::get('comments/', 'CommentController@comments'); 
Route::get('comments/{id}', 'CommentController@comment_id');
Route::post('comments', 'CommentController@insertar'); //modificaciones
Route::put('comments/{id}', 'CommentController@actualizar'); //modificaciones
Route::delete('comments/{id}', 'CommentController@borrar_comment');

//TABLA POSTS LISTO
Route::get('posts/', 'PostController@posts');
Route::get('posts/{id}', 'PostController@post_id');
Route::post('post', 'PostController@insertar');
Route::put('posts/{id}', 'PostController@actualizar');
Route::delete('posts/{id}', 'PostController@borrar_post');
//post debbug
Route::get('posts_log/', 'PostController@index');

//TABLA USERS LISTO
Route::get('users/', 'UserController@user');
Route::get('users/{id}', 'UserController@user_id');
Route::post('users', 'UserController@insertar');
Route::put('users/{id}', 'UserController@actualizar');
Route::delete('users/{id}', 'UserController@borrar_user');

//Comentarios de un determinado post
Route::get('comments/post/{id}', 'CommentController@comments_posts_id');

//Comentarios de un determinado user
Route::get('comments/user/{id}', 'CommentController@comments_user_id'); //remove

//Posts de un determinado user
Route::get('posts/user/{id}', 'UserController@posts_user_id');

//Todos los posts con sus respectivos comentarios
Route::get('posts/comments/all', 'PostController@posts_comments');

//Todos los users y sus posts asociados
Route::get('posts/users/all', 'UserController@users_posts');




