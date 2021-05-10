<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('polite');
        Schema::create('polite', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->foreignId('id_utilizator')->constrained('users')->nullable();
            $table->string('nr_inmatriculare')->nullable();
            $table->foreign('nr_inmatriculare')->references('nr_inmatriculare')->on('vehicul');
            $table->string('link-plata');
            $table->string('suma');
            $table->integer('perioada');
            $table->string('asigurator');
            $table->string('cod_unic_proprietar')->unique();
            $table->string('tip_persoana');
            $table->string('nume_proprietar');
            $table->string('prenume_proprietar')->nullable();
            $table->integer('caen')->nullable();
            $table->string('serie_ci_proprietar')->nullable();
            $table->string('nr_ci_proprietar')->nullable();
            $table->string('cod_unic_conducator')->unique();
            $table->string('nume_conducator');
            $table->string('prenume_conducator');
            $table->string('serie_ci_conducator');
            $table->string('nr_ci_conducator');
            $table->date('data-generare');
            $table->date('data-expirare');
            $table->date('data-incepere');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polite');
    }
}
