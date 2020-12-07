<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Casa extends Migration
{
    public function up()
    {
        Schema::create('casas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('imobiliaria_id')->unsigned();
            $table->bigInteger('casa_categoria_id')->unsigned();
            $table->foreign("imobiliaria_id")->references('id')->on('imobiliarias');
            $table->foreign("casa_categoria_id")->references('id')->on('casa_categorias');
            $table->string('descricao',255);
            $table->string('endereco',255);
            $table->string('dono_nome',255);
            $table->string('dono_doc',18);
        });
    }

    public function down()
    {
        try{
            Schema::table('casas', function (Blueprint $table) {
                $table->dropForeign("casa_categoria_id");
                $table->dropForeign("imobiliaria_id");
            });
        }
        finally{
            Schema::dropIfExists('casas');
        }
    }
}
