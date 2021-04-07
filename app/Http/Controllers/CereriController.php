<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CereriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $req_int = '<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" 
        xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:home="http://82.208.136.106:8888/mgb/home/">
         <soapenv:Header/>
         <soapenv:Body>
         <home:CerereOfertaRCA soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
         <autentificare xsi:type="home:ComplexCredentials">
         <user xsi:type="xsd:string">testRCA</user>
         <parola xsi:type="xsd:string">test.1234</parola>
         </autentificare>
         <link_redirect_plata xsi:type="xsd:string">http://www.testrca.ro/rca/emit.php</link_redirect_plata>
         <asigurator xsi:type="xsd:string">city</asigurator>
         <nr_luni_valabilitate xsi:type="xsd:int">12</nr_luni_valabilitate>
         <data_inceput_valabilitate xsi:type="xsd:string">2016-07-20</data_inceput_valabilitate>
         <activitate xsi:type="xsd:string">Privat</activitate>
         <leasing xsi:type="xsd:int">3</leasing>
         <Vehicul xsi:type="home:ComplexVehicle">
         <nr_identificare xsi:type="xsd:string">w123xy24fg32w1234</nr_identificare>
         <stadiu xsi:type="xsd:string">Inmatriculat</stadiu>
         <nr_auto xsi:type="xsd:string">DJ68MGV</nr_auto>
         <marca xsi:type="xsd:string">DACIA</marca>
         <model xsi:type="xsd:string">BERLINA</model>
         <serie_motor xsi:type="xsd:string">?</serie_motor> <serie_civ xsi:type="xsd:string">E165491</serie_civ>
         <an_fabricatie xsi:type="xsd:int">1998</an_fabricatie>
         <km xsi:type="xsd:int">150000</km>
         <km_an xsi:type="xsd:int">10000</km_an>
         <categorie xsi:type="xsd:string">Autoturism</categorie>
         <capacitate xsi:type="xsd:int">1350</capacitate>
         <nr_locuri xsi:type="xsd:int">5</nr_locuri>
         <masa_maxima xsi:type="xsd:int">1310</masa_maxima>
         <putere_kw xsi:type="xsd:int">45</putere_kw>
         <tip_combustibil xsi:type="xsd:string">501</tip_combustibil>
         <allianz_acoperiri_suplimentare xsi:type="xsd:string">false</allianz_acoperiri_suplimentare>
         <allianz_comercializat_de_un_dealer xsi:type="xsd:string">false</allianz_comercializat_de_un_dealer>
         <no_young_driver xsi:type="xsd:string">false</no_young_driver>
         <city_acc xsi:type="xsd:string">false</city_acc>
         <euroins_acc xsi:type="xsd:string">false</euroins_acc>
         <cu_decontare_directa xsi:type="xsd:string">true</cu_decontare_directa>
         <data_prima_inmatriculare>2020-03-29</data_prima_inmatriculare>
         </Vehicul>
         <tip_persoana xsi:type="xsd:string">pf</tip_persoana>
         <pensionar xsi:type="xsd:string">0</pensionar>
         <deficiente xsi:type="xsd:string">0</deficiente>
         <Proprietar xsi:type="home:ComplexOwner">
         <codUnic xsi:type="xsd:string">1234567890123</codUnic>
         <nume xsi:type="xsd:string">Danes</nume>
         <prenume xsi:type="xsd:string">Victor</prenume>
         <sex xsi:type="xsd:string">M</sex>
         <judet xsi:type="xsd:string">BUCURESTI</judet>
         <localitate xsi:type="xsd:string">BUCURESTI SECTORUL 3</localitate>
         <cod xsi:type="xsd:int">179169</cod>
         <strada xsi:type="xsd:string">1 Decembrie 1918</strada>
         <numar xsi:type="xsd:string">6</numar>
         <bloc xsi:type="xsd:string">1</bloc>
         <scara xsi:type="xsd:string">2</scara>
         <etaj xsi:type="xsd:string">1</etaj>
         <apartament xsi:type="xsd:string">12</apartament>
         <cod_postal xsi:type="xsd:string">231121</cod_postal>
         <email xsi:type="xsd:string">test@te@.ro</email>
         <telefon xsi:type="xsd:string">0711123123</telefon>
         <mobil xsi:type="xsd:string">0711123123</mobil>
         <permis_data xsi:type="xsd:string">2008-11-01</permis_data>
         <serie_ci xsi:type="xsd:string">ds</serie_ci>
         <numar_ci xsi:type="xsd:string">123123</numar_ci>
         <companie_tip xsi:type="xsd:string">?</companie_tip>
         <companie_profil xsi:type="xsd:string">?</companie_profil>
         <companie_activitate xsi:type="xsd:string">?</companie_activitate>
         <companie_caen xsi:type="xsd:string">?</companie_caen>
         </Proprietar>
         <Utilizator xsi:type="home:ComplexUser">
         <codUnic xsi:type="xsd:string">6140410018205</codUnic>
         <nume xsi:type="xsd:string">Danes</nume>
         <prenume xsi:type="xsd:string">Victor</prenume>
         <sex xsi:type="xsd:string">M</sex>
         <judet xsi:type="xsd:string">BUCURESTI</judet>
         <localitate xsi:type="xsd:string">BUCURESTI SECTORUL 3</localitate>
         <cod xsi:type="xsd:int">179169</cod>
         <strada xsi:type="xsd:string">1 Decembrie 1918</strada>
         <numar xsi:type="xsd:string">6</numar>
         <bloc xsi:type="xsd:string">1</bloc> <scara xsi:type="xsd:string">2</scara>
         <etaj xsi:type="xsd:string">1</etaj>
         <apartament xsi:type="xsd:string">12</apartament>
         <cod_postal xsi:type="xsd:string">231121</cod_postal>
         <email xsi:type="xsd:string">test@te.ro</email>
         <telefon xsi:type="xsd:string">0711123123</telefon>
         <mobil xsi:type="xsd:string">0711123123</mobil>
         <permis_data xsi:type="xsd:string">2008-11-01</permis_data>
         <serie_ci xsi:type="xsd:string">ds</serie_ci>
         <numar_ci xsi:type="xsd:string">123123</numar_ci>
         <companie_tip xsi:type="xsd:string">?</companie_tip>
         <companie_profil xsi:type="xsd:string">?</companie_profil>
         <companie_activitate xsi:type="xsd:string">?</companie_activitate>
         <companie_caen xsi:type="xsd:string">?</companie_caen>
         </Utilizator>
         <Conducator xsi:type="home:ComplexDriver">
         <nume xsi:type="xsd:string">test</nume>
         <prenume xsi:type="xsd:string">test</prenume>
         <cnp xsi:type="xsd:string">6140410018205</cnp>
         <serie xsi:type="xsd:string">df</serie>
         <numar xsi:type="xsd:string">321231</numar>
         </Conducator>
         </home:CerereOfertaRCA>
         </soapenv:Body>
        </soapenv:Envelope>
        ';

        try {
            $result = $client->__call('CerereOfertaRCA',array($req_int));
            print_r($result);
            // $response= htmlentities($result);
        } catch(all) {
            echo 'Eroare';
        }
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
