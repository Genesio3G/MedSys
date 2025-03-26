<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente';
    protected $primaryKey = 'clienteID';
    public $timestamps = false;

    protected $fillable = [
        'DadosPessoaisID'
    ];

    public function dadosPessoais()
    {
        return $this->belongsTo(DadosPessoais::class, 'DadosPessoaisID');
    }
}
