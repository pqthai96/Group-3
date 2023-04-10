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
        $msg = Session::get('msg');
        if($msg) {
        ?>
        <br>
        <div class="alert alert-danger">
            <strong>{{ $msg }}</strong>
        </div>
        <?php
        Session::put('msg',null);
        }
        ?>
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
                <h6 class="h6-sm">Order Status: {{ $uo->OrderStatus }}</h6>
                <h5 class="h5-sm text-center">Your Order</h5>
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
                                <?php
                                if(DB::table('Rating')->where('OrderDetailsID', $pd->OrderDetailsID)->exists()) {
                                    $rating = DB::table('Rating')->where('OrderDetailsID', $pd->OrderDetailsID)->first();
                                ?>
                                <h6 class="h6-sm">{{ $rating->Review }}</h6>
                                <div class="stars-rating">
                                <?php
                                    $stars = $rating->Rating ; 
                                    $starsHtml = "";

                                    for ($i = 1; $i <= $stars; $i++) {
                                    $starsHtml .= '<i class="fas fa-star" style="font-size: 125%"></i>';
                                    }

                                    for ($j = 1; $j <= 5 - $stars ; $j++) {
                                    $starsHtml .= '<i class="far fa-star" style="font-size: 125%"></i>';
                                    }

                                    echo '<h6 class="rating">' . $starsHtml . ' ('. $stars .')</h6>';
                                ?>
                                </div>
                                <?php
                                } else {
                                ?>
                                    <form method="POST" action="{{ url('review/' . $pd->ProductID) }}">
                                        @csrf
                                        <button class="btn" type="submit" style="float:right;background-color:#f5b200">Submit</button>
                                        <textarea class="form-control" style="width:70%;height:10%" name="review" id="review" placeholder="Your Review"></textarea>
                                        <div class="item-rating" id="item-rating-{{ $pd->OrderDetailsID }}">
                                            <div class="stars-rating stars-js stars-lg">
                                                <i class="far fa-star" data-star="1"></i>
                                                <i class="far fa-star" data-star="2"></i>
                                                <i class="far fa-star" data-star="3"></i>
                                                <i class="far fa-star" data-star="4"></i>
                                                <i class="far fa-star" data-star="5"></i>
                                            </div>
                                            <input type="hidden" id="rating-value" name="rating">
                                            <input type="hidden" name="order_details_id" value="{{ $pd->OrderDetailsID }}">
                                        </div>
                                    </form>
                                <?php
                                }
                                ?>
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
        <span style="float:right;margin-bottom:1rem">{{ $userOrder->links() }}</span>
	</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {

    $('.stars-js i').click(function() {
        var star = $(this).attr('data-star');
        var rating = $(this).closest('.item-rating');
        rating.find('.stars-js i').removeClass('fas').addClass('far');
        $(this).prevAll().removeClass('far').addClass('fas');
        $(this).removeClass('far').addClass('fas');
        $(this).nextAll().removeClass('fas').addClass('far');
        rating.find('#rating-value').val(star);
    });
});
</script>
@stop