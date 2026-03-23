<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoreController;

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


Route::get('/', action: [HomeController::class, 'home'])->name('home');
Route::get('/store-location', [StoreController::class, 'storelocation'])->name('store.location');
Route::get('/store-location/{slug}', [StoreController::class, 'show'])
     ->name('locations.show');
Route::post('/exclusive-deal', [StoreController::class, 'store'])->name('exclusive_deal.store');