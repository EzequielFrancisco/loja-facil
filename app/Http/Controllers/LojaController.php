<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LojaController extends Controller
{
    public function index(){

        try {
            $lojas = Loja::all(); //Auth::user()->lojas()->withCount('produtos')->latest()->paginate(10);
        } catch (Exception $e) {
            dd('Algo correu mal :(',$e);
        }
        return view('loja.index', compact('lojas'));
    }

    public function create(){
        return view('loja.create');
    }

    public function store(Request $request)
    {
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
    }
}
