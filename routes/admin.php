<?php
use \Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PanelController;

//product
Route::prefix('/admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [PanelController::class, 'index'])->name('admin.dashboard');


    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::patch('/product/', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/', [ProductController::class, 'delete'])->name('product.delete');
});
