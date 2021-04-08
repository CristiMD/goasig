<?php
/**
         * @pw_element string $user
         * @pw_element string $parola
         * @pw_complex ComplexCredentials
         */
        class ComplexCredentials{
            /**
             * @var string
             */
            public $user;
            /**
             * @var string
             */
            public $parola;
        }

        /**
         * @pw_element string $nr_identificare
         * @pw_element string $stadiu
         * @pw_element string $nr_auto
         * @pw_element string $marca
         * @pw_element string $model
         * @pw_element string $serie_motor
         * @pw_element string $serie_civ
         * @pw_element int $an_fabricatie
         * @pw_element int $km
         * @pw_element int $km_an
         * @pw_element string $categorie
         * @pw_element int $capacitate
         * @pw_element int $nr_locuri
         * @pw_element int $masa_maxima
         * @pw_element int $putere_kw
         * @pw_element string $tip_combustibil
         * @pw_element string $allianz_acoperiri_suplimentare
         * @pw_element string $allianz_comercializat_de_un_dealer
         * @pw_element string $no_young_driver
         * @pw_element string $city_acc
         * @pw_element string $euroins_acc
         * @pw_element string $cu_decontare_directa
         * @pw_element string $data_prima_inmatriculare
         * @pw_complex ComplexVehicle
         */
        class ComplexVehicle{
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

        /**
         * @pw_element string $Valoare
         * @pw_element string $ClasaBM
         * @pw_element string $IdOferta
         * @pw_element string $Valabilitate
         * @pw_element string $ValoareInfo
         * @pw_element string $ClasaBMInfo
         * @pw_element string $ValabilitateInfo
         * @pw_element string $NumeSupliment1
         * @pw_element string $ValoareSupliment1
         * @pw_element string $NumeSupliment2
         * @pw_element string $ValoareSupliment2
         * @pw_element string $NumeSupliment3
         * @pw_element string $ValoareSupliment3
         * @pw_element string $ComisionProcent
         * @pw_element string $ComisionValoare
         * @pw_element string $DecontareDirectaValoare
         * @pw_element string $cu_decontare_directa
         * @pw_element string $LinkPlata
         * @pw_element string $Mesaj
         * @pw_element string $CarteaVerde
         * @pw_element boolean $Eroare
         * @pw_complex ComplexTypeOffer
         */
        class ComplexTypeOffer{
            /**
             * @var string
             */
            public $Valoare;
            /**
             * @var string
             */
            public $ClasaBM;
            /**
             * @var string
             */
            public $IdOferta;
            /**
             * @var string
             */
            public $Valabilitate;
            /**
             * @var string
             */
            public $ValoareInfo;
            /**
             * @var string
             */
            public $ClasaBMInfo;
            /**
             * @var string
             */
            public $ValabilitateInfo;
            /**
             * @var string
             */
            public $NumeSupliment1;
            /**
             * @var string
             */
            public $ValoareSupliment1;
            /**
             * @var string
             */
            public $NumeSupliment2;
            /**
             * @var string
             */
            public $ValoareSupliment2;
            /**
             * @var string
             */
            public $NumeSupliment3;
            /**
             * @var string
             */
            public $ValoareSupliment3;
            /**
             * @var string
             */
            public $ComisionProcent;
            /**
             * @var string
             */
            public $ComisionValoare;
            /**
             * @var string
             */
            public $DecontareDirectaValoare;
            /**
             * @var string
             */
            public $cu_decontare_directa;
            /**
             * @var string
             */
            public $LinkPlata;
            /**
             * @var string
             */
            public $Mesaj;
            /**
             * @var string
             */
            public $CarteaVerde;
            /**
             * @var boolean
             */
            public $Eroare;
        }

        /**
         * @pw_element string $PolitaSerieNumar
         * @pw_element string $PolitaPDF
         * @pw_element string $PolitaPDFSup
         * @pw_element string $PolitaSerieNumarSup1
         * @pw_element string $PolitaSerieNumarSup2
         * @pw_element string $PolitaSerieNumarSup3
         * @pw_element string $DocPlata
         * @pw_element string $DocPlataPDF
         * @pw_element string $Mesaj
         * @pw_element boolean $Eroare
         * @pw_complex ComplexTypePolicy
         */
        class ComplexTypePolicy{
            /**
             * @var string
             */
            public $PolitaSerieNumar;
            /**
             * @var string
             */
            public $PolitaPDF;
            /**
             * @var string
             */
            public $PolitaPDFSup;
            /**
             * @var string
             */
            public $PolitaSerieNumarSup1;
            /**
             * @var string
             */
            public $PolitaSerieNumarSup2;
            /**
             * @var string
             */
            public $PolitaSerieNumarSup3;
            /**
             * @var string
             */
            public $DocPlata;
            /**
             * @var string
             */
            public $DocPlataPDF;
            /**
             * @var string
             */
            public $Mesaj;
            /**
             * @var boolean
             */
            public $Eroare;
        }

        /**
         * @pw_element string $Lista
         * @pw_element string $Mesaj
         * @pw_element boolean $Eroare
         * @pw_complex ComplexTypeList
         */
        class ComplexTypeList{
            /**
             * @var string
             */
            public $Lista;
            /**
             * @var string
             */
            public $Mesaj;
            /**
             * @var boolean
             */
            public $Eroare;
        }

        /**
         * @pw_element string $Caen
         * @pw_element string $Nume
         * @pw_element string $Mesaj
         * @pw_element boolean $Eroare
         * @pw_complex ComplexTypeCompanyDetails
         */
        class ComplexTypeCompanyDetails{
            /**
             * @var string
             */
            public $Caen;
            /**
             * @var string
             */
            public $Nume;
            /**
             * @var string
             */
            public $Mesaj;
            /**
             * @var boolean
             */
            public $Eroare;
        }

        ?>