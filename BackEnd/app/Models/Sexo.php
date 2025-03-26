<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'sexo';

    // A chave primária
    protected $primaryKey = 'sexoID';

    // Ativando auto-incremento (neste caso, está desativado devido ao `NOT NULL` personalizado)
    public $incrementing = false;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Colunas que podem ser preenchidas
    protected $fillable = [
        'sexoID',
        'genero',
    ];

    // Desabilita timestamps, pois a tabela não possui `created_at` e `updated_at`
    public $timestamps = false;
}
