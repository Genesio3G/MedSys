<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspecialidadeMedica extends Model
{
    use HasFactory;

    // Nome da tabela
    protected $table = 'especialidadesmedica';

    // Chave primária
    protected $primaryKey = 'especialidadeID';

    // Auto-incremento está ativado
    public $incrementing = true;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Atributos preenchíveis
    protected $fillable = [
        'nomeEspecialidade',
        'categoriaMedicaID',
    ];

    // Desabilitar timestamps se não estão na tabela
    public $timestamps = false;
}
