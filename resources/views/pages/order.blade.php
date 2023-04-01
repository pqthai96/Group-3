@extends('layout')
@section('title', 'Testo - Order')
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
												    	<li class="breadcrumb-item active" aria-current="page">Order</li>
												  	</ol>
												</nav>
											</div>
										</div>
									</div> 
								</div>

								<!-- Title -->
								<h2 class="h2-xl">Order</h2>

							</div>
						</div>	
					</div>	  <!-- End row -->
				</div>	   <!-- End container --> 
			</div>	<!-- END PAGE HERO -->	

        <div class="container-xl px-4 mt-4">
        <?php
            $userID =  Session::get('userID');
        ?>
        @foreach($userOrder as $uo)
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header"><h5 class="h5-xs">{{ $uo->OrderID }} | {{ $uo->OrderDate }}</h5></div>
            <div class="card-body">
                <div style="float:right">
                    <button class="btn" style="background-color: #f5b200">Print Receipt</button>
                </div>
                <h6 class="h6-sm">Customer: {{ $uo->CustomerName }} | {{ $uo->CustomerPhone }}</h6>
                <h6 class="h6-sm">Delivery Address: {{ $uo->CustomerAddress }}</h6>
                <h5 class="h5-sm" style="text-align:center">Your Order</h5>
                <hr>
					<table>
                        <thead>
                            <tr>
                                <th scope="col"><h6 class="h6-sm">Product</h6></th>
                                <th scope="col"><h6 class="h6-sm">Your Rating</h6></th>
                                <th scope="col" style="text-align:center"><h6 class="h6-sm">Quantity</h6></th>
                                <th scope="col" style="text-align:center"><h6 class="h6-sm">Subtotal</h6></th>
                            </tr>
                        </thead>
                        @foreach ($userOrderDetails as $pd)
                            @if ($pd->OrderID == $uo->OrderID)
                        <tbody>
                            <tr>
                                <?php
                                    if($pd->Size == null) {
                                ?>
                                <td data-label="Product" class="product-name">

                                    <!-- Preview -->
                                    <div class="cart-product-img"><img src="{{ $pd->ImageURL }}" alt="cart-preview"></div>

                                    <!-- Description -->
                                    <div class="cart-product-desc">
                                        <h6 class="h6-sm">{{ $pd->ProductName }}</h6>
                                    </div>
                                </td>
                                <td></td>
                                <?php
                                    } else {
                                ?>
                                <td data-label="Product" class="product-name">

                                    <!-- Preview -->
                                    <div class="cart-product-img"><img src="{{ $pd->ImageURL }}" alt="cart-preview"></div>

                                    <!-- Description -->
                                    <div class="cart-product-desc">
                                        <h6 class="h6-sm">{{ $pd->ProductName }}</h6>
                                        <p class="p-sm">Size: {{ $pd->Size }}</p>
                                    </div>
                                </td>
                                <td data-label="Your Rating" class="product-review">
                                    <form method="POST" action="/review/{{ $pd->ProductID }}">
                                        @csrf
                                        <button class="btn" type="submit" style="float:right;background-color:#f5b200">Submit</button>
                                        <textarea class="form-control" style="width:70%;height:10%" name="review" id="review" placeholder="Your feedback"></textarea>
                                        
                                        <div class="item-rating">
                                            <div class="stars-rating stars-lg">
                                                <i class="fas fa-star" data-star="1"></i>
                                                <i class="fas fa-star" data-star="2"></i>
                                                <i class="fas fa-star" data-star="3"></i>
                                                <i class="fas fa-star" data-star="4"></i>
                                                <i class="fas fa-star" data-star="5"></i>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                <?php
                                    }
                                ?>
                                <td style="text-align:center" data-label="Quantity" class="product-qty">
                                    <h6 class="h6-md">{{ $pd->Quantity }}</h6>
                                </td>
                                <?php
                                if($pd->Size == "S") {
                                ?>
                                <td style="text-align:center" data-label="Total" class="product-price-total"><h6 class="h6-md">${{ $pd->PriceS*$pd->Quantity }}</h6></td>
                                <?php
                                } else if($pd->Size == "L") {
                                ?>
                                <td style="text-align:center" data-label="Total" class="product-price-total"><h6 class="h6-md">${{ $pd->PriceL*$pd->Quantity }}</h6></td>
                                <?php
                                } else {
                                ?>
                                <td style="text-align:center" data-label="Total" class="product-price-total"><h6 class="h6-md">${{ $pd->PriceM*$pd->Quantity }}</h6></td>
                                <?php
                                }
                                ?>
                            </tr>
                            @endif
                        @endforeach
                            <tr>
                                <td><h6 class="h6-sm">Total</h6></td>
                                <td></td>
                                <td></td>
                                <?php
                                $subTotal = 0;
                                foreach($userOrderDetails as $pd) {
                                    if ($pd->OrderID == $uo->OrderID) {
                                        if($pd->Size == "S") {
                                            $subTotal += $pd->PriceS*$pd->Quantity;
                                        } else if($pd->Size == "L") {
                                            $subTotal += $pd->PriceL*$pd->Quantity;
                                        } else {
                                            $subTotal += $pd->PriceM*$pd->Quantity;
                                        }
                                    }
                                }
                                ?>
                                <td class="text-center" ><h6 class="h6-sm">${{ $subTotal }}</h6></td>
                            </tr>
                            <tr>
                                <td><h6 class="h6-sm">Voucher Discount</h6></td>
                                <td></td>
                                <td></td>
                                <td class="text-center"><h6 class="h6-sm">${{ $uo->DiscountAmount }}</h6></td>
                            </tr>
                            <tr class="last-tr">
                                <td><h6 class="h6-sm">Total Payment ({{ $uo->PaymentMethod }})</h6></td>
                                <td></td>
                                <td></td>
                                <?php
                                $totalPayment = $subTotal - $uo->DiscountAmount;
                                ?>
                                <td class="text-center"><h6 class="h6-sm">${{ $totalPayment }}</h6></td>
                            </tr>
                        </tbody>
                    </table>        
            </div>
        </div>
        @endforeach
	</div>
@endsection