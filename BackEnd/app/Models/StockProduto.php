<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockProduto extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'stockproduto';

    // A chave primária
    protected $primaryKey = 'stockProdutolD';

    // Ativando auto-incremento
    public $incrementing = true;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Colunas que podem ser preenchidas
    protected $fillable = [
        'stockID',
        'nrRegisto',
        'preco',
        'qntidadeStock',
    ];

    // Desabilitar timestamps, pois a tabela não tem `created_at` e `updated_at`
    public $timestamps = false;

    // Relacionamento com a tabela `stock`
    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stockID', 'stockID');
    }

    // Relacionamento com a tabela `produto`
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'nrRegisto', 'nrRegisto');
    }
}
