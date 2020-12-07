<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imobiliaria extends Model
{
    use HasFactory;
    protected $table = 'imobiliarias';
    protected $fillable = ['nome','email', 'cnpj','nome_fantasia'];
    public $timestamps = false;
}
