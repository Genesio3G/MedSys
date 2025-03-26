<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadosPessoais extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'dadospessoais';

    // A chave primária
    protected $primaryKey = 'dadosPessoaisID';

    // Ativando auto-incremento
    public $incrementing = true;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Colunas que podem ser preenchidas
    protected $fillable = [
        'nome',
        'contalD',
        'enderecoID',
        'sexoID',
    ];

    // Desabilita timestamps, pois a tabela não contém `created_at` e `updated_at`
    public $timestamps = false;

    // Relacionamento com a tabela `sexo`
    public function sexo()
    {
        return $this->belongsTo(Sexo::class, 'sexoID', 'sexoID');
    }

    // Relacionamento com a tabela `conta` (se aplicável)
    public function conta()
    {
        return $this->belongsTo(Conta::class, 'contalD', 'contaID');
    }

    // Relacionamento com a tabela `endereco` (se aplicável)
    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'enderecoID', 'enderecoID');
    }
}
