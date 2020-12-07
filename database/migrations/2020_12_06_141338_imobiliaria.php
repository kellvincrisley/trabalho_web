<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Imobiliaria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imobiliarias', function (Blueprint $table) {
            $table->id();
            $table->string('nome_fantasia',255);
            $table->string('razao_social',255);
            $table->string('email',255);
            $table->string('doc',18);
            $table->string('endereco',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imobiliarias');
    }
}
