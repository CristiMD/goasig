<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conducator extends Model
{
    use HasFactory;
    protected $table = 'conducator';
    protected $primaryKey = 'cod_unic';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'cod_unic',
        'nume',
        'prenume',
        'serie_ci',
        'nr_ci',
        'id_utilizator'
    ];
}
