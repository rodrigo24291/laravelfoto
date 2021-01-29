<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cona', 'UserController@index')->name('config');
Route::post('/cona/actualizar', 'UserController@store')->name('actualizar');

Route::get('/cona/{imagen}', 'UserController@create')->name('image');


Route::get('/imagen/create', 'ImageControll@create')->name('imagen.create');

Route::post('/imagen/store', 'ImageControll@store')->name('image.store');

Route::get('/mostrartodo', 'ImageControll@mostrartodo')->name('image.mostrartodo');

Route::get('/mostrartodo/{imagen}', 'ImageControll@show')->name('image.show');

Route::get('/mos/{id}', 'ImageControll@perfil')->name('image.perfil');


Route::post('/comment', 'CommentController@store')->name('comment.comentar');


Route::get('/delete/{id}', 'CommentController@destroy')->name('perfil.delete');


Route::get('/like/{id}', 'LikeController@like')->name('like');


Route::get('/perfiles/{id}', 'UserController@show')->name('perfil.show');


Route::get('/usuarios', 'UserController@todos')->name('user.todos');


Route::post('/usuarios/buscar', 'UserController@buscar')->name('user.buscar');


Route::get('/usuarios', 'UserController@todos')->name('user.todos');
