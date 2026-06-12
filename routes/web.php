<?php

use App\Models\Loja;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $userId = auth()->id();
    $totalLojas = Loja::where('user_id', $userId)->count();
    $totalProdutos = Auth::user()->produtos()->count();
    $valorTotalStock = Auth::user()->produtos()->selectRaw('SUM(preco * quantidade) as total')->value('total') ?? 0;

    return view('dashboard', compact('totalLojas','totalProdutos', 'valorTotalStock'));

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
Route::resource('produtos', ProdutosController::class);
Route::get('produtos', [ProdutosController::class, 'index'])->name('produtos.index');
Route::get('produtos/create', [ProdutosController::class, 'create'])->name('produtos.create');
Route::get('produtos/{produto}', [ProdutosController::class, 'show'])->name('produtos.show');
Route::post('produtos', [ProdutosController::class, 'store'])->name('produtos.store');
Route::put('produtos/{produto}', [ProdutosController::class, 'update'])->name('produtos.update');
Route::delete('produtos/{produto}', [ProdutosController::class, 'destroy'])->name('produtos.destroy');

require __DIR__.'/auth.php';
