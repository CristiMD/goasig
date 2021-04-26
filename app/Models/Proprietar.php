<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietar extends Model
{
    use HasFactory;

    protected $fillable = [
        'cod_unic',
        'tip_persoana',
        'nume',
        'prenume',
        'caen',
        'serie_ci',
        'nr_ci',
        'data_permis',
        'telefon_fix',
        'reduceri',
        'judet',
        'localitate',
        'strada',
        'numar',
        'bloc',
        'scara',
        'etaj',
        'apartament',
        'id_utilizator'
    ];

    protected $table = 'proprietar';
    protected $primaryKey = 'cod_unic';
    public $incrementing = false;
    protected $keyType = 'string';

    function user() {
        return $this->belongsTo('App\Models\User', 'id');
    }
}
