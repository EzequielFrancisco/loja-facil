<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreLojaRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:100',
            'email' => 'required|email|unique:lojas,email',
            'nif' => 'required|string|max:20|unique:lojas,nif',
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string',
            'cidade' => 'nullable|string|max:50',
            'estado' => 'nullable|string|max:50',
            'pais' => 'nullable|string|max:50',
            'descricao' => 'nullable|string',
            'website' => 'nullable|url',
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
            'telefone.required' => 'O telefone é obrigatório.',
            'endereco.required' => 'O endereço é obrigatório.',
        ];
    }
}