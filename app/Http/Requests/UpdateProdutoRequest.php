<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProdutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $produto = $this->route('produto');
        return Auth::check() && $produto && $produto->loja->user_id === Auth::id();
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $produtoId = $this->route('produto')->id ?? 'NULL';
        
        return [
            'nome' => 'required|string|max:255',
            'loja_id' => 'required|exists:lojas,id',
            'preco' => 'required|numeric|min:0.01',
            'quantidade' => 'required|integer|min:0',
            'categoria' => 'nullable|string|max:100',
            'sku' => 'nullable|string|unique:produtos,sku,' . $produtoId,
            'descricao' => 'nullable|string',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do produto é obrigatório.',
            'loja_id.required' => 'Selecione uma loja.',
            'loja_id.exists' => 'A loja selecionada não existe.',
            'preco.required' => 'O preço é obrigatório.',
            'preco.min' => 'O preço deve ser maior que zero.',
            'quantidade.required' => 'A quantidade é obrigatória.',
            'quantidade.min' => 'A quantidade não pode ser negativa.',
            'sku.unique' => 'Este SKU já está em uso.',
        ];
    }
}