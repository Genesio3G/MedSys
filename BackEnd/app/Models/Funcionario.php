<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'funcionario';

    // Chave primária personalizada
    protected $primaryKey = 'funcionariolD';

    // Auto-incremento está ativado
    public $incrementing = true;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Colunas que podem ser preenchidas
    protected $fillable = [
        'licenca',
        'DadosPessoaisID',
    ];

    // Desabilita timestamps (caso não existam `created_at` e `updated_at`)
    public $timestamps = false;

    // Relacionamento: Cada funcionário pertence a uma farmácia
    public function farmacia()
    {
        return $this->belongsTo(Farmacia::class, 'licenca', 'licenca');
    }
}
