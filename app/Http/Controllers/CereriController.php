<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CereriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Pas 1
        $stare_inmatriculare = request('stare_inmatriculare');
        $numar_inmatriculare = request('numar_inmatriculare');
        $tip_vehicul = request('tip_vehicul');
        $marca = request('marca');
        $model = request('model');
        $combustibil = request('combustibil');
        $utilizare = request('utilizare');

        //Pas 2
        $masa_maxima = request('masa_maxima');
        $cap_cil = request('cap_cil');
        $putere = request('putere');
        $nr_loc = request('nr_loc');
        $serie_civ = request('serie_civ');
        $sasiu = request('sasiu');
        $an_fab = request('an_fab');

        //Pas 3
        $persoana = request('persoana');
        $nmume_proprietar = request('nmume_proprietar');
        $cnp_proprietar = request('cnp_proprietar');
        $ci_proprietar = request('ci_proprietar');
        $judet = request('judet');
        $strada_proprietar = request('strada_proprietar');
        $bloc_proprietar = request('bloc_proprietar');
        $etaj_proprietar = request('etaj_proprietar');
        $reduceri = request('reduceri');
        $prenume_proprietar = request('prenume_proprietar');
        $an_permis_proprietar = request('an_permis_proprietar');
        $nr_ci_proprietar = request('nr_ci_proprietar');
        $localitate_proprietar = request('localitate_proprietar');
        $numar_adresa_proprietar = request('numar_adresa_proprietar');
        $scara_proprietar = request('scara_proprietar');
        $apartament_proprietar = request('apartament_proprietar');

        //Pas 4
        $soferul_acelasi = request('soferul_acelasi');
        $nume_conducator = request('nume_conducator');
        $prenume_conducator = request('prenume_conducator');
        $ci_conducator = request('ci_conducator');
        $nr_ci_conducatorr = request('nr_ci_conducatorr');
        $cnp_conducator = request('cnp_conducator');
        $data_rca = request('data_rca');
        $nume_livrare = request('nume_livrare');
        $prenume_livrare = request('prenume_livrare');
        $adresa_livrare = request('adresa_livrare');
        $email_livrare = request('email_livrare');
        $telefon_livrare = request('telefon_livrare');
        $termeni_conditii = request('termeni_conditii');


        echo $stare_inmatriculare.'</br>';
        echo $numar_inmatriculare.'</br>';
        echo $tip_vehicul.'</br>';
        echo $marca.'</br>';
        echo $model.'</br>';
        echo $combustibil.'</br>';
        echo $utilizare.'</br>';
        echo $masa_maxima.'</br>';
        echo $cap_cil.'</br>';
        echo $putere.'</br>';
        echo $nr_loc.'</br>';
        echo $serie_civ.'</br>';
        echo $sasiu.'</br>';
        echo $an_fab.'</br>';
        echo $persoana.'</br>';
        echo $nmume_proprietar.'</br>';
        echo $cnp_proprietar.'</br>';
        echo $ci_proprietar.'</br>';
        echo $judet.'</br>';
        echo $strada_proprietar.'</br>';
        echo $bloc_proprietar.'</br>';
        echo $etaj_proprietar.'</br>';
        echo $reduceri.'</br>';
        echo $prenume_proprietar.'</br>';
        echo $an_permis_proprietar.'</br>';
        echo $nr_ci_proprietar.'</br>';
        echo $localitate_proprietar.'</br>';
        echo $numar_adresa_proprietar.'</br>';
        echo $scara_proprietar.'</br>';
        echo $apartament_proprietar.'</br>';
        echo $soferul_acelasi.'</br>';
        echo $nume_conducator.'</br>';
        echo $prenume_conducator.'</br>';
        echo $ci_conducator.'</br>';
        echo $nr_ci_conducatorr.'</br>';
        echo $cnp_conducator.'</br>';
        echo $data_rca.'</br>';
        echo $nume_livrare.'</br>';
        echo $prenume_livrare.'</br>';
        echo $adresa_livrare.'</br>';
        echo $email_livrare.'</br>';
        echo $telefon_livrare.'</br>';
        echo $termeni_conditii.'</br>';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
