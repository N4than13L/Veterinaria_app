<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\ClientController;

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
Route::get('/changepassword/{id}', [UserController::class, 'change'])->name('user.change');
Route::post('/savechangepassword/{id}', [UserController::class, 'change_password'])->name('user.change_password');

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


// animales.
Route::get('/animals/index', [AnimalsController::class, 'index'])->name('animals.index');
Route::get('/animals/add', [AnimalsController::class, 'add'])->name('animals.add');
Route::post('/animals/save', [AnimalsController::class, 'save'])->name('animals.save');
Route::get('/animals/edit/{id}', [AnimalsController::class, 'edit'])->name('animals.edit');
Route::post('/animals/update/{id}', [AnimalsController::class, 'update'])->name('animals.update');
Route::get('/animals/delete/{id}', [AnimalsController::class, 'delete'])->name('animals.delete');

// tratamiento.
Route::get('/treatment/index', [TreatmentController::class, 'index'])->name('treatment.index');
Route::get('/treatment/add', [TreatmentController::class, 'add'])->name('treatment.add');
Route::post('/treatment/save', [TreatmentController::class, 'save'])->name('treatment.save');
Route::get('/treatment/edit/{id}', [TreatmentController::class, 'edit'])->name('treatment.edit');
Route::post('/treatment/update/{id}', [TreatmentController::class, 'update'])->name('treatment.update');
Route::get('/treatment/delete/{id}', [TreatmentController::class, 'delete'])->name('treatment.delete');

// clientes.
Route::get('/client/index', [ClientController::class, 'index'])->name('client.index');
Route::get('/client/add', [ClientController::class, 'add'])->name('client.add');
Route::post('/client/save', [ClientController::class, 'save'])->name('client.save');

Route::get('/client/edit/{id}', [ClientController::class, 'edit'])->name('client.edit');

Route::post('/client/update/{id}', [ClientController::class, 'update'])->name('client.update');

Route::get('/client/delete/{id}', [ClientController::class, 'delete'])->name('client.delete');
