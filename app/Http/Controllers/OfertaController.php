<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;


class OfertaController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('oferte');
    }

    public function admin_oferte() {
        return view('admin.oferte');
    }

    public function index_perioada($perioada = 'luna')
    {
        $rol = auth()->user()->role;
        $oferte = [];
        if($rol == 'partener') {
            if($perioada == 'luna') {
                $fromDate = Carbon::now()->startOfMonth()->toDateString();
                $tillDate = Carbon::now()->addDay()->toDateString();
                $oferte = DB::table('oferte')
                ->select('*')
                ->where('id_utilizator', '=', auth()->user()->id)
                ->whereBetween('created_at',[$fromDate,$tillDate])
                ->orderByRaw('"data-generare" DESC')
                ->paginate(15);
            } else if($perioada == 'azi') {
                $oferte = DB::table('oferte')
                ->select('*')
                ->where('id_utilizator', '=', auth()->user()->id)
                ->where(
                    'created_at', '>=', Carbon::now()->toDateString()
                )
                ->orderByRaw('"data-generare" DESC')
                ->paginate(15);
            }else if($perioada == 'total') {
                $oferte = DB::table('oferte')
                ->select('*')
                ->where('id_utilizator', '=', auth()->user()->id)
                ->orderByRaw('"data-generare" DESC')
                ->paginate(15);
            }
            return $oferte;
        } elseif($rol == 'admin') {
            
            if($perioada == 'luna') {
                $fromDate = Carbon::now()->startOfMonth()->toDateString();
                $tillDate = Carbon::now()->addDay()->toDateString();
                $oferte = DB::table('oferte')
                ->whereBetween('created_at',[$fromDate,$tillDate])
                ->orderByRaw('"data-generare" DESC')
                ->paginate(15);
            } else if($perioada == 'azi') {
                $oferte = DB::table('oferte')
                ->select('*')
                ->where(
                    'created_at', '>=', Carbon::now()->toDateString()
                )
                ->orderByRaw('"data-generare" DESC')
                ->paginate(15);
            }else if($perioada == 'total') {
                $oferte = DB::table('oferte')
                ->select('*')
                ->orderByRaw('"data-generare" DESC')
                ->paginate(15);
            }
            return $oferte;
        }
        return $oferte;
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
            $oferte = DB::table('oferte')
            ->select('*')
            ->where('nr_inmatriculare', 'LIKE', '%'.urldecode($termeni).'%')
                        ->orWhere('nume_proprietar', 'LIKE', '%'.urldecode($termeni).'%')
                        ->orWhere('prenume_proprietar', 'LIKE', '%'.urldecode($termeni).'%')
                        ->orWhere('email', 'LIKE', '%'.urldecode($termeni).'%')
                        ->orWhere('telefon', 'LIKE', '%'.urldecode($termeni).'%')
                        ->orderByRaw('"data-generare" DESC')
                        ->get();
            return $oferte;
        }
        return [];
    }
    
    /**
     *Numara oferte in funtie de perioada selectata
     */
    public function list_perioada($perioada)
    {
        $rol = auth()->user()->role;
        $user_id = auth()->user()->id;
        $oferte = 0;
        if($rol == 'partener') {
            if($perioada == 'luna') {
                $fromDate = Carbon::now()->startOfMonth()->toDateString();
                $tillDate = Carbon::now()->addDay()->toDateString();
                $oferte = Oferta::where('id_utilizator', $user_id)
                                    ->whereBetween('created_at',[$fromDate,$tillDate])->get()->count();
            } else if($perioada == 'azi') {
                $oferte = Oferta::where('id_utilizator', $user_id)
                                    ->where(
                                        'created_at', '>=', Carbon::now()->toDateString()
                                    )->get()->count();
            }else if($perioada == 'total') {
                $oferte = Oferta::where('id_utilizator', $user_id)->count();
            }
            return $oferte;
        } elseif($rol == 'admin') {
            if($perioada == 'luna') {
                $fromDate = Carbon::now()->startOfMonth()->toDateString();
                $tillDate = Carbon::now()->addDay()->toDateString();
                $oferte = Oferta::whereBetween('created_at',[$fromDate,$tillDate])->get()->count();
            } else if($perioada == 'azi') {
                $oferte = Oferta::where(
                                        'created_at', '>=', Carbon::now()->toDateString()
                                    )->get()->count();
            }else if($perioada == 'total') {
                $oferte = Oferta::count();
            }
            return $oferte;
        }
        return $oferte;
    }
}
