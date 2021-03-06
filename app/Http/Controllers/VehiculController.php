<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicul;
use App\Models\User;

use DB;
use Carbon\Carbon;


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


    public function index_perioada($perioada = 'luna')
    {
        $rol = auth()->user()->role;
        $vehicule = [];
        if($rol == 'admin') {
            if($perioada == 'luna') {
                $fromDate = Carbon::now()->startOfMonth()->toDateString();
                $tillDate = Carbon::now()->addDay()->toDateString();
                $vehicule = DB::table('vehicul')
                        ->join('users', 'vehicul.id_utilizator', '=', 'users.id')
                        ->select('vehicul.*', 'users.nume')
                        ->whereBetween('vehicul.created_at',[$fromDate,$tillDate])->get();
                // Vehicul::whereBetween('created_at',[$fromDate,$tillDate])->get();
            } else if($perioada == 'azi') {
                $vehicule = DB::table('vehicul')
                        ->join('users', 'vehicul.id_utilizator', '=', 'users.id')
                        ->select('vehicul.*', 'users.nume')
                        ->where(
                            'vehicul.created_at', '>=', Carbon::now()->toDateString()
                        )->get();
                
                // Vehicul::where(
                //     'created_at', '>=', Carbon::now()->toDateString()
                // )->get();
            }else if($perioada == 'total') {
                $vehicule = DB::table('vehicul')
                        ->join('users', 'vehicul.id_utilizator', '=', 'users.id')
                        ->select('vehicul.*', 'users.nume')
                        ->get();
            }
            return $vehicule;
        }
        return [];
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
     *Numara vehicule in funtie de perioada selectata
     */
    public function list_perioada($perioada, $id = '')
    {
        $rol = auth()->user()->role;
        $user_id = auth()->user()->id;
        if($id != '') {
            $rol = 'partener';
            $user_id =  $id;
        }
        
        $vehicule = 0;
        if($rol == 'partener') {
            if($perioada == 'luna') {
                $fromDate = Carbon::now()->startOfMonth()->toDateString();
                $tillDate = Carbon::now()->addDay()->toDateString();
                $vehicule = Vehicul::where('id_utilizator', $user_id)
                                    ->whereBetween('created_at',[$fromDate,$tillDate])->get()->count();
            } else if($perioada == 'azi') {
                $vehicule = Vehicul::where('id_utilizator', $user_id)
                                    ->where(
                                        'created_at', '>=', Carbon::now()->toDateString()
                                    )->get()->count();
            }else if($perioada == 'total') {
                $vehicule = Vehicul::where('id_utilizator', $user_id)->count();
            }
            return $vehicule;
        } elseif($rol == 'admin') {
            if($perioada == 'luna') {
                $fromDate = Carbon::now()->startOfMonth()->toDateString();
                $tillDate = Carbon::now()->addDay()->toDateString();
                $vehicule = Vehicul::whereBetween('created_at',[$fromDate,$tillDate])->get()->count();
            } else if($perioada == 'azi') {
                $vehicule = Vehicul::where(
                                        'created_at', '>=', Carbon::now()->toDateString()
                                    )->get()->count();
            }else if($perioada == 'total') {
                $vehicule = Vehicul::count();
            }
            return $vehicule;
        }
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
    public function destroy($nr_inmatriculare)
    {
        $vehicul = Vehicul::where('nr_inmatriculare', $nr_inmatriculare)->first();
        if($vehicul){
            $vehicul->delete();
            return ['deleted' => true];
        }
        return ['deleted' => false];
    }

    public function info($nr_inmatriculare)
    {
        $vehicul = Vehicul::where('nr_inmatriculare', $nr_inmatriculare)->first();
        if($vehicul){
            return $vehicul;
        }

        return ['vehicul' => false];
    }

    public function editare($nr_inmatriculare)
    {
        $marca = request('marca');
        $model = request('model');
        $utilizare = request('utilizare');
        $carburant = request('carburant');
        $an_fabricatie = request('an_fabricatie');
        $capacitatea_cilindrica = request('capacitatea_cilindrica');
        $masa_admia = request('masa_admia');
        $serie_civ = request('serie_civ');
        $putere_motor = request('putere_motor');
        $nr_locuri = request('nr_locuri');

        $vehicul = Vehicul::where('nr_inmatriculare', $nr_inmatriculare)->first();
        if($vehicul){
            $vehicul->marca = $marca;
            $vehicul->model = $model;
            $vehicul->utilizare = $utilizare;
            $vehicul->carburant = $carburant;
            $vehicul->an_fabricatie = $an_fabricatie;
            $vehicul->capacitatea_cilindrica = $capacitatea_cilindrica;
            $vehicul->masa_admia = $masa_admia;
            $vehicul->serie_civ = $serie_civ;
            $vehicul->putere_motor = $putere_motor;
            $vehicul->nr_locuri = $nr_locuri;

            $vehicul->timestamps = false;
            $vehicul->save();

            return ['edit' => true];
        }

        return ['edit' => false];
    }
}
