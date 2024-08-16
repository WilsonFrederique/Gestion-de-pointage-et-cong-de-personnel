<?php

use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ListesControllers;
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
    return view('accueil.index');
})->name('Accuel');

Route::prefix('auth')->name('auth.')->group(function() {
    Route::get('login', [AuthentificationController::class, 'login'])
        ->middleware('guest')
        ->name('login');

    Route::delete('logout', [AuthentificationController::class, 'logout'])
        ->middleware('auth')
        ->name('logout');

    Route::post('login', [AuthentificationController::class, 'verification'])->name('verification');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::resource('employes', EmployeController::class);

    // Ajout de la route pour la méthode listes
    Route::get('listes', [EmployeController::class, 'listes'])->name('listes');

    // Ajout de la route pour la méthode listesENC
    Route::get('listes.non.conge', [EmployeController::class, 'listesENC'])->name('listes_non_conge');

    // Ajout de la route pour la méthode listeProfils
    Route::get('listes.profils', [EmployeController::class, 'indexProfil'])->name('listes_profils');


    Route::resource('pointages', PointageController::class);

    // presences
    Route::get('pointages.presences', [PointageController::class, 'presence'])->name('pointages_presences');

    // absences
    Route::get('pointages.absences', [PointageController::class, 'absence'])->name('pointages_absences');

    Route::resource('conges', CongeController::class);
});

// Route::prefix('admin')->name('admin.')->group(function() {
//     Route::resource('pointages', PointageController::class);

//     // presences
//     Route::get('pointages.presences', [PointageController::class, 'presence'])->name('pointages_presences');

//     // absences
//     Route::get('pointages.absences', [PointageController::class, 'absence'])->name('pointages_absences');
// });

// Route::prefix('admin')->name('admin.')->group(function() {
//     Route::resource('conges', CongeController::class);
// });

// Route::controller(EmployeController::class)->group(function () {
//     Route::get('/home/employes', 'index');
//     Route::get('/home/employes', 'create');
//     Route::get('/home/employes/:id', 'show');
//     Route::post('/home/employes', 'store');
//     Route::get('/home/employes/:id', 'edit');
//     Route::put('/home/employes/:id', 'update');
//     Route::delete('/home/employes', 'destroy');
// });
