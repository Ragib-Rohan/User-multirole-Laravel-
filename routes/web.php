<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();
// Route::get('/', [UserController::class,'index']);
Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>['auth', 'roles:admin,user']],function(){
    Route::get('/create', [UserController::class,'create']);
    Route::resource('users',UserController::class);

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
