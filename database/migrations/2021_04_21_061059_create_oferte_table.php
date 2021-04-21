<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOferteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oferte', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->foreignId('id_utilizator')->constrained('users');
            $table->string('nr_inmatriculare');
            $table->foreign('nr_inmatriculare')->references('nr_inmatriculare')->on('vehicul');
            $table->string('cod_unic_proprietar');
            $table->foreign('cod_unic_proprietar')->references('cod_unic')->on('proprietar');
            $table->string('cod_unic_conducator');
            $table->foreign('cod_unic_conducator')->references('cod_unic')->on('conducator');
            $table->string('link-plata');
            $table->string('suma');
            $table->integer('perioada');
            $table->string('asigurator');
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
        Schema::dropIfExists('oferte');
    }
}
