<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CategoryController;

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
    return view('admin.layout');
});
Route::prefix('admin')->group(function () {
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::patch('/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
        Route::get('/status/{id}', [CategoryController::class, 'status'])->name('admin.category.status');
        Route::get('/hot/{id}', [CategoryController::class, 'hot'])->name('admin.category.hot');
    });
});
