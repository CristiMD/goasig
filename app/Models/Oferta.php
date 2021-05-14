<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;
    protected $table = 'oferte';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'id_utilizator',
        'nr_inmatriculare',
        'email',
        'telefon',
        'cod_unic_proprietar',
        'cod_unic_conducator',
        'link-plata',
        'decontare_directa',
        'suma',
        'perioada',
        'asigurator',
        'cod_unic_proprietar',
        'tip_persoana',
        'nume_proprietar',
        'prenume_proprietar',
        'caen',
        'serie_ci_proprietar',
        'nr_ci_proprietar',
        'cod_unic_conducator',
        'nume_conducator',
        'prenume_conducator',
        'serie_ci_conducator',
        'nr_ci_conducator',
        'data-generare',
        'data-expirare',
        'data-incepere'
    ];

    function user() {
        return $this->belongsTo('App\Models\User', 'id');
    }

}
