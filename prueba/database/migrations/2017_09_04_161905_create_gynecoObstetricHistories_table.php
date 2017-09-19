<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGynecoObstetricHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GynecoObstetricHistories', function (Blueprint $table) {
            $table->increments('idGynecoObstetricHistories');
            $table->enum('concept',['CITO','MAST','MENA','MENS']);
            $table->dateTime('date');

            //Campo para almacenar las llave foránea. Recordar que es una llave compuesta            
            $table->string('Compilation_idCode')->unique();
            //$table->integer('Compilation_idCaseFile');

            //definir llave foranea. Relación entre las tablas
            $table->foreign('Compilation_idCode')
                  ->references('idCode')
                  ->on('compilations')->onDelete('cascade');
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
        Schema::dropIfExists('GynecoObstetricHistories');
    }
}
