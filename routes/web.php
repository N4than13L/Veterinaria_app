<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\VaccineController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// configuracion de usuario
Route::get('/settings', [UserController::class, 'settings'])->name('settings');
Route::post('/user/update', [UserController::class, 'update'])->name('user.update');

// agregar vacunas.
Route::get('/vaccines', [VaccineController::class, 'index'])->name('vaccine.index');
Route::get('/vaccines/add', [VaccineController::class, 'add'])->name('vaccine.add');
Route::post('/vaccines/save', [VaccineController::class, 'save'])->name('vaccine.save');
Route::get('/vaccines/delete/{id}', [VaccineController::class, 'delete'])->name('vaccine.delete');

Route::get('/vaccines/edit/{id}', [VaccineController::class, 'edit'])->name('vaccine.edit');

Route::post('/vaccines/update/{id}', [VaccineController::class, 'update'])->name('vaccine.update');


// species.
Route::get('/species', [SpeciesController::class, 'index'])->name('species.index');
Route::get('/species/add', [SpeciesController::class, 'add'])->name('species.add');
Route::post('/species/save', [SpeciesController::class, 'save'])->name('species.save');
Route::get('/species/delete/{id}', [SpeciesController::class, 'delete'])->name('species.delete');
Route::get('/species/edit/{id}', [SpeciesController::class, 'edit'])->name('species.edit');
Route::post('/species/edit/{id}', [SpeciesController::class, 'update'])->name('species.update');
