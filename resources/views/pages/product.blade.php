@extends('layout')
@section('title', 'Testo - Product')
@section('content')
    
    <!-- PAGE CONTENT
		============================================= -->
	<div id="page" class="page">

		<div id="alert-message" class="alert alert-success"><h6 class="h6-sm"></h6></div>

        @foreach($pizza as $pz)
		<!-- PAGE HERO
			============================================= -->
		<div id="product-page" class="page-hero-section division">
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
													<li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
													<li class="breadcrumb-item"><a href="{{ url('/menu') }}">Menu</a></li>
													<li class="breadcrumb-item active" aria-current="page">Pizza
													</li>
												</ol>
											</nav>
										</div>
									</div>
								</div>
							</div>

							<!-- Title -->
							<h2 class="h2-xl">{{ $pz -> ProductName }}</h2>

						</div>
					</div>
                    
				</div> <!-- End row -->
			</div> <!-- End container -->
		</div> <!-- END PAGE HERO -->

		<!-- SINGLE PRODUCT
			============================================= -->
		<section id="product-1" class="pt-100 single-product division">
			<div class="container">
				<div class="row">

					<!-- PRODUCT IMAGE -->
					<div class="col-lg-7">
						<div class="product-preview">
                            <div id="tab-1-img" class="tab-content text-center displayed">
                                <img class="img-fluid" src="{{ asset($pz -> ImageURL) }}" alt="menu-image" style="border-radius: 3%"/>
                            </div>
                            <div class="stars-rating pt-30">
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

                                        echo '<h6 class="rating" style="font-size: 120%; font-weight: bold; float: right">Total Rating: <span style="position: relative; top:-2px">' . $starsHtml . ' ('. $stars .')</span></h6>';
                                    ?>
									
                                    <h6 style="font-size: 120%; font-weight: bold; float:left">Total Sold: {{ $pz -> ProductSoldCount }} units</h6>
									
								</div>
						</div>
					</div> <!-- END PRODUCT IMAGE -->


					<!-- PRODUCT DISCRIPTION -->
					<div class="col-lg-5">
						<div class="product-description">

							<!-- TITLE -->
							<div class="project-title">

								<!-- Title -->
								<h2 class="h2-lg" style="color:#f6ba1a">{{ $pz -> ProductName }}</h2>

							</div>

							<!-- TEXT -->
							<div class="product-txt">

								<!-- Text -->
								<p class="p-md grey-color">{{ $pz -> Description }}
								</p>
                                <h6 class="font-weight-bold text-darker" style="font-size:150%">Choose Size</h6>
                                    <ul style="zoom:1.25">
                                        <li class="border-bottom border-grey-lighter py-1">
                                            <div
                                                class="custom-control custom-radio org-custom-radio">
                                                <input type="radio"
                                                    class="custom-control-input" name="size"
                                                    id="rdo-size-0" value="S" /><label
                                                    class="custom-control-label w-100" 
                                                    for="rdo-size-0">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between" >
                                                        <h6 style="color:black; margin-top:0.2%">Size 7 inch =
                                                            <!-- --> <span>${{ $pz->PriceS }}</span></h6>
                                                        <div class="stack stack-horizontal">
                                                                <img height="40"
                                                                    src="{{ asset('frontend/images/pizza-size.png') }}"
                                                                    alt="7 inch" style="zoom:0.6; margin-bottom:20%"/></div>
                                                        </div>
                                                </label></div>
                                        </li>
                                        <li class="border-bottom border-grey-lighter py-1">
                                            <div
                                                class="custom-control custom-radio org-custom-radio">
                                                <input type="radio"
                                                    class="custom-control-input" name="size"
                                                    id="rdo-size-1" value="M" checked="" /><label
                                                    class="custom-control-label w-100"
                                                    for="rdo-size-1">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between">
                                                        <h6 style="color:black; margin-top:-0.7%">Size 9 inch =
                                                            <!-- --> <span>${{ $pz->PriceM }}</span></h6>
                                                            <div class="stack stack-horizontal">
                                                                <img height="40"
                                                                    src="{{ asset('frontend/images/pizza-size.png') }}"
                                                                    alt="9 inch" style="zoom:0.7; margin-bottom:20%"/></div>
                                                        </div>
                                                </label></div>
                                        </li>
                                        <li class="border-bottom border-grey-lighter py-1">
                                            <div
                                                class="custom-control custom-radio org-custom-radio">
                                                <input type="radio"
                                                    class="custom-control-input" name="size"
                                                    id="rdo-size-2" value="L" /><label
                                                    class="custom-control-label w-100"
                                                    for="rdo-size-2">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between">
                                                        <h6 style="color:black; margin-top:-2.25%">Size 12 inch =
                                                            <!-- --> <span>${{ $pz->PriceL }}</span></h6>
                                                            <div class="stack stack-horizontal">
                                                                <img height="40"
                                                                    src="{{ asset('frontend/images/pizza-size.png') }}"
                                                                    alt="12 inch" style="zoom:0.8; margin-bottom:20%"/></div>
                                                        </div>
                                                </label></div>
                                        </li>
                                    </ul>

								<input class="qty" id="quantity" name="quantity" type="number" min="1" max="20" value="1">

								<!-- Add To Cart -->
								<div class="add-to-cart-btn bg-yellow ico-20 text-center">
									<a href="" data-id="{{ $pz->ProductID }}" class="add-cart"><span class="flaticon-shopping-bag"></span> Add to Cart</a>
								</div>
								<!-- List -->
								<ul class="txt-list">
									<li class="list-item">
										<p class="p-sm">We accept credit cards or cash to a courier.</p>
									</li>
									<li class="list-item">
										<p class="p-sm">Free Shipping.</p>
									</li>
								</ul>

							</div> <!-- END TEXT-->

						</div>
					</div> <!-- END PRODUCT DISCRIPTION -->

				</div> <!-- End row -->
			</div> <!-- End container -->
		</section> <!-- END SINGLE PRODUCT -->
        @endforeach


        
		<!-- SINGLE PRODUCT DATA
			============================================= -->
		<section id="product-1-data" class="wide-80 single-product-data division">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="">

                            
							<!-- TABS NAVIGATION -->
							<div class="tabs-nav">
								<div class="row">
									<div class="col-lg-12 text-center">
										<h5 class="h5-sm">Reviews</h5>
									</div>
								</div>
							</div> <!-- END TABS NAVIGATION -->
                            @if($count == 0)
                            <div class="text-center">
                                <p>(This product has not been reviewed)</p>
                            </div>
                            @else
                            @foreach($rating as $rt)
                            <!-- TESTIMONIAL #1 -->
							<div class="review-2 b-bottom">

								<!-- Testimonial Author Avatar -->
								<div class="review-2-avatar">
									<img src="{{ asset('frontend/images/user.png') }}" alt="testimonial-avatar">
								</div>

								<!-- Testimonial Text -->
								<div class="review-2-txt">

									<!-- Testimonial Author -->
									<div class="review-info clearfix">
										<h5 class="h5-xs">{{ $rt -> Username }}</h5>
										<span class="grey-color">{{ $rt -> RatingDate }}</span>
									</div>

                                    <!-- Rating -->
									<div class="stars-rating stars-lg pb-20">
										<?php
                                        $stars = $rt -> Rating; 
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

                                        echo '<div class="rating">' . $starsHtml . '</div>';
                                        ?>
									</div>

									<!-- Text -->
									<p>{{ $rt -> Review }}
									</p>

								</div>

							</div> <!--END  TESTIMONIAL #1 -->
                            @endforeach
                            @endif
						</div>
					</div>
				</div> <!-- End row -->
			</div> <!-- End container -->
		</section> <!-- END SINGLE PRODUCT DATA -->
    </div>    
@endsection
