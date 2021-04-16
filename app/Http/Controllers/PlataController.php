<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


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
        }
        
        } catch(Exception $a) {
            echo $a;
        }

        return view('plata', ['pdf' => $result->PolitaPDF]);

    }
}
