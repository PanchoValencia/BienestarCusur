<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Systems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('concept');
            $table->mediumText('description');

            //Campo para almacenar las llave foránea.
            $table->string('compilation_id');

            //definir llave foranea. Relación entre las tablas
            $table->foreign('compilation_id')
                  ->references('id')
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
        Schema::dropIfExists('Systems');
    }
}
