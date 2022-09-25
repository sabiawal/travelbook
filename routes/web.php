<?php

use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/', [App\Http\Controllers\PagesController::class, 'welcome'])->name('welcome');

Route::get('/admin', [App\Http\Controllers\PagesController::class, 'admin'])->name('admin');

Route::get('/destination', [App\Http\Controllers\DestinationController::class, 'destination'])->name('destination');

Route::post('/destination/create', [DestinationController::class,'create'] )->name('destination.create');

Route::get('/destination/delete/{id}', [DestinationController::class,'delete'] )->name('destination.delete');

Route::post('/destination/edit/{id}', [DestinationController::class,'edit'])->name('destination.edit');

Route::resource('message','App\Http\Controllers\PagesController');

Route::resource('index','App\Http\Controllers\BookingController');

Route::resource('book','App\Http\Controllers\BookingController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



