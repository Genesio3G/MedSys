<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dose extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'dose';

    // A chave primária personalizada
    protected $primaryKey = 'doselD';

    // Desativando auto-incrementação
    public $incrementing = false;

    // Tipo da chave primária
    protected $keyType = 'string';

    // Preenchíveis
    protected $fillable = [
        'doselD',
        'descricaoDose',
    ];

    // Desabilita timestamps, pois não existem `created_at` e `updated_at` na tabela
    public $timestamps = false;
}
