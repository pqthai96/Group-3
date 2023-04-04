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
                  <h4 class="card-title">Striped Table</h4>
                  <p class="card-description">
                    Add class <code>.table-striped</code>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>ProductName</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>SoldCount</th>
                                <th>Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Các dòng sẽ được thêm bằng mã HTML -->
                            <tr>
                                <td>1</td>
                                <td>Admin 1</td>
                                <td>123456</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Admin 2</td>
                                <td>abcdef</td>
                                <td>2</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                            </tr>
                            <!-- Thêm các dòng khác tương tự -->
                        </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
@endsection