@extends('layout')
@section('title', 'Testo - Your Cart')
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
												    	<li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
												  	</ol>
												</nav>
											</div>
										</div>
									</div> 
								</div>

								<!-- Title -->
								<h2 class="h2-xl">Shopping Cart</h2>

							</div>
						</div>	
					</div>	  <!-- End row -->
				</div>	   <!-- End container --> 
			</div>	<!-- END PAGE HERO -->	




			<!-- CART PAGE
			============================================= -->
			<section id="cart-1" class="wide-100 cart-page division">
				<div class="container">


					<!-- CART TABLE -->	
					<div class="row">
						<div class="col-md-12">
							<div class="cart-table mb-70">
								<table id="myTable">
									<thead>
									    <tr>
									      	<th scope="col">Product</th>
									      	<th scope="col">Price</th>
									      	<th scope="col">Quantity</th>
									      	<th scope="col">Total</th>
									      	<th scope="col">Delete</th>
									    </tr>
									 </thead>

									<tbody>
                                        @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)

										<!-- CART ITEM #1 -->
									    <tr>
									      	<td data-label="Product" class="product-name">

									      		<!-- Preview -->
												<div class="cart-product-img"><img src="{{ $details['ImageURL'] }}" alt="cart-preview"></div>

												<!-- Description -->
												<div class="cart-product-desc">
										      		<h5 class="h5-sm">{{ $details['PizzaName'] }}</h5>
										      		<p class="p-sm">Size:</p>
										      	</div>

									      	</td>

									      	<td data-label="Price" class="product-price"><h5 class="h5-md"></h5></td>
									      	<td data-label="Quantity" class="product-qty">
									      		<input class="qty" type="number" min="1" max="20" value="1">
									      	</td>
									      	<td data-label="Total" class="product-price-total"><h5 class="h5-md"></h5></td>
									      	<td data-label="Delete" class="td-trash"><i class="far fa-trash-alt"></i></td>

									    </tr>
                                        @endforeach
                                        @endif
									    

									</tbody>

								</table>
							</div>
						</div>
					</div>	<!-- END CART TABLE -->


					<!-- CART CHECKOUT -->		
					<div class="row">

						<!-- DISCOUNT COUPON -->
						<div class="col-lg-8">
							<div class="discount-coupon row pt-15">

								<!-- Form -->
								<div class="col-md-8 col-lg-7">
									<form class="discount-form">
												
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Coupon Code" id="discount-code">								
											<span class="input-group-btn">
												<button type="submit" class="btn btn-salmon tra-salmon-hover">Apply Coupon</button>
											</span>										
										</div>
													
									</form>	
								</div>


								<!-- Button -->
								<div class="col-md-4 col-lg-5 text-right">
									<a onClick="window.location.reload()" class="btn btn-md btn-salmon tra-salmon-hover">Update Cart</a>
								</div>

							</div>
						</div>


						<!-- CHECKOUT -->
						<div class="col-lg-4">
							<div class="cart-checkout bg-lightgrey">

								<!-- Title -->
								<h5 class="h5-lg">Cart Total</h5>

								<!-- Table -->
								<table>
									<tbody>
									    <tr>
									      	<td>Subtotal</td>
									      	<td> </td>
									      	<td class="text-right">$35.95</td>
									    </tr>
									    <tr class="last-tr">
									      	<td>Total</td>
									      	<td> </td>
									      	<td class="text-right">$35.95</td>
									    </tr>
									  </tbody>
								</table>

								<!-- Button -->
								<a href="#" class="btn btn-md btn-salmon tra-salmon-hover">Proceed To Checkout</a>

							</div>
						</div>	<!-- END CHECKOUT -->


					</div>	  <!-- END CART CHECKOUT -->


				</div>	   <!-- End container --> 
			</section>	<!-- END CART PAGE -->
        </div>
@endsection