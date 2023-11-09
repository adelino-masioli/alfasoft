<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ContactController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/persons', [PersonController::class, 'index'])->name('persons.index');
    Route::get('/persons/create', [PersonController::class, 'create'])->name('persons.create');
    Route::post('/persons', [PersonController::class, 'store'])->name('persons.store');
    Route::get('/persons/{person}/show', [PersonController::class, 'show'])->name('persons.show');
    Route::get('/persons/{person}/edit', [PersonController::class, 'edit'])->name('persons.edit');
    Route::put('/persons/{person}', [PersonController::class, 'update'])->name('persons.update');
    Route::delete('/persons/{id}', [PersonController::class, 'destroy'])->name('persons.destroy');

    Route::get('/contacts/{person}/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('/contacts/{person}/store', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::get('/countries', [ContactController::class, 'getAllCountries'])->name('contacts.countries');
    Route::get('/countries/{name}', [ContactController::class, 'getCountry'])->name('contacts.country');
});

require __DIR__.'/auth.php';
