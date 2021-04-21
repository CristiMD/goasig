<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConducatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conducator', function (Blueprint $table) {
            $table->string('cod_unic')->unique();
            $table->string('nume');
            $table->string('prenume');
            $table->string('serie_ci');
            $table->string('nr_ci');
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
        Schema::dropIfExists('conducator');
    }
}
