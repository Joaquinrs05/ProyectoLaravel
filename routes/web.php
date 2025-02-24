<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [HomeController::class, 'home'])->name('home');

// Rutas de autenticación (no protegidas)
require __DIR__.'/auth.php';

// Grupo de rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
    Route::get('/catalog/show/{id}', [CatalogController::class, 'show'])->name('catalog.show');
    Route::get('/catalog/create', [CatalogController::class, 'create'])->name('catalog.create');
    Route::get('/catalog/edit/{id}', [CatalogController::class, 'edit'])->name('catalog.edit');
    Route::put('/catalog/update/{id}', [CatalogController::class, 'update'])->name('catalog.update');

    //Rutas funcionales
    Route::put('/catalog/update/{id}', [CatalogController::class, 'putEdit'])->name('catalog.update');
    Route::post('catalog/create', [CatalogController::class, 'postCreate'])->name('catalog.create');
    Route::put('catalog/rent/{id}', [CatalogController::class, 'rent'])->name('catalog.rent');
    Route::put('/catalog/return/{id}', [CatalogController::class, 'return'])->name('catalog.return');
    Route::delete('catalog/delete/{id}', [CatalogController::class, 'delete'])->name('catalog.delete');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
