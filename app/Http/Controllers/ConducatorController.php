<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conducator;
use App\Models\User;


class ConducatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $conducatori = Conducator::with('user')->get();
        return $conducatori;
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
        $conducator = Conducator::where('cod_unic', $cod_unic)->first();
        // print_r($vehicul);
        return $conducator;
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
        $conducator = Conducator::where('cod_unic', $cod)->first();
        if($conducator){
            $conducator->delete();
            return ['deleted' => true];
        }
        return ['deleted' => false];
    }

    public function info($cod)
    {
        $conducator = Conducator::where('cod_unic', $cod)->first();
        if($conducator){
            // $user->email = $email;
            // $conducator->nume = $nume;
            // $conducator->telefon = $telefon;

            // $conducator->timestamps = false;
            // $conducator->save();

            return $conducator;
        }

        return response(404)->json([
            'conducator' => false 
       ]);
    }

    public function editare($cod)
    {
        $nume = request('nume');
        $prenume = request('prenume');
        $nr_ci = request('nr_ci');
        $serie_ci = request('serie_ci');

        $conducator = Conducator::where('cod_unic', $cod)->first();
        if($conducator){
            $conducator->nume = $nume;
            $conducator->prenume = $prenume;
            $conducator->nr_ci = $nr_ci;
            $conducator->serie_ci = $serie_ci;
            $conducator->timestamps = false;
            $conducator->save();

            return ['edit' => true];
        }

        return response(404)->json([
            'conducator' => false 
       ]);
    }
    
}
