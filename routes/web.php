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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::group(['middleware' => 'auth'], function(){
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'is_admin',
        'as' => 'admin.',

    ],function(){
        Route::get('tasks',[\App\Http\Controllers\Admin\TaskControlller::class,'index'])
        ->name('tasks.index');
    });

    Route::group([
        'prefix' => 'user',
        'as' => 'user.',

    ],function(){
        Route::resource('tasks',\App\Http\Controllers\User\TaskControlller::class);
    });
});
