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
												    	<li class="breadcrumb-item active" aria-current="page">Checkout</li>
												  	</ol>
												</nav>
											</div>
										</div>
									</div> 
								</div>

								<!-- Title -->
								<h2 class="h2-xl">Checkout</h2>

							</div>
						</div>	
					</div>	  <!-- End row -->
				</div>	   <!-- End container --> 
			</div>	<!-- END PAGE HERO -->	



            	
			<!-- CART PAGE
			============================================= -->
			<section id="cart-1" class="wide-100 cart-page division">
				<div class="container">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title mb-20">	
                            <!-- Title 	-->	
                            <h4 class="h4-lg" style="color:#f6ba1a">Delivery Address</h4>	

                            <!-- Text -->	
                            <p class="p-xl" style="padding:0%">Please check again your delivery address on your account or set up an other address.
                            </p>
                            </div>
                        </div>
                    </div>

                    <form id="order-form" name="contactform" class="contact-form" method="POST" action="{{ route('orderPlace') }}">
                        @csrf
                    <div>
                        <ul>
                            <li class="py-1">
                                <div class="custom-control custom-radio org-custom-radio">
                                    <input type="radio" class="custom-control-input" name="options" id="rdo-size-0" value="default" onclick="document.getElementById('form-holder').style.display = 'none'" checked/>
                                    <label class="custom-control-label w-100" for="rdo-size-0"><h6 class="h6-sm" style="color:black">  Default Address (From your account)</h6></label>
                                </div>
                            </li>
                            <?php
                                $userID =  Session::get('userID');
                            ?>
                            <div class="ml-25">
                                <p class="p-sm"><span style="font-weight:500">Customer Name:</span> {{ session::get('Name') }}</p>
                                <p class="p-sm"><span style="font-weight:500">Phone Number:</span> {{ session::get('Phone') }}</p>
                                <p class="p-sm"><span style="font-weight:500">Delivery Address:</span> {{ session::get('Address') }}</p>                                
                            </div>
                            <li class="py-1">
                                <div class="custom-control custom-radio org-custom-radio">
                                    <input type="radio" class="custom-control-input" name="options" id="rdo-size-1" value="other" onclick="document.getElementById('form-holder').style.display = 'block'"/>
                                    <label class="custom-control-label w-100" for="rdo-size-1"><h6 class="h6-sm" style="color:black">  Other Address</h6></label>
                                </div>
                            </li>
                        </ul>
                    </div>

                    
                    <!-- CONTACT FORM -->	
                    <div class="row">
                        <div class="col-md-12">
                            <div id="form-holder" class="form-holder row pt-10" style="display:none">
                                
                                                                                        
                                    <!-- Form Input -->
                                    <div class="col-md-12 pb-10">
                                        <input type="text" name="name" class="form-control name" placeholder="Please input your name"> 
                                        @error('name')
                                            <span class="alert text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                        
                                    <!-- Form Input -->        
                                    <div class="col-md-12 pb-10">
                                        <input type="tel" name="phone" class="form-control phone" placeholder="Please enter your phone number">
                                        @error('phone')
                                            <span class="alert text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Form Textarea -->	        
                                    <div class="col-md-12">
                                        <input name="address" class="form-control message" placeholder="Please enter your address delivery">
                                        @error('address')
                                            <span class="alert text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            </div>	
                        </div>	
                    </div>  <!-- END CONTACT FORM -->

                    <div class="row pt-20">	
                        <div class="col-md-12">
                            <div class="section-title mb-20">	
                            <!-- Title 	-->	
                            <h4 class="h4-lg" style="color:#f6ba1a">Payment Method</h4>	
                            </div>	
                        </div>
                    </div>

                    <div>
                        <ul>
                            <li class="py-1">
                                <div class="custom-control custom-radio org-custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="rdo-size-2" value="Credit Card/Debit Card"/>
                                    <label class="custom-control-label w-100" for="rdo-size-2"><h6 class="h6-sm" style="color:black">  Credit Card/Debit Card</h6></label>
                                </div>
                            </li>
                            <li class="py-1">
                                <div class="custom-control custom-radio org-custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="rdo-size-3" value="ATM"/>
                                    <label class="custom-control-label w-100" for="rdo-size-3"><h6 class="h6-sm" style="color:black">  ATM</h6></label>
                                </div>
                            </li>
                            <li class="py-1">
                                <div class="custom-control custom-radio org-custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="rdo-size-4" value="Momo"/>
                                    <label class="custom-control-label w-100" for="rdo-size-4"><h6 class="h6-sm" style="color:black">  Momo</h6></label>
                                </div>
                            </li>
                            <li class="py-1">
                                <div class="custom-control custom-radio org-custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="rdo-size-5" value="Cash On Delivery" checked/>
                                    <label class="custom-control-label w-100" for="rdo-size-5"><h6 class="h6-sm" style="color:black">  Cash On Delivery</h6></label>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="row pt-20">	
                        <div class="col-md-12">
                            <div class="section-title mb-20">	
                            <!-- Title 	-->	
                            <h4 class="h4-lg" style="color:#f6ba1a">Your Cart</h4>	
                            </div>	
                        </div>
                    </div>

					<!-- CART TABLE -->	
					<div class="row">
						<div class="col-md-12">
							<div class="cart-table mb-70">
								<table id="myTable">
									<thead>
									    <tr>
									      	<th scope="col"><h6 class="h6-sm">Product</h6></th>
									      	<th scope="col" style="text-align:center"><h6 class="h6-sm">Price</h6></th>                                            
									      	<th scope="col" style="text-align:center"><h6 class="h6-sm">Quantity</h6></th>
									      	<th scope="col" style="text-align:center"><h6 class="h6-sm">Total</h6></th>
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
                                                <h5 class="h5-sm">{{ $details['Quantity'] }}</h5>
									      	</td>
									      	<td style="text-align:center" data-label="Total" class="product-price-total"><h5 class="h5-md product_subtotal">${{ $details['Price'] * $details['Quantity'] }}</h5></td>                                            
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
                        <div class="col-lg-8">
                            <div class="cart-checkout bg-lightgrey" style="height:100%">
                                <h5 class="h5-lg">Notes</h5>
                                <textarea name="notes" class="form-control message" style="height:82%" placeholder="Please enter your order notes"></textarea>
                            </div>
						</div>


						<!-- CHECKOUT -->
						<div class="col-lg-4">
							<div class="cart-checkout bg-lightgrey" style="height:100%">

								<!-- Title -->
								<h5 class="h5-lg">Payment Details</h5>

								<!-- Table -->
								
                                <table>
									<tbody>
									    <tr>
									      	<td>Subtotal</td>
									      	<td></td>
									      	<td class="text-right cart-total">${{ $total }}</td>
									    </tr>
										<tr>
									      	<td>Voucher Discount</td>
									      	<td> </td>
									      	<td class="text-right discount-amount"></td>
                                            <input type="hidden" name="discountAmount" id="discountAmount" value="">
									    </tr>
									    <tr class="last-tr">
									      	<td>Total Payment</td>
									      	<td> </td>
									      	<td class="text-right total-payment">${{ $total }}</td>
									    </tr>
									  </tbody>
								</table>

								<!-- Button -->
                                <button id="btn-order" class="btn btn-md btn-salmon tra-salmon-hover btn-order">Place Order</button>

							</div>
						</div>	<!-- END CHECKOUT -->
					</div>	  <!-- END CART CHECKOUT -->
                    </form>	
				</div>	   <!-- End container --> 
			</section>	<!-- END CART PAGE -->
        </div>
@endsection

        

@section('scripts')
    <script type="text/javascript">
        var discountAmount = localStorage.getItem('discountAmount');
		var totalPayment = localStorage.getItem('totalPayment');
		$(".discount-amount").html('$' + discountAmount);
		$(".total-payment").html('$' + totalPayment);
        $('#discountAmount').val(discountAmount);
        $('#totalPayment').val(totalPayment);

        //Button Order Place
        $("#btn-order").click(function(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Are you sure you want to order?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Order Place',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
            const myForm = document.getElementById('order-form');
            myForm.submit();
            }
        });
        });

    </script>
@stop