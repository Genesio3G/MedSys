<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'stock';

    // A chave primária
    protected $primaryKey = 'stockID';

    // Ativando auto-incremento
    public $incrementing = true;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Colunas que podem ser preenchidas
    protected $fillable = [
        'licenca',
    ];

    // Desabilita timestamps, pois a tabela não contém `created_at` e `updated_at`
    public $timestamps = false;

    // Relacionamento com a tabela `farmacia` (opcional)
    public function farmacia()
    {
        return $this->belongsTo(Farmacia::class, 'licenca', 'licenca');
    }
}
