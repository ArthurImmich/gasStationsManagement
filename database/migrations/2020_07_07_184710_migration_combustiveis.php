<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrationCombustiveis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combustiveis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->date('data_coleta');
            $table->decimal('preco_venda', 8, 3);
            $table->unsignedInteger('id_posto');
            $table->foreign('id_posto')->references('id')->on('postos');
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
        Schema::dropIfExists('combustiveis');
    }
}
