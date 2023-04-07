@extends('admin_layout')
@section('title', 'Testo - Pizza and Fast Food')
@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                    <div class="col-md-3" style="float: right">
                    <form class="search-form" action="#">
                    <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                    </form>
                  </div>
                  <h4 class="card-title">Pizza Listing</h4>
                  <?php
                  $msg = Session::get('msg');
                  if($msg) {
                  ?>
                  <span class="alert text-danger">
                      <strong>{{ $msg }}</strong>
                  </span>
                  <?php
                  Session::put('msg',null);
                  }
                  ?>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>
                            Image
                          </th>
                          <th>
                            Pizza Name
                          </th>
                          <th>
                            Description
                          </th>
                          <th>
                            Size
                          </th>
                          <th>
                            Price
                          </th>
                          <th>
                            Quantity
                          </th>
                          <th>
                            SoldCount
                          </th>
                          <th class="text-center">
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($pizza as $pz)
                        <tr>
                          <td class="py-1">
                            <img src="{{ $pz->ImageURL }}" alt="image" style="width: 100px; height: 67px; border-radius:0%;"/>
                          </td>
                          <td>
                            {{ $pz->ProductName }}
                          </td>
                          <td style="white-space:normal; padding:0%">
                            {{ $pz->Description }}
                          </td>
                          <td>
                            Small: <br>
                            Medium: <br>
                            Large:
                          </td>
                          <td>
                            ${{ $pz->PriceS }} <br> 
                            ${{ $pz->PriceM }} <br> 
                            ${{ $pz->PriceL}}
                          </td>
                          <td class="text-center">
                            {{ $pz->QuantityS }} <br> 
                            {{ $pz->QuantityM }} <br> 
                            {{ $pz->QuantityL }}
                          </td>
                          <td class="text-center">
                            {{ $pz->ProductSoldCount }}
                          </td>
                          <td class="text-center">
                            <a class="btn btn-rounded btn-success" href="{{ url('edit-pizza/'.$pz->ProductID) }}"><i class="menu-icon mdi mdi-pencil"></i></a>
                            <a class="btn btn-rounded btn-danger" href="{{ url('remove-pizza/'.$pz->ProductID) }}"><i class="menu-icon mdi mdi-delete"></i></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <br>
                    <span style="float:right">{{ $pizza->links() }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
@endsection