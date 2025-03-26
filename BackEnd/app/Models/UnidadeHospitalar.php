<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadeHospitalar extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'unidadehospitalar';

    // Chave primária
    protected $primaryKey = 'unidadeHospitalarID';

    // Ativando auto-incremento
    public $incrementing = true;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Colunas que podem ser preenchidas
    protected $fillable = [
        'nomeUnidade',
        'enderecoID',
    ];

    // Desabilita timestamps, pois a tabela não contém `created_at` e `updated_at`
    public $timestamps = false;

    // Relacionamento com a tabela `endereco` (se aplicável)
    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'enderecoID', 'enderecoID');
    }
}
