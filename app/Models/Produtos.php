<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'loja_id',
        'preco',
        'quantidade',
        'categoria',
        'sku',
        'descricao',
        'foto',
    ];

    protected $casts = [
        'preco' => 'decimal:2',
        'quantidade' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relacionamento com loja
    public function loja()
    {
        return $this->belongsTo(Loja::class);
    }
}