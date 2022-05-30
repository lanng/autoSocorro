<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use \App\Http\Controllers\ServiceController;
use \App\Http\Controllers\DriverController;
use \App\Http\Controllers\PlateController;
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

Route::redirect('/', '/login');
Route::get('/contact', function (){
    return view('site.contact', ['title' => 'Contato']);
})->name('site.contact');

Route::get('/login/{error?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'loginAuth'])->name('site.login');

Route::prefix('app')->middleware('authLogin')->group(function (){
    Route::get('/home', function () { return view('app.home', ['title' => 'Home']); })->name('app.home');
    Route::get('/logout', [LoginController::class, 'logout'])->name('app.logout');
    Route::get('/services', [ServiceController::class, 'index'])->name('app.services');

    Route::get('/drivers', [DriverController::class, 'listDrivers'])->name('app.drivers');
    Route::get('/driver/register', [DriverController::class, 'register'])->name('app.driver-register');
    Route::post('/drivers', [DriverController::class, 'createDriver'])->name('app.drivers.create');
    Route::get('/driver/edit/{id}', [DriverController::class, 'edit'])->name('app.driver.edit');
    Route::post('/driver/edit/{id}', [DriverController::class, 'update'])->name('app.driver.update');
    Route::get('/driver/delete/{id}', [DriverController::class, 'delete'])->name('app.driver.delete');


    Route::get('/plates', [PlateController::class, 'listPlates'])->name('app.plates');
    Route::get('/plates/register', [PlateController::class, 'register'])->name('app.plates-register');
    Route::post('/plates', [PlateController::class, 'createPlate'])->name('app.plates.create');
    Route::get('/plate/edit/{id}', [PlateController::class, 'edit'])->name('app.plate.edit');
    Route::post('/plate/edit/{id}', [PlateController::class, 'update'])->name('app.plate.update');
    Route::get('/plate/delete/{id}', [PlateController::class, 'delete'])->name('app.plate.delete');

});
