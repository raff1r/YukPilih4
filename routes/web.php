<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\UserController;


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

Route::middleware('guest')->group(function(){
    Route::get('/login',[AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login',[AuthController::class,'login']);
    Route::get('/register',[Authcontroller::class, 'showRegisterForm']);
    Route::post('/register',[AuthController::class, 'register']);
});
Route::middleware('auth')->group(function(){
    Route::get('/changepassword',[AuthController::class, 'showChangePass']);
    Route::post('/changepassword',[AuthController::class, 'changePass']);
    Route::get('/logout',[AuthController::class,'logout']);

    Route::get('/',[VoteController::class,'index']);
    Route::post('/',[VoteController::class,'voting'])->middleware('role:user');

    Route::middleware('role:admin')->group(function(){
        // DIVISION
        Route::get('/division',[DivisionController::class, 'index']);
        Route::get('/division/create',[DivisionController::class, 'create']);
        Route::post('/division/store',[DivisionController::class, 'store']);
        Route::get('/division/edit/{id}',[DivisionController::class, 'edit']);
        Route::post('/division/update/{id}',[DivisionController::class, 'update']);
        Route::get('/division/delete/{id}',[DivisionController::class, 'destroy']);

        // POLLING
        Route::get('/poll',[PollController::class, 'index']);
        Route::get('/poll/create',[PollController::class, 'create']);
        Route::post('/poll/store',[PollController::class, 'store']);
        Route::get('/poll/edit/{id}',[PollController::class, 'edit']);
        Route::post('/poll/update/{id}',[PollController::class, 'update']);
        Route::get('/poll/delete/{id}',[PollController::class, 'destroy']);

        // USER
        Route::get('/user',[UserController::class, 'index']);
        Route::get('/user/create',[UserController::class, 'create']);
        Route::post('/user/store',[UserController::class, 'store']);
        Route::get('/user/edit/{id}',[UserController::class, 'edit']);
        Route::post('/user/update/{id}',[UserController::class, 'update']);
        Route::get('/user/delete/{id}',[UserController::class, 'destroy']);
    });
});