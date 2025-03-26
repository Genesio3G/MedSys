<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'fabricantes';

    // A chave primária
    protected $primaryKey = 'fabricanteID';

    // Auto-incremento está ativado
    public $incrementing = true;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Colunas que podem ser preenchidas
    protected $fillable = [
        'nomeFabricante',
        'paisID',
    ];

    // Relacionamento (exemplo): Cada fabricante pertence a um país
    public function pais()
    {
        return $this->belongsTo(Pais::class, 'paisID');
    }
}
