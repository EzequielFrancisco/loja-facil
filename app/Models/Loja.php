<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loja extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'nif',
        'telefone',
        'endereco',
        'cidade',
        'estado',
        'cep',
        'pais',
        'descricao',
        'logo',
        'website',
        'ativo',
        'user_id'
    ];

    protected $casts = [
        'ativo' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relacionamento com usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento com produtos
    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }

    // Scope para lojas ativas
    public function scopeAtivo($query)
    {
        return $query->where('ativo', true);
    }

    // Scope para lojas de um usuário específico
    public function scopeDoUsuario($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    // Acessor para endereço completo
    public function getEnderecoCompletoAttribute()
    {
        $enderecoCompleto = [];

        if ($this->endereco) {
            $enderecoCompleto[] = $this->endereco;
        }
        if ($this->cidade) {
            $enderecoCompleto[] = $this->cidade;
        }
        if ($this->estado) {
            $enderecoCompleto[] = $this->estado;
        }
        if ($this->cep) {
            $enderecoCompleto[] = $this->cep;
        }
        if ($this->pais) {
            $enderecoCompleto[] = $this->pais;
        }

        return implode(', ', $enderecoCompleto);
    }

    // Acessor para NIF formatado
    public function getNifFormatadoAttribute()
    {
        // Formata o NIF conforme necessário (ex: 00.000.000/0000-00)
        $nif = preg_replace('/[^0-9]/', '', $this->nif);
        
        if (strlen($nif) === 14) {
            return preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $nif);
        }
        
        return $this->nif;
    }
}