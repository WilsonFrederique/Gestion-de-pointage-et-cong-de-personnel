<?php

use App\Http\Controllers\CongeController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\PointageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('base');
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('employes', EmployeController::class);
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('pointages', PointageController::class);
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('conges', CongeController::class);
});

// Route::controller(EmployeController::class)->group(function () {
//     Route::get('/home/employes', 'index');
//     Route::get('/home/employes', 'create');
//     Route::get('/home/employes/:id', 'show');
//     Route::post('/home/employes', 'store');
//     Route::get('/home/employes/:id', 'edit');
//     Route::put('/home/employes/:id', 'update');
//     Route::delete('/home/employes', 'destroy');
// });
