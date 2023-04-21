@extends('admin_layout')
@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-car">
              <div class="card">
                  <div class="card-body">
                    <div class="col-md-3" style="float:right">
                      <form class="search-form" method="GET" action="{{ route('order_search') }}">
                      <input type="search" name="search" class="form-control" placeholder="Search by OrderID or Username" title="Search here">
                      </form>
                    </div>
                  <h4 class="card-title">Order Management</h4>
                  <?php
                  $msg = Session::get('msg');
                  if($msg) {
                  ?>
                  <div class="alert alert-success">
                      <strong>{{ $msg }}</strong>
                  </div>
                  <?php
                  Session::put('msg',null);
                  }
                  ?>
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
                                <th class="text-center">Order Status</th>
                                <th class="text-center">Order Details</th>
                            </tr>
                        </thead>
                        <tbody>
                    @if(isset($order_search))
                        @foreach($order_search as $or)
                            <tr>
                                <td>{{ $or->OrderID }}</td>
                                <td class="text-center">{{ $or->OrderDate }}</td>
                                <td class="text-center">{{ $or->Username }}</td>
                                <td class="text-center">{{ $or->CustomerName }}</td>
                                <td class="text-center">{{ $or->CustomerPhone }}</td>
                                <td class="text-center">{{ $or->CustomerAddress }}</td>
                                <td class="text-center">{{ $or->PaymentMethod }}</td>
                                <?php
                                if($or->OrderStatus == "Processing") {
                                ?>
                                <td class="text-center"><label class="badge badge-warning">Processing</label></td>
                                <?php
                                } else if ($or->OrderStatus =="Delivered") {
                                ?>
                                <td class="text-center"><label class="badge badge-success">Delivered</label></td>
                                <?php 
                                } else {
                                ?>
                                <td class="text-center"><label class="badge badge-dark">Cancelled</label></td>
                                <?php
                                }
                                ?>
                                <td class="text-center">
                                    <a class="btn btn-rounded btn-primary" href="{{ url('order-info/'.$or->OrderID) }}"><i class="menu-icon mdi mdi-information-outline"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                    <span style="float:right">{{ $order_search->appends(['search' => request()->query('search')])->links() }}</span>
                        @else
                        @foreach($order as $or)
                            <tr>
                                <td>{{ $or->OrderID }}</td>
                                <td class="text-center">{{ $or->OrderDate }}</td>
                                <td class="text-center">{{ $or->Username }}</td>
                                <td class="text-center">{{ $or->CustomerName }}</td>
                                <td class="text-center">{{ $or->CustomerPhone }}</td>
                                <td class="text-center">{{ $or->CustomerAddress }}</td>
                                <td class="text-center">{{ $or->PaymentMethod }}</td>
                                <?php
                                if($or->OrderStatus == "Processing") {
                                ?>
                                <td class="text-center"><label class="badge badge-warning">Processing</label></td>
                                <?php
                                } else if ($or->OrderStatus =="Delivered") {
                                ?>
                                <td class="text-center"><label class="badge badge-success">Delivered</label></td>
                                <?php 
                                } else {
                                ?>
                                <td class="text-center"><label class="badge badge-dark">Cancelled</label></td>
                                <?php
                                }
                                ?>
                                <td class="text-center">
                                    <a class="btn btn-rounded btn-primary" href="{{ url('order-info/'.$or->OrderID) }}"><i class="menu-icon mdi mdi-information-outline"></i></a>
                                </td>
                              </tr>
                          @endforeach
                          </tbody>
                    </table>
                    <br>
                    <span style="float:right">{{ $order->links() }}</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
