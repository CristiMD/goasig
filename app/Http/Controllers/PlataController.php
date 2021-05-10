<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\Polita;


class ComplexCredentials{

    public function __construct($user, $parola) 
    {
        $this->user = $user;
        $this->parola = $parola;
    }
    /**
     * @var string
     */
    public $user;
    /**
     * @var string
     */
    public $parola;
}

class PlataController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $location_URL = "https://ubuntuphptest.maxygo-online.ro/mgb/home/emit_rca.php/home/rcawsdl";
        $action_URL ="https://ubuntuphptest.maxygo-online.ro";

        $client = new \SoapClient('https://ubuntuphptest.maxygo-online.ro/mgb/home/emit_rca.php/home/rcawsdl?wsdl', array(
        'soap_version' => SOAP_1_1,
        'location' => $location_URL,
        'uri'      => $action_URL,
        'style'    => SOAP_RPC,
        'use'      => SOAP_ENCODED,
        'trace'    => 1,
        ));

        $username = 'testRCA';
        $password = 'test.1234';

        $autentificare = new ComplexCredentials($username, $password);

        $IdOferta = $request->query('idOferta');

        try {
            $result = $client->__call('ValidarePlataRCA',
            array(
                $autentificare,
                $IdOferta
                )
        );
        if($result->Eroare != 1){
            // echo '<br><br>';
            return redirect('/emite?idOferta='.$request->query('idOferta'));
        } else {
            return view('eroareplata', ['eroare' => 1]);
        }
        
        } catch(Exception $a) {
            echo $a;
        }

        return view('eroareplata', ['eroare' =>1]);

        // 

    }

    public function emitere(Request $request)
    {

        $location_URL = "https://ubuntuphptest.maxygo-online.ro/mgb/home/emit_rca.php/home/rcawsdl";
        $action_URL ="https://ubuntuphptest.maxygo-online.ro";

        $client = new \SoapClient('https://ubuntuphptest.maxygo-online.ro/mgb/home/emit_rca.php/home/rcawsdl?wsdl', array(
        'soap_version' => SOAP_1_1,
        'location' => $location_URL,
        'uri'      => $action_URL,
        'style'    => SOAP_RPC,
        'use'      => SOAP_ENCODED,
        'trace'    => 1,
        ));

        $username = 'testRCA';
        $password = 'test.1234';

        $autentificare = new ComplexCredentials($username, $password);

        $IdOferta = $request->query('idOferta');

        try {
            $result = $client->__call('EmitePolitaRCA',
            array(
                $autentificare,
                $IdOferta
             )
        );
        // print_r($result);
        if($result->Eroare != 1){
            // print_r($result);
            // echo '<br><br>';
            $this->createPolita($IdOferta, $result->PolitaPDF);
            
        }
        
        } catch(Exception $a) {
            echo $a;
        }

        return view('plata', ['pdf' => $result->PolitaPDF]);

    }


    public function createPolita($id_oferta, $link)
    {

        date_default_timezone_set('UTC');

        $selected_offer = Oferta::where('id', $id_oferta)->first();
        print_r($selected_offer);
        $duplicate = Oferta::where('nr_inmatriculare', $selected_offer->nr_inmatriculare)->first();
        if($duplicate) {
            Oferta::where('nr_inmatriculare', $selected_offer->nr_inmatriculare)->delete();
        }
        $datagenerare = 'data-generare';
        $dataexpirare = 'data-expirare';
        $dataincepere = 'data-incepere';
        $linkplata = 'link_plata';

        $polita = new Polita(array(
            'id' => $id_oferta,
            'id_utilizator'  => $selected_offer->id_utilizator,
            'nr_inmatriculare' => $selected_offer->nr_inmatriculare,
            'link-polita' => $link,
            'suma' => $selected_offer->suma,
            'perioada' => $selected_offer->perioada,
            'decontare_directa' => $selected_offer->decontare_directa,
            'asigurator' => $selected_offer->asigurator,
            'cod_unic_proprietar' => $selected_offer->cod_unic_proprietar,
            'tip_persoana'  => $selected_offer->tip_persoana,
            'nume_proprietar' => $selected_offer->nume_proprietar,
            'prenume_proprietar' => $selected_offer->prenume_proprietar,
            'serie_ci_proprietar' => $selected_offer->serie_ci_proprietar,
            'nr_ci_proprietar' => $selected_offer->nr_ci_proprietar,
            'cod_unic_conducator' => $selected_offer->cod_unic_conducator,
            'nume_conducator' => $selected_offer->nume_conducator,
            'prenume_conducator' => $selected_offer->prenume_conducator,
            'serie_ci_conducator' => $selected_offer->serie_ci_conducator,
            'nr_ci_conducator' => $selected_offer->nr_ci_conducator,
            'data-generare' => $selected_offer->$datagenerare,
            'data-expirare' => $selected_offer->$dataexpirare,
            'data-incepere' => $selected_offer->$dataincepere
        ));
        $polita->timestamps = false;
        $polita->save();
    }

}
