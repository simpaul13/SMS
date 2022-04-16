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

Route::get('/home', 'HomeController@index')->name('home');


/*
|--------------------------------------------------------------------------
| Students Routes
|--------------------------------------------------------------------------
*/
Route::prefix('students')->group(function () {

    Route::get('/', 'StudentController@index')->name('student.index');

});

/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
*/
Route::prefix('student')->group(function () {

    Route::get('/{id}', 'StudentController@show')->name('student.show');
    Route::post('/store', 'StudentController@store')->name('student.store');
    Route::put('/{id}/update', 'StudentController@update')->name('student.update');
    Route::delete('/{id}/destroy', 'StudentController@destroy')->name('student.destroy');

});

/*
|--------------------------------------------------------------------------
| Teachers Routes
|--------------------------------------------------------------------------
*/
Route::prefix('teachers')->group(function () {

    Route::get('/', 'TeacherController@index')->name('teacher.index');

});

/*
|--------------------------------------------------------------------------
| Teacher Routes
|--------------------------------------------------------------------------
*/
Route::prefix('teacher')->group(function () {

    Route::get('/{id}', 'TeacherController@show')->name('teacher.show');
    Route::post('/store', 'TeacherController@store')->name('teacher.store');
    Route::put('/{id}/update', 'TeacherController@update')->name('teacher.update');
    Route::delete('/{id}/destroy', 'TeacherController@destroy')->name('teacher.destroy');

});
