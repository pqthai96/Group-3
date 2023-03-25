@extends('layout')
@section('title', 'Testo - Our Menu')
@section('content')
        <!-- PAGE CONTENT
		============================================= -->	
		<div id="page" class="page">

			<div id="alert-message" class="alert alert-success"><h6 class="h6-sm"></h6></div>

			<!-- PAGE HERO
			============================================= -->	
			<div id="gallery-page" class="page-hero-section division">
				<div class="container">	
					<div class="row">	
						<div class="col-lg-10 offset-lg-1">
							<div class="hero-txt text-center white-color">

								<!-- Breadcrumb -->
								<div id="breadcrumb">
									<div class="row">						
										<div class="col">
											<div class="breadcrumb-nav">
												<nav aria-label="breadcrumb">
												  	<ol class="breadcrumb">
												    	<li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
												    	<li class="breadcrumb-item active" aria-current="page">Menu</li>
												  	</ol>
												</nav>
											</div>
										</div>
									</div> 
								</div>

								<!-- Title -->
								<h2 class="h2-xl">Our Menu</h2>

							</div>
						</div>	
					</div>	  <!-- End row -->
				</div>	   <!-- End container --> 
			</div>	<!-- END PAGE HERO -->	




			<!-- MENU-8
			============================================= -->
			<section id="menu-6" class="wide-70 menu-section division">
				<div class="container">


					<!-- TABS NAVIGATION -->
					<div id="tabs-nav">
					 	<div class="row">
							<div class="col-lg-12 text-center">
						 		<ul class="tabs-1 ico-55 red-tabs clearfix">

						 			<!-- TAB-1 LINK -->
									<li class="tab-link current" data-tab="tab-1">
										<span class="flaticon-pizza-9"></span> 
										<h5 class="h5-sm">Pizza</h5>
									</li>

									<!-- TAB-2 LINK -->
									<li class="tab-link" data-tab="tab-2">
										<span class="flaticon-fries"></span> 
										<h5 class="h5-sm">Sides</h5>
									</li>

									<!-- TAB-3 LINK -->
									<li class="tab-link" data-tab="tab-3">
										<span class="flaticon-salad-1"></span> 
										<h5 class="h5-sm">Salads</h5>
									</li>

									<!-- TAB-3 LINK -->
									<li class="tab-link" data-tab="tab-4">
										<span class="flaticon-doughnut"></span> 
										<h5 class="h5-sm">Desserts</h5>
									</li>

									<!-- TAB-3 LINK -->
									<li class="tab-link" data-tab="tab-5">
										<span class="flaticon-drink"></span> 
										<h5 class="h5-sm">Drinks</h5>
									</li>

								</ul>
							</div>
						</div>	
				 	</div> <!-- END TABS NAVIGATION -->


				 	<!-- TABS CONTENT -->
				 	<div id="tabs-content">


				 		<!-- TAB-1 CONTENT -->
						<div id="tab-1" class="tab-content current">
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
											<h6 class="h6-sm" style="font-size:120%">{{$pz -> ProductName}}</a></h6>
											<h6 style="font-size:80%; margin:0">Just from:</h6>

											<!-- Price -->
											<div class="menu-6-price bg-coffee">
												<h5 class="h5-xs yellow-color">${{$pz -> PriceS}}</h5>
											</div>

											<!-- Add To Cart -->
											<div class="add-to-cart bg-yellow ico-10">
												<a href="{{ url('pizza/'.$pz->ProductID) }}" id="add-to-cart-btn" data-product-id="1"><span class="flaticon-shopping-bag"></span> Add to Cart</a>
											</div>

										</div>

									</div>
								</div>	<!-- END MENU ITEM #1 -->
                                @endforeach
							</div>  <!-- End row -->	
						</div>	<!-- END TAB-1 CONTENT -->


						<!-- TAB-2 CONTENT -->
						<div id="tab-2" class="tab-content">
							<div class="row">
                                @foreach($side as $sd)
								<!-- MENU ITEM #1 -->
								<div class="col-sm-6 col-lg-3">
									<div class="menu-6-item bg-white">
										
										<!-- IMAGE -->
										<div class="menu-6-img rel">
											<div class="hover-overlay">

												<!-- Image -->
												<img class="img-fluid" src="{{$sd -> ImageURL}}" alt="menu-image" />

												<!-- Zoom Icon -->
												<div class="menu-img-zoom ico-25">
													<a href="{{$sd -> ImageURL}}" class="image-link">
														<span class="flaticon-zoom"></span>
													</a>
												</div> 

											</div>
										</div>

										<!-- TEXT -->
										<div class="menu-6-txt rel">

											<!-- Title -->
											<h6 class="h6-sm" style="font-size:120%">{{$sd -> ProductName}}</a></h6>

											<!-- Price -->
											<div class="menu-6-price bg-coffee">
												<h5 class="h5-xs yellow-color">${{$sd -> PriceM}}</h5>
											</div>

											<!-- Add To Cart -->
											<div class="add-to-cart bg-yellow ico-10">
												<a href="" data-id="{{ $sd->ProductID }}" class="add-cart"><span class="flaticon-shopping-bag"></span> Add to Cart</a>
											</div>

										</div>

									</div>
								</div>	<!-- END MENU ITEM #1 -->
                                @endforeach
							</div>  <!-- End row -->	
						</div>	<!-- END TAB-2 CONTENT -->


						<!-- TAB-3 CONTENT -->
						<div id="tab-3" class="tab-content">
							<div class="row">
                                @foreach($salad as $sl)
								<!-- MENU ITEM #1 -->
								<div class="col-sm-6 col-lg-3">
									<div class="menu-6-item bg-white">
										
										<!-- IMAGE -->
										<div class="menu-6-img rel">
											<div class="hover-overlay">

												<!-- Image -->
												<img class="img-fluid" src="{{$sl -> ImageURL}}" alt="menu-image" />

												<!-- Zoom Icon -->
												<div class="menu-img-zoom ico-25">
													<a href="{{$sl -> ImageURL}}" class="image-link">
														<span class="flaticon-zoom"></span>
													</a>
												</div> 

											</div>
										</div>

										<!-- TEXT -->
										<div class="menu-6-txt rel">

											<!-- Title -->
											<h6 class="h6-sm" style="font-size:120%">{{$sl -> ProductName}}</a></h6>

											<!-- Price -->
											<div class="menu-6-price bg-coffee">
												<h5 class="h5-xs yellow-color">${{$sl -> PriceM}}</h5>
											</div>

											<!-- Add To Cart -->
											<div class="add-to-cart bg-yellow ico-10">
												<a href="" data-id="{{ $sl->ProductID }}" class="add-cart"><span class="flaticon-shopping-bag"></span> Add to Cart</a>
											</div>

										</div>

									</div>
								</div>	<!-- END MENU ITEM #1 -->
                                @endforeach
							</div>  <!-- End row -->	
						</div>	<!-- END TAB-3 CONTENT -->


						<!-- TAB-4 CONTENT -->
						<div id="tab-4" class="tab-content">
							<div class="row">
                                @foreach($dessert as $ds)
								<!-- MENU ITEM #1 -->
								<div class="col-sm-6 col-lg-3">
									<div class="menu-6-item bg-white">
										
										<!-- IMAGE -->
										<div class="menu-6-img rel">
											<div class="hover-overlay">

												<!-- Image -->
												<img class="img-fluid" src="{{$ds -> ImageURL}}" alt="menu-image" />

												<!-- Zoom Icon -->
												<div class="menu-img-zoom ico-25">
													<a href="{{$ds -> ImageURL}}" class="image-link">
														<span class="flaticon-zoom"></span>
													</a>
												</div> 

											</div>
										</div>

										<!-- TEXT -->
										<div class="menu-6-txt rel">

											<!-- Title -->
											<h6 class="h6-sm" style="font-size:120%">{{$ds -> ProductName}}</a></h6>

											<!-- Price -->
											<div class="menu-6-price bg-coffee">
												<h5 class="h5-xs yellow-color">${{$ds -> PriceM}}</h5>
											</div>

											<!-- Add To Cart -->
											<div class="add-to-cart bg-yellow ico-10">
												<a href="" data-id="{{ $ds->ProductID }}" class="add-cart"><span class="flaticon-shopping-bag"></span> Add to Cart</a>
											</div>

										</div>

									</div>
								</div>	<!-- END MENU ITEM #1 -->
                                @endforeach
							</div>  <!-- End row -->	
						</div>	<!-- END TAB-4 CONTENT -->

						<!-- TAB-5 CONTENT -->
						<div id="tab-5" class="tab-content">
							<div class="row">
                                @foreach($drink as $dk)
								<!-- MENU ITEM #1 -->
								<div class="col-sm-6 col-lg-3">
									<div class="menu-6-item bg-white">
										
										<!-- IMAGE -->
										<div class="menu-6-img rel">
											<div class="hover-overlay">

												<!-- Image -->
												<img class="img-fluid" src="{{$dk -> ImageURL}}" alt="menu-image" />

												<!-- Zoom Icon -->
												<div class="menu-img-zoom ico-25">
													<a href="{{$dk -> ImageURL}}" class="image-link">
														<span class="flaticon-zoom"></span>
													</a>
												</div> 

											</div>
										</div>

										<!-- TEXT -->
										<div class="menu-6-txt rel">

											<!-- Title -->
											<h6 class="h6-sm" style="font-size:120%">{{$dk -> ProductName}}</a></h6>

											<!-- Price -->
											<div class="menu-6-price bg-coffee">
												<h5 class="h5-xs yellow-color">${{$dk -> PriceM}}</h5>
											</div>

											<!-- Add To Cart -->
											<div class="add-to-cart bg-yellow ico-10">
												<a href="" data-id="{{ $dk->ProductID }}" class="add-cart"><span class="flaticon-shopping-bag"></span> Add to Cart</a>
											</div>

										</div>

									</div>
								</div>	<!-- END MENU ITEM #1 -->
                                @endforeach
							</div>  <!-- End row -->	
						</div>	<!-- END TAB-5 CONTENT -->


				 	</div>	<!-- END TABS CONTENT -->


				</div>	   <!-- End container -->
			</section>	<!-- END MENU-8 -->
		</div>
@endsection