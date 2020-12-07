<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Locacao extends Migration
{
    public function up()
    {
        Schema::create('locacoes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('casa_id')->unsigned();
            $table->bigInteger('locador_id')->unsigned();
            $table->foreign('casa_id')->references('id')->on('casas');
            $table->foreign('locador_id')->references('id')->on('locadores');
        });
    }

    public function down()
    {
        try{
            Schema::table('casas', function (Blueprint $table) {
                $table->dropForeignI("casa_id");
                $table->dropForeign("locador_id");
            });
        }
        finally{
            Schema::dropIfExists('locacoes');
        }
    }
}
