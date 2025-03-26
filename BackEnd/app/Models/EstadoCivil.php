<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'estadocivil';

    // A chave primária personalizada
    protected $primaryKey = 'estadoCivilID';

    // Desativando auto-incrementação
    public $incrementing = false;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Preenchíveis
    protected $fillable = [
        'estadoCivilID',
        'descricaoEstadoCivil',
    ];

    // Desabilita timestamps, já que a tabela não possui `created_at` e `updated_at`
    public $timestamps = false;
}
