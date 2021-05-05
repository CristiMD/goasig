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
        'cod_unic_proprietar',
        'cod_unic_conducator',
        'link-plata',
        'suma',
        'perioada',
        'asigurator',
        'data-generare',
        'data-expirare',
        'data-incepere'
    ];
}
