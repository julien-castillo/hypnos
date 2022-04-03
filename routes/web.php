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

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get('/admin', [HotelController::class, "index"])->name('admin');

Route::get('/admin/create', [HotelController::class, "create"])->name("hotel.create");
Route::post('/admin/create', [HotelController::class, "store"])->name("hotel.add");
Route::get('/admin/{hotel}', [HotelController::class, "edit"])->name("hotel.edit");
Route::put('/admin/{hotel}', [HotelController::class, "update"])->name("hotel.update");
Route::delete('/admin/{hotel}', [HotelController::class, "delete"])->name("hotel.delete");


Route::get('/suites', [SuiteController::class, "index"])->name('suites');
Route::get('/details', [DetailController::class, "index"])->name('details');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
