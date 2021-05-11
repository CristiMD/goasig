<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proprietar;
use App\Models\User;

class ProprietarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $vehicule = Proprietar::with('user')->get();
        return $vehicule;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cod_unic)
    {
        $proprietar = Proprietar::where('cod_unic', $cod_unic)->first();
        // print_r($vehicul);
        return $proprietar;
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
    public function destroy($cod)
    {
        $proprietar = Proprietar::where('cod_unic', $cod)->first();
        if($proprietar){
            $proprietar->delete();
            return ['deleted' => true];
        }
        return ['deleted' => false];
    }

    public function info($cod)
    {
        $proprietar = Proprietar::where('cod_unic', $cod)->first();
        if($proprietar){
            return $proprietar;
        }

        return response(404)->json([
            'proprietar' => false 
       ]);
    }

    public function editare($cod)
    {
       
        $nume = request('nume');
        $prenume = request('prenume');
        $nr_ci = request('nr_ci');
        $serie_ci = request('serie_ci');
        $tip_persoana = request('tip_persoana');
        $judet = request('judet');
        $localitate = request('localitate');
        $strada = request('strada');
        $numar = request('numar');
        $bloc = request('bloc');
        $scara = request('scara');
        $etaj = request('etaj');
        $apartament = request('apartament');

        $proprietar = Proprietar::where('cod_unic', $cod)->first();
        if($proprietar){
            $proprietar->nume = $nume;
            $proprietar->prenume = $prenume;
            $proprietar->nr_ci = $nr_ci;
            $proprietar->serie_ci = $serie_ci;
            $proprietar->tip_persoana = $tip_persoana;
            $proprietar->judet = $judet;
            $proprietar->localitate = $localitate;
            $proprietar->strada = $strada;
            $proprietar->numar = $numar;
            $proprietar->bloc = $bloc;
            $proprietar->scara = $scara;
            $proprietar->etaj = $etaj;
            $proprietar->apartament = $apartament;

            $proprietar->timestamps = false;
            $proprietar->save();

            return ['edit' => true];
        }

        return response(404)->json([
            'proprietar' => false 
       ]);
    }
}
