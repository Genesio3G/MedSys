<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'produto';

    // A chave primária
    protected $primaryKey = 'nrRegisto';

    // Desativando auto-incremento (porque `nrRegisto` é uma string)
    public $incrementing = false;

    // Tipo da chave primária
    protected $keyType = 'string';

    // Colunas que podem ser preenchidas
    protected $fillable = [
        'nrRegisto',
        'nomeProduto',
        'bp',
        'dataFabrico',
        'dataValidade',
        'categProduto',
    ];

    // Desabilita timestamps, pois a tabela não contém `created_at` e `updated_at`
    public $timestamps = false;

    // Relacionamento com a tabela `categoria` (se existir)
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categProduto', 'categoriaID'); // Ajuste conforme o nome real da tabela de categorias
    }
}
