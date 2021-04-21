<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polita extends Model
{
    use HasFactory;
    protected $table = 'polite';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
}
