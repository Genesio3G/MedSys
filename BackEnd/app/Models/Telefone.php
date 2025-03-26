<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'telefone';

    // A chave primária
    protected $primaryKey = 'telefoneID';

    // Ativando auto-incremento
    public $incrementing = true;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Colunas que podem ser preenchidas
    protected $fillable = [
        'numeroTelefone',
        'tipoTelefone',
    ];

    // Desabilita timestamps, pois a tabela não contém `created_at` e `updated_at`
    public $timestamps = false;
}
