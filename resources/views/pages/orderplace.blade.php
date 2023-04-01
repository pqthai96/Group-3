@extends('layout')
@section('title', 'Testo - Checkout')
@section('content')

<!-- PAGE CONTENT
		============================================= -->	
		<div id="page" class="page">

            

			<!-- PAGE HERO
			============================================= -->	
			<div id="cart-page" class="page-hero-section division">
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
												    	<li class="breadcrumb-item"><a href="demo-1.html">Home</a></li>
												    	<li class="breadcrumb-item active" aria-current="page">Order Place</li>
												  	</ol>
												</nav>
											</div>
										</div>
									</div> 
								</div>

								<!-- Title -->
								<h2 class="h2-xl">Order Place</h2>

							</div>
						</div>	
					</div>	  <!-- End row -->
				</div>	   <!-- End container --> 
			</div>	<!-- END PAGE HERO -->	



            	
			<!-- CART PAGE
			============================================= -->
			<div class="card mb-4">
            <div class="card-header"></div>
            <div class="card-body">
                            <div class="section-title mb-20 text-center">	
                                <h4 class="h4-lg mt-100">Checkout Successfully! Thank you for your order!</h4>
                                <h5 class="h5-sm mb-20">We will contact you at the soonest time!</h5>
                                <div class="mb-100">
                                    <a href="{{ route('home') }}" class="btn btn-red tra-red-hover">Back to home</a>
                                    <a href="{{ route('order') }}" class="btn btn-red tra-red-hover">See Your Purchases</a>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
        </div>
	</div>
@endsection