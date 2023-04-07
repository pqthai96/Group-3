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
                  <h4 class="card-title">Administrator Management</h4>
                  <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>AdminName</th>
                                <th class="text-center">Password</th>
                                <th class="text-center">Permission</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        @foreach($admin as $ad)
                        <tbody>
                            <tr>
                                <td>{{ $ad->AdminName }}</td>
                                <td class="text-center">{{ $ad->AdminPassword }}</td>
                                <?php
                                if($ad->Role == 0) {
                                ?>
                                <td class="text-center"><label class="badge badge-success">Administrator</label></td>
                                <?php
                                } else {
                                ?>
                                <td class="text-center"><label class="badge badge-warning">Webmaster</label></td>
                                <?php
                                }
                                ?>
                                <td class="text-center">
                                    <a class="btn btn-rounded btn-success"><i class="menu-icon mdi mdi-pencil"></i></a>
                                    <a class="btn btn-rounded btn-danger"><i class="menu-icon mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    <br>
                    <span style="float:right">{{ $admin->links() }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
@endsection