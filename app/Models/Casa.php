<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casa extends Model
{
    use HasFactory;
    protected $table = 'casas';
    protected $fillable = ['descricao','endereco', 'dono_nome','dono_doc'];
    public $timestamps = false;

    public function imobiliaria(){
        return $this->hasOne('App\Models\Imobiliaria','id', 'imobiliaria_id');
    }

    public function categoria(){
        return $this->hasone('App\Models\CasaCategoria','id','casa_categoria_id');
    }
}
