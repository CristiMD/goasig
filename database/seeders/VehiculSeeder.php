<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class VehiculSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicul = new Vehicul(array(
            'nr_inmatriculare' => Str::random(7),
            'tip_vehicul' => 'Autoturism',
            'marca' => $this->faker->name,
            'model' => $this->faker->name,
            'carburant' => 501,
            'utilizare' => 'Privat',
            'masa_admia' => 1800,
            'capacitatea_cilindrica' => 1400,
            'putere_motor' => 55,
            'nr_locuri' => 5,
            'serie_civ' => Str::random(7),
            'serie_sasiu' => Str::random(15),
            'an_fabricatie' => '2001',
            'id_utilizator' => Str::random(7)
        ));

    $vehicul->timestamps = false;
    $vehicul->save();
    }
}
