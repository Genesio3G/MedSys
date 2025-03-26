<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmacia extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'farmacia';

    // A chave primária
    protected $primaryKey = 'licenca';

    // Desativando auto-incremento (porque licenca não é inteiro auto-incrementável)
    public $incrementing = false;

    // Tipo da chave primária
    protected $keyType = 'string';

    // Colunas que podem ser preenchidas
    protected $fillable = [
        'licenca',
        'nomeFarmacia',
        'endereco',
    ];

    // Desabilita timestamps (caso não existam colunas `created_at` e `updated_at` na tabela)
    public $timestamps = false;
}
