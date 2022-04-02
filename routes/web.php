<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\SuiteController;
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

Route::get('/', [HotelController::class, "index"])->name('home');
Route::get('/suites', [SuiteController::class, "index"])->name('suites');
Route::get('/details', [DetailController::class, "index"])->name('details');
