<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
});

// Rotas para Lojas
Route::resource('lojas', LojaController::class);
Route::get('lojas', [LojaController::class, 'index'])->name('lojas.index');
Route::get('lojas/create', [LojaController::class, 'create'])->name('lojas.create');
Route::get('lojas/{loja}', [LojaController::class, 'show'])->name('lojas.show');
Route::post('lojas', [LojaController::class, 'store'])->name('lojas.store');
Route::put('lojas/{loja}', [LojaController::class, 'update'])->name('lojas.update');
Route::delete('lojas/{loja}', [LojaController::class, 'destroy'])->name('lojas.destroy');

// Rotas para Produtos
Route::resource('produtos', ProdutoController::class);
Route::get('produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
Route::get('produtos/{produto}', [ProdutoController::class, 'show'])->name('produtos.show');
Route::post('produtos', [ProdutoController::class, 'store'])->name('produtos.store');
Route::put('produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');
Route::delete('produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');

require __DIR__.'/auth.php';
