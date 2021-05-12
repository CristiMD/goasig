<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Polita;
use DB;


class PoliteController extends Controller
{

    public function index()
    {
        $polite = DB::table('polite')
        ->join('users', 'polite.id_utilizator', '=', 'users.id')
        ->select('polite.*', 'users.telefon')
        ->get();
        return $polite;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function numara()
    {
        $polite = Polita::count();
        return $polite;
    }

    public function vanzari()
    {
        $polite = Polita::sum('suma');
        return $polite;
    }

    public function admin_polite() {
        return view('admin.polite');
    }

}
