<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use File;
use Illuminate\Support\Facades\Hash;


///async SOAP
use GuzzleHttp\Client;
use Meng\AsyncSoap\Guzzle\Factory;
use Laminas\Diactoros\RequestFactory;
use Laminas\Diactoros\StreamFactory;
////

use RicorocksDigitalAgency\Soap\Facades\Soap;



use App\Models\Vehicul;
use App\Models\User;
use App\Models\Proprietar;
use App\Models\Conducator;
use App\Models\Oferta;


use Carbon\Carbon;




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

class ComplexVehicle{

    public function __construct($_serie_sasiu,$_stare_autevehicul,$_numar_inmatriculare,$_marca,$_model,$_serie_motor,$_serie_civ,$_an_fabricatie,$_km_totali,$_km_an, $_tip_autovehicul,$_capacitate_cilindrica,$_nr_locuri,$_masa_maxima,$_putere,$_combustibil,$_allianz_supl,$_allianz_dealer,$_city_acc,$_euroins_acc,$_decontare_directa) {
        $this->nr_identificare = $_serie_sasiu;
        $this->stadiu = $_stare_autevehicul;
        $this->nr_auto = $_numar_inmatriculare;
        $this->marca = $_marca;
        $this->model = $_model;
        $this->serie_motor = $_serie_motor;
        $this->serie_civ = $_serie_civ;
        $this->an_fabricatie = $_an_fabricatie;
        $this->km = $_km_totali;
        $this->km_an = $_km_an;
        $this->categorie = $_tip_autovehicul;
        $this->capacitate = $_capacitate_cilindrica;
        $this->nr_locuri = $_nr_locuri;
        $this->masa_maxima = $_masa_maxima;
        $this->putere_kw = $_putere;
        $this->tip_combustibil = $_combustibil;
        $this->allianz_acoperiri_suplimentare = $_allianz_supl;
        $this->allianz_comercializat_de_un_dealer = $_allianz_dealer;
        $this->city_acc = $_city_acc;
        $this->euroins_acc = $_euroins_acc;
        $this->cu_decontare_directa = $_decontare_directa;
        $this->data_prima_inmatriculare = '2014-09-20';
        $this->no_young_driver = true;
    }
    /**
     * @var string
     */
    public $nr_identificare;
    /**
     * @var string
     */
    public $stadiu;
    /**
     * @var string
     */
    public $nr_auto;
    /**
     * @var string
     */
    public $marca;
    /**
     * @var string
     */
    public $model;
    /**
     * @var string
     */
    public $serie_motor;
    /**
     * @var string
     */
    public $serie_civ;
    /**
     * @var int
     */
    public $an_fabricatie;
    /**
     * @var int
     */
    public $km;
    /**
     * @var int
     */
    public $km_an;
    /**
     * @var string
     */
    public $categorie;
    /**
     * @var int
     */
    public $capacitate;
    /**
     * @var int
     */
    public $nr_locuri;
    /**
     * @var int
     */
    public $masa_maxima;
    /**
     * @var int
     */
    public $putere_kw;
    /**
     * @var string
     */
    public $tip_combustibil;
    /**
     * @var string
     */
    public $allianz_acoperiri_suplimentare;
    /**
     * @var string
     */
    public $allianz_comercializat_de_un_dealer;
    /**
     * @var string
     */
    public $no_young_driver;
    /**
     * @var string
     */
    public $city_acc;
    /**
     * @var string
     */
    public $euroins_acc;
    /**
     * @var string
     */
    public $cu_decontare_directa;
    /**
     * @var string
     */
    public $data_prima_inmatriculare;
}


/**
         * @pw_element string $codUnic
         * @pw_element string $nume
         * @pw_element string $prenume
         * @pw_element string $sex
         * @pw_element string $judet
         * @pw_element string $localitate
         * @pw_element int $cod
         * @pw_element string $strada
         * @pw_element string $numar
         * @pw_element string $bloc
         * @pw_element string $scara
         * @pw_element string $etaj
         * @pw_element string $apartament
         * @pw_element string $cod_postal
         * @pw_element string $email
         * @pw_element string $telefon
         * @pw_element string $mobil
         * @pw_element string $permis_data
         * @pw_element string $serie_ci
         * @pw_element string $numar_ci
         * @pw_element string $companie_tip
         * @pw_element string $companie_profil
         * @pw_element string $companie_activitate
         * @pw_element string $companie_caen
         * @pw_complex ComplexOwner
         */
        class ComplexOwner{

            public function __construct($_cod_unic, $_nume , $_prenume ,$_sex_owner, $_judet , $_localitate, $_cod_siruta , $_strada, $_numar , $_bloc , $_scara , $_etaj, $_ap, $_cod_postal, $_email, $_telefon, $_mobil, $_permis_data, $_serie_ci, $_numar_ci, $_companie_tip, $_companie_profil, $_companie_activitate, $_companie_caen) {
                $this->codUnic = $_cod_unic;
                $this->nume = $_nume;
                $this->prenume = $_prenume;
                $this->sex = $_sex_owner;
                $this->judet = $_judet;
                $this->localitate = $_localitate;
                $this->cod = $_cod_siruta;
                $this->strada = $_strada;
                $this->numar = $_numar;
                $this->bloc = $_bloc;
                $this->scara = $_scara;
                $this->etaj = $_etaj;
                $this->apartament = $_ap;
                $this->cod_postal = $_cod_postal;
                $this->email = $_email;
                $this->telefon = $_telefon;
                $this->mobil = $_mobil;
                $this->permis_data = $_permis_data;
                $this->serie_ci = $_serie_ci;
                $this->numar_ci = $_numar_ci;
                $this->companie_tip = $_companie_tip;
                $this->companie_profil = $_companie_profil;
                $this->companie_activitate = $_companie_activitate;
                $this->companie_caen = $_companie_caen;
            }

            /**
             * @var string
             */
            public $codUnic;
            /**
             * @var string
             */
            public $nume;
            /**
             * @var string
             */
            public $prenume;
            /**
             * @var string
             */
            public $sex;
            /**
             * @var string
             */
            public $judet;
            /**
             * @var string
             */
            public $localitate;
            /**
             * @var int
             */
            public $cod;
            /**
             * @var string
             */
            public $strada;
            /**
             * @var string
             */
            public $numar;
            /**
             * @var string
             */
            public $bloc;
            /**
             * @var string
             */
            public $scara;
            /**
             * @var string
             */
            public $etaj;
            /**
             * @var string
             */
            public $apartament;
            /**
             * @var string
             */
            public $cod_postal;
            /**
             * @var string
             */
            public $email;
            /**
             * @var string
             */
            public $telefon;
            /**
             * @var string
             */
            public $mobil;
            /**
             * @var string
             */
            public $permis_data;
            /**
             * @var string
             */
            public $serie_ci;
            /**
             * @var string
             */
            public $numar_ci;
            /**
             * @var string
             */
            public $companie_tip;
            /**
             * @var string
             */
            public $companie_profil;
            /**
             * @var string
             */
            public $companie_activitate;
            /**
             * @var string
             */
            public $companie_caen;
        }

        /**
         * @pw_element string $codUnic
         * @pw_element string $nume
         * @pw_element string $prenume
         * @pw_element string $sex
         * @pw_element string $judet
         * @pw_element string $localitate
         * @pw_element int $cod
         * @pw_element string $strada
         * @pw_element string $numar
         * @pw_element string $bloc
         * @pw_element string $scara
         * @pw_element string $etaj
         * @pw_element string $apartament
         * @pw_element string $cod_postal
         * @pw_element string $email
         * @pw_element string $telefon
         * @pw_element string $mobil
         * @pw_element string $permis_data
         * @pw_element string $serie_ci
         * @pw_element string $numar_ci
         * @pw_element string $companie_tip
         * @pw_element string $companie_profil
         * @pw_element string $companie_activitate
         * @pw_element string $companie_caen
         * @pw_complex ComplexUser
         */
        class ComplexUser{

            public function __construct($_cod_unic, $_nume , $_prenume ,$_sex_owner, $_judet , $_localitate, $_cod_siruta , $_strada, $_numar , $_bloc , $_scara , $_etaj, $_ap, $_cod_postal, $_email, $_telefon, $_mobil, $_permis_data, $_serie_ci, $_numar_ci, $_companie_tip, $_companie_profil, $_companie_activitate, $_companie_caen) {
                $this->codUnic = $_cod_unic;
                $this->nume = $_nume;
                $this->prenume = $_prenume;
                $this->sex = $_sex_owner;
                $this->judet = $_judet;
                $this->localitate = $_localitate;
                $this->cod = $_cod_siruta;
                $this->strada = $_strada;
                $this->numar = $_numar;
                $this->bloc = $_bloc;
                $this->scara = $_scara;
                $this->etaj = $_etaj;
                $this->apartament = $_ap;
                $this->cod_postal = $_cod_postal;
                $this->email = $_email;
                $this->telefon = $_telefon;
                $this->mobil = $_mobil;
                $this->permis_data = $_permis_data;
                $this->serie_ci = $_serie_ci;
                $this->numar_ci = $_numar_ci;
                $this->companie_tip = $_companie_tip;
                $this->companie_profil = $_companie_profil;
                $this->companie_activitate = $_companie_activitate;
                $this->companie_caen = $_companie_caen;
            }
            /**
             * @var string
             */
            public $codUnic;
            /**
             * @var string
             */
            public $nume;
            /**
             * @var string
             */
            public $prenume;
            /**
             * @var string
             */
            public $sex;
            /**
             * @var string
             */
            public $judet;
            /**
             * @var string
             */
            public $localitate;
            /**
             * @var int
             */
            public $cod;
            /**
             * @var string
             */
            public $strada;
            /**
             * @var string
             */
            public $numar;
            /**
             * @var string
             */
            public $bloc;
            /**
             * @var string
             */
            public $scara;
            /**
             * @var string
             */
            public $etaj;
            /**
             * @var string
             */
            public $apartament;
            /**
             * @var string
             */
            public $cod_postal;
            /**
             * @var string
             */
            public $email;
            /**
             * @var string
             */
            public $telefon;
            /**
             * @var string
             */
            public $mobil;
            /**
             * @var string
             */
            public $permis_data;
            /**
             * @var string
             */
            public $serie_ci;
            /**
             * @var string
             */
            public $numar_ci;
            /**
             * @var string
             */
            public $companie_tip;
            /**
             * @var string
             */
            public $companie_profil;
            /**
             * @var string
             */
            public $companie_activitate;
            /**
             * @var string
             */
            public $companie_caen;
        }

        /**
         * @pw_element string $nume
         * @pw_element string $prenume
         * @pw_element string $cnp
         * @pw_element string $serie
         * @pw_element string $numar
         * @pw_complex ComplexDriver
         */
        class ComplexDriver{

            public function __construct($_nume_driver,$_prenume_driver,$_cnp_driver,$_serie_ci_driver,$_numar_ci_driver){
                $this->nume = $_nume_driver;
                $this->prenume = $_prenume_driver;
                $this->cnp = $_cnp_driver;
                $this->serie = $_serie_ci_driver;
                $this->numar = $_numar_ci_driver;
            }

            
            /**
             * @var string
             */
            public $nume;
            /**
             * @var string
             */
            public $prenume;
            /**
             * @var string
             */
            public $cnp;
            /**
             * @var string
             */
            public $serie;
            /**
             * @var string
             */
            public $numar;
        }

class CereriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $username = 'testRCA';
        // $password = 'test.1234';
        // $_km_totali = '120000';
        // $_km_an = '12000';
        // $_serie_motor='A123123';
        // $_allianz_supl = 'false';
        // $_allianz_dealer = 'false';
        // $_email='office@goasig.ro';
        // $_telefon='0232100100';
        // $_mobil='0763884692';
        // $_companie_tip ='?';
        // $_companie_profil='?';
        // $_companie_activitate='?';
        // $_companie_caen='?';
        // $nr_luni_valabilitate = "6";
        // $pensionar='0'; 
        // $deficiente='0';
        // $data_inceput_valabilitate='2021-05-01';
        // $activitate= 'Privat';
        // $leasing='3';  // nu este leasing
        // $tip_persoana= 'pf';
        // $_serie_sasiu = 'TMBCS21Z172152321';
        // $_stare_autevehicul =  'Inmatriculat';
        // $_numar_inmatriculare = 'BT86ABA';
        // $_marca = 'SKODA'; 
        // $_model = 'OCTAVIA';
        // $_serie_civ = 'F771864';
        // $_an_fabricatie = '2007';
        // $_tip_autovehicul = 'Autoturism';
        // $_capacitate_cilindrica ='1896';
        // $_nr_locuri = '5';
        // $_masa_maxima= '1970';
        // $_putere = '77';
        // $_combustibil = '502';
        // $_city_acc = 'false';
        // $_euroins_acc = 'false';
        // $_decontare_directa = 'false';

        // $link_redirect_plata='https://goasig.ro/platforma/public/plata';

        // $asg_rm = array('euroins','generali', 'uniqa', 'grawe');
        // $asiguratori = array('city', 'groupama', 'omniasig','generali', 'grawe', 'uniqa');
        // $nr_luni = array('6', '12');


        // ///proprietar
        // $_cod_unic = '1991002070061';
        // $_nume = 'Andrei';
        // $_prenume= 'Andi'; 
        // $_serie_ci= 'XT';
        // $_numar_ci = '123123';
        // $_sex_owner='M';
        // $_judet = 'IASI';
        // $_localitate = 'PASCANI';
        // $_cod_siruta = '95408';  // default pascani
        // $_strada = 'Crinului'; 
        // $_numar = '20B'; 
        // $_bloc = '-';
        // $_scara = '-';
        // $_etaj = '-';
        // $_ap = '-';
        // $_cod_postal='705200';
        // $_permis_data='2017-01-01';  


        // $_nume_driver = 'Andrei';
        // $_prenume_driver= 'Andi'; 
        // $_cnp_driver= '1991002070061';
        // $_serie_ci_driver='XT';
        // $_numar_ci_driver= '123123';



        // $autentificare = new ComplexCredentials($username, $password);
        // $masina = new ComplexVehicle($_serie_sasiu,$_stare_autevehicul,$_numar_inmatriculare,$_marca,$_model,$_serie_motor,$_serie_civ,$_an_fabricatie,$_km_totali,$_km_an,$_tip_autovehicul,$_capacitate_cilindrica,$_nr_locuri,$_masa_maxima,$_putere,$_combustibil,$_allianz_supl,$_allianz_dealer,$_city_acc,$_euroins_acc,$_decontare_directa);
        // $proprietar = new ComplexOwner($_cod_unic, $_nume , $_prenume ,$_sex_owner, $_judet , $_localitate, $_cod_siruta , $_strada, $_numar , $_bloc , $_scara , $_etaj, $_ap, $_cod_postal, $_email, $_telefon, $_mobil, $_permis_data, $_serie_ci, $_numar_ci, $_companie_tip, $_companie_profil, $_companie_activitate, $_companie_caen);
        // $utilizator = new ComplexUser($_cod_unic, $_nume , $_prenume ,$_sex_owner, $_judet , $_localitate, $_cod_siruta , $_strada, $_numar , $_bloc , $_scara , $_etaj, $_ap, $_cod_postal, $_email, $_telefon, $_mobil, $_permis_data, $_serie_ci, $_numar_ci, $_companie_tip, $_companie_profil, $_companie_activitate, $_companie_caen);
        // $conducator = new ComplexDriver($_nume_driver,$_prenume_driver,$_cnp_driver,$_serie_ci_driver,$_numar_ci_driver);

        // $factory = new Factory();
        // $client = $factory->create(new Client(), new StreamFactory(), new RequestFactory(), 'https://ubuntuphptest.maxygo-online.ro/mgb/home/emit_rca.php/home/rcawsdl?wsdl');

        // $cereri = [];
        // $oferte = [];
        // // async call
        // foreach ($nr_luni as $luna) {
        //     foreach ($asiguratori as $asigurator) {
        //         $promise = $client->callAsync('CerereOfertaRCA', array(
        //             $autentificare,
        //                         $link_redirect_plata,
        //                         $asigurator,
        //                         $luna,
        //                         $data_inceput_valabilitate,
        //                         $activitate,
        //                         $leasing,
        //                         $masina,
        //                         $tip_persoana,
        //                         $pensionar,
        //                         $deficiente,
        //                         $proprietar,
        //                         $utilizator,
        //                         $conducator
        //         ));
        //         // $result = $promise->wait();
        //         array_push($cereri, [$promise,$asigurator]);
        //     }
        // }

        // for ($i=0; $i < count($cereri); $i++) {
        //     $cereri[$i][0]->wait();
        //     $tmp = array('date' => $cereri[$i][0]->display()->result, 'asigurator' => $cereri[$i][1]);
        //             // print_r($result);
        //             // echo '<br><br>';
        //     array_push($oferte, $tmp);
        // }

        // $collection = collect($oferte);
        
        // $grouped = $collection->mapToGroups(function ($item, $key) {
        //     return [$item['asigurator'] => $item['date']];
        // });
        
        // print_r($grouped);
        // $arr = (array)$cereri[0][0];
        
        // var_dump($cereri[0][0]);
        // foreach($arr as $i => $item) {
            // print_r($cereri[0][0]->display()->result);
            // echo($i);
            // print_r("<br>");
        // }

        $user = auth()->user();

        print_r($user->id);

    }

    // public function marci(Request $request)
    // {

    //     $location_URL = "https://ubuntuphptest.maxygo-online.ro/mgb/home/emit_rca.php/home/rcawsdl";
    //     $action_URL ="https://ubuntuphptest.maxygo-online.ro";

    //     $client = new \SoapClient('https://ubuntuphptest.maxygo-online.ro/mgb/home/emit_rca.php/home/rcawsdl?wsdl', array(
    //     'soap_version' => SOAP_1_1,
    //     'location' => $location_URL,
    //     'uri'      => $action_URL,
    //     'style'    => SOAP_RPC,
    //     'use'      => SOAP_ENCODED,
    //     'trace'    => 1,
    //     ));

    //     $username = 'testRCA';
    //     $password = 'test.1234';
    //     $autentificare = new ComplexCredentials($username, $password);

    //     try {
    //         $result = $client->__call('GetVehicleBrandsList',
    //         array(
    //             $autentificare
    //         )
    //     );
    //     return $result->Lista;
    //     } catch(Exception $a) {
    //         echo $a;
    //     }
    // }

    public function marci(Request $request)
    {

        // $opts = array('socket' => array('bindto' => '176.223.122.169'));
        // $context = stream_context_create($opts);
        // $client = new \SoapClient('http://ws-rca-dev.24broker.ro/?wsdl',array('trace'=>true, 'cache' => WSDL_CACHE_NONE, 'stream_context' => $context ));
        // $param = new \SoapVar(array('utilizator' => 'goasig_dev','parola'=>'M3PJfSR2dEMrSQ4Y'), SOAP_ENC_OBJECT); 
        // $header = new \SoapHeader('http://ws-rca-dev.24broker.ro/', 'autentificare', $param,false);
        // $client->__setSoapHeaders($header);
        // $params = new \stdClass();
        // $params->autentificare_sas = new \stdClass();
        // $params->autentificare_sas->utilizator = 'goasig_dev';
        // $params->autentificare_sas->parola = 'M3PJfSR2dEMrSQ4Y';

        // $data = $client->login($params);


        ///curl


        $curl = curl_init();
 
        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://ws-rca-dev.24broker.ro/?wsdl",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_INTERFACE => "176.223.122.169",
        CURLOPT_POSTFIELDS => 
        "<soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:web=\"http://ws-rca-dev.24broker.ro\">\n  
            <soapenv:Header>\n
                <ns2:autentificare>\n
                    <utilizator>goasig_dev</utilizator>\n
                    <parola>M3PJfSR2dEMrSQ4Y</parola>\n
                </ns2:autentificare>
            </soapenv:Header>\n   
            <soapenv:Body>\n
                <ns1:get_marci>\n
                    <request xsi:type='ns1:get_marci'>\n
                    </request>\n
                </ns1:get_marci>\n
            </soapenv:Body>\n
        </soapenv:Envelope>",
        CURLOPT_HTTPHEADER => array("content-type: text/xml"),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }

        // $client = new \SoapClient('https://ws-rca-dev.24broker.ro/?wsdl');


        // $header = Soap::header()
        //     ->name('autentificare')
        //     ->namespace('test.com')
        //     ->data([
        //         'utilizator' => 'goasig_dev',
        //         'parola' => 'M3PJfSR2dEMrSQ4Y'
        //     ])
        //     ->mustUnderstand();

        //     Soap::headers($header);

            
        // $test = Soap::to('https://ws-rca-dev.24broker.ro/?wsdl')->call('ping', ['content' => 'test']);
        // Soap::to('github.com/api')->call('merge')

                // print_r($test);


        // $username = 'goasig_dev';
        // $password = 'M3PJfSR2dEMrSQ4Y';

        // $soapBody           =   '<soap:Body>
        //                         <tem:GetSomeDetails/>
        //                   </soap:Body>';

        // $xmlRequest         =   $this->generateSoapRequest($soapBody); 

        // $soapr         =   '<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:tem="http://tempuri.org/"><soap:Header> 
        //                                     <ns2:autentificare>
        //                                     <utilizator>goasig_dev</utilizator>
        //                                     <parola>M3PJfSR2dEMrSQ4Y</parola>
        //                                 </ns2:autentificare>
        //                             </soap:Header></soap:Envelope>';


        // $client = new Client();

        //         $options = [
        //             'body'    => $xmlRequest,
        //             'headers' => [
        //                 "Content-Type" => "text/xml",
        //                 "accept" => "*/*",
        //                 "accept-encoding" => "gzip, deflate"
        //             ]
        //         ];

        //         $res = $client->request(
        //             'GET',
        //             'https://ws-rca-dev.24broker.ro/?wsdl',
        //             $soapr
        //         );

                // print_r($res->getBody());

        
    }


    public function activitati(Request $request)
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

        try {
            $result = $client->__call('GetVehicleActivitiesList',
            array(
                $autentificare
            )
        );
        return $result->Lista;
        } catch(Exception $a) {
            echo $a;
        }
    }

    // public function categorii(Request $request)
    // {

    //     $location_URL = "https://ubuntuphptest.maxygo-online.ro/mgb/home/emit_rca.php/home/rcawsdl";
    //     $action_URL ="https://ubuntuphptest.maxygo-online.ro";

    //     $client = new \SoapClient('https://ubuntuphptest.maxygo-online.ro/mgb/home/emit_rca.php/home/rcawsdl?wsdl', array(
    //     'soap_version' => SOAP_1_1,
    //     'location' => $location_URL,
    //     'uri'      => $action_URL,
    //     'style'    => SOAP_RPC,
    //     'use'      => SOAP_ENCODED,
    //     'trace'    => 1,
    //     ));

    //     $username = 'testRCA';
    //     $password = 'test.1234';
    //     $autentificare = new ComplexCredentials($username, $password);

    //     try {
    //         $result = $client->__call('GetVehicleCategoriesList',
    //         array(
    //             $autentificare
    //         )
    //     );
    //     return $result->Lista;
    //     } catch(Exception $a) {
    //         echo $a;
    //     }
    // }

    public function categorii(Request $request)
    {

        $curl = curl_init();
 
        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://ws-rca-dev.24broker.ro/?wsdl",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_INTERFACE => "176.223.122.169",
        CURLOPT_POSTFIELDS => 
        "<soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:web=\"http://ws-rca-dev.24broker.ro\">\n  
            <soapenv:Header>\n
                <ns2:autentificare>\n
                    <utilizator>goasig_dev</utilizator>\n
                    <parola>M3PJfSR2dEMrSQ4Y</parola>\n
                </ns2:autentificare>
            </soapenv:Header>\n   
            <soapenv:Body>\n
                <ns1:get_categorii>\n
                    <request xsi:type='ns1:get_categorii'>\n
                    </request>\n
                </ns1:get_categorii>\n
            </soapenv:Body>\n
        </soapenv:Envelope>",
        CURLOPT_HTTPHEADER => array("content-type: text/xml"),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
    }

    public function caen(Request $request)
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

        try {
            $result = $client->__call('GetCAENList',
            array(
                $autentificare
            )
        );
        return $result->Lista;
        } catch(Exception $a) {
            echo $a;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $location_URL = "https://ubuntuphptest.maxygo-online.ro/mgb/home/emit_rca.php/home/rcawsdl";
        // $action_URL ="https://ubuntuphptest.maxygo-online.ro";

        // $client = new \SoapClient('https://ubuntuphptest.maxygo-online.ro/mgb/home/emit_rca.php/home/rcawsdl?wsdl', array(
        // 'soap_version' => SOAP_1_1,
        // 'location' => $location_URL,
        // 'uri'      => $action_URL,
        // 'style'    => SOAP_RPC,
        // 'use'      => SOAP_ENCODED,
        // 'trace'    => 1,
        // 'keep_alive' => true,
        // 'connection_timeout' => 5000,
        // 'cache_wsdl' => WSDL_CACHE_NONE,
        // 'compression'   => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
        // ));

        $username = 'testRCA';
        $password = 'test.1234';
        $_km_totali = '120000';
        $_km_an = '12000';
        $_serie_motor='A123123';
        $_allianz_supl = 'false';
        $_allianz_dealer = 'false';
        $_email= request('email_livrare');
        $_telefon= request('telefon_fix');
        $_mobil= request('telefon_livrare');
        $_companie_tip ='?';
        $_companie_profil='?';
        $_companie_activitate='?';
        $_companie_caen='?';
        $nr_luni_valabilitate = "6";
        $valabilitate = request('valabilitate');
        $pensionar='0'; 
        $deficiente='0';
        $data_inceput_valabilitate=request('data_rca');
        $activitate= 'Privat';
        $leasing='3';  // nu este leasing
        $tip_persoana= request('persoana');
        $_serie_sasiu = request('sasiu');
        $_stare_autevehicul =  request('stare_inmatriculare');
        $_numar_inmatriculare = request('numar_inmatriculare');
        $_marca = request('marca');
        $_model = request('model');
        $_serie_civ = request('serie_civ');
        $_an_fabricatie = request('an_fab');
        $_tip_autovehicul = request('tip_vehicul');
        $_capacitate_cilindrica = request('cap_cil');
        $_nr_locuri = request('nr_loc');
        $_masa_maxima= request('masa_maxima');
        $_putere = request('putere');
        $_combustibil = request('combustibil');
        $asigurator = request('asigurator');
        $_city_acc = 'false';
        $_euroins_acc = 'false';
        $_decontare_directa = 'false';

        $link_redirect_plata='https://goasig.ro/platforma/public/plata';
        // $link_redirect_plata='http://127.0.0.1:8000/plata';

        $asg_rm = array('euroins','generali', 'uniqa', 'grawe', 'groupama');
        $asiguratori = array('city', 'groupama', 'omniasig','generali', 'grawe');
        // $asiguratori = array($asigurator);
        
        $nr_luni = array('12');
        array_unshift($nr_luni,$valabilitate);


        ///proprietar
        $_cod_unic = request('cnp_proprietar');
        $_nume = request('nmume_proprietar');
        $_prenume= request('prenume_proprietar');
        $_serie_ci= request('ci_proprietar');
        $_numar_ci = request('nr_ci_proprietar');
        $_sex_owner='M';
        $_judet = request('judet');
        $_localitate = request('localitate');
        $_cod_siruta = '95408';  // default pascani
        $_strada = request('strada_proprietar');
        $_numar = request('numar_adresa_proprietar');
        $_bloc = request('bloc_proprietar');
        $_scara = request('scara_proprietar');
        $_etaj = request('etaj_proprietar');
        $_ap = request('apartament_proprietar');
        $_cod_postal='705200';
        $_permis_data=request('an_permis_proprietar');  


        $_nume_driver = request('nume_conducator');
        $_prenume_driver= request('prenume_conducator');
        $_cnp_driver = request('cnp_conducator');
        $_serie_ci_driver = request('ci_conducator');
        $_numar_ci_driver = request('nr_ci_conducatorr');
        $_parola= request('parola');
        $_cont= request('creaza_cont');

        ///inlocuiri variabile

        if(strcmp($tip_persoana, "pf") != 0) {
            $_nume = request('societate');
            $_companie_tip ='?';
            $_companie_profil='?';
            $_companie_activitate='?';
            $_companie_caen= request('caen');
            $_cod_unic = request('cui');
        }

        $diac = array('â','Â','î','Î','ş','Ş','ţ','Ţ');
        $cor = array('a','A','i','I','s','S','t' ,'T');

        $_strada = str_replace($diac,$cor,$_strada);
        $_nume = str_replace($diac,$cor,$_nume);
        $_prenume = str_replace($diac,$cor,$_prenume);
        $_judet = str_replace($diac,$cor,$_judet);
        $_localitate = str_replace($diac,$cor,$_localitate);

        ///coduri

        $coduri =  asset('js/coduri.json');

        $path = public_path() . "/js/coduri.json";
        if (!File::exists($path)) {
            throw new Exception("Invalid File");
        }
        $file = File::get($path); // string
        $json = json_decode($file);
        
        for($i = 0; $i < count($json -> records); $i++) {
            if(strcmp($json->records[$i][2], $_judet) == 0 && strcmp($json->records[$i][3], $_localitate) == 0){
                $_cod_siruta = $json->records[$i][5];
                $_cod_postal=$json->records[$i][4];
                break;
            }
        }

        $user = auth()->user();

        // print_r($user->id);

        if($_parola && $_cont) {
            $user_id = $this->createUser($_email, $_nume, $_prenume, $_parola, $_mobil);
            $this->createProprietar($_cod_unic, $tip_persoana, $_nume, $_prenume, $_serie_ci, $_numar_ci, $_permis_data,$_telefon, $_judet, $_localitate, $_strada, $_numar, $_bloc, $_scara, $_etaj, $_ap, $user_id);
            $this->createConducator($_cnp_driver,$_nume_driver, $_prenume_driver,$_serie_ci_driver, $_numar_ci_driver, $user_id);
            $this->createVehicul($_numar_inmatriculare,$_tip_autovehicul, $_marca, $_model,$_combustibil,$activitate,$_masa_maxima,$_capacitate_cilindrica,$_putere,$_nr_locuri,$_serie_civ,$_serie_sasiu,$_an_fabricatie,  $user_id);
        } else if($user){
            $this->createVehicul($_numar_inmatriculare,$_tip_autovehicul, $_marca, $_model,$_combustibil,$activitate,$_masa_maxima,$_capacitate_cilindrica,$_putere,$_nr_locuri,$_serie_civ,$_serie_sasiu,$_an_fabricatie, $user->id);
        } else {
            $this->createVehicul($_numar_inmatriculare,$_tip_autovehicul, $_marca, $_model,$_combustibil,$activitate,$_masa_maxima,$_capacitate_cilindrica,$_putere,$_nr_locuri,$_serie_civ,$_serie_sasiu,$_an_fabricatie, null);
        }

        $autentificare = new ComplexCredentials($username, $password);
        $masina = new ComplexVehicle($_serie_sasiu,$_stare_autevehicul,$_numar_inmatriculare,$_marca,$_model,$_serie_motor,$_serie_civ,$_an_fabricatie,$_km_totali,$_km_an,$_tip_autovehicul,$_capacitate_cilindrica,$_nr_locuri,$_masa_maxima,$_putere,$_combustibil,$_allianz_supl,$_allianz_dealer,$_city_acc,$_euroins_acc,$_decontare_directa);
        $proprietar = new ComplexOwner($_cod_unic, $_nume , $_prenume ,$_sex_owner, $_judet , $_localitate, $_cod_siruta , $_strada, $_numar , $_bloc , $_scara , $_etaj, $_ap, $_cod_postal, $_email, $_telefon, $_mobil, $_permis_data, $_serie_ci, $_numar_ci, $_companie_tip, $_companie_profil, $_companie_activitate, $_companie_caen);
        $utilizator = new ComplexUser($_cod_unic, $_nume , $_prenume ,$_sex_owner, $_judet , $_localitate, $_cod_siruta , $_strada, $_numar , $_bloc , $_scara , $_etaj, $_ap, $_cod_postal, $_email, $_telefon, $_mobil, $_permis_data, $_serie_ci, $_numar_ci, $_companie_tip, $_companie_profil, $_companie_activitate, $_companie_caen);
        $conducator = new ComplexDriver($_nume_driver,$_prenume_driver,$_cnp_driver,$_serie_ci_driver,$_numar_ci_driver);	

        ////syncronous way
        // $oferte = array();
        // set_time_limit(0);
        // foreach ($nr_luni as $luna) {
        //     foreach ($asiguratori as $asigurator) {
                
        //         try {
        //             $result = $client->__call('CerereOfertaRCA',
        //             array(
        //                 $autentificare,
        //                 $link_redirect_plata,
        //                 $asigurator,
        //                 $luna,
        //                 $data_inceput_valabilitate,
        //                 $activitate,
        //                 $leasing,
        //                 $masina,
        //                 $tip_persoana,
        //                 $pensionar,
        //                 $deficiente,
        //                 $proprietar,
        //                 $utilizator,
        //                 $conducator
        //                 )
        //         );
        //         if($result->Eroare != 1){
        //             $tmp = array('date' => $result, 'asigurator' => $asigurator);
        //             array_push($oferte, $tmp);
        //         }
                
        //         } catch(Exception $a) {
        //             echo $a;
        //         }
        //     }
        // }


        // $collection = collect($oferte);
        
        // $grouped = $collection->mapToGroups(function ($item, $key) {
        //     return [$item['asigurator'] => $item['date']];
        // });

        //////sync


        ////async way


        $factory = new Factory();
        $client = $factory->create(new Client(), new StreamFactory(), new RequestFactory(), 'https://ubuntuphptest.maxygo-online.ro/mgb/home/emit_rca.php/home/rcawsdl?wsdl');

        $cereri = [];
        $oferte = [];
        // async call
        foreach ($nr_luni as $luna) {
            foreach ($asiguratori as $asigurator) {
                $promise = $client->callAsync('CerereOfertaRCA', array(
                    $autentificare,
                    $link_redirect_plata,
                    $asigurator,
                    $luna,
                    $data_inceput_valabilitate,
                    $activitate,
                    $leasing,
                    $masina,
                    $tip_persoana,
                    $pensionar,
                    $deficiente,
                    $proprietar,
                    $utilizator,
                    $conducator
                ));
                // $result = $promise->wait();
                array_push($cereri, [$promise,$asigurator]);
            }
        }

        for ($i=0; $i < count($cereri); $i++) {
            $cereri[$i][0]->wait();
            $tmp = array('date' => $cereri[$i][0]->display()->result, 'asigurator' => $cereri[$i][1]);
            array_push($oferte, $tmp);
        }

        $collection = collect($oferte);
        
        $grouped = $collection->mapToGroups(function ($item, $key) {
            return [$item['asigurator'] => $item['date']];
        });

        // print_r($grouped);

        ////async

        return response()->json([
             'view' => view('oferte', ['oferte'=>$grouped, 'valabilitate'=>$valabilitate])->render(),
        ]);
    }

    public function createUser($_email, $_nume, $_prenume, $_parola, $_mobil){

        $check = User::where('email', $_email)->first();

        if(!$check){
            $user = new User(array(
                'email' => $_email,
                'nume' => $_nume.' '.$_prenume,
                'parola' => Hash::make($_parola),
                'telefon' => $_mobil
            ));
        
            $user->timestamps = false;
            $user->save();
            return $user->id;
        }
        return $check->id;
    }

    public function createConducator($_cnp_driver,$_nume_driver, $_prenume_driver,$_serie_ci_driver, $_numar_ci_driver, $user_id = 0){

        $check = Conducator::where('cod_unic', $_cnp_driver)->first();

        if(!$check && !$user_id){
            $conducator = new Conducator(array(
                'cod_unic' => $_cnp_driver,
                'nume' => $_nume_driver,
                'prenume' => $_prenume_driver,
                'serie_ci' => $_serie_ci_driver,
                'nr_ci' => $_numar_ci_driver,
                'id_utilizator' => $user_id
            ));
        
            $conducator->timestamps = false;
            $conducator->save();
        }
    }

    public function createProprietar($_cod_unic, $tip_persoana, $_nume, $_prenume, $_serie_ci, $_numar_ci, $_permis_data,$_telefon, $_judet, $_localitate, $_strada, $_numar, $_bloc, $_scara, $_etaj, $_ap, $user_id = 0){

        $check = Proprietar::where('cod_unic', $_cod_unic)->first();

        if(!$check && !$user_id){
            $proprietar = new Proprietar(array(
                'cod_unic' => $_cod_unic,
                'tip_persoana' => $tip_persoana,
                'nume' => $_nume,
                'prenume' => $_prenume,
                'serie_ci' => $_serie_ci,
                'nr_ci' => $_numar_ci,
                'data_permis' => $_permis_data,
                'telefon_fix' => $_telefon,
                'reduceri' => 0,
                'judet' => $_judet,
                'localitate' => $_localitate,
                'strada' => $_strada,
                'numar' => $_numar,
                'bloc' => $_bloc,
                'scara' => $_scara,
                'etaj' => $_etaj,
                'apartament' => $_ap,
                'id_utilizator' => $user_id
            ));
            $proprietar->timestamps = false;
            $proprietar->save();
        }
    }

    public function createVehicul($nr_inmatriculare,$tip_vehicul, $marca, $model,$carburant,$utilizare,$masa_admisa,$capacitatea_cilindrica,$putere_motor,$nr_locuri,$serie_civ,$serie_sasiu,$an_fabricatie, $user_id)
    {

        $check = Vehicul::where('nr_inmatriculare', $nr_inmatriculare)->first();

        if(!$check){
            if(!$user_id){
                $vehicul = new Vehicul(array(
                    'nr_inmatriculare' => $nr_inmatriculare,
                    'tip_vehicul' => $tip_vehicul,
                    'marca' => $marca,
                    'model' => $model,
                    'carburant' => $carburant,
                    'utilizare' => $utilizare,
                    'masa_admia' => $masa_admisa,
                    'capacitatea_cilindrica' => $capacitatea_cilindrica,
                    'putere_motor' => $putere_motor,
                    'nr_locuri' => $nr_locuri,
                    'serie_civ' => $serie_civ,
                    'serie_sasiu' => $serie_sasiu,
                    'an_fabricatie' => $an_fabricatie,
                    'id_utilizator' => $user_id
                ));
            } else {
                $vehicul = new Vehicul(array(
                    'nr_inmatriculare' => $nr_inmatriculare,
                    'tip_vehicul' => $tip_vehicul,
                    'marca' => $marca,
                    'model' => $model,
                    'carburant' => $carburant,
                    'utilizare' => $utilizare,
                    'masa_admia' => $masa_admisa,
                    'capacitatea_cilindrica' => $capacitatea_cilindrica,
                    'putere_motor' => $putere_motor,
                    'nr_locuri' => $nr_locuri,
                    'serie_civ' => $serie_civ,
                    'serie_sasiu' => $serie_sasiu,
                    'an_fabricatie' => $an_fabricatie,
                    'id_utilizator' => null
                ));
            }
            
        
            $vehicul->timestamps = false;
            $vehicul->save();
        } else if($check && !$check->id_utilizator) {
            $check->id_utilizator = $user_id;
            $check->timestamps = false;
            $check->save();
        }
        
    }

    public function getCodes($judet, $localitate) {
        $_cod_siruta = '95408';
        $_cod_postal = '705200';

        ///coduri

        $coduri =  asset('js/coduri.json');

        $path = public_path() . "/js/coduri.json";
        if (!File::exists($path)) {
            throw new Exception("Invalid File");
        }
        $file = File::get($path); // string
        $json = json_decode($file);

        for($i = 0; $i < count($json -> records); $i++) {
            if(strcmp($json->records[$i][2], $judet) == 0 && strcmp($json->records[$i][3], $localitate) == 0){
                $_cod_siruta = $json->records[$i][5];
                $_cod_postal = $json->records[$i][4];
                break;
            }
        }
        
        // for($i = 0; $i < count($json -> records); $i++) {
        //     if(strcmp($json->records[$i][2], $judet) == 0 && strcmp($json->records[$i][3], $localitate) == 0){
        //         // $_cod_siruta = $json->records[$i][5];
        //         // $_cod_postal = $json->records[$i][4];
        //         return response()->json([
        //             'cod_siruta'=>$json->records[$i][5],
        //             'cod_postal'=>$json->records[$i][4]
        //         ]);
        //     }
        // }
        return response()->json([
            'cod_siruta'=>$_cod_siruta,
            'cod_postal'=>$_cod_postal
        ]);
    }

    public function createOferta($_cod_unic, $tip_persoana, $_nume, $_prenume, $_email, $_telefon, $_serie_ci, $_numar_ci, $user_id, $_cnp_driver,$_nume_driver, $_prenume_driver,$_serie_ci_driver, $_numar_ci_driver, $id_oferta, $nr_inmatriculare, $decontare_directa, $link_plata, $suma_oferta, $perioada_oferta, $asigurator, $data_incepere, $comision, $decontare_valoare)
    {

        date_default_timezone_set('UTC');

        if($decontare_directa) {
            $decontare_directa = 1;
        } else {
            $decontare_directa = 0;
        }

        $check = Oferta::where('id', $id_oferta)->first();
        // $duplicate = Oferta::where('nr_inmatriculare', $nr_inmatriculare)->first();
        // if($duplicate) {
        //     Oferta::where('nr_inmatriculare', $nr_inmatriculare)->delete();
        // }

        if(!$check && $suma_oferta > 0){
            $oferta = new Oferta(array(
                'id' => $id_oferta,
                'id_utilizator'  => $user_id,
                'nr_inmatriculare' => $nr_inmatriculare,
                'email' => $_email,
                'telefon' => $_telefon,
                'link-plata' => $link_plata,
                'suma' => $suma_oferta,
                'perioada' => $perioada_oferta,
                'decontare_directa' => $decontare_directa,
                'asigurator' => $asigurator,
                'cod_unic_proprietar' => $_cod_unic,
                'tip_persoana'  => $tip_persoana,
                'nume_proprietar' => $_nume,
                'prenume_proprietar' => $_prenume,
                'serie_ci_proprietar' => $_serie_ci,
                'nr_ci_proprietar' => $_numar_ci,
                'cod_unic_conducator' => $_cnp_driver,
                'nume_conducator' => $_nume_driver,
                'prenume_conducator' => $_prenume_driver,
                'serie_ci_conducator' => $_serie_ci_driver,
                'nr_ci_conducator' => $_numar_ci_driver,
                'data-generare' => Carbon::now()->isoFormat('YYYY-MM-D'),
                'data-expirare' => Carbon::createFromIsoFormat('YYYY-MM-D', $data_incepere, 'UTC')->addMonths($perioada_oferta)->isoFormat('YYYY-MM-D'),
                'data-incepere' => $data_incepere,
                'comision' => $comision,
                'valoare_decontare' => $decontare_valoare
            ));
            $oferta->timestamps = false;
            $oferta->save();
        }
    }

    public function create_acc(Request $request)
    {

        $username = 'testRCA';
        $password = 'test.1234';
        $_km_totali = '120000';
        $_km_an = '12000';
        $_serie_motor='A123123';
        $_allianz_supl = 'false';
        $_allianz_dealer = 'false';
        $_email= request('email_livrare');
        $_telefon= request('telefon_fix');
        $_mobil= request('telefon_livrare');
        $_companie_tip ='?';
        $_companie_profil='?';
        $_companie_activitate='?';
        $_companie_caen='?';
        $nr_luni_valabilitate = "6";
        $valabilitate = request('valabilitate');
        $pensionar='0'; 
        $deficiente='0';
        $data_inceput_valabilitate=request('data_rca');
        $activitate= 'Privat';
        $leasing='3';  // nu este leasing
        $tip_persoana= request('persoana');
        $_serie_sasiu = request('sasiu');
        $_stare_autevehicul =  request('stare_inmatriculare');
        $_numar_inmatriculare = request('numar_inmatriculare');
        $_marca = request('marca');
        $_model = request('model');
        $_serie_civ = request('serie_civ');
        $_an_fabricatie = request('an_fab');
        $_tip_autovehicul = request('tip_vehicul');
        $_capacitate_cilindrica = request('cap_cil');
        $_nr_locuri = request('nr_loc');
        $_masa_maxima= request('masa_maxima');
        $_putere = request('putere');
        $_combustibil = request('combustibil');
        $asigurator = request('asigurator');
        $_city_acc = 'false';
        $_euroins_acc = 'false';
        $_decontare_directa = request('decontare_directa');

        $link_redirect_plata=config('app.url').'plata';
        // $link_redirect_plata='http://127.0.0.1:8000/plata';

        // $asg_rm = array('euroins','generali', 'uniqa', 'grawe', 'groupama');
        // $asiguratori = array('city', 'groupama', 'omniasig','generali', 'grawe');
        $asiguratori = array($asigurator);
        
        $nr_luni = array('12');
        array_unshift($nr_luni,$valabilitate);


        ///proprietar
        $_cod_unic = request('cnp_proprietar');
        $_nume = request('nmume_proprietar');
        $_prenume= request('prenume_proprietar');
        $_serie_ci= request('ci_proprietar');
        $_numar_ci = request('nr_ci_proprietar');
        $_sex_owner='M';
        $_judet = request('judet');
        $_localitate = request('localitate');
        // $_cod_siruta = '95408';  // default pascani
        $_strada = request('strada_proprietar');
        $_numar = request('numar_adresa_proprietar');
        $_bloc = request('bloc_proprietar');
        $_scara = request('scara_proprietar');
        $_etaj = request('etaj_proprietar');
        $_ap = request('apartament_proprietar');
        // $_cod_postal='705200';
        $_permis_data=request('an_permis_proprietar');  


        $_nume_driver = request('nume_conducator');
        $_prenume_driver= request('prenume_conducator');
        $_cnp_driver = request('cnp_conducator');
        $_serie_ci_driver = request('ci_conducator');
        $_numar_ci_driver = request('nr_ci_conducatorr');
        $_parola= request('parola');
        $_cont= request('creaza_cont');

        ///inlocuiri variabile

        if(strcmp($tip_persoana, "pf") != 0) {
            $_nume = request('societate');
            $_companie_tip = request('companie_tip');
            $_companie_profil='?';
            $_companie_activitate=request('companie_activitate');
            $_companie_caen= request('caen');
            $_cod_unic = request('cui');
        }

        $diac = array('â','Â','î','Î','ş','Ş','ţ','Ţ');
        $cor = array('a','A','i','I','s','S','t' ,'T');

        $_strada = str_replace($diac,$cor,$_strada);
        $_nume = str_replace($diac,$cor,$_nume);
        $_prenume = str_replace($diac,$cor,$_prenume);
        $_judet = str_replace($diac,$cor,$_judet);
        $_localitate = str_replace($diac,$cor,$_localitate);

        $_cod_siruta = strval(request('cod_siruta'));
        $_cod_postal = strval(request('cod_postal'));

        $user = auth()->user();


        if($_parola && $_cont) {
            $user_id = $this->createUser($_email, $_nume, $_prenume, $_parola, $_mobil);
            $this->createProprietar($_cod_unic, $tip_persoana, $_nume, $_prenume, $_serie_ci, $_numar_ci, $_permis_data,$_telefon, $_judet, $_localitate, $_strada, $_numar, $_bloc, $_scara, $_etaj, $_ap, $user_id);
            $this->createConducator($_cnp_driver,$_nume_driver, $_prenume_driver,$_serie_ci_driver, $_numar_ci_driver, $user_id);
            $this->createVehicul($_numar_inmatriculare,$_tip_autovehicul, $_marca, $_model,$_combustibil,$activitate,$_masa_maxima,$_capacitate_cilindrica,$_putere,$_nr_locuri,$_serie_civ,$_serie_sasiu,$_an_fabricatie,  $user_id);
        } else if($user){
            $this->createProprietar($_cod_unic, $tip_persoana, $_nume, $_prenume, $_serie_ci, $_numar_ci, $_permis_data,$_telefon, $_judet, $_localitate, $_strada, $_numar, $_bloc, $_scara, $_etaj, $_ap, $user->id);
            $this->createConducator($_cnp_driver,$_nume_driver, $_prenume_driver,$_serie_ci_driver, $_numar_ci_driver, $user->id);
            $this->createVehicul($_numar_inmatriculare,$_tip_autovehicul, $_marca, $_model,$_combustibil,$activitate,$_masa_maxima,$_capacitate_cilindrica,$_putere,$_nr_locuri,$_serie_civ,$_serie_sasiu,$_an_fabricatie, $user->id);
        } else {
            $this->createProprietar($_cod_unic, $tip_persoana, $_nume, $_prenume, $_serie_ci, $_numar_ci, $_permis_data,$_telefon, $_judet, $_localitate, $_strada, $_numar, $_bloc, $_scara, $_etaj, $_ap, $user_id);
            $this->createConducator($_cnp_driver,$_nume_driver, $_prenume_driver,$_serie_ci_driver, $_numar_ci_driver, $user_id);
            $this->createVehicul($_numar_inmatriculare,$_tip_autovehicul, $_marca, $_model,$_combustibil,$activitate,$_masa_maxima,$_capacitate_cilindrica,$_putere,$_nr_locuri,$_serie_civ,$_serie_sasiu,$_an_fabricatie, null);
        }

    }

    public function ajaxify(Request $request)
    {
        $time_start = microtime(true); 

        //  $location_URL = "https://ubuntuphptest.maxygo-online.ro/mgb/home/emit_rca.php/home/rcawsdl";
        // $action_URL ="https://ubuntuphptest.maxygo-online.ro";

        // $client = new \SoapClient('https://ubuntuphptest.maxygo-online.ro/mgb/home/emit_rca.php/home/rcawsdl?wsdl', array(
        // 'soap_version' => SOAP_1_1,
        // 'location' => $location_URL,
        // 'uri'      => $action_URL,
        // 'style'    => SOAP_RPC,
        // 'use'      => SOAP_ENCODED,
        // 'trace'    => 1,
        // 'keep_alive' => true,
        // 'connection_timeout' => 5000,
        // 'cache_wsdl' => WSDL_CACHE_NONE,
        // 'compression'   => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
        // ));


        $username = 'testRCA';
        $password = 'test.1234';
        $_km_totali = '120000';
        $_km_an = '12000';
        $_serie_motor='A123123';
        $_allianz_supl = 'false';
        $_allianz_dealer = 'false';
        $_email= request('email_livrare');
        $_telefon= request('telefon_fix');
        $_mobil= request('telefon_livrare');
        $_companie_tip ='?';
        $_companie_profil='?';
        $_companie_activitate='?';
        $_companie_caen='?';
        $nr_luni_valabilitate = "6";
        $valabilitate = request('valabilitate');
        $pensionar='0'; 
        $deficiente='0';
        $data_inceput_valabilitate=request('data_rca');
        $activitate= 'Privat';
        $leasing='3';  // nu este leasing
        $tip_persoana= request('persoana');
        $_serie_sasiu = request('sasiu');
        $_stare_autevehicul =  request('stare_inmatriculare');
        $_numar_inmatriculare = request('numar_inmatriculare');
        $_marca = request('marca');
        $_model = request('model');
        $_serie_civ = request('serie_civ');
        $_an_fabricatie = request('an_fab');
        $_tip_autovehicul = request('tip_vehicul');
        $_capacitate_cilindrica = request('cap_cil');
        $_nr_locuri = request('nr_loc');
        $_masa_maxima= request('masa_maxima');
        $_putere = request('putere');
        $_combustibil = request('combustibil');
        $asigurator = request('asigurator');
        $_city_acc = 'false';
        $_euroins_acc = 'false';
        $_decontare_directa = request('decontare_directa');

        $link_redirect_plata=config('app.url').'plata';
        // $link_redirect_plata='http://127.0.0.1:8000/plata';

        // $asg_rm = array('euroins','generali', 'uniqa', 'grawe', 'groupama');
        // $asiguratori = array('city', 'groupama', 'omniasig','generali', 'grawe');
        $asiguratori = array($asigurator);
        
        $nr_luni = array('12');
        array_unshift($nr_luni,$valabilitate);


        ///proprietar
        $_cod_unic = request('cnp_proprietar');
        $_nume = request('nmume_proprietar');
        $_prenume= request('prenume_proprietar');
        $_serie_ci= request('ci_proprietar');
        $_numar_ci = request('nr_ci_proprietar');
        $_sex_owner='M';
        $_judet = request('judet');
        $_localitate = request('localitate');
        // $_cod_siruta = '95408';  // default pascani
        $_strada = request('strada_proprietar');
        $_numar = request('numar_adresa_proprietar');
        $_bloc = request('bloc_proprietar');
        $_scara = request('scara_proprietar');
        $_etaj = request('etaj_proprietar');
        $_ap = request('apartament_proprietar');
        // $_cod_postal='705200';
        $_permis_data=request('an_permis_proprietar');  


        $_nume_driver = request('nume_conducator');
        $_prenume_driver= request('prenume_conducator');
        $_cnp_driver = request('cnp_conducator');
        $_serie_ci_driver = request('ci_conducator');
        $_numar_ci_driver = request('nr_ci_conducatorr');
        $_parola= request('parola');
        $_cont= request('creaza_cont');

        ///inlocuiri variabile

        if(strcmp($tip_persoana, "pf") != 0) {
            $_nume = request('societate');
            $_companie_tip = request('companie_tip');
            $_companie_profil='?';
            $_companie_activitate=request('companie_activitate');
            $_companie_caen= request('caen');
            $_cod_unic = request('cui');
        }

        $diac = array('â','Â','î','Î','ş','Ş','ţ','Ţ');
        $cor = array('a','A','i','I','s','S','t' ,'T');

        $_strada = str_replace($diac,$cor,$_strada);
        $_nume = str_replace($diac,$cor,$_nume);
        $_prenume = str_replace($diac,$cor,$_prenume);
        $_judet = str_replace($diac,$cor,$_judet);
        $_localitate = str_replace($diac,$cor,$_localitate);

        $_cod_siruta = strval(request('cod_siruta'));
        $_cod_postal = strval(request('cod_postal'));

        // ///coduri

        // $coduri =  asset('js/coduri.json');

        // $path = public_path() . "/js/coduri.json";
        // if (!File::exists($path)) {
        //     throw new Exception("Invalid File");
        // }
        // $file = File::get($path); // string
        // $json = json_decode($file);
        
        // for($i = 0; $i < count($json -> records); $i++) {
        //     if(strcmp($json->records[$i][2], $_judet) == 0 && strcmp($json->records[$i][3], $_localitate) == 0){
        //         $_cod_siruta = $json->records[$i][5];
        //         $_cod_postal=$json->records[$i][4];
        //         break;
        //     }
        // }

        // $user = auth()->user();

        // // print_r($user->id);

        // if($_parola && $_cont) {
        //     $user_id = $this->createUser($_email, $_nume, $_prenume, $_parola, $_mobil);
        //     $this->createProprietar($_cod_unic, $tip_persoana, $_nume, $_prenume, $_serie_ci, $_numar_ci, $_permis_data,$_telefon, $_judet, $_localitate, $_strada, $_numar, $_bloc, $_scara, $_etaj, $_ap, $user_id);
        //     $this->createConducator($_cnp_driver,$_nume_driver, $_prenume_driver,$_serie_ci_driver, $_numar_ci_driver, $user_id);
        //     $this->createVehicul($_numar_inmatriculare,$_tip_autovehicul, $_marca, $_model,$_combustibil,$activitate,$_masa_maxima,$_capacitate_cilindrica,$_putere,$_nr_locuri,$_serie_civ,$_serie_sasiu,$_an_fabricatie,  $user_id);
        // } else if($user){
        //     $this->createVehicul($_numar_inmatriculare,$_tip_autovehicul, $_marca, $_model,$_combustibil,$activitate,$_masa_maxima,$_capacitate_cilindrica,$_putere,$_nr_locuri,$_serie_civ,$_serie_sasiu,$_an_fabricatie, $user->id);
        // } else {
        //     $this->createVehicul($_numar_inmatriculare,$_tip_autovehicul, $_marca, $_model,$_combustibil,$activitate,$_masa_maxima,$_capacitate_cilindrica,$_putere,$_nr_locuri,$_serie_civ,$_serie_sasiu,$_an_fabricatie, null);
        // }

        $autentificare = new ComplexCredentials($username, $password);
        $masina = new ComplexVehicle($_serie_sasiu,$_stare_autevehicul,$_numar_inmatriculare,$_marca,$_model,$_serie_motor,$_serie_civ,$_an_fabricatie,$_km_totali,$_km_an,$_tip_autovehicul,$_capacitate_cilindrica,$_nr_locuri,$_masa_maxima,$_putere,$_combustibil,$_allianz_supl,$_allianz_dealer,$_city_acc,$_euroins_acc,$_decontare_directa);
        $proprietar = new ComplexOwner($_cod_unic, $_nume , $_prenume ,$_sex_owner, $_judet , $_localitate, $_cod_siruta , $_strada, $_numar , $_bloc , $_scara , $_etaj, $_ap, $_cod_postal, $_email, $_telefon, $_mobil, $_permis_data, $_serie_ci, $_numar_ci, $_companie_tip, $_companie_profil, $_companie_activitate, $_companie_caen);
        $utilizator = new ComplexUser($_cod_unic, $_nume , $_prenume ,$_sex_owner, $_judet , $_localitate, $_cod_siruta , $_strada, $_numar , $_bloc , $_scara , $_etaj, $_ap, $_cod_postal, $_email, $_telefon, $_mobil, $_permis_data, $_serie_ci, $_numar_ci, $_companie_tip, $_companie_profil, $_companie_activitate, $_companie_caen);
        $conducator = new ComplexDriver($_nume_driver,$_prenume_driver,$_cnp_driver,$_serie_ci_driver,$_numar_ci_driver);	


        ////syncronous way
        // $oferte = array();
        // foreach ($nr_luni as $luna) {
        //     foreach ($asiguratori as $asigurator) {
                
        //         try {
        //             $result = $client->__call('CerereOfertaRCA',
        //             array(
        //                 $autentificare,
        //                 $link_redirect_plata,
        //                 $asigurator,
        //                 $luna,
        //                 $data_inceput_valabilitate,
        //                 $activitate,
        //                 $leasing,
        //                 $masina,
        //                 $tip_persoana,
        //                 $pensionar,
        //                 $deficiente,
        //                 $proprietar,
        //                 $utilizator,
        //                 $conducator
        //                 )
        //         );
        //         if($result->Eroare != 1){
        //             $tmp = array('date' => $result, 'asigurator' => $asigurator);
        //             array_push($oferte, $tmp);
        //         }
                
        //         } catch(Exception $a) {
        //             echo $a;
        //         }
        //     }
        // }


        // $collection = collect($oferte);
        
        // $grouped = $collection->mapToGroups(function ($item, $key) {
        //     return [$item['asigurator'] => $item['date']];
        // });


        ////async way
        $user = auth()->user();
        if($user) {
            $user_id = $user->id;
        } else {
            $user_id = null;
        }


        $factory = new Factory();
        $client = $factory->create(new Client(), new StreamFactory(), new RequestFactory(), 'https://ubuntuphptest.maxygo-online.ro/mgb/home/emit_rca.php/home/rcawsdl?wsdl');

        $cereri = [];
        $oferte = [];
        // async call
        foreach ($nr_luni as $luna) {
            foreach ($asiguratori as $asigurator) {

                $promise = $client->callAsync('CerereOfertaRCA', array(
                    $autentificare,
                    $link_redirect_plata,
                    $asigurator,
                    $luna,
                    $data_inceput_valabilitate,
                    $activitate,
                    $leasing,
                    $masina,
                    $tip_persoana,
                    $pensionar,
                    $deficiente,
                    $proprietar,
                    $utilizator,
                    $conducator
                ));
                // $result = $promise->wait();
                

                array_push($cereri, [$promise,$asigurator]);
            }
        }

        for ($i=0; $i < count($cereri); $i++) {
            $cereri[$i][0]->wait();
            $res = $cereri[$i][0]->display()->result;
            // $tmp = array('date' => $cereri[$i][0]->display()->result, 'asigurator' => $cereri[$i][1]);
            array_push($oferte, $res);
            // print_r($res);
            $this->createOferta($_cod_unic, $tip_persoana, $_nume, $_prenume, $_email, $_mobil, $_serie_ci, $_numar_ci, $user_id, $_cnp_driver,$_nume_driver, $_prenume_driver,$_serie_ci_driver, $_numar_ci_driver, $res->IdOferta, $_numar_inmatriculare, $_decontare_directa, $res->LinkPlata, $res->Valoare, $res->Valabilitate, $cereri[$i][1], $data_inceput_valabilitate, $res->ComisionValoare,$res->DecontareDirectaValoare);
        }
        $end_time = microtime(true) - $time_start;

        // $collection = collect($oferte);
        
        // $grouped = $collection->mapToGroups(function ($item, $key) {
        //     return [$item['asigurator'] => $item['date']];
        // });

        // print_r($oferte);

        ////async

        return response()->json([
            'oferte'=>$oferte,
            'valabilitate'=>$valabilitate,
            'time'=>$end_time,
        ]);
    }


}
