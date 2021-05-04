@extends('layouts.app')

@section('content')
<div id="replaceble">
<!-- 
			=============================================
				Theme Main Banner
			============================================== 
			-->
			<div id="full-overlay"><div id="loading-overlay"><div id="loader"></div><div class="text">Asteapta o secunda, acum incarcam ofertele pentru tine</div></div></div>
			<div id="theme-main-banner" class="banner-one">
				<div data-src="images/home/slide-1.jpg">
					<div class="camera_caption">
						<div class="container">
							<h1 class="wow fadeInUp animated">Digital Agency <br>And Your Bank <br> Loaner.</h1>
							<p class="wow fadeInUp animated" data-wow-delay="0.2s">We have wide rang of loans section for our customer</p>
							<a href="#" class="button-one wow fadeInLeft animated" data-wow-delay="0.3s">Apply for Loan</a>
							<a href="service-v1.html" class="button-two wow fadeInRight animated" data-wow-delay="0.3s">See services</a>
						</div> <!-- /.container -->
					</div> <!-- /.camera_caption -->
				</div>
				<div data-src="images/home/slide-2.jpg">
					<div class="camera_caption">
						<div class="container">
							<h1 class="wow fadeInUp animated">Digital Agency <br>And Your Bank <br> Loaner.</h1>
							<p class="wow fadeInUp animated" data-wow-delay="0.2s">We have wide rang of loans section for our customer</p>
							<a href="#" class="button-one wow fadeInLeft animated" data-wow-delay="0.3s">Apply for Loan</a>
							<a href="service-v1.html" class="button-two wow fadeInRight animated" data-wow-delay="0.3s">See services</a>
						</div> <!-- /.container -->
					</div> <!-- /.camera_caption -->
				</div>
				<div data-src="images/home/slide-3.jpg">
					<div class="camera_caption">
						<div class="container">
							<h1 class="wow fadeInUp animated">Digital Agency <br>And Your Bank <br> Loaner.</h1>
							<p class="wow fadeInUp animated" data-wow-delay="0.2s">We have wide rang of loans section for our customer</p>
							<a href="#" class="button-one wow fadeInLeft animated" data-wow-delay="0.3s">Apply for Loan</a>
							<a href="service-v1.html" class="button-two wow fadeInRight animated" data-wow-delay="0.3s">See services</a>
						</div> <!-- /.container -->
					</div> <!-- /.camera_caption -->
				</div>
			</div> <!-- /#theme-main-banner -->
			

			
			
			<!-- 
			=============================================
				Top Feature
			============================================== 
			-->
			<div class="top-feature">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-4 col-12">
							<div class="single-feature clearfix">
								<img src="images/icon/1.png" alt="" class="float-left tran3s">
								<div class="text float-left">
									<p>Up to $5M</p>
									<h4><a href="#" class="tran3s">FAST LOAN</a></h4>
								</div> <!-- /.text -->
							</div> <!-- /.single-feature -->
						</div> <!-- /.col- -->
						<div class="col-lg-4 col-md-6 col-sm-4 col-12">
							<div class="single-feature clearfix">
								<img src="images/icon/2.png" alt="" class="float-left tran3s">
								<div class="text float-left">
									<p>We always Ready</p>
									<h4><a href="#" class="tran3s">DEDICATED TEAM</a></h4>
								</div> <!-- /.text -->
							</div> <!-- /.single-feature -->
						</div> <!-- /.col- -->
						<div class="col-lg-4 d-md-none d-lg-block col-sm-4 col-12">
							<div class="single-feature clearfix">
								<img src="images/icon/3.png" alt="" class="float-left tran3s">
								<div class="text float-left">
									<p>24 Hours </p>
									<h4><a href="#" class="tran3s">24/7 SUPPORTS</a></h4>
								</div> <!-- /.text -->
							</div> <!-- /.single-feature -->
						</div> <!-- /.col- -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.top-feature -->



			<div class="container">
				@auth
					<script>
						$(function() {
							$.ajax({
							headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							},
							type: "GET",
							url: "/platforma/public/vehicul",
							// url: "/vehicul",
							encode: true,
						}).done(function (data) {
							console.log(data);
							$('#vehicule-salvate').empty();
							$('#vehicule-salvate').append(new Option('--alege vehicul--', ''));
							if(data.length) {
								data.map(vehicul => {
									$('#vehicule-salvate').append(new Option(vehicul.nr_inmatriculare, vehicul.nr_inmatriculare));
								});
							}
						});
						});
				  	</script>
					  <div class="user-initial-select">
						<h2 style="text-align: center;">Salutare {{Auth::user()->nume}}</h2>
						<p>Alege una din masinile salvate din lista </p>
						<select id="vehicule-salvate" name="vehicule-salvate">
							<option>--alege vehicul--<option>
						</select>
						<p class="centru-sau"> sau </p>
						<button class="test-revenire" id="vehicul-nou">Adauga o masina noua</button>
					  </div>
				@endauth
				@guest
					<div id="revenire">
						<h2>Ai mai facut asigurare la noi?</h2>
						<input type="text" id="nr_mat" name="nr_mat"  placeholder="Numar Inmatriculare">
						<button id="test-revenire" class="test-revenire">Da</button>
						<button id="fara-revenire" class="fara-revenire">Nu</button>
					</div>
				@endguest
				
				<div id="wizard_container" style="display: none;">
					<form name="example-1" id="wrapped" method="post" action="/cerere" enctype="multipart/form-data">
        				<meta name="csrf-token" content="{{ csrf_token() }}">
						<input id="website" name="website" type="text" value="">
						<!-- Leave for security protection, read docs for details -->
						<div id="middle-wizard">
							<div class="step">
								<div class="question_title">
									<h3>Date despre autovehicul</h3>
									<p>Pasul 1</p>
								</div>
								<div class="row justify-content-center">
									<div class="col-lg-5">
										<div class="box_general">
											<div class="form-group add_bottom_30">
												<div class="styled-select">
													<select class="required" id="stare_inmatriculare" name="stare_inmatriculare">
														<option value="" selected>Stare inmatriculare</option>
														<option value="Inmatriculat">Inmatriculat</option>
														<option value="InVedereInmatriculare">In vederea inmatricularii</option>
														<option value="Inregistrat">Inregistrat la primarie</option>
														<option value="InVedereInregistrare">In vederea inregistrarii</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<input type="text" id="numar_inmatriculare" name="numar_inmatriculare" class="required form-control" placeholder="Numar Inmatriculare">
											</div>
											<div class="form-group add_bottom_30">
												<div class="styled-select">
													<select class="required" id="tip_vehicul" name="tip_vehicul"><option value="">Tip vehicul</option><option value="Autoturism">Autoturism</option><option value="Autobuz">Autobuz</option><option value="Autocamion">Autocamion</option><option value="Autocar">Autocar</option><option value="Automobil mixt">Automobil mixt</option><option value="Autospeciala">Autospeciala</option><option value="Autotractor">Autotractor</option><option value="Autoutilitara<3,5 t">Autoutilitara&lt;3,5 t</option><option value="Microbuz">Microbuz</option><option value="Motocicleta">Motocicleta</option><option value="Remorca">Remorca</option><option value="Semiremorca">Semiremorca</option><option value="Cap tractor">Cap tractor</option><option value="Turism de teren">Turism de teren</option><option value="Autotractoare cu sa">Autotractoare cu sa</option><option value="Autovehicule pt dest. speciale">Autovehicule pt dest. speciale</option><option value="Utilaje">Utilaje</option><option value="Tractor">Tractor</option><option value="Tramvai">Tramvai</option><option value="Troleibuz">Troleibuz</option><option value="Autobuz articulat">Autobuz articulat</option><option value="Autobuz interurban">Autobuz interurban</option><option value="Autobuz special">Autobuz special</option><option value="Autobuz urban">Autobuz urban</option><option value="Autorulota">Autorulota</option><option value="Rulota">Rulota</option><option value="Motociclu">Motociclu</option><option value="Scuter">Scuter</option><option value="Moped">Moped</option><option value="ATV">ATV</option><option value="Autoutilitara>3,5 t">Autoutilitara&gt;3,5 t</option><option value="Autobasculanta">Autobasculanta</option><option value="Autocisterna">Autocisterna</option></select>
													{{-- <select class="required" id="tip_vehicul" name="tip_vehicul">
														<option value="" selected>Tip vehicul</option>
													</select> --}}
												</div>
											</div>
											<div class="form-group add_bottom_30">
												<div class="styled-select">
													{{-- <select class="required" name="marca" id="marca">
														<option value="" selected>Marca</option>
												</select> --}}
												<select class="required" name="marca" id="marca"><option value="">Marca</option><option value="ACERBI">ACERBI</option><option value="ACHLEITNER">ACHLEITNER</option><option value="ACKERMANN">ACKERMANN</option><option value="ACTM">ACTM</option><option value="AEBI (A)">AEBI (A)</option><option value="AEBI - RASANT (A)">AEBI - RASANT (A)</option><option value="AEON">AEON</option><option value="AGT - AGROMEHANIKA (SI)">AGT - AGROMEHANIKA (SI)</option><option value="ALFA ROMEO">ALFA ROMEO</option><option value="ALPHA">ALPHA</option><option value="ANTONIO CARRARO (I)">ANTONIO CARRARO (I)</option><option value="APRILIA">APRILIA</option><option value="ARDOR">ARDOR</option><option value="ARO">ARO</option><option value="ASKO">ASKO</option><option value="ATALA">ATALA</option><option value="AUDI">AUDI</option><option value="AUREPA (IWS AUREPA)">AUREPA (IWS AUREPA)</option><option value="AUTOSAN">AUTOSAN</option><option value="AVIA">AVIA</option><option value="BAJAJ">BAJAJ</option><option value="BAOTIAN">BAOTIAN</option><option value="BC-LDS (BC HUTNIK)">BC-LDS (BC HUTNIK)</option><option value="BELARUS">BELARUS</option><option value="BENALU">BENALU</option><option value="BENELLI">BENELLI</option><option value="BERGER (AT)">BERGER (AT)</option><option value="BERGER (PL)">BERGER (PL)</option><option value="BERGER TRAC">BERGER TRAC</option><option value="BETAMOTOR">BETAMOTOR</option><option value="BIMOTA">BIMOTA</option><option value="BLUMHARDT">BLUMHARDT</option><option value="BMW">BMW</option><option value="BODEX">BODEX</option><option value="BORO">BORO</option><option value="BRANDYS">BRANDYS</option><option value="BRENDERUP">BRENDERUP</option><option value="BROSHUIS">BROSHUIS</option><option value="BUELL">BUELL</option><option value="BUNGE">BUNGE</option><option value="BURG">BURG</option><option value="CAGIVA">CAGIVA</option><option value="CAN-AM BOMBARDIER">CAN-AM BOMBARDIER</option><option value="CARDI">CARDI</option><option value="CARNEHL">CARNEHL</option><option value="CARRARO (I)">CARRARO (I)</option><option value="CASE - IH">CASE - IH</option><option value="CEZET">CEZET</option><option value="CFMOTO">CFMOTO</option><option value="CHANGHE">CHANGHE</option><option value="CHEREAU">CHEREAU</option><option value="CHEVROLET">CHEVROLET</option><option value="CHRYSLER">CHRYSLER</option><option value="CITROEN">CITROEN</option><option value="CLAAS (D)">CLAAS (D)</option><option value="CMT">CMT</option><option value="CPI">CPI</option><option value="DACIA">DACIA</option><option value="DAELIM">DAELIM</option><option value="DAEWOO">DAEWOO</option><option value="DAF">DAF</option><option value="DAIHATSU">DAIHATSU</option><option value="DAVID BROWN (GB)">DAVID BROWN (GB)</option><option value="DERBI">DERBI</option><option value="DEUTZ - FAHR (D)">DEUTZ - FAHR (D)</option><option value="DFM">DFM</option><option value="DNEPR">DNEPR</option><option value="DODGE">DODGE</option><option value="DOLL">DOLL</option><option value="DROMECH">DROMECH</option><option value="DUCATI">DUCATI</option><option value="EGLMOTOR">EGLMOTOR</option><option value="EICHER (D)">EICHER (D)</option><option value="ENERCO">ENERCO</option><option value="EOS">EOS</option><option value="F.X. MEILLER">F.X. MEILLER</option><option value="FANTIC">FANTIC</option><option value="FARMTRAC (PL)">FARMTRAC (PL)</option><option value="FAYMONVILLE">FAYMONVILLE</option><option value="FEBER (INTER-CARS)">FEBER (INTER-CARS)</option><option value="FELDBINDER">FELDBINDER</option><option value="FENDT (D)">FENDT (D)</option><option value="FERRARI (I)">FERRARI (I)</option><option value="FERRO">FERRO</option><option value="FIAT">FIAT</option><option value="FIAT (I)">FIAT (I)</option><option value="FLIEGL">FLIEGL</option><option value="FLOOR">FLOOR</option><option value="FORD">FORD</option><option value="FORD (GB)">FORD (GB)</option><option value="FOTON (CHN)">FOTON (CHN)</option><option value="FRAPPA">FRAPPA</option><option value="FRUEHAUF">FRUEHAUF</option><option value="GARELLI">GARELLI</option><option value="GAS GAS">GAS GAS</option><option value="GENERIC">GENERIC</option><option value="GILERA">GILERA</option><option value="GLOGGER">GLOGGER</option><option value="GNIOTPOL">GNIOTPOL</option><option value="GOFA">GOFA</option><option value="GOLDHOFER">GOLDHOFER</option><option value="GOLDONI (I)">GOLDONI (I)</option><option value="GRAS">GRAS</option><option value="GREW">GREW</option><option value="GUTBROD (BRD)">GUTBROD (BRD)</option><option value="HAKPOL">HAKPOL</option><option value="HAOTIAN">HAOTIAN</option><option value="HARLEY-DAVIDSON">HARLEY-DAVIDSON</option><option value="HENDRICKS">HENDRICKS</option><option value="HERCULES">HERCULES</option><option value="HOBUR">HOBUR</option><option value="HOLDER (D)">HOLDER (D)</option><option value="HONDA">HONDA</option><option value="HUMBAUR">HUMBAUR</option><option value="HURLIMANN (CH)">HURLIMANN (CH)</option><option value="HUSABERG">HUSABERG</option><option value="HUSQVARNA">HUSQVARNA</option><option value="HYOSUNG">HYOSUNG</option><option value="HYUNDAI">HYUNDAI</option><option value="IFA">IFA</option><option value="IGLOOCAR">IGLOOCAR</option><option value="IMPODAN (DK/CHN)">IMPODAN (DK/CHN)</option><option value="INFINITI">INFINITI</option><option value="INTRALL">INTRALL</option><option value="IRISBUS">IRISBUS</option><option value="IRIZAR">IRIZAR</option><option value="ISEKI">ISEKI</option><option value="ISTRAIL">ISTRAIL</option><option value="ISUZU">ISUZU</option><option value="ITALJET">ITALJET</option><option value="IVECO">IVECO</option><option value="IVECO EURO CARGO">IVECO EURO CARGO</option><option value="JAGUAR">JAGUAR</option><option value="JANMIL">JANMIL</option><option value="JAWA">JAWA</option><option value="JCB">JCB</option><option value="JELCZ">JELCZ</option><option value="JIALING / ZONG-SHEN">JIALING / ZONG-SHEN</option><option value="JINCHENG">JINCHENG</option><option value="JOHN DEERE (USA)">JOHN DEERE (USA)</option><option value="JUNAK">JUNAK</option><option value="KAISER">KAISER</option><option value="KAMAZ">KAMAZ</option><option value="KAROSA / IRISBUS">KAROSA / IRISBUS</option><option value="KASSBOHRER">KASSBOHRER</option><option value="KAWASAKI">KAWASAKI</option><option value="KEEWAY">KEEWAY</option><option value="KIA">KIA</option><option value="KIOTI (ROK)">KIOTI (ROK)</option><option value="KNAPEN">KNAPEN</option><option value="KOGEL">KOGEL</option><option value="KOMAR">KOMAR</option><option value="KONAR">KONAR</option><option value="KRONE">KRONE</option><option value="KTM">KTM</option><option value="KUBOTA (J)">KUBOTA (J)</option><option value="KYMCO">KYMCO</option><option value="LABINPROGRES TPS (HR)">LABINPROGRES TPS (HR)</option><option value="LADA">LADA</option><option value="LAG">LAG</option><option value="LAMBERET">LAMBERET</option><option value="LAMBORGHINI (I)">LAMBORGHINI (I)</option><option value="LANCIA">LANCIA</option><option value="LAND ROVER">LAND ROVER</option><option value="LANDINI (I)">LANDINI (I)</option><option value="LANGENDORF">LANGENDORF</option><option value="LAVERDA">LAVERDA</option><option value="LDS">LDS</option><option value="LECITRAILER">LECITRAILER</option><option value="LEGRAS">LEGRAS</option><option value="LEXUS">LEXUS</option><option value="LIAZ">LIAZ</option><option value="LIFAN">LIFAN</option><option value="LIMB - LUXS (SI)">LIMB - LUXS (SI)</option><option value="LINDNER (A)">LINDNER (A)</option><option value="LINGBEN">LINGBEN</option><option value="LOHR">LOHR</option><option value="MADO">MADO</option><option value="MAGYAR">MAGYAR</option><option value="MAL">MAL</option><option value="MALAGUTI">MALAGUTI</option><option value="MAN">MAN</option><option value="MASERATI">MASERATI</option><option value="MASSEY FERGUSON (GB)">MASSEY FERGUSON (GB)</option><option value="MAZ">MAZ</option><option value="MAZDA">MAZDA</option><option value="MBK">MBK</option><option value="MCCORMICK GB (USA/D)">MCCORMICK GB (USA/D)</option><option value="MEGA">MEGA</option><option value="MEIERLING">MEIERLING</option><option value="MERCEDES BENZ (D)">MERCEDES BENZ (D)</option><option value="MERCEDES-BENZ">MERCEDES-BENZ</option><option value="METACO">METACO</option><option value="METALCHEM KOCIAN">METALCHEM KOCIAN</option><option value="MG">MG</option><option value="MIL REMORQUES">MIL REMORQUES</option><option value="MINI (BMW)">MINI (BMW)</option><option value="MINSK">MINSK</option><option value="MIROFRET">MIROFRET</option><option value="MITSUBISHI">MITSUBISHI</option><option value="MITSUBISHI-FUSO / FUSO">MITSUBISHI-FUSO / FUSO</option><option value="MONTRACON">MONTRACON</option><option value="MORINI">MORINI</option><option value="MOTOBI">MOTOBI</option><option value="MOTOGUZZI">MOTOGUZZI</option><option value="MULTICAR">MULTICAR</option><option value="MV AUGUSTA">MV AUGUSTA</option><option value="MZ/MUZ">MZ/MUZ</option><option value="NEOPLAN">NEOPLAN</option><option value="NEPTUN">NEPTUN</option><option value="NEW HOLLAND">NEW HOLLAND</option><option value="NIEWIADOW">NIEWIADOW</option><option value="NISSAN">NISSAN</option><option value="NOOTEBOOM">NOOTEBOOM</option><option value="NOVATRAIL">NOVATRAIL</option><option value="OPEL">OPEL</option><option value="OTOYOL">OTOYOL</option><option value="OVIBOS">OVIBOS</option><option value="P.G.O.">P.G.O.</option><option value="PACTON">PACTON</option><option value="PANAV">PANAV</option><option value="PASQUALI (I)">PASQUALI (I)</option><option value="PETROMECHANIKA">PETROMECHANIKA</option><option value="PEUGEOT">PEUGEOT</option><option value="PIACENZA">PIACENZA</option><option value="PIAGGIO / VESPA">PIAGGIO / VESPA</option><option value="PLANDEX">PLANDEX</option><option value="POL METAL REIMANN">POL METAL REIMANN</option><option value="POLARIS">POLARIS</option><option value="POLCAMP">POLCAMP</option><option value="POLKON">POLKON</option><option value="PORSCHE">PORSCHE</option><option value="PRAGA">PRAGA</option><option value="PRIMBOX">PRIMBOX</option><option value="PRO-STAFF">PRO-STAFF</option><option value="PRO-WAM">PRO-WAM</option><option value="PRODRENT">PRODRENT</option><option value="PROTON">PROTON</option><option value="PUCH / HERO PUCH">PUCH / HERO PUCH</option><option value="QINGQI">QINGQI</option><option value="QUEST">QUEST</option><option value="REFORM - WERKE (A)">REFORM - WERKE (A)</option><option value="REISCH">REISCH</option><option value="RENAULT">RENAULT</option><option value="RENAULT (F)">RENAULT (F)</option><option value="RENDERS">RENDERS</option><option value="RIEJU">RIEJU</option><option value="RM MOTOR">RM MOTOR</option><option value="ROLFO">ROLFO</option><option value="ROMET">ROMET</option><option value="ROSSART">ROSSART</option><option value="ROUTER">ROUTER</option><option value="ROVER">ROVER</option><option value="ROYAL ENFIELD BULLET">ROYAL ENFIELD BULLET</option><option value="RYDWAN">RYDWAN</option><option value="SAAB">SAAB</option><option value="SACHS">SACHS</option><option value="SAME (I)">SAME (I)</option><option value="SAMRO">SAMRO</option><option value="SCANIA">SCANIA</option><option value="SCHMITZ">SCHMITZ</option><option value="SCHWARZMULLER">SCHWARZMULLER</option><option value="SEAT">SEAT</option><option value="SETRA">SETRA</option><option value="SIAMOTO">SIAMOTO</option><option value="SIMATRA">SIMATRA</option><option value="SIMSON">SIMSON</option><option value="SKODA">SKODA</option><option value="SMART">SMART</option><option value="SOLARIS">SOLARIS</option><option value="SOLBUS">SOLBUS</option><option value="SOLO">SOLO</option><option value="SOMMER">SOMMER</option><option value="SOR">SOR</option><option value="SORELPOL">SORELPOL</option><option value="SPITZER">SPITZER</option><option value="SSANGYONG">SSANGYONG</option><option value="STAR">STAR</option><option value="STAS">STAS</option><option value="STEYR">STEYR</option><option value="STEYR (A)">STEYR (A)</option><option value="STOKOTA">STOKOTA</option><option value="SUBARU">SUBARU</option><option value="SUNDIRO">SUNDIRO</option><option value="SUZUKI">SUZUKI</option><option value="SYM">SYM</option><option value="TATA">TATA</option><option value="TATRA">TATRA</option><option value="TEMA">TEMA</option><option value="TGB">TGB</option><option value="TITAN">TITAN</option><option value="TM RACING">TM RACING</option><option value="TOMOS">TOMOS</option><option value="TOROS">TOROS</option><option value="TOYOTA">TOYOTA</option><option value="TRAILIS">TRAILIS</option><option value="TRAILOR">TRAILOR</option><option value="TRAMP TRAIL">TRAMP TRAIL</option><option value="TRIUMPH">TRIUMPH</option><option value="TROUILLET">TROUILLET</option><option value="URAL">URAL</option><option value="VALMET / VALTRA (FI)">VALMET / VALTRA (FI)</option><option value="VALPADANA (I)">VALPADANA (I)</option><option value="VAN HOOL">VAN HOOL</option><option value="VANHOOL">VANHOOL</option><option value="VDL">VDL</option><option value="VDL BERKHOF">VDL BERKHOF</option><option value="VDL BOVA">VDL BOVA</option><option value="VERTEMATI">VERTEMATI</option><option value="VIBERTI">VIBERTI</option><option value="VOLKSWAGEN">VOLKSWAGEN</option><option value="VOLVO">VOLVO</option><option value="VOLVO - SCANTRAC">VOLVO - SCANTRAC</option><option value="VOR">VOR</option><option value="VOXAN">VOXAN</option><option value="VW">VW</option><option value="WACO">WACO</option><option value="WFM">WFM</option><option value="WIELTON">WIELTON</option><option value="WIOLA">WIOLA</option><option value="WSK PZL-KROSNO">WSK PZL-KROSNO</option><option value="YAMAHA">YAMAHA</option><option value="YIBEN">YIBEN</option><option value="YORK">YORK</option><option value="ZASLAW">ZASLAW</option><option value="ZASTA">ZASTA</option><option value="ZETOR (CZ)">ZETOR (CZ)</option><option value="ZICO">ZICO</option><option value="ZIPP">ZIPP</option><option value="ZORZI">ZORZI</option><option value="ZPC WIDNIK">ZPC WIDNIK</option><option value="ZREMB WROCLAW">ZREMB WROCLAW</option><option value="ZUMICO">ZUMICO</option></select>
												</div>
												</div>
												<div class="form-group">
													<input type="text" name="model" id="model" class="required form-control" placeholder="Model">
												</div>
												<div class="form-group add_bottom_30">
													<div class="styled-select">
														<select class="required" name="combustibil"  id="combustibil">
															<option value="" selected>Combustibil</option>
																<option value="501">Benzina</option>
																<option value="502">Motorina</option>
																<option value="503">Benzina si GPL</option>
																<option value="504">Benzina si alcool</option>
																<option value="505">Electric</option>
																<option value="506">Alt tip de combustibil</option>
																<option value="500">Fara combustibil</option>
														</select>
													</div>
												</div>
												<div class="form-group add_bottom_30">
													<div class="styled-select">
														{{-- <select class="required" name="utilizare"  id="utilizare">
															<option value="" selected>Utilizare</option>
														</select> --}}
														<select class="required" name="utilizare" id="utilizare"><option value="">Utilizare</option><option value="Privat">Privat</option><option value="Taxi">Taxi</option><option value="Rent-a-car">Rent-a-car</option><option value="Paza si protectie">Paza si protectie</option><option value="Distributie">Distributie</option><option value="Curierat">Curierat</option><option value="Transport persoane">Transport persoane</option><option value="Constructii">Constructii</option><option value="Agricultura si exploatare forestiera">Agricultura si exploatare forestiera</option><option value="Institutii ale statului/cu actionariat de stat">Institutii ale statului/cu actionariat de stat</option><option value="Societati financiar bancare si nebancare (exceptie leasing)">Societati financiar bancare si nebancare (exceptie leasing)</option><option value="Societati de leasing financiar utilizator persoana fizica">Societati de leasing financiar utilizator persoana fizica</option><option value="Societati de leasing financiar utilizator persoana juridica">Societati de leasing financiar utilizator persoana juridica</option><option value="Transport substante inflamabile">Transport substante inflamabile</option><option value="Scoala soferi">Scoala soferi</option><option value="Transport persoane urban">Transport persoane urban</option><option value="Ambulanta">Ambulanta</option><option value="Agricultura">Agricultura</option><option value="Silvicultura">Silvicultura</option><option value="Transport de marfuri">Transport de marfuri</option><option value="Catering">Catering</option><option value="Masina serviciu">Masina serviciu</option><option value="Altele">Altele</option></select>
													</div>
												</div>
										</div>
										<!-- /box_general -->
									</div>
								</div>
								<!-- /row-->
							</div>
							<!-- /step-->

							<div class="step">
								<div class="question_title">
									<h3>Date din talon</h3>
									<p>Pasul 2</p>
								</div>
								<div class="row justify-content-center">
									<div class="col-lg-5">
										<div class="box_general">
										<div class="form-group">
											<input type="text" name="masa_maxima" id="masa_maxima" class="required form-control" placeholder="Masa Maxima">
										</div>
										<div class="form-group">
											<input type="text" name="cap_cil" id="cap_cil" class="required form-control" placeholder="Capacitate cilindrica">
										</div>
										<div class="form-group">
											<input type="text" name="putere" id="putere" class="required form-control" placeholder="Putere">
										</div>
										<div class="form-group">
											<input type="text" name="nr_loc" id="nr_loc" class="required form-control" placeholder="Nr. Locuri">
										</div>
										<div class="form-group">
											<input type="text" name="serie_civ" id="serie_civ" class="required form-control" placeholder="Seria CIV">
										</div>
										<div class="form-group">
											<input type="text" name="sasiu" id="sasiu" class="required form-control" placeholder="Serie sasiu">
										</div>
										<div class="form-group">
											<input type="text" name="an_fab" name="an_fab" id="an_fab" class="required form-control" placeholder="An fabricatie">
										</div>
									</div>
									</div>
								</div>
								<!-- /row-->
							</div>
							<!-- /step -->

							@auth
							<script>
								$(function() {
									$.ajax({
									headers: {
									'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
									},
									type: "GET",
									url: "/platforma/public/proprietar",
									// url: "/proprietar",
									encode: true,
								}).done(function (data) {
									// console.log(data);
									$('#proprietari-salvati').empty();
									$('#proprietari-salvati').append(new Option('--alege proprietar--', ''));
									if(data.length) {
										data.map(proprietar => {
											$('#proprietari-salvati').append(new Option(proprietar.nume + " " + proprietar.prenume , proprietar.cod_unic));
										});
									} else {
										$('#step-select-proprietar').remove();
									}	
								}).fail(function() {
									$('#step-select-proprietar').remove();
								})
								});
							</script>
							<div class="step" id="step-select-proprietar">
								 <div class="user-proprietar-select">
									<p>Alege unul din proprietarii salvati din lista </p>
									<select id="proprietari-salvati" name="proprietari-salvati">
										<option>--alege proprietar--<option>
									</select>
									<p class="centru-sau"> sau </p>
									<button type="button" class="test-revenire" id="proprietar-nou" >Adauga un proprietar nou</button>
								 </div>
							</div>
							@endauth
 
							<div class="step">
								<div class="question_title">
									<h3>Date proprietar</h3>
									<p>Pasul 3</p>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="box_general">
											<div class="form-group add_bottom_30">
												<div class="styled-select">
													<select class="required" name="persoana" id="persoana">
															<option value="pf">Persoana Fizica</option>
															<option value="pj">Persoana Juridica</option>
															<option value="leasing">Leasing</option>
													</select>
												</div>
											</div>
										<div class="form-group"id="nmume_proprietar-wrapper">
											<input type="text" name="nmume_proprietar" id="nmume_proprietar" class="required form-control" placeholder="Nume">
										</div>
										<div class="form-group" id="societate-wrapper">
										</div>
										<div class="form-group" id="cui-wrapper">
										</div>
										<div class="form-group add_bottom_30"  id="caen-wrapper">
										</div>
										<div class="form-group" id="companie-tip-wrapper">
										</div>
										<div class="form-group" id="companie-activitate-wrapper">
										</div>
										<div class="form-group" id="cnp_proprietar-wrapper">
											<input type="text" name="cnp_proprietar" id="cnp_proprietar" class="required form-control" placeholder="CNP">
										</div>
										<div class="form-group" id="ci_proprietar-wrapper">
											<input type="text" name="ci_proprietar" id="ci_proprietar" class="required form-control" placeholder="Serie CI">
										</div>
										<div class="form-group add_bottom_30">
											<div class="styled-select">
												<select class="required" id="judet" name="judet_proprietar">
														<option value="">Judet</option>
														<option value="ALBA">ALBA             </option>
														<option value="ARAD">ARAD             </option>
														<option value="ARGES">ARGES            </option>
														<option value="BACAU">BACAU            </option>
														<option value="BIHOR">BIHOR            </option>
														<option value="BISTRITA-NASAUD">BISTRITA NASAUD  </option>
														<option value="BOTOSANI">BOTOSANI         </option>
														<option value="BRAILA">BRAILA           </option>
														<option value="BRASOV">BRASOV           </option>
														<option value="BUCURESTI">BUCURESTI        </option>
														<option value="BUZAU">BUZAU            </option>
														<option value="CALARASI">CALARASI         </option>
														<option value="CARAS-SEVERIN">CARAS SEVERIN    </option>
														<option value="CLUJ">CLUJ             </option>
														<option value="CONSTANTA">CONSTANTA        </option>
														<option value="COVASNA">COVASNA          </option>
														<option value="DAMBOVITA">DAMBOVITA        </option>
														<option value="DOLJ">DOLJ             </option>
														<option value="GALATI">GALATI           </option>
														<option value="GIURGIU">GIURGIU          </option>
														<option value="GORJ">GORJ             </option>
														<option value="HARGHITA">HARGHITA         </option>
														<option value="HUNEDOARA">HUNEDOARA       </option>
														<option value="IALOMITA">IALOMITA         </option>
														<option value="IASI">IASI             </option>
														<option value="ILFOV">ILFOV            </option>
														<option value="MARAMURES">MARAMURES        </option>
														<option value="MEHEDINTI">MEHEDINTI        </option>
														<option value="MURES">MURES            </option>
														<option value="NEAMT">NEAMT            </option>
														<option value="OLT">OLT              </option>
														<option value="PRAHOVA">PRAHOVA          </option>
														<option value="SALAJ">SALAJ            </option>
														<option value="SATU_MARE">SATU MARE        </option>
														<option value="SIBIU">SIBIU            </option>
														<option value="SUCEAVA">SUCEAVA          </option>
														<option value="TELEORMAN">TELEORMAN        </option>
														<option value="TIMIS">TIMIS            </option>
														<option value="TULCEA">TULCEA           </option>
														<option value="VILCEA">VALCEA           </option>
														<option value="VASLUI">VASLUI           </option>
														<option value="VRANCEA">VRANCEA          </option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<input type="text" name="strada_proprietar" id="strada_proprietar" class="required form-control" placeholder="Strada">
										</div>
										<div class="form-group">
											<input type="text" name="bloc_proprietar"  id="bloc_proprietar" class="form-control" placeholder="Bloc">
										</div>
										<div class="form-group">
											<input type="text" name="etaj_proprietar" id="etaj_proprietar" class="form-control" placeholder="Etaj">
										</div>
									</div>
									</div>
									<div class="col-lg-6">
										<div class="box_general">
											<div class="form-group add_bottom_30">
												<div class="styled-select">
													<select class="required" name="reduceri"  id="reduceri">
															<option value="0">--Nu e cazul--</option>
															<option value="1">Pensionar</option>
															<option value="2">Deficiente locomotorii</option>
													</select>
												</div>
											</div>
										<div class="form-group" id="prenume_proprietar-wrapper">
											<input type="text" name="prenume_proprietar" id="prenume_proprietar" class="required form-control" placeholder="Prenume">
										</div>
										<div class="form-group" id="an_permis_proprietar-wrapper">
											<input type="date" name="an_permis_proprietar" id="an_permis_proprietar" class="required form-control" placeholder="Data obtinere permis">
										</div>
										<div class="form-group" id="nr_ci_proprietar-wrapper">
											<input type="text" name="nr_ci_proprietar" id="nr_ci_proprietar" class="required form-control" placeholder="Numar CI">
										</div>
										<div class="form-group add_bottom_30">
											<div class="styled-select">
												<select class="required" id="localitate" name="localitate_proprietar">
													<option value="">--alege localitatea--</option>
												</select>
											</div>
										</div>
										<div class="form-group" id="telefon_fix-wrapper">
										</div>
										<div class="form-group">
											<input type="text" name="numar_adresa_proprietar" id="numar_adresa_proprietar" class="form-control" placeholder="Numar">
										</div>
										<div class="form-group">
											<input type="text" name="scara_proprietar" id="scara_proprietar" class="form-control" placeholder="Scara">
										</div>
										<div class="form-group">
											<input type="text" name="apartament_proprietar" id="apartament_proprietar" class="form-control" placeholder="Ap.">
										</div>
										</div>
									</div>
								</div>
								<!-- /row-->
							</div>
							<!-- /step -->

							@auth
							<script>
								$(function() {
									$.ajax({
									headers: {
									'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
									},
									type: "GET",
									url: "/platforma/public/conducator",
									// url: "/conducator",
									encode: true,
								}).done(function (data) {
									console.log(data);
									$('#conducatori-salvati').empty();
									$('#conducatori-salvati').append(new Option('--alege proprietar--', ''));
									if(data.length) {
										data.map(conducator => {
											$('#conducatori-salvati').append(new Option(conducator.nume + " " + conducator.prenume , conducator.cod_unic));
										});
									} else {
										$('#step-select-conducator').remove();
									}	
								}).fail(function() {
									$('#step-select-conducator').remove();
								})
								});
							</script>
							<div class="step" id="step-select-conducator">
								 <div class="user-conducatori-select">
									<p>Alege unul din conducatorii salvati din lista </p>
									<select id="conducatori-salvati" name="conducatori-salvati">
										<option>--alege proprietar--<option>
									</select>
									<p class="centru-sau"> sau </p>
									<button type="button" class="test-revenire" id="conducator-nou" >Adauga un conducator nou</button>
								 </div>
							</div>
							@endauth
							
							<!-- Last step ============================== -->
							<div class="submit step">
								<div class="question_title">
									<h3>Date conducator auto</h3>
									<p>Paul 4</p>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="box_general">
										<h4>Date conducator auto</h4>
										<div class="item">
											<input id="soferul_acelasi" type="checkbox" name="soferul_acelasi">
											<label for="soferul_acelasi">Soferul principal este acelasi cu proprietarul?</label>
										</div>
										<div class="form-group">
											<input type="text" name="nume_conducator" id="nume_conducator" class="form-control" placeholder="Nume">
										</div>
										<div class="form-group">
											<input type="text" name="prenume_conducator" id="prenume_conducator" class="form-control" placeholder="Prenume">
										</div>
										<div class="form-group">
											<input type="text" name="ci_conducator" id="ci_conducator" class="form-control" placeholder="Serie CI">
										</div>
										<div class="form-group">
											<input type="text" name="nr_ci_conducatorr"  id="nr_ci_conducatorr" class="form-control" placeholder="Numar CI">
										</div>
										<div class="form-group">
											<input type="text" name="cnp_conducator" id="cnp_conducator" class="form-control" placeholder="CNP">
										</div>
										
										
									</div>
									</div>
									<div class="col-lg-6">
										<div class="box_general">
										{{-- <h4>Date livrare</h4> --}}
{{-- 
										<div class="form-group">
											<input type="text" name="nume_livrare" id="nume_livrare" class="required form-control" placeholder="Nume">
										</div>
										<div class="form-group">
											<input type="text" name="prenume_livrare"  id="prenume_livrare" class="required form-control" placeholder="Prenume">
										</div>
										<div class="form-group">
											<input type="text" name="adresa_livrare" id="adresa_livrare" class="required form-control" placeholder="Adresa">
										</div> --}}
										<div class="form-group">
											<input type="number" name="valabilitate" id="valabilitate" class="form-control" placeholder="Valabilitate">
										</div>
										{{-- <div class="form-group add_bottom_30">
											<div class="styled-select">
												<select class="required" id="asigurator" name="asigurator">
													<option value="">--alege asiguratorul--</option>
													<option value="allianz">Allianz</option>
													<option value="asirom">Asirom</option>
													<option value="euroins">Euroins</option>
													<option value="city">City</option>
													<option value="groupama">Groupama</option>
													<option value="omniasig">Omniasig</option>
													<option value="generali">Generali</option>
													<option value="grawe">Grawe</option>
													<option value="uniqa">Uniqa</option>
												</select>
											</div>
										</div> --}}
										<div class="form-group">
											<input type="date" name="data_rca"  id="data_rca" class=" form-control" placeholder="Valabilitate de la">
										</div>
										<div class="form-group">
											<input type="text" name="email_livrare"  id="email_livrare" class="required form-control" placeholder="Email">
										</div>
										<div class="item">
											<input id="creaza_cont" type="checkbox" name="creaza_cont" class="required">
											<label for="creaza_cont">Vrei sa iti creezi un cont pentru a salva detaliile?</label>
										</div>
										<div class="form-group" id="parola-wrapper">
											<input type="password" name="parola"  id="parola" class="required form-control" placeholder="Parola" autocomplete="off">
										</div>
										<div class="form-group">
											<input type="text" name="telefon_livrare"  id="telefon_livrare" class="required form-control" placeholder="Telefon">
										</div>
										<div class="item">
											<input id="termeni_conditii" type="checkbox" name="termeni_conditii" class="required">
											<label for="termeni_conditii">Sunt de acord cu termenii si conditiile site-ului!</label>
										</div>
										</div>
									</div>
								</div>
								<!-- /row -->
							</div>
							<!-- /Last step ============================== -->
						</div>
						<!-- /middle-wizard -->
						<div id="bottom-wizard">
							<button type="button" name="backward" class="backward">Inapoi </button>
							<button type="button" name="forward" class="forward">Inainte</button>
							<button type="submit" name="process" class="submit">Trimite</button>
						</div>
						<!-- /bottom-wizard -->
					</form>
				</div>
			</div>
			<!-- /Wizard container -->



			<!-- 
			=============================================
				Our Service
			============================================== 
			-->
			<div class="our-service">
				<div class="container">
					<div class="theme-title text-center">
						<h2>We’re here to help when you need <br>financial support.</h2>
						<p>We provides high street and mortgages, savings accounts, credit cards & loans</p>
					</div> <!-- /.theme-title -->
					<div class="row">
						<div class="col-lg-3 col-6">
							<div class="single-service">
								<div class="image-box"><img src="images/service/1.jpg" alt=""></div>
								<div class="text">
									<h4><a href="service-details.html">Business Services</a></h4>
									<p>Lorem ipsum dolor sit amet, cons ectetur elit. Vestibulum nec psum dolor sit.</p>
								</div> <!-- /.text -->
							</div> <!-- /.single-service -->
						</div> <!-- /.col- -->
						<div class="col-lg-3 col-6">
							<div class="single-service">
								<div class="image-box"><img src="images/service/2.jpg" alt=""></div>
								<div class="text">
									<h4><a href="service-details.html">Consumer Product</a></h4>
									<p>Lorem ipsum dolor sit amet, cons ectetur elit. Vestibulum nec psum dolor sit.</p>
								</div> <!-- /.text -->
							</div> <!-- /.single-service -->
						</div> <!-- /.col- -->
						<div class="col-lg-3 col-6">
							<div class="single-service">
								<div class="image-box"><img src="images/service/3.jpg" alt=""></div>
								<div class="text">
									<h4><a href="service-details.html">Financial Services</a></h4>
									<p>Lorem ipsum dolor sit amet, cons ectetur elit. Vestibulum nec psum dolor sit.</p>
								</div> <!-- /.text -->
							</div> <!-- /.single-service -->
						</div> <!-- /.col- -->
						<div class="col-lg-3 col-6">
							<div class="single-service">
								<div class="image-box"><img src="images/service/4.jpg" alt=""></div>
								<div class="text">
									<h4><a href="service-details.html">Software Research</a></h4>
									<p>Lorem ipsum dolor sit amet, cons ectetur elit. Vestibulum nec psum dolor sit.</p>
								</div> <!-- /.text -->
							</div> <!-- /.single-service -->
						</div> <!-- /.col- -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.our-service -->



			<!-- 
			=============================================
				About Home Section
			============================================== 
			-->
			<div class="home-about-section clearfix">
				<div class="float-left left-side"></div>
				<div class="float-left right-side">
					<div class="opacity clearfix">
						<div class="main-content float-left">
							<div class="theme-title">
								<h2>We’re Dynamic Team & Business Expert.</h2>
							</div> <!-- /.theme-title -->
							<p>Torquatos voluptatum ex qui, indoctum accommodare vimt que recte expetenda torquats sea. Dicat vocent explicari gile me que ex mel. In quo debitis civibus, eius animal timeam vel, legen dos invenire mei. Ea qui nibh.</p>
							<div class="clearfix name">
								<div class="float-left">
									<h5>Rashed ka.</h5>
									<p>CEO & Founder of Conis</p>
								</div>
								<img src="images/home/sign.png" alt="" class="float-right">
							</div>
							<a href="#" class="theme-button">Learn More</a>
						</div> <!-- /.main-content -->
					</div> <!-- /.opacity -->
				</div> <!-- /.right-side -->
			</div> <!-- /.home-about-section -->


			<!-- 
			=============================================
				Our Service Two
			============================================== 
			-->
			<div class="our-service-two">
				<div class="container">
					<div class="theme-title text-center">
						<h2>Our Services</h2>
						<p>We provide all kind of business, finance & consulting services.</p>
					</div> <!-- /.theme-title -->
					<div class="row">
						<div class="col-lg-4 col-sm-6">
							<div class="single-service">
								<i class="fa fa-building-o" aria-hidden="true"></i>
								<h5><a href="service-details.html">Investment Banking</a></h5>
								<p>Viamus aliquet rutrus duia variu sath eu Mauris ornoare tortor. Dosi quality fact. ipsum ample text.</p>
							</div> <!-- /.single-service -->
						</div> <!-- /.col- -->
						<div class="col-lg-4 col-sm-6">
							<div class="single-service">
								<i class="fa fa-briefcase" aria-hidden="true"></i>
								<h5><a href="service-details.html">Google Analyize</a></h5>
								<p>Viamus aliquet rutrus duia variu sath eu Mauris ornoare tortor. Dosi quality fact. ipsum ample text.</p>
							</div> <!-- /.single-service -->
						</div> <!-- /.col- -->
						<div class="col-lg-4 col-sm-6">
							<div class="single-service">
								<i class="fa fa-money" aria-hidden="true"></i>
								<h5><a href="service-details.html">Sales & Trading</a></h5>
								<p>Viamus aliquet rutrus duia variu sath eu Mauris ornoare tortor. Dosi quality fact. ipsum ample text.</p>
							</div> <!-- /.single-service -->
						</div> <!-- /.col- -->
						<div class="col-lg-4 col-sm-6">
							<div class="single-service">
								<i class="fa fa-bar-chart" aria-hidden="true"></i>
								<h5><a href="service-details.html">Market Research</a></h5>
								<p>Viamus aliquet rutrus duia variu sath eu Mauris ornoare tortor. Dosi quality fact. ipsum ample text.</p>
							</div> <!-- /.single-service -->
						</div> <!-- /.col- -->
						<div class="col-lg-4 col-sm-6">
							<div class="single-service">
								<i class="fa fa-user" aria-hidden="true"></i>
								<h5><a href="service-details.html">Financial Advise</a></h5>
								<p>Viamus aliquet rutrus duia variu sath eu Mauris ornoare tortor. Dosi quality fact. ipsum ample text.</p>
							</div> <!-- /.single-service -->
						</div> <!-- /.col- -->
						<div class="col-lg-4 col-sm-6">
							<div class="single-service">
								<i class="fa fa-line-chart" aria-hidden="true"></i>
								<h5><a href="service-details.html">Business Consulting</a></h5>
								<p>Viamus aliquet rutrus duia variu sath eu Mauris ornoare tortor. Dosi quality fact. ipsum ample text.</p>
							</div> <!-- /.single-service -->
						</div> <!-- /.col- -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.our-service-two -->


			<!-- 
			=============================================
				Feature Banner
			============================================== 
			-->
			<div class="feature-banner bg-one">
				<div class="opacity overlay-one">
					<div class="container">
						<div class="theme-title text-center">
							<h2>We’re all about helping you reach your next <br>financial goal and loan help.</h2>
						</div> <!-- /.theme-title -->
						<div class="row">
							<div class="col-sm-4 col-12">
								<div class="single-box">
			        				<h2 class="number"><span class="timer" data-from="0" data-to="15000" data-speed="1200" data-refresh-interval="5">0</span>+</h2>
			        				<p>Customers Empowered <br>$5 billion+</p>
			        			</div> <!-- /.single-box -->
							</div>  <!-- /.col- -->
							<div class="col-sm-4 col-12">
								<div class="single-box">
			        				<h2 class="number"><span class="timer" data-from="0" data-to="120" data-speed="1200" data-refresh-interval="5">0</span>+</h2>
			        				<p>Times International <br>Award Winner</p>
			        			</div> <!-- /.single-box -->
							</div>  <!-- /.col- -->
							<div class="col-sm-4 col-12">
								<div class="single-box">
			        				<h2 class="number"><span class="timer" data-from="0" data-to="37500" data-speed="1200" data-refresh-interval="5">0</span>+</h2>
			        				<p>Completed Projects <br>$18 billion+</p>
			        			</div> <!-- /.single-box -->
							</div>  <!-- /.col- -->
						</div> <!-- /.row -->
					</div> <!-- /.container -->
				</div> <!-- /.opacity -->
			</div> <!-- /.feature-banner -->


			<!-- 
			=============================================
				Our Portfolio 
			============================================== 
			-->
			<div class="our-portfolio portfolio-grid">
				<div class="container">
					<div class="theme-title text-center">
						<h2>Case Study</h2>
						<p>We provide all kind of business, finance & consulting services.</p>
					</div> <!-- /.theme-title -->
	        		<div class="row">
						<div class="col-lg-4 col-sm-6 col-12">
							<div class="single-item">
								<div class="image-box">
									<div class="img"><img src="images/portfolio/15.jpg" alt=""></div>
									<div class="overlay"><a href="portfolio-details.html" class="link"><i class="fa fa-link" aria-hidden="true"></i></a></div>
								</div> <!-- /.image-box -->
							</div> <!-- /.single-item -->
						</div> <!-- /.col-md-6 -->
						<div class="col-lg-4 col-sm-6 col-12">
							<div class="single-item">
								<div class="image-box">
									<div class="img"><img src="images/portfolio/16.jpg" alt=""></div>
									<div class="overlay"><a href="portfolio-details.html" class="link"><i class="fa fa-link" aria-hidden="true"></i></a></div>
								</div> <!-- /.image-box -->
							</div> <!-- /.single-item -->
						</div> <!-- /.col-md-6 -->
						<div class="col-lg-4 col-sm-6 col-12">
							<div class="single-item">
								<div class="image-box">
									<div class="img"><img src="images/portfolio/17.jpg" alt=""></div>
									<div class="overlay"><a href="portfolio-details.html" class="link"><i class="fa fa-link" aria-hidden="true"></i></a></div>
								</div> <!-- /.image-box -->
							</div> <!-- /.single-item -->
						</div> <!-- /.col-md-6 -->
						<div class="col-lg-4 col-sm-6 col-12">
							<div class="single-item">
								<div class="image-box">
									<div class="img"><img src="images/portfolio/18.jpg" alt=""></div>
									<div class="overlay"><a href="portfolio-details.html" class="link"><i class="fa fa-link" aria-hidden="true"></i></a></div>
								</div> <!-- /.image-box -->
							</div> <!-- /.single-item -->
						</div> <!-- /.col-md-6 -->
						<div class="col-lg-4 col-sm-6 col-12">
							<div class="single-item">
								<div class="image-box">
									<div class="img"><img src="images/portfolio/19.jpg" alt=""></div>
									<div class="overlay"><a href="portfolio-details.html" class="link"><i class="fa fa-link" aria-hidden="true"></i></a></div>
								</div> <!-- /.image-box -->
							</div> <!-- /.single-item -->
						</div> <!-- /.col-md-6 -->
						<div class="col-lg-4 col-sm-6 col-12">
							<div class="single-item">
								<div class="image-box">
									<div class="img"><img src="images/portfolio/20.jpg" alt=""></div>
									<div class="overlay"><a href="portfolio-details.html" class="link"><i class="fa fa-link" aria-hidden="true"></i></a></div>
								</div> <!-- /.image-box -->
							</div> <!-- /.single-item -->
						</div> <!-- /.col-md-6 -->
					</div> <!-- /.row -->
					<div class="all-project-button"><a href="portfolio-v1.html">See All Projects</a></div>
				</div> <!-- /.container -->
			</div> <!-- /.our-portfolio -->


			<!--
			=====================================================
				Testimonial Slider
			=====================================================
			-->
			<div class="testimonial-section">
				<div class="container">
					<div class="theme-title text-center">
						<h2>Client Testimonials</h2>
					</div> <!-- /.theme-title -->
					<div class="testimonial-slider">
						<div class="item">
							<div class="clearfix">
								<img src="images/home/7.jpg" alt="" class="author-img float-left">
								<div class="text float-left">
									<h5>Rashed Kabir</h5>
									<span>Director of Creativegigs</span>
									<p>“Success is making our clients succeed. Nothing else matters how we work.”</p>
									<img src="images/home/sign.png" alt="">
								</div>
							</div>
						</div>
						<div class="item">
							<div class="clearfix">
								<img src="images/home/8.jpg" alt="" class="author-img float-left">
								<div class="text float-left">
									<h5>Jannatul Fa.</h5>
									<span>MD. Tourisom Group</span>
									<p>“Success is making our clients succeed. Nothing else matters how we work.”</p>
									<img src="images/home/sign.png" alt="">
								</div>
							</div>
						</div>
						<div class="item">
							<div class="clearfix">
								<img src="images/home/7.jpg" alt="" class="author-img float-left">
								<div class="text float-left">
									<h5>Rashed Kabir</h5>
									<span>Director of Creativegigs</span>
									<p>“Success is making our clients succeed. Nothing else matters how we work.”</p>
									<img src="images/home/sign.png" alt="">
								</div>
							</div>
						</div>
						<div class="item">
							<div class="clearfix">
								<img src="images/home/8.jpg" alt="" class="author-img float-left">
								<div class="text float-left">
									<h5>Jannatul Fa.</h5>
									<span>MD. Tourisom Group</span>
									<p>“Success is making our clients succeed. Nothing else matters how we work.”</p>
									<img src="images/home/sign.png" alt="">
								</div>
							</div>
						</div>
						<div class="item">
							<div class="clearfix">
								<img src="images/home/8.jpg" alt="" class="author-img float-left">
								<div class="text float-left">
									<h5>Jannatul Fa.</h5>
									<span>MD. Tourisom Group</span>
									<p>“Success is making our clients succeed. Nothing else matters how we work.”</p>
									<img src="images/home/sign.png" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- /.testimonial-section -->


			<!--
			=====================================================
				Consultation Form
			=====================================================
			-->
			<div class="consultation-form">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-12">
							<div class="theme-title">
								<h2>Free Consultation</h2>
							</div> <!-- /.theme-title -->
							<p>Any kind of business, finance & consultion don’t hesitate to contact with us for imiditate & quick customer support. </p>
							<div class="call-us"><b>Call Us</b> for imiditate support this number</div>
							<a href="#" class="phone-call">+880 876 65 455</a>
						</div>
						<div class="col-lg-8 col-12">
							<div class="form-wrapper">
								<div class="theme-title">
									<h2>Drop Your Message</h2>
								</div> <!-- /.theme-title -->
								<form action="#">
									<div class="row">
										<div class="col-md-6 order-md-last">
											<textarea placeholder="Message*"></textarea>
										</div>
										<div class="col-md-6 order-md-first">
											<input type="text" placeholder="Username*">
											<input type="email" placeholder="Email*">
											<select class="form-control" id="exampleSelect1">
										      <option>Discussion Subject*</option>
										      <option>Business Services</option>
										      <option>Consumer Product</option>
										      <option>Financial Services</option>
										      <option>Software Research</option>
										    </select>
										    <button class="form-button">Get Free Consultation</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div> <!-- /.container -->
			</div> <!-- /.consultation-form -->




			<!--
			=====================================================
				Latest Update
			=====================================================
			-->
			<div class="latest-update">
				<div class="container">
					<div class="theme-title">
						<h2>Check what happen inside <br>our company.</h2>
						<a href="blog-grid.html">GO TO NEWS</a>
					</div> <!-- /.theme-title -->

					<div class="news-slider">
						<div class="item">
							<div class="single-update-post">
								<div class="image-box"><img src="images/blog/16.jpg" alt=""></div>
								<div class="date">September 13, 2017</div>
								<h4><a href="blog-details.html">The Advantages Minimal Repair Technique.</a></h4>
								<a href="blog-details.html" class="read-more"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
							</div> <!-- /.single-update-post -->
						</div> <!-- /.col- -->
						<div class="item">
							<div class="single-update-post">
								<div class="image-box"><img src="images/blog/17.jpg" alt=""></div>
								<div class="date">October 27, 2017</div>
								<h4><a href="blog-details.html">Effective Ways To Quit Smoking Fast.</a></h4>
								<a href="blog-details.html" class="read-more"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
							</div> <!-- /.single-update-post -->
						</div> <!-- /.col- -->
						<div class="item">
							<div class="single-update-post">
								<div class="image-box"><img src="images/blog/18.jpg" alt=""></div>
								<div class="date">August 15, 2017</div>
								<h4><a href="blog-details.html">How To Stop Living Your Life On Autopilot</a></h4>
								<a href="blog-details.html" class="read-more"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
							</div> <!-- /.single-update-post -->
						</div> <!-- /.col- -->
					</div> <!-- /.row -->
				</div> <!-- /.container -->
			</div> <!-- /.latest-update -->
</div>
            @endsection