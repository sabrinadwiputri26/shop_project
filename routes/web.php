<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
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


Route::get('/login',[ShopController::class, 'login'])->name('login');
Route::post('auth',[ShopController::class, 'auth'])->name('auth');
Route::middleware('isLogin')->group(function(){
    Route::get('/',[ShopController::class, 'home']);
    Route::get('/create',[ShopController::class, 'create']);
    Route::post('/kirim-data',[ShopController::class, 'store'])->name('kirim_data');
    Route::get('/data',[ShopController::class, 'data']); 
    Route::get('/create',[ShopController::class, 'create']); 
    Route::post('/store',[ShopController::class, 'store']);
    Route::get('/delete/{id}',[ShopController::class, 'destroy'])->name('delete');
    Route::get('/edit/{id}',[ShopController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}',[ShopController::class, 'update'])->name('update');
    Route::get('/dashboard',[ShopController::class, 'home'])->name('dashboard');
    Route::get('/logout',[ShopController::class, 'logout'])->name('logout');
});
