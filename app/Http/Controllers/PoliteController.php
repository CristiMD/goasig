<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Polita;


class PoliteController extends Controller
{
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
