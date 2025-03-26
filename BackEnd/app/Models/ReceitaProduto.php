<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceitaProduto extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'receitaproduto';

    // A chave primária
    protected $primaryKey = 'receitaProdutolD';

    // Ativando auto-incremento
    public $incrementing = true;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Colunas que podem ser preenchidas
    protected $fillable = [
        'receitalD',
        'nrRegisto',
        'quantidade',
        'doselD',
    ];

    // Desabilita timestamps, pois a tabela não contém `created_at` e `updated_at`
    public $timestamps = false;

    // Relacionamento com a tabela `receita`
    public function receita()
    {
        return $this->belongsTo(Receita::class, 'receitalD', 'receitalD');
    }

    // Relacionamento com a tabela `produto`
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'nrRegisto', 'nrRegisto');
    }

    // Relacionamento com a tabela `dose`
    public function dose()
    {
        return $this->belongsTo(Dose::class, 'doselD', 'doselD');
    }
}
