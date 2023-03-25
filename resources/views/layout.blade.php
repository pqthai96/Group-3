<!DOCTYPE html>
<!-- Testo - Pizza and Fast Food Landing Page Template design design by Jthemes (http://www.jthemes.net) -->
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">



<!-- Mirrored from jthemes.net/themes/html/testo/files/demo-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Mar 2023 09:32:52 GMT -->

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="author" content="Jthemes" />
	<meta name="description" content="Testo - Pizza and Fast Food Landing Page Template" />
	<meta name="keywords"
		content="Jthemes, Food, Fast Food, Restaurant, Pizzeria, Restaurant Menu, Pizza, Burger, Sushi, Steak, Grill, Snack">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- SITE TITLE -->
    <title>@yield('title')</title>

	<!-- FAVICON AND TOUCH ICONS -->
	<link rel="shortcut icon" href="{{ asset('frontend/images/favicon.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ asset('frontend/images/favicon.ico') }}" type="image/x-icon">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('frontend/images/apple-touch-icon-152x152.png') }}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('frontend/images/apple-touch-icon-120x120.png') }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('frontend/images/apple-touch-icon-76x76.png') }}">
	<link rel="apple-touch-icon" href="{{ asset('frontend/images/apple-touch-icon.png') }}">
	<link rel="icon" href="{{ asset('frontend/images/apple-touch-icon.png') }}" type="image/x-icon">

	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&amp;display=swap"
		rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lilita+One&amp;display=swap" rel="stylesheet">

	<!-- BOOTSTRAP CSS -->
	<link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- FONT ICONS -->
	{{-- <link href="../../../../../use.fontawesome.com/releases/v5.11.0/css/all.css" rel="stylesheet"
		crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link href="{{ asset('frontend/css/flaticon.css') }}" rel="stylesheet">

	<!-- PLUGINS STYLESHEET -->
	<link href="{{ asset('frontend/css/menu.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/magnific-popup.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/flexslider.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/jquery.datetimepicker.min.css') }}" rel="stylesheet">

	<!-- TEMPLATE CSS -->
	<link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

	<!-- RESPONSIVE CSS -->
	<link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">

</head>




<body>




	<!-- PRELOADER SPINNER: Hoạt ảnh tải trang
		============================================= -->
	<div id="loader-wrapper">
		<div id="loader">
			<div class="cssload-spinner">
				<div class="cssload-ball cssload-ball-1"></div>
				<div class="cssload-ball cssload-ball-2"></div>
				<div class="cssload-ball cssload-ball-3"></div>
				<div class="cssload-ball cssload-ball-4"></div>
			</div>
		</div>
	</div>




	<!-- HEADER-1
		============================================= -->
	<header id="header-1" class="header navik-header header-shadow center-menu-1 header-transparent">
		<div class="container">


			<!-- NAVIGATION MENU -->
			<div class="navik-header-container">


				<!-- CALL BUTTON -->
				<div class="callusbtn"><a href="tel:123456789"><i class="fas fa-phone"></i></a></div>


				<!-- LOGO IMAGE -->
				<div class="logo" data-mobile-logo="{{ asset('frontend/images/logo-02.png') }}" data-sticky-logo="{{ asset('frontend/images/logo-02.png') }}">
					<a href="{{ url('home') }}"><img src="{{ asset('frontend/images/logo-02.png') }}" alt="header-logo" /></a>
				</div>


				<!-- PIZZA MENU: hiển thị button mở navbar cho trang khi giao diện nhỏ-->
				<div class="burger-menu">
					<div class="line-menu line-half first-line"></div>
					<div class="line-menu"></div>
					<div class="line-menu line-half last-line"></div>
				</div>


				<!-- MAIN MENU -->
				<nav class="navik-menu menu-caret navik-yellow">
					<ul class="top-list" style="zoom:0.98">

						<!-- PROMOTIONS -->
						<li class="mega-menu"><a href="gift-cards.html">Promotions</a>
						</li> <!-- END PROMOTIONS -->

						<!-- DROPDOWN MENU -->
						<li><a href="{{ url('menu') }}">Our Menu</a></li>

						<!-- DROPDOWN MENU -->
						<li><a href="blog-listing.html">Blog</a>
						</li>

					</ul>
					<ul style="zoom:0.98">

						<!-- DROPDOWN MENU -->
						<li><a href="#">Contacts</a>
							<ul>
								<li><a href="locations.html">Our Locations</a></li>
								<li><a href="contacts.html">Contact Us</a></li>
							</ul>
						</li>

						<!-- DROPDOWN MENU -->
						<li><a href="#">Pages</a>
							<ul>
								<li><a href="about.html">About Us</a></li>
								<li><a href="gallery.html">Gallery</a></li>
								<li><a href="faqs.html">FAQs</a></li>
								<li><a href="terms.html">Terms & Privacy</a></li>
							</ul>
						</li>
                        <?php
                        $userID =  Session::get('userID');
                        if($userID != null) {
                        ?>
						<!-- BASKET ICON -->
						<li><a href="#">{{ session::get('userName') }}</a>
							<ul>
								<li><a href="#">Account</a></li>
                                <li><a href="#">My Purchases</a></li>
                                <li><a href="{{ url('logout') }}">Logout</a></li>
							</ul>
						</li>
                        <?php
                            } else {
                        ?>
						
                        <!-- BASKET ICON -->
						<li><a href="#" onclick="showLogin()">Login</a>
						</li>
						<li>
                        <?php
                            }
                        ?>
						</li>
						<li class="basket-ico ico-30">
							<a href="{{ url('cart') }}">
								<span class="ico-holder"><span class="flaticon-shopping-bag"></span><em
										class="roundpoint cart-count">{{ count((array) session('cart')) }}</em></span>
							</a>
						</li>

					</ul>
				</nav> <!-- END MAIN MENU -->


			</div> <!-- END NAVIGATION MENU -->


		</div> <!-- End container -->
	</header> <!-- END HEADER-1 -->

	<!-- FORM LOGIN/REGISTER -->
	<div id="loginModal" class="modal">
		<div class="modal-content">
			<span class="close" onclick="closeLogin()">&times;</span>

			<div style="width: 80%;">
				<div id="loginButtons">
					<button id="loginButton" class="btn btn-red tra-red-hover btn-outline-danger active"
						onclick="showLoginForm()">Login</button>
					<button id="registerButton" class="btn btn-red tra-red-hover btn-outline-danger"
						onclick="showRegisterForm()">Register</button>
				</div>
				<br>
				<form id="loginForm" action="{{ url('/login') }}" method="POST">
                    @csrf
					<div class="form-group">
						<label for="username">Email:</label>
						<input type="email" id="email" name="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" id="password" name="password" class="form-control" required>
					</div>
                    <div class="text-center">
					    <input type="submit" value="Login" class="btn btn-red tra-red-hover">
                    </div>
				</form>
				<form id="registerForm" style="display:none" action="{{ url('/register') }}" method="POST">
                    @csrf
					<div class="form-row">
						<div class="form-group">
							<label for="newUsername">Username:</label>
							<input type="text" id="newUsername" name="newUsername" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="newEmail">Email:</label>
							<input type="email" id="newEmail" name="newEmail" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="newPassword">Password:</label>
							<input type="password" id="newPassword" name="newPassword" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="confirmPassword">Confirm Password:</label>
							<input type="password" id="confirmPassword" name="confirmPassword" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label for="newFullname">Full name:</label>
						<input type="text" id="newFullname" name="newFullname" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="gender">Gender:</label>
						<select id="gender" name="gender" class="form-control" required>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
					<div class="form-group">
						<label for="newPhone">Phone number:</label>
						<input type="tel" id="newPhone" name="newPhone" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="newAddress">Address:</label>
						<textarea id="newAddress" name="newAddress" class="form-control" required></textarea>
					</div>
                    <div class="pb-10">
						<label><input type="checkbox" id="term" name="term" required> I agree to <a href="#" style="color:blue; text-decoration: underline">the terms and privacy policy.</a></label>
                        
                    </div>
                    <div class="text-center">
					    <input type="submit" value="Create Account" class="btn btn-red tra-red-hover">
                    </div>
				</form>
			</div>
		</div>
	</div>


	<!-- END FORM LOGIN/REGISTER -->

	<div class="content-wrapper">
        @yield('content')
    </div>

    <!-- BANNER-4
			============================================= -->
			<section id="banner-4" class="bg-fixed wide-100 banner-section division">
				<div class="container">
			 		<div class="row">


			 			<!-- BANNER TEXT -->
						<div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
							<div class="banner-4-txt text-center">

								<!-- Title  -->
								<h4 class="h4-xl">We Guarantee</h4>
								
								<!-- Title  -->
							    <h2>30 Minutes Delivery!</h2>

							    <!-- Text -->	
								<p class="p-lg">Aliquam a augue suscipit, luctus neque purus ipsum neque undo dolor primis libero tempus, 
									blandit a cursus varius luctus neque magna
								</p>

								<!-- Call Button -->
								<a href="tel:123456789" class="btn btn-lg btn-red tra-red-hover">Call: 789-654-3210</a>

							</div>
						</div>


			 		</div>      <!-- End row -->
				</div>	    <!-- End container -->		
			</section>	<!-- END BANNER-4 -->

	<!-- BRANDS-1
			============================================= -->
	<div id="brands-1" class="bg-lightgrey brands-section division">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="owl-carousel brands-carousel">


						<!-- BRAND LOGO IMAGE -->
						<div class="brand-logo">
							<img class="img-fluid" src="{{ asset('frontend/images/brand-11.png') }}" alt="brand-logo" />
						</div>

						<!-- BRAND LOGO IMAGE -->
						<div class="brand-logo">
							<img class="img-fluid" src="{{ asset('frontend/images/brand-12.png') }}" alt="brand-logo" />
						</div>

						<!-- BRAND LOGO IMAGE -->
						<div class="brand-logo">
							<img class="img-fluid" src="{{ asset('frontend/images/brand-13.png') }}" alt="brand-logo" />
						</div>

						<!-- BRAND LOGO IMAGE -->
						<div class="brand-logo">
							<img class="img-fluid" src="{{ asset('frontend/images/brand-14.png') }}" alt="brand-logo" />
						</div>

						<!-- BRAND LOGO IMAGE -->
						<div class="brand-logo">
							<img class="img-fluid" src="{{ asset('frontend/images/brand-15.png') }}" alt="brand-logo">
						</div>

						<!-- BRAND LOGO IMAGE -->
						<div class="brand-logo">
							<img class="img-fluid" src="{{ asset('frontend/images/brand-16.png') }}" alt="brand-logo" />
						</div>

						<!-- BRAND LOGO IMAGE -->
						<div class="brand-logo">
							<img class="img-fluid" src="{{ asset('frontend/images/brand-17.png') }}" alt="brand-logo" />
						</div>

						<!-- BRAND LOGO IMAGE -->
						<div class="brand-logo">
							<img class="img-fluid" src="{{ asset('frontend/images/brand-18.png') }}" alt="brand-logo" />
						</div>


					</div>
				</div>
			</div> <!-- End row -->
		</div> <!-- End container -->
	</div> <!-- END BRANDS-1 -->

	<!-- FOOTER-1
			============================================= -->
	<footer id="footer-1" class="footer division">
		<div class="container">
			<div class="row">


				<!-- FOOTER INFO -->
				<div class="col-md-5 col-lg-4 col-xl-4">
					<div class="footer-info mb-40">

						<!-- Footer Logo -->
						<div class="footer-logo"><img src="{{ asset('frontend/images/logo-02.png') }}" alt="footer-logo" /></div>

						<!-- Footer Copyright -->
						<p>&copy; 2020 Testo. All Rights Reserved</p>

					</div>
				</div>


				<!-- FOOTER CONTACTS -->
				<div class="col-md-7 col-lg-4 col-xl-5">
					<div class="footer-contacts mb-40">

						<!-- Address -->
						<p class="p-xl mt-10">Los Angeles,</p>
						<p class="p-xl">8721 M Central Avenue, CA 90036</p>

						<!-- Contacts -->
						<p class="p-lg foo-email">Email: <a href="mailto:yourdomain@mail.com">hello@yourdomain.com</a>
						</p>
						<p class="p-lg">Call Now: <span class="yellow-color"><a
									href="tel:123456789">789-654-3210</a></span></p>

					</div>
				</div>


				<!-- FOOTER INSTAGRAM -->
				<div class="col-md-12 col-lg-4 col-xl-3">
					<div class="footer-img mb-40">

						<!-- Images -->
						<ul class="text-center clearfix">
							<li><a href="#" target="_blank"><img class="insta-img" src="{{ asset('frontend/images/instagram/img-01.jpg') }}"
										alt="insta-img"></a></li>
							<li><a href="#" target="_blank"><img class="insta-img" src="{{ asset('frontend/images/instagram/img-02.jpg') }}"
										alt="insta-img"></a></li>
							<li><a href="#" target="_blank"><img class="insta-img" src="{{ asset('frontend/images/instagram/img-03.jpg') }}"
										alt="insta-img"></a></li>
							<li><a href="#" target="_blank"><img class="insta-img" src="{{ asset('frontend/images/instagram/img-04.jpg') }}"
										alt="insta-img"></a></li>
							<li><a href="#" target="_blank"><img class="insta-img" src="{{ asset('frontend/images/instagram/img-05.jpg') }}"
										alt="insta-img"></a></li>
							<li><a href="#" target="_blank"><img class="insta-img" src="{{ asset('frontend/images/instagram/img-06.jpg') }}"
										alt="insta-img"></a></li>
						</ul>
					</div>
				</div> <!-- END FOOTER IMAGES -->


			</div> <!-- End row -->
		</div> <!-- End container -->
	</footer> <!-- END FOOTER-1 -->




	</div> <!-- END PAGE CONTENT -->




	<!-- EXTERNAL SCRIPTS
		============================================= -->
	<script src="{{ asset('frontend/js/jquery-3.5.1.min.js') }}"></script>
	<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('frontend/js/modernizr.custom.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.easing.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.appear.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.scrollto.js') }}"></script>
	<script src="{{ asset('frontend/js/menu.js') }}"></script>
	<script src="{{ asset('frontend/js/materialize.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.flexslider.js') }}"></script>
	<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('frontend/js/contact-form.js') }}"></script>
	<script src="{{ asset('frontend/js/comment-form.js') }}"></script>
	<script src="{{ asset('frontend/js/booking-form.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.datetimepicker.full.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script>

	<!-- Custom Script -->
	<script src="{{ asset('frontend/js/custom.js') }}"></script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	<!-- [if lt IE 9]>
			<script src="js/html5shiv.js" type="text/javascript"></script>
			<script src="js/respond.min.js" type="text/javascript"></script>
		<![endif] -->

	<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->
	<!--
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-XXXXX-X']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
		-->


	<script defer src="{{ asset('frontend/js/changer.js') }}"></script>
	<script>
		//Cart Update-Remove
		function cartUpdate(event) {
			event.preventDefault();
			let urlUpdateCart = $('.update-cart-url').data('url');
			let id = $(this).data('id');
			let quantity = $(this).parents('tr').find('input.quantity').val();
			let product_subtotal = $(this).parents('tr').find('h5.product_subtotal');
			let cart_total = $('.cart-total');
			$.ajax({
				type: "GET",
				url: urlUpdateCart,
				data: {_token: '{{ csrf_token() }}', id: id, quantity: quantity},
				dataType: "json",
				success: function (response) {
					product_subtotal.text(response.subTotal);
					cart_total.text(response.total);
					$("#alert-message").html(response.msg);
					$('#alert-message').fadeIn();
					setTimeout(function() {
					$('#alert-message').fadeOut();
					}, 2000);
				},
				error: function (response) {
				}
			})
		}

		function cartRemove(event) {
			event.preventDefault();
			let urlRemoveCart = $('.remove-cart-url').data('url');
			let parent_row = $(this).parents('tr');
			let id = $(this).data('id');
			let cart_total = $('.cart-total');
			let cart_count = $('.cart-count');

			$.ajax({
				type: "GET",
				url: urlRemoveCart,
				data: {_token: '{{ csrf_token() }}', id: id},
				dataType: "json",
				success: function (response) {
					parent_row.remove();
					cart_total.text(response.total);
					cart_count.text(response.cart_count);
					$("#alert-message").html(response.msg);
					$('#alert-message').fadeIn();
					setTimeout(function() {
					$('#alert-message').fadeOut();
					}, 2000);
				},
				error: function (data) {

				}
			})
		}

		$(function () {
			$(document).on("click", ".update-cart", cartUpdate);
			$(document).on("click", ".remove-cart", cartRemove);
		});

	</script>

	<script>
		//Add to cart
		$(".add-cart").click(function(event) {
			event.preventDefault();

			var ele = $(this);
			let cart_count = $('.cart-count');
			let size = $('input[name="size"]:checked').val();
			let quantity = $('input[name="quantity"]').val()

			$.ajax({
                url: '{{ url('add-to-cart') }}' + '/' + ele.attr("data-id"),
                method: "GET",
                data: {_token: '{{ csrf_token() }}', size: size, quantity: quantity},
                dataType: "json",
                success: function (response) {
					cart_count.text(response.cart_count);
					$("#alert-message").html(response.msg);
					$('#alert-message').fadeIn();
					setTimeout(function() {
					$('#alert-message').fadeOut();
					}, 2000);
                }
            });
		});

	</script>
</body>

</html>