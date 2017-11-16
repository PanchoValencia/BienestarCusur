<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('specialist',['SEGU', 'MEDI', 'NUTR']);
            $table->mediumText('diagnosis');
            $table->mediumText('plan');
            $table->string('responsible',45);
            $table->datetime('date');
            
            //Campo para almacenar las llave foránea. Recordar que es una llave compuesta            
            $table->string('compilations_id')->unique();
            
            //definir llave foranea. Relación entre las tablas
            $table->foreign('compilations_id')
                  ->references('id')
                  ->on('compilations')
                  ->onDelete('cascade');
            
                  

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
        Schema::dropIfExists('Treatments');
    }
}