<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProprietarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proprietar', function (Blueprint $table) {
            $table->string('cod_unic')->unique();
            $table->string('tip_persoana');
            $table->string('nume');
            $table->string('prenume')->nullable();
            $table->integer('caen')->nullable();
            $table->string('serie_ci')->nullable();
            $table->string('nr_ci')->nullable();
            $table->string('data_permis')->nullable();
            $table->string('telefon_fix')->nullable();
            $table->integer('reduceri');
            $table->string('judet');
            $table->string('localitate');
            $table->string('strada');
            $table->string('numar');
            $table->string('bloc')->nullable();
            $table->string('scara')->nullable();
            $table->string('etaj')->nullable();
            $table->string('apartament')->nullable();
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
        Schema::dropIfExists('proprietar');
    }
}
