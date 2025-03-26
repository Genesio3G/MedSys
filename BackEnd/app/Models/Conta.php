<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    protected $table = 'conta';
    protected $primaryKey = 'contalD';
    public $timestamps = false;

    protected $fillable = [
        'usuario',
        'senha',
        'utilizadorID'
    ];
}
