<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
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

Route::get('/', [IndexController::class, 'showIndex'])->name('welcome');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify' => true]);

// Route::resource('user', UserController::class);


Route::get('/user/profile',  [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit-profile');

Route::put('user/profile', [App\Http\Controllers\UserController::class, 'update'])->name('user.update-profile'); 

Route::get('/annonces', [App\Http\Controllers\AnnonceController::class, 'index'])->name('ad.index');
Route::get('/annonce', [App\Http\Controllers\AnnonceController::class, 'create'])->name('ad.create');
Route::post('/annonce/create', [App\Http\Controllers\AnnonceController::class, 'store'])->name('ad.store');
Route::post('/search', [App\Http\Controllers\AnnonceController::class, 'search'])->name('ad.search');
    
Route::get('/message/{seller_id}/{ad_id}',[App\Http\Controllers\MessageController::class, 'create'])->name('message.create');
Route::post('/message',[App\Http\Controllers\MessageController::class, 'store'])->name('message.store');


