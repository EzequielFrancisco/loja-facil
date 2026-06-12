<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class ProdutosController extends Controller
{

    public function index(Request $request){
        
        try {
            $lojas = Auth::user()->lojas()->get();
            $query = Auth::user()->produtos()->with('loja');
            
            if ($request->filled('search')) {
                $query->where('nome', 'like', '%' . $request->search . '%');
            }
            
            if ($request->filled('loja')) {
                $query->where('loja_id', $request->loja);
            }
            
            switch ($request->get('ordenar')) {
                case 'nome_asc':
                    $query->orderBy('nome', 'asc');
                    break;
                case 'nome_desc':
                    $query->orderBy('nome', 'desc');
                    break;
                case 'preco_asc':
                    $query->orderBy('preco', 'asc');
                    break;
                case 'preco_desc':
                    $query->orderBy('preco', 'desc');
                    break;
                case 'quantidade_asc':
                    $query->orderBy('quantidade', 'asc');
                    break;
                case 'quantidade_desc':
                    $query->orderBy('quantidade', 'desc');
                    break;
                case 'antigos':
                    $query->orderBy('created_at', 'asc');
                    break;
                default:
                    $query->latest();
            }
            
            $produtos = $query->paginate(15);
            
            // CORREÇÃO AQUI - Estatísticas apenas do usuário autenticado
            $totalProdutos = Auth::user()->produtos()->count();
            
            $valorTotalStock = Auth::user()->produtos()
                ->selectRaw('SUM(preco * quantidade) as total')
                ->value('total') ?? 0;
            
            $produtosBaixoEstoque = Auth::user()->produtos()
                ->where('quantidade', '<=', 5)
                ->count();
                
            return view('produtos.index', compact('lojas', 'produtos', 'totalProdutos', 'valorTotalStock', 'produtosBaixoEstoque'));
            
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao carregar produtos: ' . $e->getMessage());
        }
    }

    public function create()
    {
        try {
            $lojas = Auth::user()->lojas()->get();
            
            if ($lojas->isEmpty()) {
                return redirect()->route('lojas.create')
                    ->with('error', 'Você precisa criar uma loja antes de adicionar produtos.');
            }
            
            return view('produtos.create', compact('lojas'));
            
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao carregar formulário: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nome' => 'required|string|max:255',
                'loja_id' => 'required|exists:lojas,id',
                'preco' => 'required|numeric|min:0',
                'quantidade' => 'required|integer|min:0',
                'categoria' => 'nullable|string|max:100',
                'sku' => 'nullable|string|unique:produtos,sku',
                'descricao' => 'nullable|string',
            ]);
            
            $loja = Loja::findOrFail($validated['loja_id']);
            if ($loja->user_id !== Auth::id()) {
                return back()->with('error', 'Você não tem permissão para adicionar produtos nesta loja.');
            }
            
            Produtos::create($validated);
            
            return redirect()->route('produtos.index')
                ->with('success', 'Produto cadastrado com sucesso!');
                
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao cadastrar produto: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show($id)
    {
        try {
            $produto = Produtos::with('loja')->findOrFail($id);
            
            // Verificar se o produto pertence ao usuário
            if ($produto->loja->user_id !== Auth::id()) {
                return redirect()->route('produtos.index')
                    ->with('error', 'Produto não encontrado.');
            }
            
            return view('produtos.show', compact('produto'));
            
        } catch (Exception $e) {
            return redirect()->route('produtos.index')
                ->with('error', 'Produto não encontrado.');
        }
    }

    public function edit($id)
    {
        try {
            $produto = Produtos::findOrFail($id);
            
            // Verificar se o produto pertence ao usuário
            if ($produto->loja->user_id !== Auth::id()) {
                return redirect()->route('produtos.index')
                    ->with('error', 'Você não tem permissão para editar este produto.');
            }
            
            $lojas = Auth::user()->lojas()->get();
            
            return view('produtos.edit', compact('produto', 'lojas'));
            
        } catch (Exception $e) {
            return redirect()->route('produtos.index')
                ->with('error', 'Produto não encontrado.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $produto = Produtos::findOrFail($id);
            
            // Verificar se o produto pertence ao usuário
            if ($produto->loja->user_id !== Auth::id()) {
                return back()->with('error', 'Você não tem permissão para editar este produto.');
            }
            
            $validated = $request->validate([
                'nome' => 'required|string|max:255',
                'loja_id' => 'required|exists:lojas,id',
                'preco' => 'required|numeric|min:0',
                'quantidade' => 'required|integer|min:0',
                'categoria' => 'nullable|string|max:100',
                'sku' => 'nullable|string|unique:produtos,sku,' . $produto->id,
                'descricao' => 'nullable|string',
            ]);
            
            $loja = Loja::findOrFail($validated['loja_id']);
            if ($loja->user_id !== Auth::id()) {
                return back()->with('error', 'Loja inválida.');
            }
            
            $produto->update($validated);
            
            return redirect()->route('produtos.index')
                ->with('success', 'Produto atualizado com sucesso!');
                
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao atualizar produto: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $produto = Produtos::findOrFail($id);
            
            // Verificar se o produto pertence ao usuário
            if ($produto->loja->user_id !== Auth::id()) {
                return redirect()->route('produtos.index')
                    ->with('error', 'Você não tem permissão para excluir este produto.');
            }
            
            $produto->delete();
            
            return redirect()->route('produtos.index')
                ->with('success', 'Produto removido com sucesso!');
                
        } catch (Exception $e) {
            return redirect()->route('produtos.index')
                ->with('error', 'Erro ao remover produto: ' . $e->getMessage());
        }
    }
}