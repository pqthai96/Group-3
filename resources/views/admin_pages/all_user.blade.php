@extends('admin_layout')
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
                  <h4 class="card-title">User Account Management</h4>
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
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>FullName</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        @foreach($user as $us)
                        <tbody>
                            <tr>
                                <td>{{ $us->Username }}</td>
                                <td>{{ $us->Email }}</td>
                                <td>{{ $us->Phone }}</td>
                                <td>{{ $us->Name }}</td>
                                <td>{{ $us->Gender }}</td>
                                <td>{{ $us->Address }}</td>
                                <?php
                                if($us->UserStatus == "active") {
                                ?>
                                <td class="text-center"><label class="badge badge-success">Active</label></td>
                                <?php
                                } else {
                                ?>
                                <td class="text-center"><label class="badge badge-warning">Banned</label></td>
                                <?php
                                }
                                ?>
                                <td class="text-center">
                                    <a class="btn btn-rounded btn-success" href="{{ url('edit-user/'.$us->UserID) }}"><i class="menu-icon mdi mdi-pencil"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    <br>
                    <span style="float:right">{{ $user->links() }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
@endsection