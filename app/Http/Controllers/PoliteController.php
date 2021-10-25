<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Polita;
use DB;
use App\Mail\PolitaGenerata;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;


class PDF_Obj{

    public function __construct($pdf, $nume)
    {
        $this->pdf = $pdf;
        $this->nume = $nume;
    }
    /**
     * @var string
     */
    public $pdf;
    /**
     * @var string
     */
    public $nume;
}

class PoliteController extends Controller
{

    public function index($perioada = 'luna')
    {
        $rol = auth()->user()->role;
        $polite = [];
        if($rol == 'partener') {
            if($perioada == 'luna') {
                $fromDate = Carbon::now()->startOfMonth()->toDateString();
                $tillDate = Carbon::now()->addDay()->toDateString();
                $polite = DB::table('polite')
                ->select('*')
                ->where('id_utilizator', '=', auth()->user()->id)
                ->whereBetween('created_at',[$fromDate,$tillDate])
                ->orderByRaw('"data-generare" DESC')
                ->paginate(15);
            } else if($perioada == 'azi') {
                $polite = DB::table('polite')
                ->select('*')
                ->where('id_utilizator', '=', auth()->user()->id)
                ->where(
                    'created_at', '>=', Carbon::now()->toDateString()
                )
                ->orderByRaw('"data-generare" DESC')
                ->paginate(15);
            }else if($perioada == 'total') {
                $polite = DB::table('polite')
                ->select('*')
                ->where('id_utilizator', '=', auth()->user()->id)
                ->orderByRaw('"data-generare" DESC')
                ->paginate(15);
            }
            return $polite;
        } elseif($rol == 'admin') {
            
            if($perioada == 'luna') {
                $fromDate = Carbon::now()->startOfMonth()->toDateString();
                $tillDate = Carbon::now()->addDay()->toDateString();
                $polite = DB::table('polite')
                ->whereBetween('created_at',[$fromDate,$tillDate])
                ->orderByRaw('"data-generare" DESC')
                ->paginate(15);
            } else if($perioada == 'azi') {
                $polite = DB::table('polite')
                ->select('*')
                ->where(
                    'created_at', '>=', Carbon::now()->toDateString()
                )
                ->orderByRaw('"data-generare" DESC')
                ->paginate(15);
            }else if($perioada == 'total') {
                $polite = DB::table('polite')
                ->select('*')
                ->orderByRaw('"data-generare" DESC')
                ->paginate(15);
            }
            return $polite;
        }
        return $polite;
    }

    public function index_platite($perioada, $id = '')
    {
        $user_id = auth()->user()->id;
        if($id != '') {
            $user_id =  $id;
        }
        $polite = [];
        if($perioada == 'luna') {
            $fromDate = Carbon::now()->startOfMonth()->toDateString();
            $tillDate = Carbon::now()->addDay()->toDateString();
            $polite = Polita::where('id_utilizator', $user_id)
            ->where('comision_platit', '=', 1)->whereBetween('created_at',[$fromDate,$tillDate])->paginate(15);
        } else if($perioada == 'azi') {
            $polite = Polita::where('id_utilizator', $user_id)
                                ->where(
                                    'created_at', '>=', Carbon::now()->toDateString()
                                )
                                ->where('comision_platit', '=', 1)->paginate(15);
        }else if($perioada == 'total') {
            $polite = Polita::where('id_utilizator', $user_id)->where('comision_platit', '=', 1)->paginate(15);
        }
        return $polite;
    }

    public function index_neplatite($perioada, $id = '')
    {
        $user_id = auth()->user()->id;
        if($id != '') {
            $user_id =  $id;
        }
        $polite = [];
        if($perioada == 'luna') {
            $fromDate = Carbon::now()->startOfMonth()->toDateString();
            $tillDate = Carbon::now()->addDay()->toDateString();
            $polite = Polita::where('id_utilizator', $user_id)
            ->where('comision_platit', '=', 0)->whereBetween('created_at',[$fromDate,$tillDate])->paginate(15);
        } else if($perioada == 'azi') {
            $polite = Polita::where('id_utilizator', $user_id)
                                ->where(
                                    'created_at', '>=', Carbon::now()->toDateString()
                                )->where('comision_platit', '=', 0)->paginate(15);
        }else if($perioada == 'total') {
            $polite = Polita::where('id_utilizator', $user_id)->where('comision_platit', '=', 0)->paginate(15);
        }
        return $polite;
    }

    ///modificare status comision
    public function status_comision(Request $request)
    {
        $ids = request('ids');
        $status = request('status');
        foreach ($ids as $key => $id) {
            $polita = Polita::where('id', $id)->first();
            if($polita){
                $polita->comision_platit = $status;
                $polita->save();
            }
        }
        return ['edit' => true];
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
            $polite = DB::table('polite')
            ->select('*')
            ->where('nr_inmatriculare', 'LIKE', '%'.urldecode($termeni).'%')
                        ->orWhere('nume_proprietar', 'LIKE', '%'.urldecode($termeni).'%')
                        ->orWhere('prenume_proprietar', 'LIKE', '%'.urldecode($termeni).'%')
                        ->orWhere('email', 'LIKE', '%'.urldecode($termeni).'%')
                        ->orWhere('telefon', 'LIKE', '%'.urldecode($termeni).'%')
                        ->orderByRaw('"data-generare" DESC')
                        ->get();
            return $polite;
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
        $user_id = auth()->user()->id;
        if($rol == 'partener') {
            $polite = Polita::where('id_utilizator', )->count();
            return $polite;
        } elseif($rol == 'admin') {
            $polite = Polita::count();
            return $polite;
        }
    }

    /**
     *Numara polite in funtie de perioada selectata
     */
    public function list_perioada($perioada, $id = '')
    {
        $rol = auth()->user()->role;
        $user_id = auth()->user()->id;
        if($id != '') {
            $rol = 'partener';
            $user_id =  $id;
        }
        $polite = 0;
        if($rol == 'partener') {
            if($perioada == 'luna') {
                $fromDate = Carbon::now()->startOfMonth()->toDateString();
                $tillDate = Carbon::now()->addDay()->toDateString();
                $polite = Polita::where('id_utilizator', $user_id)
                                    ->whereBetween('created_at',[$fromDate,$tillDate])->get()->count();
            } else if($perioada == 'azi') {
                $polite = Polita::where('id_utilizator', $user_id)
                                    ->where(
                                        'created_at', '>=', Carbon::now()->toDateString()
                                    )->get()->count();
            }else if($perioada == 'total') {
                $polite = Polita::where('id_utilizator', $user_id)->count();
            }
            return $polite;
        } elseif($rol == 'admin') {
            if($perioada == 'luna') {
                $fromDate = Carbon::now()->startOfMonth()->toDateString();
                $tillDate = Carbon::now()->addDay()->toDateString();
                $polite = Polita::whereBetween('created_at',[$fromDate,$tillDate])->get()->count();
            } else if($perioada == 'azi') {
                $polite = Polita::where(
                                        'created_at', '>=', Carbon::now()->toDateString()
                                    )->get()->count();
            }else if($perioada == 'total') {
                $polite = Polita::count();
            }
            return $polite;
        }
        return $polite;
    }


        /**
     *comision polite in funtie de perioada selectata
     */
    public function comision_perioada($perioada, $id = '')
    {
        $rol = auth()->user()->role;
        $user_id = auth()->user()->id;
        if($id != '') {
            $rol = 'partener';
            $user_id =  $id;
        }
        $polite = 0;
        if($rol == 'partener') {
            if($perioada == 'luna') {
                $fromDate = Carbon::now()->startOfMonth()->toDateString();
                $tillDate = Carbon::now()->addDay()->toDateString();
                $polite = Polita::where('id_utilizator', $user_id)
                                    ->whereBetween('created_at',[$fromDate,$tillDate])->get()->sum('comision');
            } else if($perioada == 'azi') {
                $polite = Polita::where('id_utilizator', $user_id)
                                    ->where(
                                        'created_at', '>=', Carbon::now()->toDateString()
                                    )->get()->count();
            }else if($perioada == 'total') {
                $polite = Polita::where('id_utilizator', $user_id)->sum('comision');
            }
            return $polite;
        } elseif($rol == 'admin') {
            if($perioada == 'luna') {
                $fromDate = Carbon::now()->startOfMonth()->toDateString();
                $tillDate = Carbon::now()->addDay()->toDateString();
                $polite = Polita::whereBetween('created_at',[$fromDate,$tillDate])->get()->sum('comision');
            } else if($perioada == 'azi') {
                $polite = Polita::where(
                                        'created_at', '>=', Carbon::now()->toDateString()
                                    )->get()->sum('comision');
            }else if($perioada == 'total') {
                $polite = Polita::sum('comision');
            }
            return $polite;
        }
        return $polite;
    }

    // public function vanzari()
    // {
    //     $rol = auth()->user()->role;
    //     if($rol == 'partener') {
    //         $polite = Polita::where('id_utilizator', auth()->user()->id)->sum('suma');
    //         return $polite;
    //     } elseif($rol == 'admin') {
    //         $polite = Polita::sum('suma');
    //         return $polite;
    //     }
    // }

    public function vanzari($perioada = 'luna', $id = '')
    {
        $rol = auth()->user()->role;
        $user_id = auth()->user()->id;
        if($id != '') {
            $rol = 'partener';
            $user_id =  $id;
        }
        $polite = 0;
        if($rol == 'partener') {
            if($perioada == 'luna') {
                $fromDate = Carbon::now()->startOfMonth()->toDateString();
                $tillDate = Carbon::now()->addDay()->toDateString();
                $polite = Polita::where('id_utilizator', $user_id)
                                    ->whereBetween('created_at',[$fromDate,$tillDate])->get()->sum('suma');
            } else if($perioada == 'azi') {
                $polite = Polita::where('id_utilizator', $user_id)
                                    ->where(
                                        'created_at', '>=', Carbon::now()->toDateString()
                                    )->get()->sum('suma');
            }else if($perioada == 'total') {
                $polite = Polita::where('id_utilizator', $user_id)->sum('suma');
            }
            return $polite;
        } elseif($rol == 'admin') {
            if($perioada == 'luna') {
                $fromDate = Carbon::now()->startOfMonth()->toDateString();
                $tillDate = Carbon::now()->addDay()->toDateString();
                $polite = Polita::whereBetween('created_at',[$fromDate,$tillDate])->get()->sum('suma');
            } else if($perioada == 'azi') {
                $polite = Polita::where(
                                        'created_at', '>=', Carbon::now()->toDateString()
                                    )->get()->sum('suma');
            }else if($perioada == 'total') {
                $polite = Polita::sum('suma');
            }
            return $polite;
        }
    }

    public function admin_polite() {
        return view('admin.polite');
    }

    public function save_pdf($id_oferta) {
        $polita = Polita::where('id', $id_oferta)->first();

        $link = 'link-polita';
        $data_generare = 'data-generare';

        // Create a stream
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,$polita->$link);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'GoAsig');
        $pdf = curl_exec($curl_handle);
        curl_close($curl_handle);

        $nume = $polita->nr_inmatriculare.'-'.$id_oferta.'-'.$polita->$data_generare.'.pdf';

        $to_send = new PDF_Obj($pdf, $nume);

        Mail::to('mihai.cristian.d@gmail.com')->send(new PolitaGenerata($pdf));

     
        \Storage::disk('public')->put($nume, $pdf);
     
        return 'OK';
     }

}
