@extends('admin_layout')
@section('title', 'Testo - Pizza and Fast Food')
@section('content')
        <div class="content-wrapper">
          <div class="row">
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
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                    <div class="col-md-3" style="float: right">
                    <form class="search-form" action="#">
                    <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                    </form>
                  </div>
                  <h4 class="card-title">Side Listing</h4>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Side Name</th>
                          <th class="text-center">Price</th>
                          <th class="text-center">Quantity</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($side as $sd)
                        <tr>
                          <td class="py-1">
                            <img src="{{ $sd->ImageURL }}" alt="image" style="width: 100px; height: 67px; border-radius:0%;"/>
                          </td>
                          <td><strong class="cutoff-text">{{ $sd->ProductName }}</strong></td>
                          <td class="text-center"><strong class="cutoff-text">{{ $sd->PriceM }}</strong></td>
                          <td class="text-center"><strong class="cutoff-text">{{ $sd->QuantityM }}</strong></td>
                          <td class="text-center">
                            <a class="btn btn-rounded btn-success" href="{{ url('edit-supplement/'.$sd->ProductID) }}"><i class="menu-icon mdi mdi-pencil"></i></a>
                            <a class="btn btn-rounded btn-danger" href="{{ url('remove-supplement/'.$sd->ProductID) }}"><i class="menu-icon mdi mdi-delete"></i></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <br>
                    <span style="float:right">{{ $side->links('pagination::bootstrap-4', ['paginator' => $side]) }}</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                    <div class="col-md-3" style="float: right">
                    <form class="search-form" action="#">
                    <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                    </form>
                  </div>
                  <h4 class="card-title">Salad Listing</h4>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Salad Name</th>
                          <th class="text-center">Price</th>
                          <th class="text-center">Quantity</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($salad as $sl)
                        <tr>
                          <td class="py-1">
                            <img src="{{ $sl->ImageURL }}" alt="image" style="width: 100px; height: 67px; border-radius:0%;"/>
                          </td>
                          <td><strong class="cutoff-text">{{ $sl->ProductName }}</strong></td>
                          <td class="text-center"><strong class="cutoff-text">{{ $sl->PriceM }}</strong></td>
                          <td class="text-center"><strong class="cutoff-text">{{ $sl->QuantityM }}</strong></td>
                          <td class="text-center">
                            <a class="btn btn-rounded btn-success" href="{{ url('edit-supplement/'.$sl->ProductID) }}"><i class="menu-icon mdi mdi-pencil"></i></a>
                            <a class="btn btn-rounded btn-danger" href="{{ url('remove-supplement/'.$sl->ProductID) }}"><i class="menu-icon mdi mdi-delete"></i></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <br>
                    <span style="float:right">{{ $salad->links('pagination::bootstrap-4', ['paginator' => $salad]) }}</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                    <div class="col-md-3" style="float: right">
                    <form class="search-form" action="#">
                    <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                    </form>
                  </div>
                  <h4 class="card-title">Dessert Listing</h4>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Dessert Name</th>
                          <th class="text-center">Price</th>
                          <th class="text-center">Quantity</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($dessert as $ds)
                        <tr>
                          <td class="py-1">
                            <img src="{{ $ds->ImageURL }}" alt="image" style="width: 100px; height: 67px; border-radius:0%;"/>
                          </td>
                          <td><strong class="cutoff-text">{{ $ds->ProductName }}</strong></td>
                          <td class="text-center"><strong class="cutoff-text">{{ $ds->PriceM }}</strong></td>
                          <td class="text-center"><strong class="cutoff-text">{{ $ds->QuantityM }}</strong></td>
                          <td class="text-center">
                            <a class="btn btn-rounded btn-success" href="{{ url('edit-supplement/'.$ds->ProductID) }}"><i class="menu-icon mdi mdi-pencil"></i></a>
                            <a class="btn btn-rounded btn-danger" href="{{ url('remove-supplement/'.$ds->ProductID) }}"><i class="menu-icon mdi mdi-delete"></i></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <br>
                    <span style="float:right">{{ $dessert->links('pagination::bootstrap-4', ['paginator' => $dessert]) }}</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                    <div class="col-md-3" style="float: right">
                    <form class="search-form" action="#">
                    <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                    </form>
                  </div>
                  <h4 class="card-title">Drink Listing</h4>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Drink Name</th>
                          <th class="text-center">Price</th>
                          <th class="text-center">Quantity</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($drink as $dk)
                        <tr>
                          <td class="py-1">
                            <img src="{{ $dk->ImageURL }}" alt="image" style="width: 100px; height: 67px; border-radius:0%;"/>
                          </td>
                          <td><strong class="cutoff-text">{{ $dk->ProductName }}</strong></td>
                          <td class="text-center"><strong class="cutoff-text">{{ $dk->PriceM }}</strong></td>
                          <td class="text-center"><strong class="cutoff-text">{{ $dk->QuantityM }}</strong></td>
                          <td class="text-center">
                            <a class="btn btn-rounded btn-success" href="{{ url('edit-supplement/'.$dk->ProductID) }}"><i class="menu-icon mdi mdi-pencil"></i></a>
                            <a class="btn btn-rounded btn-danger" href="{{ url('remove-supplement/'.$dk->ProductID) }}"><i class="menu-icon mdi mdi-delete"></i></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <br>
                    <span style="float:right">{{ $drink->links('pagination::bootstrap-4', ['paginator' => $drink]) }}</span>                 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
@endsection