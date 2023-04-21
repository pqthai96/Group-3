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
        @if (session('success'))
            <div class="alert alert-success">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        <?php
        $userID = Session::get('userID');
        ?>
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">
                <h4 class="h4-xs">Account Information</h4>
            </div>
            <div class="card-body">

                <form method="post" id="update-form" action="{{ route('update.account') }}">
                    @csrf
                    <!-- Form Group (username)-->
                    <div class="mb-3">
                        <label class="mb-1" for="inputUsername">
                            <h6 class="h6-xs">Username</h6>
                        </label>
                        <input class="form-control" id="inputUsername" name="inputUsername" type="text"
                            placeholder="Enter your username" value="{{ session::get('userName') }}" disabled>
                    </div>
                    <!-- Form Group (email address)-->
                    <div class="mb-3">
                        <label class="mb-1" for="inputEmailAddress">
                            <h6 class="h6-xs">Email Address</h6>
                        </label>
                        <input class="form-control" id="inputEmailAddress" name="inputEmailAddress" type="email"
                            placeholder="Enter your email address" value="{{ session::get('Email') }}" disabled>
                    </div>
                    <!-- Form Row-->
                    <div class="mb-3">
                        <!-- Form Group (first name)-->
                        <label class="mb-1" for="inputFirstName">
                            <h6 class="h6-xs">Full Name</h6>
                        </label>
                        <input class="form-control" id="inputFirstName" name="inputFirstName" type="text"
                            placeholder="Enter your first name" value="{{ session::get('Name') }}" >
                            @error('inputFirstName')
                            <span class="alert text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Form Row        -->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (organization name)-->
                        <div class="col-md-6">
                            <label class="mb-1" for="inputPhone">
                                <h6 class="h6-xs">Phone number</h6>
                            </label>
                            <input class="form-control" id="inputPhone" name="inputPhone" type="tel"
                                placeholder="Enter your phone number" value="{{ session::get('Phone') }}" >
                                @error('inputPhone')
                            <span class="alert text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <!-- Form Group (location)-->
                        <?php $gender = session::get('Gender'); ?>
                        <div class="col-md-6">
                            <label class="mb-1" for="inputLocation">
                                <h6 class="h6-xs">Gender</h6>
                            </label>
                            <select id="gender" name="gender" class="form-control" required >
                                <option value="Male" <?php echo $gender == 'Male' ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?php echo $gender == 'Female' ? 'selected' : ''; ?>>Female</option>
                            </select>
                            @error('gender')
                            <span class="alert text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <!-- Form Group (address)-->
                    <div class="mb-3">
                        <label class="mb-1" for="inputLocation">
                            <h6 class="h6-xs">Address</h6>
                        </label>
                        <input class="form-control" id="inputLocation" name="inputLocation" type="text"
                            placeholder="Enter your location" value="{{ session::get('Address') }}" >
                            @error('inputLocation')
                            <span class="alert text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Save changes button-->
                    <button class="btn btn-primary" type="submit" style="float: right; background-color: #f5b200">Update</button>
                </form>
                <a href="{{ route('view.Password') }}" class="btn btn-primary" style="float: left; background-color: #f5b200">Change Password</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $("#update-form").submit(function(event) {
			event.preventDefault();
			Swal.fire({
				title: 'Are you sure to update account information?',
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