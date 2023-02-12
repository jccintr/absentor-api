<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     
        Schema::create('faltas', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('funcionario_id');
            $table->date('data');
            $table->integer('dias')->default(1);
            $table->string('motivo');
            $table->timestamps();
             // cria o relacionamento com a tabela empresas
             $table->foreign('empresa_id')->references('id')->on('empresas');
              // cria o relacionamento com a tabela users
            $table->foreign('funcionario_id')->references('id')->on('users'); 
        });
     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      //  Schema::dropIfExists('faltas');
    }
};
