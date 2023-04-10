@extends('admin_layout')
@section('title', 'Testo - Pizza and Fast Food')
@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-car">
              <div class="card">
                  <div class="card-body">
                    <div class="col-md-3" style="float: right">
                    <form class="search-form" action="#">
                    <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                    </form>
                  </div>
                  <h4 class="card-title">Order Delivered Management</h4>
                  <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th class="text-center">Order Date</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Customer Name</th>
                                <th class="text-center">Customer Phone</th>
                                <th class="text-center">Customer Address</th>
                                <th class="text-center">Payment Method</th>
                                <th class="text-center">Order Details</th>
                            </tr>
                        </thead>
                        @foreach($order as $or)
                        <tbody>
                            <tr>
                                <td>{{ $or->OrderID }}</td>
                                <td class="text-center">{{ $or->OrderDate }}</td>
                                <td class="text-center">{{ $or->Username }}</td>
                                <td class="text-center">{{ $or->CustomerName }}</td>
                                <td class="text-center">{{ $or->CustomerPhone }}</td>
                                <td class="text-center">{{ $or->CustomerAddress }}</td>
                                <td class="text-center">{{ $or->PaymentMethod }}</td>
                                <td class="text-center">
                                    <a class="btn btn-rounded btn-primary"><i class="menu-icon mdi mdi-information-outline"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    <br>
                    <span style="float:right">{{ $order->links() }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
@endsection