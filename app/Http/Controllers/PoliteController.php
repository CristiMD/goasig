<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Polita;
use DB;
use App\Mail\PolitaGenerata;
use Illuminate\Support\Facades\Mail;


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

    public function index()
    {
        // $polite = DB::table('polite')
        // ->join('users', 'polite.id_utilizator', '=', 'users.id')
        // ->select('polite.*', 'users.telefon')
        // ->get();
        $polite = DB::table('polite')
                    ->orderByRaw('"data-generare" DESC')
                    ->paginate(15);
        // $polite->withPath('/admin/polite');
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
