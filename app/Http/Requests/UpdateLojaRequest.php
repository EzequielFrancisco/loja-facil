<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateLojaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $loja = $this->route('loja');
        return Auth::check() && $loja && $loja->user_id === Auth::id();
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $lojaId = $this->route('loja')->id ?? 'NULL';
        
        return [
            'nome' => 'required|string|max:100',
            'email' => 'required|email|unique:lojas,email,' . $lojaId,
            'nif' => 'required|string|max:20|unique:lojas,nif,' . $lojaId,
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string',
            'cidade' => 'nullable|string|max:50',
            'estado' => 'nullable|string|max:50',
            'pais' => 'nullable|string|max:50',
            'descricao' => 'nullable|string',
            'website' => 'nullable|url',
            'ativo' => 'boolean',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'nome.required' => 'O nome da loja é obrigatório.',
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'Digite um endereço de e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado.',
            'nif.required' => 'O NIF é obrigatório.',
            'nif.unique' => 'Este NIF já está cadastrado.',
        ];
    }
}