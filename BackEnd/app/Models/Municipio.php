<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'municipio';

    // A chave primária
    protected $primaryKey = 'municipioID';

    // Ativando auto-incremento
    public $incrementing = true;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Colunas que podem ser preenchidas
    protected $fillable = [
        'nomeMunicipio',
        'provinciaID',
    ];

    // Desabilita timestamps se a tabela não contém `created_at` e `updated_at`
    public $timestamps = false;

    // Relacionamento: Um município pertence a uma província
    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'provinciaID', 'provinciaID');
    }
}
