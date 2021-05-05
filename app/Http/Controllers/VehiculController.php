<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicul;
use App\Models\User;

class VehiculController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $vehicule = Vehicul::with('user')->get();
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
     * @param  string  $nr_inmatriculare
     * @return \Illuminate\Http\Response
     */
    public function show($nr_inmatriculare)
    {
        $vehicul = Vehicul::where('nr_inmatriculare', $nr_inmatriculare)->first();
        // print_r($vehicul);
        return $vehicul;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function numara()
    {
        $vehicule = Vehicul::count();
        return $vehicule;
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
