<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartaoCredito extends Model
{
    use HasFactory;

    protected $primaryKey = 'CartaoID'; // Define a chave primária
    public $incrementing = true; // Indica que a chave primária é auto-incremento
    protected $keyType = 'int'; // Tipo da chave primária

    protected $fillable = [
        'NumeroCartao',
        'DataExpiracao',
        'CVV',
        'ConvidadoID',
        'TipoID',
    ];

    // Relacionamento com a tabela Convidado
    public function convidado()
    {
        return $this->belongsTo(Convidado::class, 'ConvidadoID', 'ConvidadoID');
    }

    // Relacionamento com a tabela TipoCartaoCredito
    public function tipoCartao()
    {
        return $this->belongsTo(TipoCartaoCredito::class, 'TipoID', 'TipoID');
    }
}