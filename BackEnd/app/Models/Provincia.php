<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'provincia';

    // A chave primária
    protected $primaryKey = 'provinciaID';

    // Ativando auto-incremento
    public $incrementing = true;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Colunas que podem ser preenchidas
    protected $fillable = [
        'nomeProvincia',
        'paisID',
    ];

    // Desabilita timestamps se a tabela não possui `created_at` e `updated_at`
    public $timestamps = false;

    // Relacionamento com a tabela `pais` (um país pode ter várias províncias)
    public function pais()
    {
        return $this->belongsTo(Pais::class, 'paisID', 'paisID');
    }
}
