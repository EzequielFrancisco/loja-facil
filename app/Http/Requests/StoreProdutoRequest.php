<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProdutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'loja_id' => 'required|exists:lojas,id',
            'preco' => 'required|numeric|min:0.01',
            'quantidade' => 'required|integer|min:0',
            'categoria' => 'nullable|string|max:100',
            'sku' => 'nullable|string|unique:produtos,sku',
            'descricao' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
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
            'foto.image' => 'O arquivo deve ser uma imagem.',
            'foto.mimes' => 'Formatos permitidos: JPG, JPEG, PNG, WEBP.',
            'foto.max' => 'A imagem não pode exceder 2MB.',
        ];
    }
}