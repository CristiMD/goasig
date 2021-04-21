<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicul', function (Blueprint $table) {
            $table->string('nr_inmatriculare')->unique();
            $table->string('tip_vehicul');
            $table->string('marca');
            $table->string('model');
            $table->integer('carburant');
            $table->string('utilizare');
            $table->integer('masa_admia');
            $table->integer('capacitatea_cilindrica');
            $table->integer('putere_motor');
            $table->integer('nr_locuri');
            $table->string('serie_civ');
            $table->string('serie_sasiu');
            $table->string('an_fabricatie');
            $table->foreignId('id_utilizator')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicul');
    }
}
