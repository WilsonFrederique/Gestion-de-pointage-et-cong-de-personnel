<?php

use App\Http\Controllers\EmployeController;
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

Route::get('/employes', [EmployeController::class, 'index'])->name('app_employe');

Route::get('/ajoutEmploye', function () {
    return view('CRUD.ajoutEmploye');
})->name('app_create');

Route::get('/pointage', function () {
    return view('home.pointage');
})->name('app_pointage');

Route::get('/conge', function () {
    return view('home.conge');
})->name('app_conge');


// Route::controller(EmployeController::class)->group(function () {
//     Route::get('/home/employes', 'index');
//     Route::get('/home/employes', 'create');
//     Route::get('/home/employes/:id', 'show');
//     Route::post('/home/employes', 'store');
//     Route::get('/home/employes/:id', 'edit');
//     Route::put('/home/employes/:id', 'update');
//     Route::delete('/home/employes', 'destroy');
// });
