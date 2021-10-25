<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vehicul;
use App\Models\Proprietar;
use App\Models\Conducator;
use App\Models\Oferta;
use App\Models\Polita;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

class UsersController extends Controller
{

    public function index()
    {
        $rol = auth()->user()->role;
        if($rol == 'admin') {
            $users = User::all();
            return $users;
        } elseif ($rol == 'admin'){
            $users = Proprietar::with('user')->get();
            return $users;
        }
        return [];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function numara()
    {
        $rol = auth()->user()->role;
        if($rol == 'admin') {
            $users = User::count();
            return $users;
        }
        return 0;
    }

    
    public function index_perioada($perioada)
    {
        // $rol = auth()->user()->role;
        // if($rol == 'admin') {
        //     $users = User::all();
        //     return $users;
        // } elseif ($rol == 'admin'){
        //     $users = Proprietar::with('user')->get();
        //     return $users;
        // }
        // return [];
        $rol = auth()->user()->role;
        $users = [];
        if($rol == 'admin') {
            if($perioada == 'luna') {
                $fromDate = Carbon::now()->startOfMonth()->toDateString();
                $tillDate = Carbon::now()->addDay()->toDateString();
                $users = User::whereBetween('created_at',[$fromDate,$tillDate])->get();
            } else if($perioada == 'azi') {
                $users = User::where(
                    'created_at', '>=', Carbon::now()->toDateString()
                )->get();
            }else if($perioada == 'total') {
                $users = User::all();
            }
            return $users;
        }
        return [];
    }

    
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_cautare($termeni)
    {
        $rol = auth()->user()->role;
        if($rol == 'admin') {
            $users = User::where('nume', 'LIKE', '%'.urldecode($termeni).'%')
                        ->orWhere('email', 'LIKE', '%'.urldecode($termeni).'%')
                        ->orWhere('telefon', 'LIKE', '%'.urldecode($termeni).'%')
                                                                ->get();
            return $users;
        }
        return 0;
    }

    // 
    // if($rol == 'admin') {
    //     if($perioada == 'luna') {
    //         $fromDate = Carbon::now()->subMonth()->startOfMonth()->toDateString();
    //         $tillDate = Carbon::now()->subMonth()->endOfMonth()->toDateString();
    //         $users = User::whereBetween('created_at',[$fromDate,$tillDate])->get()->count();
    //     } else if($perioada == 'azi') {
    //         $users = User::where(
    //             'created_at', '>=', Carbon::now()->toDateString()
    //         )->get()->count();
    //     }else if($perioada == 'total') {
    //         $users = User::count();
    //     }
    //     return $users;
    // }
    // 
    /**
     *Numara utilizatori in funtie de perioada selectata
     */
    public function list_perioada($perioada)
    {
        $rol = auth()->user()->role;
        $users = 0;
        if($rol == 'admin') {
            if($perioada == 'luna') {
                $fromDate = Carbon::now()->startOfMonth()->toDateString();
                $tillDate = Carbon::now()->addDay()->toDateString();
                $users = User::whereBetween('created_at',[$fromDate,$tillDate])->get()->count();
            } else if($perioada == 'azi') {
                $users = User::where(
                    'created_at', '>=', Carbon::now()->toDateString()
                )->get()->count();
            }else if($perioada == 'total') {
                $users = User::count();
            }
            return $users;
        }
        return 0;
    }

    public function cont($view = 'detalii')
    {
        switch ($view) {
            case "oferte":
                $val = $this->oferte();
                break;
            case "polite":
                $val = $this->polite();
                break;
            case "vehicule":
                $val = $this->vehicule();
                break;
            case "proprietari":
                $val = $this->proprietari();
                break;
            case "conducatori":
                $val = $this->conducatori();
                break;
            default:
            $val = $this->detalii();
        }
        return $val;
    }

    public function detalii()
    {
        $user = auth()->user();
        // print_r($user);
        return view('contul-meu', ['partial' => 'cont.detalii', 'content' => $user]);
    }

    public function oferte()
    {
        $user = auth()->user();
        $oferte = Oferta::where('id_utilizator', $user->id)->get();
        return view('contul-meu', ['partial' => 'cont.oferte', 'content' => $oferte]);
    }

    public function polite()
    {
        $user = auth()->user();
        $polite = Polita::where('id_utilizator', $user->id)->get();
        return view('contul-meu', ['partial' => 'cont.polite', 'content' => $polite]);
    }

    public function vehicule()
    {
        // $polite = [];
        $user = auth()->user();
        $vehicule = Vehicul::where('id_utilizator', $user->id)->get();
        // foreach ($vehicule as $key => $vehicul) {
        //     $polita = Polita::where('nr_inmatriculare', $vehicul->nr_inmatriculare)->first();
        //     array_push($polite, $polita);
        // }
        // $continut = [$vehicule, $polite];
        // print_r($continut);
        return view('contul-meu', ['partial' => 'cont.vehicule', 'content' => $vehicule]);
    }

    public function proprietari()
    {
        $user = auth()->user();
        $proprietari = Proprietar::where('id_utilizator', $user->id)->get();
        return view('contul-meu', ['partial' => 'cont.proprietari', 'content' => $proprietari]);
    }

    public function conducatori()
    {
        $user = auth()->user();
        $conducatori = Conducator::where('id_utilizator', $user->id)->get();
        return view('contul-meu', ['partial' => 'cont.conducatori', 'content' => $conducatori]);
    }

    public function admin_users() {
        return view('admin.utilizatori');
    }

    public function create() {
        $email= request('email');
        $nume= request('nume');
        $parola= request('parola');
        $telefon = request('telefon');
        $rol = request('rol');

        $check = User::where('email', $email)->first();

        if(!$check){
            $user = new User(array(
                'email' => $email,
                'nume' => $nume,
                'parola' => Hash::make($parola),
                'role' => $rol,
                'telefon' => $telefon
            ));
        
            //$user->timestamps = false;
            $user->save();
            return $user;
        }
        return ['created' => false];
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        if($user){
            $user->delete();
            return ['deleted' => true];
        }

        return ['deleted' => false];
    }

    public function editare()
    {
        // $email = request('email');
        $nume = request('nume');
        $telefon = request('telefon');
        $rol = request('rol');
        $user = auth()->user();

        $user = User::where('id', $user->id)->first();
        if($user){
            // $user->email = $email;
            $user->nume = $nume;
            $user->telefon = $telefon;
            $user->role = $rol;
            //$user->timestamps = false;
            $user->save();

            return ['edit' => true];
        }

        return ['edit' => false];
    }

    public function edit($id)
    {
        $email = request('email');
        $nume = request('nume');
        $telefon = request('telefon');
        $parola = request('parola');
        $rol = request('rol');
        $check = User::where('email', $email)->first();
        $user = User::where('id', $id)->first();

        if($check->id == $id){
            $user->email = $email;
            $user->nume = $nume;
            $user->telefon = $telefon;
            $user->role = $rol;
            if(strlen($parola) > 3){
                $user->parola = $parola;
            }

            //$user->timestamps = false;
            $user->save();

            return ['edit' => true];
        }
        return ['edit' => false];
    }
    
    public function unic($id)
    {
        $user = User::where('id', $id)->first();
        if($user){
            return $user;
        }

        return ['user' => false ];
    }


    ////// Sectiune parteneri
    public function admin_parteneri() {
        return view('admin.parteneri');
    }

    public function list_parteneri() {
        $parteneri = User::where('role', 'partener')->get();
        return $parteneri;
    }
}
