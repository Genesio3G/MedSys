<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoFabricante extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'produtofabricante';

    // A chave primária
    protected $primaryKey = 'produtoFabricanteID';

    // Ativando auto-incremento
    public $incrementing = true;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Colunas que podem ser preenchidas
    protected $fillable = [
        'nrRegisto',
        'fabricanteID',
    ];

    // Desabilita timestamps se a tabela não possui `created_at` e `updated_at`
    public $timestamps = false;

    // Relacionamento com a tabela `produto`
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'nrRegisto', 'nrRegisto');
    }

    // Relacionamento com a tabela `fabricante`
    public function fabricante()
    {
        return $this->belongsTo(Fabricante::class, 'fabricanteID', 'fabricanteID');
    }
}
