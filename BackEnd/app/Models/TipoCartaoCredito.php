<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCartaoCredito extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'tipocartaocredito';

    // A chave primária
    protected $primaryKey = 'TipoID';

    // Ativando auto-incremento (neste caso desativado devido à estrutura)
    public $incrementing = false;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Colunas que podem ser preenchidas
    protected $fillable = [
        'TipoID',
        'Nome',
    ];

    // Desabilita timestamps, pois a tabela não contém `created_at` e `updated_at`
    public $timestamps = false;
}
