<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locacao extends Model
{
    use HasFactory;
    protected $table = 'locacoes';
    protected $fillable = [];
    public $timestamps = false;

    public function casa(){
        return $this->hasOne('App\Models\Casa','id', 'casa_id');
    }

    public function locador(){
        return $this->hasone('App\Models\Locador','id','locador_id');
    }
}
