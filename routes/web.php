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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('locale/{lang}','SetLocal@change_local');





Route::resource('department','DepartmentController');


Route::resource('article','ArticleController');
Route::resource('comment','CommentController');
Route::get('clear-data','HomeController@clear_data');
Route::post('comment/{article}','CommentController@store')->name('comment.store');

