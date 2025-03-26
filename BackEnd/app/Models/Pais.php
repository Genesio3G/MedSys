<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'pais';

    // A chave primária
    protected $primaryKey = 'paisID';

    // Ativando auto-incremento
    public $incrementing = true;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Colunas que podem ser preenchidas
    protected $fillable = [
        'nomePais',
    ];

    // Desabilita timestamps, pois a tabela não possui `created_at` e `updated_at`
    public $timestamps = false;
}
