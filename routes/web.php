<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('main'); //NO es la URL, se utiliza internamente

/*EJEMPLO CON IF en resources/views/welcome.blade.php
Route::get('/tareas', function () {
    return view('welcome');
})->name('tareas');
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tasks', 'TaskController@index')->name('tasks');
/*
Se le puede aplicar un middleware a un método concreto así:
Route::get('/tasks', 'TaskCOntroller@index')->middleware('nombre en "kernel.php"');
*/
//Este es el método para guardar los datos del formulario
Route::post('/tasks', 'TaskController@store')->name('tasks.store');

Route::get('/tasks/edit/{id}', 'TaskController@editView')->name('tasks.edit_view');
Route::post('/tasks/{id}', 'TaskController@edit')->name('tasks.edit');

Route::delete('/tasks/{id}', 'TaskController@destroy')->name('tasks.destroy');


