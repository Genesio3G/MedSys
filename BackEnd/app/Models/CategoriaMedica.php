<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaMedica extends Model
{
    use HasFactory;

    protected $primaryKey = 'categoriaMedicaID'; // Define a chave primária
    public $incrementing = true; // Indica que a chave primária é auto-incremento
    protected $keyType = 'int'; // Tipo da chave primária

    protected $fillable = [
        'nomeCategoria',
    ];
}