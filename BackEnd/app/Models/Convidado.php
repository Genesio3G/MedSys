<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convidado extends Model
{
    use HasFactory;

    protected $primaryKey = 'ConvidadoID'; // Define a chave primária
    public $incrementing = true; // Indica que a chave primária é auto-incremento
    protected $keyType = 'int'; // Tipo da chave primária

    protected $fillable = [
        'DadosPessoaisID',
    ];

    // Relacionamento com a tabela DadosPessoais
    public function dadosPessoais()
    {
        return $this->belongsTo(DadosPessoais::class, 'DadosPessoaisID', 'DadosPessoaisID');
    }
}