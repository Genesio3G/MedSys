<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'receita';

    // A chave primária
    protected $primaryKey = 'receitalD';

    // Ativando auto-incremento
    public $incrementing = true;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Colunas que podem ser preenchidas
    protected $fillable = [
        'clienteID',
        'numOrdem',
        'dataReceita',
        'comprado',
    ];

    // Desabilita timestamps, pois a tabela não contém `created_at` e `updated_at`
    public $timestamps = false;

    // Relacionamento com a tabela `cliente`
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'clienteID', 'clienteID');
    }

    // Relacionamento com a tabela `medico` (exemplo, caso necessário)
    public function medico()
    {
        return $this->belongsTo(Medico::class, 'numOrdem', 'numOrdem');
    }
}
