@extends('layout')
@section('title', 'Testo - Your Cart')
@section('content')

<!-- PAGE CONTENT
		============================================= -->	
		<div id="page" class="page">

			<div id="alert-message" class="alert alert-success"><h6 class="h6-sm"></h6></div>

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
									      	<th scope="col" style="text-align:center">Price</th>                                            
									      	<th scope="col" style="text-align:center">Quantity</th>
									      	<th scope="col" style="text-align:center">Total</th>
                                            <th scope="col" style="text-align:center">Update</th>
									      	<th scope="col" style="text-align:center">Delete</th>
									    </tr>
									</thead>

                                    <?php
                                        $total = 0;
                                    ?>
									<tbody>
                                        @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                        <?php 
                                        $total += $details['Price'] * $details['Quantity'];
                                        ?>

										<!-- CART ITEM #1 -->
									    <tr>
                                            <?php
                                                if(isset($details['Size'])) {
                                            ?>
									      	<td data-label="Product" class="product-name">

									      		<!-- Preview -->
												<div class="cart-product-img"><img src="{{ $details['ImageURL'] }}" alt="cart-preview"></div>

												<!-- Description -->
												<div class="cart-product-desc">
										      		<h5 class="h5-sm">{{ $details['ProductName'] }}</h5>
										      		<p class="p-sm">Size: {{ $details['Size'] }}</p>
										      	</div>

									      	</td>
                                            <?php
                                                } else {
                                            ?>
                                            <td data-label="Product" class="product-name">

									      		<!-- Preview -->
												<div class="cart-product-img"><img src="{{ $details['ImageURL'] }}" alt="cart-preview"></div>

												<!-- Description -->
												<div class="cart-product-desc">
										      		<h5 class="h5-sm">{{ $details['ProductName'] }}</h5>
										      	</div>

									      	</td>
                                            <?php
                                                }
                                            ?>
									      	<td style="text-align:center" data-label="Price" class="product-price"><h5 class="h5-md">${{ $details['Price'] }}</h5></td>
									      	<td style="text-align:center" data-label="Quantity" class="product-qty">
									      		<input class="qty quantity" type="number" min="1" max="20" value="{{ $details['Quantity'] }}" style="margin-bottom:13%">
									      	</td>
									      	<td style="text-align:center" data-label="Total" class="product-price-total"><h5 class="h5-md product_subtotal">${{ $details['Price'] * $details['Quantity'] }}</h5></td>
                                            <td style="text-align:center" data-label="Update" class="td-trash update-cart-url" data-url="{{ route('updateCart') }}">
                                                <a class="btn update-cart" href="" data-id="{{ $id }}"><i class="fa fa-sync-alt"></i></a>
                                            </td>
									      	<td style="text-align:center" data-label="Delete" class="td-trash remove-cart-url" data-url="{{ route('removeCart') }}">
                                                <button class="btn remove-cart" data-id="{{ $id }}"><i class="far fa-trash-alt"></i></button>
                                            </td>
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
									<a href="{{ route('menu') }}" class="btn btn-md btn-salmon tra-salmon-hover">Continue Shopping</a>
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
									      	<td class="text-right cart-total">${{ $total }}</td>
									    </tr>
									    <tr class="last-tr">
									      	<td>Total</td>
									      	<td> </td>
									      	<td class="text-right">${{ $total }}</td>
									    </tr>
									  </tbody>
								</table>

								<!-- Button -->
								<a href="{{ route('checkout') }}" class="btn btn-md btn-salmon tra-salmon-hover">Proceed To Checkout</a>

							</div>
						</div>	<!-- END CHECKOUT -->


					</div>	  <!-- END CART CHECKOUT -->


				</div>	   <!-- End container --> 
			</section>	<!-- END CART PAGE -->
        </div>
@endsection
