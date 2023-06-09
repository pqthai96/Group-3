@extends('admin_layout')
@section('content')

<!-- partial -->
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create a new account Administrator</h4>
                  <?php
                  $msg = Session::get('failed');
                  if($msg) {
                  ?>
                  <div class="alert alert-danger">
                      <strong>{{ $msg }}</strong>
                  </div>
                  <?php
                  Session::put('failed',null);
                  }
                  ?>
                  <form class="forms-sample" id="add-form" method="POST" action="{{ route('save_admin') }}">
                    @csrf
                    <div class="form-group">
                      <label for="admin_name">AdminName</label>
                      <input type="text" class="form-control" id="admin_name" name="admin_name" placeholder="AdminName">
                      @error('admin_name')
                      <span class="alert text-danger">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                        <label for="admin_password">Password</label>
                        <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Password">
                        @error('admin_password')
                        <span class="alert text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-6">
                        <label for="admin_password_confirm">Confirm Password</label>
                        <input type="password" class="form-control" id="admin_password_confirm" name="admin_password_confirm" placeholder="Confirm Password">
                        @error('admin_password_confirm')
                        <span class="alert text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="admin-role">Permission</label>
                        <div>
                            <input type="radio" class="form-check-input" id="admin-role-1" name="admin_role" value="0" checked>
                            <label class="form-check-label" for="admin-role-1">Admin</label>
                        </div>
                        <div>
                            <input type="radio" class="form-check-input" id="admin-role-2" name="admin_role" value="1">
                            <label class="form-check-label" for="admin-role-2">Webmaster</label>
                        </div>
                    </div>                    
                    <button type="submit" class="btn btn-primary me-2">Add Admin</button>
                    <button class="btn btn-light" type="reset">Clear</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial -->
@endsection

@section('scripts')
<script>
    $('#add-form').submit(function(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure to add this admin account?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Add',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).unbind('submit').submit();
            }
        });
    });
</script>
@stop