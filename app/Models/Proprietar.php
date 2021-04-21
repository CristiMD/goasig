<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietar extends Model
{
    use HasFactory;
    protected $table = 'proprietar';
    protected $primaryKey = 'cod_unic';
    public $incrementing = false;
    protected $keyType = 'string';
}
