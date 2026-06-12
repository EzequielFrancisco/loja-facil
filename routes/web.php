<?php

use Illuminate\Support\Facades\Route;
use App\Models\Loja;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\ProdutosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $userId = auth()->id();

    $totalLojas = Loja::where('user_id', $userId)->count();

    $totalProdutos = auth()->user()->produtos()->count();

    $valorTotalStock = auth()->user()
        ->produtos()
        ->selectRaw('SUM(preco * quantidade) as total')
        ->value('total') ?? 0;

    $ultimosProdutos = auth()->user()
        ->produtos()
        ->with('loja')
        ->latest()
        ->limit(5)
        ->get();

    $ultimasLojas = Loja::where('user_id', $userId)
        ->withCount('produtos')
        ->latest()
        ->limit(3)
        ->get();

    $lojas = Loja::where('user_id', $userId)
        ->withCount('produtos')
        ->get();

    $lojasNomes = $lojas->pluck('nome');
    $produtosCount = $lojas->pluck('produtos_count');

    return view('dashboard', compact(
        'totalLojas',
        'totalProdutos',
        'valorTotalStock',
        'ultimosProdutos',
        'ultimasLojas',
        'lojasNomes',
        'produtosCount'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Lojas
    Route::resource('lojas', LojaController::class);

    // Produtos
    Route::resource('produtos', ProdutosController::class);
});

require __DIR__.'/auth.php';