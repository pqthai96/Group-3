@extends('admin_layout')
@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-car">
              <div class="card">
                  <div class="card-body">
                    <div class="col-md-3" style="float: right">
                    <form class="search-form" action="{{ route('admin_search') }}">
                    <input type="search" name="search" class="form-control" placeholder="Search by AdminName" title="Search here">
                    </form>
                  </div>
                  <h4 class="card-title">Administrator Management</h4>
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
                                <th>AdminName</th>
                                <th class="text-center">Password</th>
                                <th class="text-center">Permission</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @if(isset($admin_search))
                          @foreach($admin_search as $ad)
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
                                  <a class="btn btn-rounded btn-success" href="{{ url('edit-admin/'.$ad->AdminID) }}"><i class="menu-icon mdi mdi-pencil"></i></a>
                                  <a class="btn btn-rounded btn-danger btn-delete" href="{{ url('remove-admin/'.$ad->AdminID) }}"><i class="menu-icon mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>                        
                    </table>
                    <br>
                    <span style="float:right">{{ $admin_search->appends(['search' => request()->query('search')])->links() }}</span>
                    @else
                    @foreach($admin as $ad)
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
                                  <a class="btn btn-rounded btn-success" href="{{ url('edit-admin/'.$ad->AdminID) }}"><i class="menu-icon mdi mdi-pencil"></i></a>
                                  <a class="btn btn-rounded btn-danger btn-delete" href="{{ url('remove-admin/'.$ad->AdminID) }}"><i class="menu-icon mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>                        
                    </table>
                    <br>
                    <span style="float:right">{{ $admin->links() }}</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
@endsection

@section('scripts')
<script>
  $("a.btn-delete").click(function(event) {
    event.preventDefault();
    Swal.fire({
      title: 'Are you sure to delete this admin account?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Delete',
      cancelButtonText: 'Cancel'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = $(this).attr("href");
      }
    });
  });
</script>
@stop