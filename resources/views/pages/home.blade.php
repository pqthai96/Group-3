@extends('layout')
@section('title', 'Testo - Pizza and Fast Food')
@section('content')
<!-- PAGE CONTENT
		============================================= -->
	<div id="page" class="page">




		<!-- HERO-1
			============================================= -->
		<section id="hero-1" class="hero-section division">


			<!-- SLIDER -->
			<div class="slider">
				<ul class="slides">


					<!-- SLIDE #1 -->
					<li id="slide-1">

						<!-- Background Image -->
						<img src="{{ ('frontend/images/slider/slide-7.jpg') }}" alt="slide-background">

						<!-- Image Caption -->
						<div class="caption d-flex align-items-center center-align">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<div class="caption-txt white-color">

											<!-- Title -->
											<div class="title">
												<h2>Good Time, Great Taste</h2>
											</div>

											<!-- Text -->
											<p>Open Daily: <span class="yellow-color">11:30PM - 8:30PM</span></p>

										</div>
									</div>
								</div> <!-- End row -->
							</div> <!-- End container -->
						</div> <!-- End Image Caption -->

					</li> <!-- END SLIDE #1 -->


					<!-- SLIDE #2 -->
					<li id="slide-2">

						<!-- Background Image -->
						<img src="{{ ('frontend/images/slider/slide-11.jpg') }}" alt="slide-background">

						<!-- Image Caption -->
						<div class="caption d-flex align-items-center center-align">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<div class="caption-txt white-color">

											<!-- Title -->
											<div class="title">
												<h2>Discover The Real Pizza</h2>
											</div>

											<!-- Text -->
											<p>Enjoy the food you love <span class="yellow-color">FROM $6.99</span></p>

										</div>
									</div>
								</div> <!-- End row -->
							</div> <!-- End container -->
						</div> <!-- End Image Caption -->

					</li> <!-- END SLIDE #2 -->


					<!-- SLIDE #3 -->
					<li id="slide-3">

						<!-- Background Image -->
						<img src="{{ ('frontend/images/slider/slide-8.jpg') }}" alt="slide-background">

						<!-- Image Caption -->
						<div class="caption d-flex align-items-center center-align">
							<div class="container">
								<div class="row">
									<div class="col-md-12">
										<div class="caption-txt white-color">

											<!-- Title -->
											<div class="title">
												<h2>Big Pizza, Little Money</h2>
											</div>

											<!-- Text -->
											<p>Order Now: <span class="yellow-color"><a
														href="tel:123456789">789-654-3210</a></span></p>

										</div>
									</div>
								</div> <!-- End row -->
							</div> <!-- End container -->
						</div> <!-- End Image Caption -->

					</li> <!-- END SLIDE #3 -->

				</ul>
			</div> <!-- END SLIDER -->


		</section> <!-- END HERO-1 -->




		<!-- ABOUT-3
			============================================= -->
		<section id="about-3" class="wide-60 about-section division">
			<div class="container">
				<div class="row d-flex align-items-center">


					<!-- ABOUT IMAGE -->
					<div class="col-md-5 col-lg-6">
						<div class="about-3-img text-center mb-40">
							<img class="img-fluid" src="{{ ('frontend/images/about-02-img.png') }}" alt="about-image">
						</div>
					</div>


					<!-- ABOUT TEXT -->
					<div class="col-md-7 col-lg-6">
						<div class="about-3-txt mb-40">

							<!-- Title -->
							<h2 class="h2-sm coffee-color">Nothing brings people together like a good pizza</h2>

							<!-- Text -->
							<p class="p-md grey-color">Porta semper lacus cursus, feugiat primis ultrice a ligula risus
								auctor an tempus
								feugiat dolor lacinia cubilia curae at integer orci congue and metus in mollislorem
								primis gravida
							</p>

							<!-- Icons List -->
							<div class="abox-2-wrapper ico-70">
								<div class="row text-center">

									<!-- ABOUT BOX #1 -->
									<div class="col-sm-3">
										<div class="abox-2">

											<!-- Icon -->
											<div class="abox-2-ico grey-color"><span class="flaticon-pizza-9"></span>
											</div>

											<!-- Text -->
											<h6 class="h6-lg">Pizza</h6>

										</div>
									</div>

									<!-- ABOUT BOX #2 -->
									<div class="col-sm-3">
										<div class="abox-2">

											<!-- Icon -->
											<div class="abox-2-ico grey-color"><span
													class="flaticon-french-fries"></span></div>

											<!-- Text -->
											<h6 class="h6-lg">Fries</h6>

										</div>
									</div>

									<!-- ABOUT BOX #3 -->
									<div class="col-sm-3">
										<div class="abox-2">

											<!-- Icon -->
											<div class="abox-2-ico grey-color"><span
													class="flaticon-fried-chicken"></span></div>

											<!-- Text -->
											<h6 class="h6-lg">Chicken</h6>

										</div>
									</div>

									<!-- ABOUT BOX #4 -->
									<div class="col-sm-3">
										<div class="abox-2">

											<!-- Icon -->
											<div class="abox-2-ico grey-color"><span class="flaticon-salad"></span>
											</div>

											<!-- Text -->
											<h6 class="h6-lg">Salads</h6>

										</div>
									</div>

								</div>
							</div> <!-- End Icons List -->

						</div>
					</div> <!-- END ABOUT TEXT -->


				</div> <!-- End row -->
			</div> <!-- End container -->
		</section> <!-- END ABOUT-3 -->




		<!-- PROMO-2
			============================================= -->
		<section id="promo-2" class="promo-section division">
			<div class="container">
				<div class="row d-flex align-items-center">
					<!-- PROMO BOX-1 -->
					<div class="col-md-6 col-lg-5">
						<div id="pb-2-1" class="pbox-2 bg-fixed">
							<div class="pbox-2-txt brown-color">

								<h4 class="h4-lg txt-300" style="color:whitesmoke">Get Your Free</h4>
								<h4 class="h4-xl" style="color:whitesmoke">Cheese Fries</h4>
								<a href="{{ url('menu') }}" class="btn btn-red tra-red-hover">See More</a>

							</div>
						</div>
					</div>


					<!-- PROMO BOX-2 -->
					<div class="col-md-6 col-lg-7">
						<div id="pb-2-2" class="pbox-2 bg-fixed">
							<div class="pbox-2-txt brown-color">

								<h4 class="h4-lg txt-300" style="color:whitesmoke">Crispy Pizza</h4>
								<h4 class="h4-xl" style="color:whitesmoke">Pizza Is Back!</h4>
								<a href="{{ url('menu') }}" class="btn btn-red tra-red-hover">See More</a>

							</div>
						</div>
					</div>
				</div> <!-- End row -->
			</div> <!-- End container -->
		</section> <!-- END PROMO-2 -->

		<!-- MENU-8
			============================================= -->
		<section id="menu-8" class="wide-70 pb-15 menu-section division">
			<div class="container">
				<div class="col-lg-12 text-center pb-40">
					<h5 class="h5-sm">Best-selling</h5>
				</div>
				<div class="container">
					<div class="row">
                        @foreach($pizza as $pz)
						<!-- MENU ITEM #1 -->
								<div class="col-sm-6 col-lg-3">
									<div class="menu-6-item bg-white">

										<!-- IMAGE -->
										<div class="menu-6-img rel">
											<div class="hover-overlay">

												<!-- Image -->
												<img class="img-fluid" src="{{$pz -> ImageURL}}" alt="menu-image" />

												<!-- Zoom Icon -->
												<div class="menu-img-zoom ico-25">
													<a href="{{$pz -> ImageURL}}" class="image-link">
														<span class="flaticon-zoom"></span>
													</a>
												</div> 

											</div>
										</div>

										<!-- TEXT -->
										<div class="menu-6-txt rel">

											<!-- Rating -->	
											<div class="item-rating">
												<div class="stars-rating stars-lg">
													<?php
														$stars = $pz -> ProductTotalRating ; 
														$fullStars = floor($stars); 
														$halfStar = ($stars - $fullStars >= 0.5); 
														$starsHtml = "";

														for ($i = 1; $i <= $fullStars; $i++) {
														$starsHtml .= '<i class="fas fa-star" style="font-size: 125%"></i>';
														}

														if ($halfStar) {
														$starsHtml .= '<i class="fas fa-star-half-alt" style="font-size: 125%"></i>';
														}

														for ($j = 1; $j <= 5 - ceil($stars); $j++) {
														$starsHtml .= '<i class="far fa-star" style="font-size: 125%"></i>';
														}

														echo $starsHtml;
													?>
												</div>		
											</div>

											<!-- Title -->
											<h6 class="h6-sm" style="font-size:120%">{{$pz -> ProductName}}</h6>
											<h6 style="font-size:80%; margin:0">Just from:</h6>

											<!-- Price -->
											<div class="menu-6-price bg-coffee">
												<h5 class="h5-xs yellow-color">${{$pz -> PriceS}}</h5>
											</div>

											<!-- Add To Cart -->
											<div class="add-to-cart bg-yellow ico-10">
												<a href="{{ url('pizza/'.$pz->ProductID) }}"><span class="flaticon-shopping-bag"></span> Add to Cart</a>
											</div>

										</div>

									</div>
								</div>	<!-- END MENU ITEM #1 -->
                        @endforeach
						<div class="col-lg-12 text-center pb-40">
							<a href="{{ url('menu') }}" class="btn btn-red tra-red-hover">See More</a>
						</div>
						</div> <!-- End row -->
					</div>
				</div>
			</div> <!-- End container -->
		</section> <!-- END MENU-8 -->
	</div>
@endsection