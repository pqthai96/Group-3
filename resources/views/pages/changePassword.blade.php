@extends('layout')
@section('title', 'Testo - Account')
@section('content')
    <!-- PAGE CONTENT
                          ============================================= -->
    <div id="page" class="page">

        <!-- PAGE HERO
                           ============================================= -->
        <div id="cart-page" class="page-hero-section division">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="hero-txt text-center white-color">

                            <!-- Breadcrumb -->
                            <div id="breadcrumb">
                                <div class="row">
                                    <div class="col">
                                        <div class="breadcrumb-nav">
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="demo-1.html">Home</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page">Account</li>
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Title -->
                            <h2 class="h2-xl">Account</h2>

                        </div>
                    </div>
                </div> <!-- End row -->
            </div> <!-- End container -->
        </div> <!-- END PAGE HERO -->

        <div class="container-xl px-4 mt-4">

            <?php
            $userID = Session::get('userID');
            ?>
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="h4-xs">Change Password</h4>
                </div>
                <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    <form action="{{ route('update.Password') }}" id="update-form" method="POST">
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
                                <h6 class="h6-xs">new password</h6>
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
                        <button class="btn btn-primary" type="submit" style="float: left; background-color: #f5b200">Change Password</button>
                    </form>
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