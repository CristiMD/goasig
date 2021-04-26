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
													<select class="required" id="tip_vehicul" name="tip_vehicul">
														<option value="" selected>Tip vehicul</option>
													</select>
												</div>
											</div>
											<div class="form-group add_bottom_30">
												<div class="styled-select">
													<select class="required" name="marca" id="marca">
														<option value="" selected>Marca</option>
												</select>
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
														<select class="required" name="utilizare"  id="utilizare">
															<option value="" selected>Utilizare</option>
														</select>
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
										<div class="form-group">
											<input type="number" name="valabilitate" id="valabilitate" class="form-control" placeholder="Valabilitate">
										</div>
										<div class="form-group add_bottom_30">
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
										</div>
										<div class="form-group">
											<input type="date" name="data_rca"  id="data_rca" class=" form-control" placeholder="Valabilitate de la">
										</div>
										
									</div>
									</div>
									<div class="col-lg-6">
										<div class="box_general">
										<h4>Date livrare</h4>

										<div class="form-group">
											<input type="text" name="nume_livrare" id="nume_livrare" class="required form-control" placeholder="Nume">
										</div>
										<div class="form-group">
											<input type="text" name="prenume_livrare"  id="prenume_livrare" class="required form-control" placeholder="Prenume">
										</div>
										<div class="form-group">
											<input type="text" name="adresa_livrare" id="adresa_livrare" class="required form-control" placeholder="Adresa">
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