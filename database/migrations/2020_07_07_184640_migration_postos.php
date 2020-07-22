<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrationPostos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cnpj');
            $table->string('razao_social');
            $table->string('nome_fantasia');
            $table->string('bandeira');
            $table->string('endereco');
            $table->string('bairro');
            $table->unsignedInteger('id_cidade');
            $table->foreign('id_cidade')->references('id')->on('cidades');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postos');
    }
}
