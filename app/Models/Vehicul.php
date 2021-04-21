<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicul extends Model
{
    use HasFactory;
    protected $table = 'vehicul';
    protected $primaryKey = 'nr_inmatriculare';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $hidden = array('id_utilizator');

    protected $fillable = [
        'nr_inmatriculare',
        'tip_vehicul',
        'marca',
        'model',
        'carburant',
        'utilizare',
        'masa_admia',
        'capacitatea_cilindrica',
        'putere_motor',
        'nr_locuri',
        'serie_civ',
        'serie_sasiu',
        'an_fabricatie',
        'id_utilizator'
    ];
}
