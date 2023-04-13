@extends('admin_layout')
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
                  <h4 class="card-title">Contact Pending</h4>
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
                                <th>Contact Name</th>
                                <th>Contact Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        @foreach($contact as $ct)
                        <tbody>
                            <tr>
                                <td>{{ $ct->ContactName }}</td>
                                <td>{{ $ct->ContactEmail }}</td>
                                <td>{{ $ct->ContactSubject }}</td>
                                <td>{{ $ct->Message }}</td>
                                <?php
                                if($ct->ContactStatus == "processed") {
                                ?>
                                <td class="text-center"><label class="badge badge-success">Processed</label></td>
                                <?php
                                } else {
                                ?>
                                <td class="text-center"><label class="badge badge-warning">Pending</label></td>
                                <?php
                                }
                                ?>
                                <td class="text-center">
                                    <a class="btn btn-rounded btn-dark" href="{{ url('form-contact/'.$ct->ContactID) }}"><i class="menu-icon mdi mdi-reply"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    <br>
                    <span style="float:right">{{ $contact->links() }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection