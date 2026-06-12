<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class LojaController extends Controller
{
    public function index(){
        try {
            $lojas = Auth::user()->lojas()->withCount('produtos')->latest()->paginate(10);
            return view('loja.index', compact('lojas'));
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao carregar lojas: ' . $e->getMessage());
        }
    }

    public function create(){
        return view('loja.create');
    }

    /*public function store(Request $request){
        try {
            $validated = $request->validate([
                'nome' => 'required|string|max:100',
                'email' => 'required|email|unique:lojas',
                'nif' => 'required|string|max:20|unique:lojas',
                'telefone' => 'nullable|string|max:20',
                'endereco' => 'nullable|string',
                'cidade' => 'nullable|string|max:50',
                'estado' => 'nullable|string|max:50',
                'pais' => 'nullable|string|max:50',
                'descricao' => 'nullable|string',
                'website' => 'nullable|url',
            ]);

            $validated['user_id'] = Auth::id();
            
            Loja::create($validated);

            return redirect()->route('lojas.index')->with('success', 'Loja criada com sucesso!');
            
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao criar loja: ' . $e->getMessage())->withInput();
        }
    }*/

    public function show($id){
        try {
            $loja = Loja::with('produtos')->findOrFail($id);
            
            // Verificar se a loja pertence ao usuário
            if ($loja->user_id !== Auth::id()) {
                return redirect()->route('lojas.index')->with('error', 'Loja não encontrada.');
            }
            
            // Estatísticas da loja
            $totalProdutos = $loja->produtos()->count();
            $valorTotalStock = $loja->produtos()->selectRaw('SUM(preco * quantidade) as total')->value('total') ?? 0;
            $produtosBaixoEstoque = $loja->produtos()->where('quantidade', '<=', 5)->count();
            
            return view('loja.show', compact('loja', 'totalProdutos', 'valorTotalStock', 'produtosBaixoEstoque'));
            
        } catch (Exception $e) {
            return redirect()->route('lojas.index')->with('error', 'Loja não encontrada.');
        }
    }

    public function edit($id){
        try {
            $loja = Loja::findOrFail($id);
            
            // Verificar se a loja pertence ao usuário
            if ($loja->user_id !== Auth::id()) {
                return redirect()->route('lojas.index')->with('error', 'Você não tem permissão para editar esta loja.');
            }
            
            return view('loja.edit', compact('loja'));
            
        } catch (Exception $e) {
            return redirect()->route('lojas.index')->with('error', 'Loja não encontrada.');
        }
    }

    /*public function update(Request $request, $id){
        try {
            $loja = Loja::findOrFail($id);
            
            // Verificar se a loja pertence ao usuário
            if ($loja->user_id !== Auth::id()) {
                return back()->with('error', 'Você não tem permissão para editar esta loja.');
            }
            
            $validated = $request->validate([
                'nome' => 'required|string|max:100',
                'email' => 'required|email|unique:lojas,email,' . $loja->id,
                'nif' => 'required|string|max:20|unique:lojas,nif,' . $loja->id,
                'telefone' => 'nullable|string|max:20',
                'endereco' => 'nullable|string',
                'cidade' => 'nullable|string|max:50',
                'estado' => 'nullable|string|max:50',
                'pais' => 'nullable|string|max:50',
                'descricao' => 'nullable|string',
                'website' => 'nullable|url',
                'ativo' => 'boolean',
            ]);
            
            $loja->update($validated);
            
            return redirect()->route('lojas.index')->with('success', 'Loja atualizada com sucesso!');
            
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao atualizar loja: ' . $e->getMessage())->withInput();
        }
    }*/

    public function destroy($id){
        try {
            $loja = Loja::findOrFail($id);
            
            // Verificar se a loja pertence ao usuário
            if ($loja->user_id !== Auth::id()) {
                return redirect()->route('lojas.index')->with('error', 'Você não tem permissão para excluir esta loja.');
            }
            
            // Verificar se a loja tem produtos
            if ($loja->produtos()->count() > 0) {
                return redirect()->route('lojas.index')->with('error', 'Não é possível excluir esta loja pois ela possui produtos. Remova os produtos primeiro.');
            }
            
            $loja->delete();
            
            return redirect()->route('lojas.index')->with('success', 'Loja removida com sucesso!');
            
        } catch (Exception $e) {
            return redirect()->route('lojas.index')->with('error', 'Erro ao remover loja: ' . $e->getMessage());
        }
    }

    public function store(StoreLojaRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['user_id'] = Auth::id();
            
            Loja::create($validated);

            return redirect()->route('lojas.index')->with('success', 'Loja criada com sucesso!');
            
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao criar loja: ' . $e->getMessage())->withInput();
        }
    }

    public function update(UpdateLojaRequest $request, $id)
    {
        try {
            $loja = Loja::findOrFail($id);
            
            if ($loja->user_id !== Auth::id()) {
                return back()->with('error', 'Você não tem permissão para editar esta loja.');
            }
            
            $loja->update($request->validated());
            
            return redirect()->route('lojas.index')->with('success', 'Loja atualizada com sucesso!');
            
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao atualizar loja: ' . $e->getMessage())->withInput();
        }
    }

}