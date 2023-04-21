@extends('admin_layout')
@section('title', 'Testo - Pizza and Fast Food')
@section('content')

<!-- partial -->

        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card p-4">

                <h4 class="card-title">Change Password</h4>
                <div class="card-body">
                    @if(session('success'))
                        <script>
                            Swal.fire({
                                title: "{{ session('success') }}",
                                icon: 'success',
                                timer: 3000,
                                showCancelButton: false,
                                showConfirmButton: false,
                                willClose: () => {
                                window.location.href = "{{ route('show_dashboard') }}";
                                }
                            });
                        </script>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('change.admin') }}" id="update-form" method="POST">
                        @csrf
                        <!-- Form Row-->
                        <div class="mb-3">
                            <label class="mb-1" for="old_Password">
                                <h6 class="h6-xs">Old password</h6>
                            </label>
                            <input class="form-control" id="old_Password" name="old_Password" type="password"
                                placeholder="Enter your old password">
                            @error('old_Password')
                                <span class="alert text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class=" mb-3">

                            <label class="mb-1" for="new_Password">
                                <h6 class="h6-xs">New password</h6>
                            </label>
                            <input class="form-control" id="new_Password" name="new_Password" type="password"
                                placeholder="Enter your new password">
                            @error('new_Password')
                                <span class="alert text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="mb-1" for="comfirm_Password">
                                <h6 class="h6-xs">Confirm password</h6>
                            </label>
                            <input class="form-control" id="comfirm_Password" name="comfirm_Password" type="password"
                                placeholder="Enter Confirm Password">
                            @error('comfirm_Password')
                                <span class="alert text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Save changes button-->
                        <button class="btn btn-primary me-2" type="submit">Change Password</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
@section('scripts')
<script>
    $("#update-form").submit(function(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure to change password?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Change',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).unbind('submit').submit();
            }
        });
    });
</script>
@stop
