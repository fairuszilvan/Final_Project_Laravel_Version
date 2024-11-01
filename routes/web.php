<?php

use App\Http\Controllers\DefectaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WarehouseController;
use App\Models\Defecta;
use App\Models\DefectaDetails;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/defecta', [DefectaController::class, 'index'])->name('defecta.index');
    Route::get('/defecta/add', [DefectaController::class, 'add'])->name('defecta.add');
    Route::get('/defecta/edit/{id}', [DefectaController::class, 'edit'])->name('defecta.edit');
    Route::get('/defecta/show', [DefectaController::class, 'show'])->name('defecta.show');
    Route::post('/defecta/store', [DefectaController::class, 'store'])->name('defecta.store');
    Route::delete('/defecta/destroy/{id}', [DefectaController::class, 'destroy'])->name('defecta.destroy');
    Route::put('/defecta/edit/update/{id}', [DefectaController::class, 'update'])->name('defecta.update');

    Route::get('/warehouse', [WarehouseController::class, 'index'])->name('warehouse.index');
    Route::get('/warehouse/add', [WarehouseController::class, 'add'])->name('warehouse.add');
    Route::get('/warehouse/edit/{id}', [WarehouseController::class, 'edit'])->name('warehouse.edit');
    Route::get('/warehouse/show/{id}', [WarehouseController::class, 'show'])->name('warehouse.show');
    Route::post('/warehouse/store', [WarehouseController::class, 'store'])->name('warehouse.store');
    Route::delete('/warehouse/destroy/{id}', [WarehouseController::class, 'destroy'])->name('warehouse.destroy');
    Route::put('/warehouse/edit/update/{id}', [WarehouseController::class, 'update'])->name('warehouse.update');
});

require __DIR__.'/auth.php';
