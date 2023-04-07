@extends('admin_layout')
@section('title', 'Testo - Pizza and Fast Food')
@section('content')
        <div class="content-wrapper">
          <div class="row">
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
                          <td>{{ $sd->ProductName }}</td>
                          <td class="text-center">{{ $sd->PriceM }}</td>
                          <td class="text-center">{{ $sd->QuantityM }}</td>
                          <td class="text-center">
                            <button class="btn btn-rounded btn-success"><i class="menu-icon mdi mdi-pencil"></i></button>
                            <button class="btn btn-rounded btn-danger"><i class="menu-icon mdi mdi-delete"></i></button>
                            <a></a>
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
                          <td>{{ $sl->ProductName }}</td>
                          <td class="text-center">{{ $sl->PriceM }}</td>
                          <td class="text-center">{{ $sl->QuantityM }}</td>
                          <td class="text-center">
                            <button class="btn btn-rounded btn-success"><i class="menu-icon mdi mdi-pencil"></i></button>
                            <button class="btn btn-rounded btn-danger"><i class="menu-icon mdi mdi-delete"></i></button>
                            <a></a>
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
                          <td>{{ $ds->ProductName }}</td>
                          <td class="text-center">{{ $ds->PriceM }}</td>
                          <td class="text-center">{{ $ds->QuantityM }}</td>
                          <td class="text-center">
                            <button class="btn btn-rounded btn-success"><i class="menu-icon mdi mdi-pencil"></i></button>
                            <button class="btn btn-rounded btn-danger"><i class="menu-icon mdi mdi-delete"></i></button>
                            <a></a>
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
                          <td>{{ $dk->ProductName }}</td>
                          <td class="text-center">{{ $dk->PriceM }}</td>
                          <td class="text-center">{{ $dk->QuantityM }}</td>
                          <td class="text-center">
                            <a class="btn btn-rounded btn-success"><i class="menu-icon mdi mdi-pencil"></i></a>
                            <a class="btn btn-rounded btn-danger"><i class="menu-icon mdi mdi-delete"></i></a>
                            <a></a>
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