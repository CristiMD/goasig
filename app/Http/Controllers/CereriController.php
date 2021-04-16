<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use File;

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
        $coduri =  asset('js/coduri.json');

        $path = public_path() . "/js/coduri.json";
        if (!File::exists($path)) {
            throw new Exception("Invalid File");
        }


        $file = File::get($path); // string
        $json = json_decode($file);
        // print_r($json->records[0]);

        
        for($i = 0; $i < count($json -> records); $i++) {
            if(strcmp($json->records[$i][2], 'ILFOV') == 0 && strcmp($json->records[$i][3], 'Copăceni') == 0){
                print_r($json->records[$i]);
            }
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

        
        //Pas 1
        // $stare_inmatriculare = request('stare_inmatriculare');
        // $numar_inmatriculare = request('numar_inmatriculare');
        // $tip_vehicul = request('tip_vehicul');
        // $marca = request('marca');
        // $model = request('model');
        // $combustibil = request('combustibil');
        // $utilizare = request('utilizare');

        // //Pas 2
        // $masa_maxima = request('masa_maxima');
        // $cap_cil = request('cap_cil');
        // $putere = request('putere');
        // $nr_loc = request('nr_loc');
        // $serie_civ = request('serie_civ');
        // $sasiu = request('sasiu');
        // $an_fab = request('an_fab');

        // //Pas 3
        // $persoana = request('persoana');
        // $nmume_proprietar = request('nmume_proprietar');
        // $cnp_proprietar = request('cnp_proprietar');
        // $ci_proprietar = request('ci_proprietar');
        // $judet = request('judet');
        // $strada_proprietar = request('strada_proprietar');
        // $bloc_proprietar = request('bloc_proprietar');
        // $etaj_proprietar = request('etaj_proprietar');
        // $reduceri = request('reduceri');
        // $prenume_proprietar = request('prenume_proprietar');
        // $an_permis_proprietar = request('an_permis_proprietar');
        // $nr_ci_proprietar = request('nr_ci_proprietar');
        // $localitate_proprietar = request('localitate_proprietar');
        // $numar_adresa_proprietar = request('numar_adresa_proprietar');
        // $scara_proprietar = request('scara_proprietar');
        // $apartament_proprietar = request('apartament_proprietar');

        // //Pas 4
        // $soferul_acelasi = request('soferul_acelasi');
        // $nume_conducator = request('nume_conducator');
        // $prenume_conducator = request('prenume_conducator');
        // $ci_conducator = request('ci_conducator');
        // $nr_ci_conducatorr = request('nr_ci_conducatorr');
        // $cnp_conducator = request('cnp_conducator');
        // $data_rca = request('data_rca');
        // $nume_livrare = request('nume_livrare');
        // $prenume_livrare = request('prenume_livrare');
        // $adresa_livrare = request('adresa_livrare');
        // $email_livrare = request('email_livrare');
        // $telefon_livrare = request('telefon_livrare');
        // $termeni_conditii = request('termeni_conditii');


        // echo $stare_inmatriculare.'</br>';
        // echo $numar_inmatriculare.'</br>';
        // echo $tip_vehicul.'</br>';
        // echo $marca.'</br>';
        // echo $model.'</br>';
        // echo $combustibil.'</br>';
        // echo $utilizare.'</br>';
        // echo $masa_maxima.'</br>';
        // echo $cap_cil.'</br>';
        // echo $putere.'</br>';
        // echo $nr_loc.'</br>';
        // echo $serie_civ.'</br>';
        // echo $sasiu.'</br>';
        // echo $an_fab.'</br>';
        // echo $persoana.'</br>';
        // echo $nmume_proprietar.'</br>';
        // echo $cnp_proprietar.'</br>';
        // echo $ci_proprietar.'</br>';
        // echo $judet.'</br>';
        // echo $strada_proprietar.'</br>';
        // echo $bloc_proprietar.'</br>';
        // echo $etaj_proprietar.'</br>';
        // echo $reduceri.'</br>';
        // echo $prenume_proprietar.'</br>';
        // echo $an_permis_proprietar.'</br>';
        // echo $nr_ci_proprietar.'</br>';
        // echo $localitate_proprietar.'</br>';
        // echo $numar_adresa_proprietar.'</br>';
        // echo $scara_proprietar.'</br>';
        // echo $apartament_proprietar.'</br>';
        // echo $soferul_acelasi.'</br>';
        // echo $nume_conducator.'</br>';
        // echo $prenume_conducator.'</br>';
        // echo $ci_conducator.'</br>';
        // echo $nr_ci_conducatorr.'</br>';
        // echo $cnp_conducator.'</br>';
        // echo $data_rca.'</br>';
        // echo $nume_livrare.'</br>';
        // echo $prenume_livrare.'</br>';
        // echo $adresa_livrare.'</br>';
        // echo $email_livrare.'</br>';
        // echo $telefon_livrare.'</br>';
        // echo $termeni_conditii.'</br>';

        

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
        $_km_totali = '120000';
        $_km_an = '12000';
        $_serie_motor='A123123';
        $_allianz_supl = 'false';
        $_allianz_dealer = 'false';
        $_email= request('email_livrare');
        $_telefon= request('telefon_livrare');
        $_mobil= request('telefon_livrare');
        $_companie_tip ='?';
        $_companie_profil='?';
        $_companie_activitate='?';
        $_companie_caen='?';
        $nr_luni_valabilitate = "6";
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
        $_city_acc = 'false';
        $_euroins_acc = 'false';
        $_decontare_directa = 'false';

        $link_redirect_plata='https://goasig.ro/platforma/public/plata';

        $asg_rm = array('euroins','generali', 'uniqa', 'grawe');
        $asiguratori = array('city', 'groupama', 'omniasig','generali', 'grawe');
        $nr_luni = array('6', '12');


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
        $_serie_ci_driver= request('ci_conducator');
        $_numar_ci_driver= request('nr_ci_conducatorr');


        ///coduri

        $coduri =  asset('js/coduri.json');

        $path = public_path() . "/js/coduri.json";
        if (!File::exists($path)) {
            throw new Exception("Invalid File");
        }


        $file = File::get($path); // string
        $json = json_decode($file);
        // print_r($json->records[0]);

        
        for($i = 0; $i < count($json -> records); $i++) {
            // print_r($_judet);
            // print_r($_localitate);

            if(strcmp($json->records[$i][2], $_judet) == 0 && strcmp($json->records[$i][3], $_localitate) == 0){
                $_cod_siruta = $json->records[$i][5];
                $_cod_postal=$json->records[$i][4];
            }
        }

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
        // $asiguratori = array('city', 'groupama', 'omniasig','generali', 'grawe');
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



        $autentificare = new ComplexCredentials($username, $password);
        $masina = new ComplexVehicle($_serie_sasiu,$_stare_autevehicul,$_numar_inmatriculare,$_marca,$_model,$_serie_motor,$_serie_civ,$_an_fabricatie,$_km_totali,$_km_an,$_tip_autovehicul,$_capacitate_cilindrica,$_nr_locuri,$_masa_maxima,$_putere,$_combustibil,$_allianz_supl,$_allianz_dealer,$_city_acc,$_euroins_acc,$_decontare_directa);
        $proprietar = new ComplexOwner($_cod_unic, $_nume , $_prenume ,$_sex_owner, $_judet , $_localitate, $_cod_siruta , $_strada, $_numar , $_bloc , $_scara , $_etaj, $_ap, $_cod_postal, $_email, $_telefon, $_mobil, $_permis_data, $_serie_ci, $_numar_ci, $_companie_tip, $_companie_profil, $_companie_activitate, $_companie_caen);
        $utilizator = new ComplexUser($_cod_unic, $_nume , $_prenume ,$_sex_owner, $_judet , $_localitate, $_cod_siruta , $_strada, $_numar , $_bloc , $_scara , $_etaj, $_ap, $_cod_postal, $_email, $_telefon, $_mobil, $_permis_data, $_serie_ci, $_numar_ci, $_companie_tip, $_companie_profil, $_companie_activitate, $_companie_caen);
        $conducator = new ComplexDriver($_nume_driver,$_prenume_driver,$_cnp_driver,$_serie_ci_driver,$_numar_ci_driver);	


        // var_dump($autentificare);
        // echo "<br>";
        // echo "<br>";
        // var_dump($masina);
        // echo "<br>";
        // echo "<br>";
        // var_dump($proprietar);
        // echo "<br>";
        // echo "<br>";
        // var_dump($utilizator);
        // echo "<br>";
        // echo "<br>";
        // var_dump($conducator);
        // echo "<br>";
        // echo "<br>";
        $oferte = array();
        // set_time_limit(0);
        foreach ($nr_luni as $luna) {
            foreach ($asiguratori as $asigurator) {
                
                try {
                    $result = $client->__call('CerereOfertaRCA',
                    array(
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
                        )
                );
                // print_r($result);
                if($result->Eroare != 1){
                    $tmp = array('date' => $result, 'asigurator' => $asigurator);
                    // print_r($result);
                    // echo '<br><br>';
                    array_push($oferte, $tmp);
                }
                
                } catch(Exception $a) {
                    echo $a;
                }
            }
        }



        $collection = collect($oferte);
        
        $grouped = $collection->mapToGroups(function ($item, $key) {
            return [$item['asigurator'] => $item['date']];
        });
        
        // print_r($grouped->all());

        
        // print_r($grouped->get('city')->all());

        // print_r();

        return response()->json([
             'view' => view('oferte', ['oferte'=>$grouped, 'valabilitate'=>$nr_luni_valabilitate])->render(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
