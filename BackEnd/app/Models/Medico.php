<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'medico';

    // A chave primária
    protected $primaryKey = 'numOrdem';

    // Desativando auto-incremento (porque `numOrdem` é uma string)
    public $incrementing = false;

    // Tipo da chave primária
    protected $keyType = 'string';

    // Colunas que podem ser preenchidas
    protected $fillable = [
        'numOrdem',
        'nomeMedico',
        'especialidadeID',
        'DadosPessoaisID',
    ];

    // Desabilita timestamps (caso não existam `created_at` e `updated_at`)
    public $timestamps = false;

    // Relacionamento com a tabela `especialidade` (opcional)
    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class, 'especialidadeID', 'especialidadeID');
    }

    // Relacionamento com `dadospessoais` (opcional)
    public function dadosPessoais()
    {
        return $this->belongsTo(DadosPessoais::class, 'DadosPessoaisID', 'DadosPessoaisID');
    }
}
