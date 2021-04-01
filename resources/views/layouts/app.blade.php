<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('vendor/jquery.2.2.3.min.js') }}"></script>
        <!-- Popper js -->
		<script src="{{ asset('vendor/popper.js/popper.min.js') }}"></script>
		<!-- Bootstrap JS -->
		<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
		<!-- Camera Slider -->
	    <script src="{{ asset('vendor/Camera-master/scripts/jquery.easing.1.3.js') }}"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="56x56" href="{{ asset('images/fav-icon/icon.png') }}">

		<!-- Fix Internet Explorer ______________________________________-->

		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->

			
	</head>

	<body>
		<div class="main-page-wrapper">

			<!-- ===================================================
				Loading Transition
			==================================================== -->
			<div id="loader-wrapper">
				<div id="loader"></div>
			</div>

			

			<!-- 
			=============================================
				Theme Header
			============================================== 
			-->
			<header class="theme-main-header">
				<div class="top-header">
					<div class="container">
						<div class="clearfix">
							<div class="float-left">
								<ul class="left-widget">
									<li>
										<ul class="social-icon clearfix">
											<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="float-right">
								<ul class="right-widget clearfix">
									<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> online@goasig.ro</a></li>
									<li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> 0770 000 000</a></li>
									<li class="quote"><a href="#">Suport clienti</a></li>
								</ul>
							</div>
						</div> <!-- /.clearfix -->
					</div> <!-- /.container -->
				</div> <!-- /.top-header -->


				
				<div class="main-menu-wrapper clearfix">
					<div class="container clearfix">
						<!-- Logo -->
						<div class="logo float-left"><a href="index.html"><img src="images/logo/logo.png" alt="Logo"></a></div>


						<!-- ============================ Theme Menu ========================= -->
						<nav class="navbar-expand-lg float-right navbar-light" id="mega-menu-wrapper">
					    	<button class="navbar-toggler float-right clearfix" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					    		<i class="flaticon-menu-options"></i>
					    	</button>
					    	<div class="collapse navbar-collapse clearfix" id="navbarNav">
					    	  <ul class="navbar-nav nav">
					    	    <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
					    	    <li class="nav-item dropdown-holder">
					    	    	<a class="nav-link" href="#">Feature</a>
					    	    	<ul class="sub-menu">
										<li><a href="about-us.html">About us</a></li>
										<li><a href="service-v1.html">Service v-1</a></li>
										<li><a href="service-v2.html">Service v-2</a></li>
										<li><a href="service-details.html">Service details</a></li>
										<li><a href="testimonial.html">Testimonial</a></li>
										<li><a href="faq.html">faq</a></li>
										<li><a href="error.html">Error</a></li>
									</ul>
					    	    </li>
					    	    <li class="nav-item dropdown-holder">
					    	    	<a class="nav-link" href="#">Page</a>
					    	    	<ul class="sub-menu">
					    	    		<li><a href="portfolio-v1.html">Portfolio V-1</a></li>
										<li><a href="portfolio-v2.html">Portfolio V-2</a></li>
										<li><a href="portfolio-v3.html">Portfolio V-3</a></li>
										<li><a href="portfolio-v4.html">Portfolio V-4</a></li>
										<li><a href="portfolio-details.html">Portfolio details</a></li>
										<li><a href="team.html">Team</a></li>
									</ul>
					    	    </li>
					    	    <li class="nav-item dropdown-holder">
					    	    	<a class="nav-link" href="#">Blog</a>
					    	    	<ul class="sub-menu">
										<li><a href="blog-grid.html">Blog grid</a></li>
										<li><a href="blog-sidebar.html">Blog List With Sidebar</a></li>
										<li><a href="blog-details.html">Blog Details</a></li>
									</ul>
					    	    </li>
					    	    <li class="nav-item dot-fix">
					    	    	<a class="nav-link" href="contact-us.html">Contact us</a>
					    	    </li>
					    	  </ul>
					    	</div>
						</nav>
					</div> <!-- /.container -->
				</div> <!-- /.main-menu-wrapper -->
			</header> <!-- /.theme-main-header -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
<!--
			=====================================================
				Footer
			=====================================================
			-->
			<footer class="theme-footer">
				<div class="container">
					<div class="content-wrapper">
						<h2>Subscirbe  Our Newslatter!!</h2>
						<form action="#" class="subscribe-form">
							<div class="row">
								<div class="col-lg-5 col-md-6 col-12">
									<input type="text" placeholder="Full Name*">
								</div>
								<div class="col-lg-5 col-md-6 col-12">
									<input type="email" placeholder="Email Address*">
								</div>
								<div class="col-lg-2 col-12">
									<input type="submit" value="SIGN UP NOW">
								</div>
							</div> <!-- /.row -->
						</form> <!-- /.subscribe-form -->

						<div class="footer-bottom-wrapper row">
							<div class="col-lg-3 col-sm-6 col-12 footer-logo">
								<div class="logo"><a href="index.html"><img src="images/logo/logo.png" alt="Logo"></a></div>
								<a href="#" class="mail-address">info@gmail.com</a>
								<a href="#" class="phone-number">504. 987. 1295</a>
							</div> <!-- /.footer-logo -->
							<div class="col-lg-3 col-sm-6 col-12 footer-list">
								<h4>Quick Links</h4>
								<ul>
									<li><a href="#">How it Works</a></li>
									<li><a href="#">Guarantee</a></li>
									<li><a href="#">Security</a></li>
									<li><a href="#">Report Bug</a></li>
									<li><a href="#">Pricing</a></li>
								</ul>
							</div> <!-- /.footer-list -->
							<div class="col-lg-3 col-sm-6 col-12 footer-list">
								<h4>About Us</h4>
								<ul>
									<li><a href="about-us.html">About Singleton</a></li>
									<li><a href="#">Jobs</a></li>
									<li><a href="team.html">Team</a></li>
									<li><a href="testimonial.html">Testimonials</a></li>
									<li><a href="blog-grid.html">Blog</a></li>
								</ul>
							</div> <!-- /.footer-list -->
							<div class="col-lg-3 col-sm-6 col-12 footer-list">
								<h4>Become A Member</h4>
								<ul>
									<li><a href="#">Contributor</a></li>
									<li><a href="#">Union Member</a></li>
									<li><a href="#">Processing</a></li>
									<li><a href="#">Legal Action</a></li>
								</ul>
							</div> <!-- /.footer-list -->
						</div> <!-- /.footer-bottom-wrapper -->

						<div class="copyright-wrapper row">
							<div class="col-md-6 col-sm-8 col-12">
								<p>© 2018 <a href="#">CreativeGigs.</a> All rights reserved</p>
							</div>
							<div class="col-md-6 col-sm-4 col-12">
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div> <!-- /.copyright-wrapper -->
					</div>
				</div> <!-- /.container -->
			</footer> <!-- /.theme-footer -->
			

	        

	        <!-- Scroll Top Button -->
			<button class="scroll-top tran3s">
				<i class="fa fa-angle-up" aria-hidden="true"></i>
			</button>
			


		<!-- Optional JavaScript _____________________________  -->

    	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    	<!-- jQuery -->
		
		 
	    <script src="{{ asset('vendor/Camera-master/scripts/camera.min.js') }}"></script>
		<!-- Language Stitcher -->
		<script src="{{ asset('vendor/language-switcher/jquery.polyglot.language.switcher.js') }}"></script>
	    <!-- Mega menu  -->
		<script src="{{ asset('vendor/bootstrap-mega-menu/js/menu.js') }}"></script>
		<!-- WOW js -->
		<script src="{{ asset('vendor/WOW-master/dist/wow.min.js') }}"></script>
		<!-- owl.carousel -->
		<script src="{{ asset('vendor/owl-carousel/owl.carousel.min.js') }}"></script>
		<!-- js count to -->
		<script src="{{ asset('vendor/jquery.appear.js') }}"></script>
		<script src="{{ asset('vendor/jquery.countTo.js') }}"></script>
		<!-- Fancybox -->
		<script src="{{ asset('vendor/fancybox/dist/jquery.fancybox.min.js') }}"></script>

		<!-- Theme js -->
		<script src="js/theme.js"></script>
		</div> <!-- /.main-page-wrapper -->
	</body>
</html>
