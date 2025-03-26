<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilizador extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'utilizador';

    // A chave primária
    protected $primaryKey = 'utilizadorID';

    // Desativando o auto-incremento (porque é personalizado)
    public $incrementing = false;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Colunas que podem ser preenchidas
    protected $fillable = [
        'utilizadorID',
        'nomeUtilizador',
    ];

    // Desabilita timestamps, pois a tabela não contém `created_at` e `updated_at`
    public $timestamps = false;
}
