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

	{{-- SWEET ALERT --}}
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.js"></script>

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
						<li class="mega-menu"><a href="{{ route('promotion') }}">Promotions</a>
						</li> <!-- END PROMOTIONS -->

						<!-- DROPDOWN MENU -->
						<li><a href="{{ url('menu') }}">Our Menu</a></li>

						<!-- DROPDOWN MENU -->
						<li><a href="{{ route('blog') }}">Blog</a>
						</li>

					</ul>
					<ul style="zoom:0.98">

						<!-- DROPDOWN MENU -->
						<li><a href="#">Contacts</a>
							<ul>
								<li><a href="{{ route('location') }}">Our Locations</a></li>
								<li><a href="{{ route('contact') }}">Contact Us</a></li>
							</ul>
						</li>

						<!-- DROPDOWN MENU -->
						<li><a href="#">Pages</a>
							<ul>
								<li><a href="{{ route('about') }}">About Us</a></li>
								<li><a href="{{ route('gallery') }}">Gallery</a></li>
								<li><a href="{{ route('faqs') }}">FAQs</a></li>
								<li><a href="{{ route('term') }}">Terms & Privacy</a></li>
							</ul>
						</li>
                        <?php
                        $userID =  Session::get('userID');
                        if($userID != null) {
                        ?>
						<!-- BASKET ICON -->
						<li><a href="#">{{ session::get('userName') }}</a>
							<ul>
								<li><a href="{{ route('account') }}">Account Information</a></li>
								@if(DB::table('Orders')->where('UserID', $userID)->exists())
                                <li><a href="{{ route('order') }}">My Purchases</a></li>
								@endif
                                <li><a href="{{ url('logout') }}" class="btn-logout">Logout</a></li>
							</ul>
						</li>
                        <?php
                            } else {
                        ?>
						
                        <!-- BASKET ICON -->
						<li><a href="#">Account</a>
							<ul>
							<li><a href="#" onclick="showLogin()">Login</a></li>
							<li><a href="#" onclick="showRegister()">Register</a></li>
							<li><a href="{{ route('index') }}">Login as Administrator</a></li>
							</ul>
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
	<div id="loginModal" class="modal" style="background-color: rgba(0, 0, 0, 0.5)" onclick="closeLogin()">
		<div class="modal-content card">
			<button class="close" onclick="closeLogin()">&times;</button>
			<div class="modal-border" onclick="event.stopPropagation()">
				<div class="card-header"><h4 class="h4-xs">Login Form</h4></div>
				<div class="card-body">
					<div class="form-group">
						<label for="username"><h6 class="h6-sm">Email</h6></label>
						<input type="text" id="email" name="email" class="form-control">
						<span class="text-danger font-weight-bold" id="emailError"></span>
					</div>
					<div class="form-group">
						<label for="password"><h6 class="h6-sm">Password</h6></label>
						<input type="password" id="password" name="password" class="form-control">
						<span class="text-danger font-weight-bold" id="passwordError"></span>
					</div>
					<div class="alert alert-danger" id="loginfailedError"></div>
					<div class="alert alert-danger" id="loginbannedError"></div>
					<div class="text-center">
						<input type="button" onclick="login()" value="Login" class="btn btn-primary" style="background-color: #f5b200">
					</div>
					<div>
						<a href="#" onclick="showRegister()"><h6 style="color:blue; display:inline-block; text-decoration: underline">Do not have an account?</h6></a>
						<a href="#" onclick="showForgotPassword()" style="float: right"><h6 style="color:blue; text-decoration: underline">Forgot Password?</h6></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="forgotPasswordModal" class="modal" style="background-color: rgba(0, 0, 0, 0.5)" onclick="closeForgotPassword()">
		<div class="modal-content card">
			<button class="close" onclick="closeForgotPassword()">&times;</button>
			<div class="modal-border" onclick="event.stopPropagation()">
				<div class="card-header"><h4 class="h4-xs">Forgot Password</h4></div>
				<div class="card-body">
					<div class="form-group">
						<label for="forgotEmail"><h6 class="h6-sm">Email</h6></label>
						<input type="text" id="forgotEmail" name="forgotEmail" class="form-control">
						<span class="text-danger font-weight-bold" id="forgotEmailError"></span>
					</div>
					<div class="alert alert-danger" id="emailExistError"></div>
					<div class="text-center">
						<input type="button" onclick="post_email()" value="Send Email Reset Password" class="btn btn-primary" style="background-color: #f5b200">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="registerModal" class="modal" style="background-color: rgba(0, 0, 0, 0.5)" onclick="closeRegister()">
		<div class="modal-content card" onclick="event.stopPropagation()">
			<span class="close" onclick="closeRegister()">&times;</span>
			<div class="modal-border">				
				<div class="card-header"><h4 class="h4-xs">Register Form</h4></div>
				<div class="card-body">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="newUsername"><h6 class="h6-sm">Username</h6></label>
							<input type="text" id="newUsername" name="newUsername" class="form-control">
							<span class="text-danger font-weight-bold" id="newUsernameError"></span>
							<span class="text-danger font-weight-bold" id="existusernameError"></span>
						</div>
						<div class="form-group col-md-6">
							<label for="newEmail"><h6 class="h6-sm">Email</h6></label>
							<input type="email" id="newEmail" name="newEmail" class="form-control">
							<span class="text-danger font-weight-bold" id="newEmailError"></span>
							<span class="text-danger font-weight-bold" id="existemailError"></span>
						</div>
						<div class="form-group col-md-6">
							<label for="newPassword"><h6 class="h6-sm">Password</h6></label>
							<input type="password" id="newPassword" name="newPassword" class="form-control">
							<span class="text-danger font-weight-bold" id="newPasswordError"></span>
						</div>
						<div class="form-group col-md-6">
							<label for="confirmPassword"><h6 class="h6-sm">Confirm Password</h6></label>
							<input type="password" id="confirmPassword" name="confirmPassword" class="form-control" required>
							<span class="text-danger font-weight-bold" id="confirmPasswordError"></span>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="newFullname"><h6 class="h6-sm">Full name</h6></label>
							<input type="text" id="newFullname" name="newFullname" class="form-control">
							<span class="text-danger font-weight-bold" id="newFullnameError"></span>
						</div>
						<div class="form-group col-md-6">
							<label for="gender"><h6 class="h6-sm">Gender<h6 class="h6-sm"></label>
							<select id="gender" name="gender" class="form-control" style="width:16rem; margin-top: 1rem; height: 2.4rem;">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="newPhone"><h6 class="h6-sm">Phone number</h6></label>
						<input type="tel" id="newPhone" name="newPhone" class="form-control">
						<span class="text-danger font-weight-bold" id="newPhoneError"></span>
					</div>
					<div class="form-group">
						<label for="newAddress"><h6 class="h6-sm">Address</h6></label>
						<textarea id="newAddress" name="newAddress" class="form-control"></textarea>
						<span class="text-danger font-weight-bold" id="newAddressError"></span>
					</div>
					<div class="pb-10">
						<label><h6 class="h6-sm"><input type="checkbox" id="term" name="term" style="width:1rem;height:1rem">    I agree to <a href="{{ route('term') }}" style="color:blue; text-decoration: underline">the terms and privacy policy.</a></h6></label><br>
						<span class="text-danger font-weight-bold" id="termError"></span>
					</div>
					<div class="text-center">
						<input type="button" onclick="register()" value="Create Account" class="btn btn-primary" style="background-color: #f5b200">
					</div>
				</div>
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
						<p class="p-xl mt-10">Ho Chi Minh City,</p>
						<p class="p-xl">275 Nguyen Van Dau, Binh Thanh District</p>

						<!-- Contacts -->
						<p class="p-lg foo-email">Email: <a href="mailto:support@testo.vn">support@testo.vn</a>
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
					}, 1000);
                }
            });
		});

		//LOGIN
		$('#emailError').addClass('d-none');
		$('#passwordError').addClass('d-none');
		$('#loginfailedError').addClass('d-none');
		$('#loginbannedError').addClass('d-none');

		function login() {
			var email = $('#email').val();
			var password = $('#password').val();

			$.ajax({
				type: 'POST',
				url: "{{ route('login') }}",
				data: {_token: '{{ csrf_token() }}', email:email, password:password},
				success: function(data) {
					closeLogin();
					Swal.fire({
                        title: data.msg,
                        icon: 'success',
                        timer: 3000,
                        showCancelButton: false,
                        showConfirmButton: false,
                        willClose: () => {
                        location.reload();
                        }
                    });
				},
				error: function(data){
					var errors = data.responseJSON;
					if($.isEmptyObject(errors) == false) {
						$.each(errors.errors, function(key,value) {
							var ErrorID = '#' + key + 'Error';
							$(ErrorID).removeClass("d-none");
							$(ErrorID).text(value)
						})
					}
				}
			})
		}

		//FORGOT PASSWORD
		$('#forgotEmailError').addClass('d-none');
		$('#emailExistError').addClass('d-none');

		function post_email() {
			var forgotEmail = $('#forgotEmail').val();

			$.ajax({
				type: 'POST',
				url: "{{ route('post_email') }}",
				data: {_token: '{{ csrf_token() }}', forgotEmail:forgotEmail},
				success: function(data) {
					closeLogin();
					closeForgotPassword();
					Swal.fire({
                        title: data.msg,
                        icon: 'success',
                        timer: 3000,
                        showCancelButton: false,
                        showConfirmButton: false
                    });
				},
				error: function(data){
					var errors = data.responseJSON;
					if($.isEmptyObject(errors) == false) {
						$.each(errors.errors, function(key,value) {
							var ErrorID = '#' + key + 'Error';
							$(ErrorID).removeClass("d-none");
							$(ErrorID).text(value)
						})
					}
				}
			})
		}

		//REGISTER
		$('#newUsernameError').addClass('d-none');
		$('#newEmailError').addClass('d-none');
		$('#newPasswordError').addClass('d-none');
		$('#confirmPasswordError').addClass('d-none');
		$('#newFullnameError').addClass('d-none');
		$('#newPhoneError').addClass('d-none');
		$('#newAddressError').addClass('d-none');
		$('#termError').addClass('d-none');
		$('#existUsernameError').addClass('d-none');
		$('#existEmailError').addClass('d-none');

		function register() {
			var newUsername = $('#newUsername').val();
			var newEmail = $('#newEmail').val();
			var newPassword = $('#newPassword').val();
			var confirmPassword = $('#confirmPassword').val();
			var newFullname = $('#newFullname').val();
			var newPhone = $('#newPhone').val();
			var newAddress = $('#newAddress').val();
			var term = $('#term:checked').val();
			var gender =$('#gender').val();

			$.ajax({
				type: 'POST',
				url: "{{ route('register') }}",
				data: {_token: '{{ csrf_token() }}', newUsername:newUsername, newEmail:newEmail, newPassword:newPassword, confirmPassword:confirmPassword, newFullname:newFullname, newPhone:newPhone, newAddress:newAddress, term:term, gender:gender},
				success: function(data) {
					closeLogin();
					closeRegister();
					Swal.fire({
                        title: data.msg,
                        icon: 'success',
                        timer: 3000,
                        showCancelButton: false,
                        showConfirmButton: false,
                        willClose: () => {
                        location.reload();
                        }
                    });
				},
				error: function(data){
					var errors = data.responseJSON;
					if($.isEmptyObject(errors) == false) {
						$.each(errors.errors, function(key,value) {
							var ErrorID = '#' + key + 'Error';
							$(ErrorID).removeClass("d-none");
							$(ErrorID).text(value)
						})
					}
				}
			})
		}

		//ALERT LOGOUT
		$("a.btn-logout").click(function(event) {
			event.preventDefault();
			Swal.fire({
				title: 'Are you sure to log out?',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Logout',
				cancelButtonText: 'Cancel'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = $(this).attr("href");
				}
			});
		});
	</script>
	
@yield('scripts')
</body>

</html>