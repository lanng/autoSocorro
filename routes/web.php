<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use \App\Http\Controllers\ServiceController;
use \App\Http\Controllers\DriverController;

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
    Route::get('/drivers', [DriverController::class, 'index'])->name('app.drivers');
    Route::post('/drivers', [DriverController::class, 'createDriver'])->name('app.drivers.create');
});
