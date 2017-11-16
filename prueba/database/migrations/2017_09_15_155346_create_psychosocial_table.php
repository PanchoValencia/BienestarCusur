<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePsychosocialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psychosocial', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question')->unsigned(); //2 digitos
            $table->integer('answer')->unsigned(); //1 digito

            //Campo para almacenar las llave foránea. Recordar que es una llave compuesta            
            $table->string('compilations_id')->unique();
            //$table->integer('Compilation_idCaseFile');

            //definir llave foranea. Relación entre las tablas
            $table->foreign('compilations_id')
                  ->references('id')
                  ->on('compilations')
                  ->onDelete('cascade');
            /*      
            $table->foreign('Compilation_idCaseFile')
                  ->references('idCaseFile')
                  ->on('compilations')->onDelete('cascade');
                  */
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
        Schema::dropIfExists('psychosocial');
    }
}