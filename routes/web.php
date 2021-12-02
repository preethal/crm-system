<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;



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
Route::get('roles',[
   'middleware' => 'Role:editor',
   'uses' => 'PermissionController@Permission',
]);   
//Route::get('/roles' , [PermissionController::class,'Permission']);

Route::resource('/clients', ClientController::class);
//Route::get('/clients/{key}', ClientController::class,'edit');

Route::resource('/projects', ProjectController::class);
Route::resource('/tasks', TaksController::class);

