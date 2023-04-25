@extends('admin_layout')
@section('content')

<!-- partial -->
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit User Account</h4>
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
                  <form class="forms-sample" id="update-form" method="POST" action="{{ url('update-user/'.$user->UserID) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="user_name">Username</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Username" value="{{ $user->Username }}">
                            @error('user_name')
                            <span class="alert text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="user_phone">Phone Number</label>
                            <input type="text" class="form-control" id="user_phone" name="user_phone" placeholder="Phone Number" value="{{ $user->Phone }}">
                            @error('user_phone')
                            <span class="alert text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_email">Email</label>
                        <input type="text" class="form-control" id="user_email" name="user_email" placeholder="Email" value="{{ $user->Email }}">
                        @error('user_email')
                        <span class="alert text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="user_fullname">Full name</label>
                            <input type="text" class="form-control" id="user_fullname" name="user_fullname" placeholder="Full name" value="{{ $user->Name }}">
                            @error('user_fullname')
                            <span class="alert text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                        <label for="user_gender">Gender</label>
                            <select class="form-select" id="user_gender" name="user_gender" style="height: 2rem; font-size:80%">
                                <option value="Male" <?php echo ( $user->Gender == 'Male') ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?php echo ( $user->Gender == 'Female') ? 'selected' : ''; ?>>Female</option>
                            </select>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="user_address">Address</label>
                            <input type="text" class="form-control" id="user_address" name="user_address" placeholder="Address" value="{{ $user->Address }}">
                            @error('user_address')
                            <span class="alert text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="user_status">User Account Status</label>
                        <select class="form-select" id="user_status" name="user_status">
                            <option value="active" <?php echo ( $user->UserStatus == 'active') ? 'selected' : ''; ?>>Active</option>
                            <option value="banned" <?php echo ( $user->UserStatus == 'banned') ? 'selected' : ''; ?>>Banned</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary me-2">Update</button>
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
    $('#update-form').submit(function(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure to update this user account?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Update',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).unbind('submit').submit();
            }
        });
    });
</script>
@stop