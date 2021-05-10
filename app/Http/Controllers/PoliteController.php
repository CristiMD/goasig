<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Polita;


class PoliteController extends Controller
{

    public function index()
    {
        $polite = Polita::all();
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

}
