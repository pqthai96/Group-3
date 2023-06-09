@extends('admin_layout')
@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                    <div class="col-md-3" style="float: right">
                    <form class="search-form" action="{{ route('user_search') }}">
                    <input type="search" name="search" class="form-control" placeholder="Search by Username, Email or Phone" title="Search here">
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
                    <table class="table table-hover">
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
                        <tbody>
                          @if(isset($user_search))
                          @foreach($user_search as $us)
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
                          @endforeach
                        </tbody>
                    </table>
                    <br>
                    <span style="float:right">{{ $user_search->appends(['search' => request()->query('search')])->links() }}</span>
                    @else
                    @foreach($user as $us)
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
                          @endforeach
                        </tbody>
                    </table>
                    <br>
                    <span style="float:right">{{ $user->links() }}</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
@endsection