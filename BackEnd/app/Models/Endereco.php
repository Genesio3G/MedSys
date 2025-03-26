<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    // Tabela associada
    protected $table = 'endereco';

    // Chave primária
    protected $primaryKey = 'enderecoID';

    // Auto-incremento ativado
    public $incrementing = true;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Atributos preenchíveis
    protected $fillable = [
        'rua',
        'numero',
        'bairro',
        'cidade',
        'email',
        'telefoneID',
        'municipioID',
    ];

    // Desabilitar timestamps se não existem na tabela
    public $timestamps = false;
}
