@extends('admin_layout')
@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-car">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-center" style="font-size:1.5rem">Order ID: <span style="text-decoration: underline; font-size:1.5rem; font-weight:bolder">{{ $order->OrderID }}</span></h4>
                    @if($order->OrderStatus == 'Processing')
                    <div style="float: right;">
                      <a class="btn btn-rounded btn-warning btn-update" style="width:15rem" href="{{ url('update-order/'.$order->OrderID) }}">Confirm Order Delivered</a>
                    </div>
                    <div style="float: right; clear: both; margin-top: 0.5rem">
                      <a class="btn btn-rounded btn-danger btn-cancel" style="width:15rem" href="{{ url('cancel-order/'.$order->OrderID) }}">Cancel Order</a>
                    </div>
                    @endif
                    <h6 class="h6-sm"><strong>Order Time:</strong> {{ $order->OrderDate }}</h6>
                    <h6 class="h6-sm"><strong>Customer:</strong> {{ $order->CustomerName }} - {{ $order->CustomerPhone }}</h6>
                    <h6 class="h6-sm"><strong>Delivery Address:</strong> {{ $order->CustomerAddress }}</h6>
                    <h6 class="h6-sm"><strong>Order Status:</strong> {{ $order->OrderStatus }}</h6><br>
                    @if(isset($order->Note))
                    <h6 class="h6-sm"><strong>Order Note:</strong> {{ $order->Note }}</h6>
                    @endif
                    <h4 class="h4-lg text-center" style="font-size:1.5rem; font-weight:bolder">Order Details</h4>
                    <hr>
                  <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th></th>
                                <th>Customer Rating</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_detail as $od)
                            @if ($order->OrderID == $od->OrderID)
                            <tr>
                                <?php
                                    if($od->Size == null) {
                                ?>
                                <td style="width:100px">
                                    <img src="../{{ $od->ImageURL }}" alt="cart-preview" style="width: 100px; height: 67px; border-radius:0%;">
                                </td>
                                <td>
                                    <h6 class="h6-sm">{{ $od->ProductName }}</h6>
                                </td>
                                <td></td>
                                <?php
                                    } else {
                                ?>
                                <td style="width:100px">
                                    <img src="../{{ $od->ImageURL }}" alt="cart-preview" style="width: 100px; height: 67px; border-radius:0%;">
                                </td>
                                <td>
                                    <h6 class="h6-sm">{{ $od->ProductName }}</h6>
                                    <p class="p-sm">Size: {{ $od->Size }}</p>
                                </td>
                                <td data-label="Your Rating" class="product-review">
                                <?php
                                if(DB::table('Rating')->where('OrderDetailsID', $od->OrderDetailsID)->exists()) {
                                    $rating = DB::table('Rating')->where('OrderDetailsID', $od->OrderDetailsID)->first();
                                ?>
                                <h6 class="h6-sm">{{ $rating->Review }}</h6>
                                <div class="stars-rating">
                                <?php
                                    $stars = $rating->Rating ; 
                                    $starsHtml = "";

                                    for ($i = 1; $i <= $stars; $i++) {
                                    $starsHtml .= '<i class="mdi mdi-star" style="font-size: 125%"></i>';
                                    }

                                    for ($j = 1; $j <= 5 - $stars ; $j++) {
                                    $starsHtml .= '<i class="mdi mdi-star-outline" style="font-size: 125%"></i>';
                                    }

                                    echo '<h6 class="rating">' . $starsHtml . '</h6>';
                                ?>
                                </div>
                                <?php
                                } else {
                                ?>
                                    <p>This product has not been reviewed.</p>
                                <?php
                                }
                                ?>
                                </td>
                                <?php
                                    }
                                ?>
                                <td style="text-align:center" data-label="Quantity" class="product-qty">
                                    <h6 class="h6-md">{{ $od->Quantity }}</h6>
                                </td>
                                <?php
                                if($od->Size == "S") {
                                ?>
                                <td style="text-align:center" data-label="Total" class="product-price-total"><h6 class="h6-md">${{ $od->PriceS*$od->Quantity }}</h6></td>
                                <?php
                                } else if($od->Size == "L") {
                                ?>
                                <td style="text-align:center" data-label="Total" class="product-price-total"><h6 class="h6-md">${{ $od->PriceL*$od->Quantity }}</h6></td>
                                <?php
                                } else {
                                ?>
                                <td style="text-align:center" data-label="Total" class="product-price-total"><h6 class="h6-md">${{ $od->PriceM*$od->Quantity }}</h6></td>
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
                                <td></td>
                                <?php
                                $subTotal = 0;
                                foreach($order_detail as $od) {
                                    if ($od->OrderID == $order->OrderID) {
                                        if($od->Size == "S") {
                                            $subTotal += $od->PriceS*$od->Quantity;
                                        } else if($od->Size == "L") {
                                            $subTotal += $od->PriceL*$od->Quantity;
                                        } else {
                                            $subTotal += $od->PriceM*$od->Quantity;
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
                                <td></td>
                                <td class="text-center"><h6 class="h6-sm">${{ $order->DiscountAmount }}</h6></td>
                            </tr>
                            <tr class="last-tr">
                                <td><h6 class="h6-sm">Total Payment ({{ $order->PaymentMethod }})</h6></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <?php
                                $totalPayment = $subTotal - $order->DiscountAmount;
                                ?>
                                <td class="text-center"><h6 class="h6-sm">${{ $totalPayment }}</h6></td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
@endsection

@section('scripts')
<script>
  $("a.btn-update").click(function(event) {
    event.preventDefault();
    Swal.fire({
      title: 'Are you sure this order has been successfully delivered?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Update',
      cancelButtonText: 'Cancel'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = $(this).attr("href");
      }
    });
  });

  $("a.btn-cancel").click(function(event) {
    event.preventDefault();
    Swal.fire({
      title: 'Are you sure to cancel this order?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'Cancel'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = $(this).attr("href");
      }
    });
  });
</script>
@stop