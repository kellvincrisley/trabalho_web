<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locador extends Model
{
    use HasFactory;
    protected $table = 'locadores';
    protected $fillable = ['nome','email', 'doc','endereco'];
    public $timestamps = false;
}
