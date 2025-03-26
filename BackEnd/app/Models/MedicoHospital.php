<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicoHospital extends Model
{
    use HasFactory;

    // Nome da tabela associada
    protected $table = 'medicohospital';

    // Chave primária personalizada
    protected $primaryKey = 'medicoHospitalID';

    // Auto-incremento ativado
    public $incrementing = true;

    // Tipo da chave primária
    protected $keyType = 'int';

    // Colunas que podem ser preenchidas
    protected $fillable = [
        'medicoID',
        'unidadeHospitalarID',
    ];

    // Desabilita timestamps se a tabela não tem `created_at` e `updated_at`
    public $timestamps = false;

    // Relacionamento com `medico` (opcional)
    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medicoID', 'medicoID');
    }

    // Relacionamento com `unidadehospitalar` (opcional)
    public function unidadeHospitalar()
    {
        return $this->belongsTo(UnidadeHospitalar::class, 'unidadeHospitalarID', 'unidadeHospitalarID');
    }
}
