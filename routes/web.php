<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PublicController;
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

Route::get('/', [HomeController::class, "index"])->name('home');


Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::get('', [HotelController::class, "index"])->name('index');

    Route::name('adminContact.')->prefix('adminContact')->group(function () {
        Route::get('', [ContactController::class, "index"])->name('index');
        Route::delete('{contact}', [ContactController::class, "delete"])->name('delete');
    });

    Route::name('hotel.')->prefix('hotel')->group(function () {
        Route::get('create', [HotelController::class, "create"])->name("create");
        Route::post('create', [HotelController::class, "store"])->name("store");
        Route::get('{hotel}', [HotelController::class, "edit"])->name("edit");
        Route::put('{hotel}', [HotelController::class, "update"])->name("update");
        Route::delete('{hotel}', [HotelController::class, "delete"])->name("delete");
    });
});

Route::name('manager.')->prefix('manager')->middleware('auth')->group(function () {
    Route::get('', [SuiteController::class, "index"])->name('index');

    Route::name('suite.')->prefix('suite')->group(function () {
        Route::get('create', [SuiteController::class, "create"])->name("create");
        Route::post('create', [SuiteController::class, "store"])->name("store");
        Route::get('{suite}', [SuiteController::class, "edit"])->name("edit");
        Route::put('{suite}', [SuiteController::class, "update"])->name("update");
        Route::delete('{suite}', [SuiteController::class, "delete"])->name("delete");
//        Route::delete('deleteimage/{id}', [SuiteController::class, "deleteimage"])->name("destroyimage");
//        Route::delete('{suite}', [SuiteController::class, "destroy"])->name("destroy");
    });

});

Route::get('/booking', [PublicController::class, "booking"])->name('booking');


Route::get('/hotel/{hotel}/suites', [PublicController::class, "suites"])->name('suites');
Route::get('/hotel/{hotel}/suites/{suite}', [PublicController::class, "suite"])->name('details');

Route::get('/contact', [PublicController::class, "contact"])->name('contact');

Route::name('contact.')->prefix('contact')->group(function () {
    Route::post('store', [ContactController::class, "store"])->name('store');

});


Auth::routes();
