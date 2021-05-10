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

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        return $users;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function numara()
    {
        $users = User::count();
        return $users;
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

        $check = User::where('email', $email)->first();

        if(!$check){
            $user = new User(array(
                'email' => $email,
                'nume' => $nume,
                'parola' => Hash::make($parola),
                'telefon' => $telefon
            ));
        
            $user->timestamps = false;
            $user->save();
            return $user;
        }
        return response(200)->json([
            'created' => false 
       ]);
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        if($user){
            $user->delete();
            return ['deleted' => true];
        }

        return response(200)->json([
            'deleted' => false 
       ]);
    }
}
