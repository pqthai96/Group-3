@extends('layout')
@section('title', 'Testo - Your Cart')
@section('content')
        <div id="page" class="page">

			<div id="alert-message" class="alert alert-success"><h6 class="h6-sm"></h6></div>

			<!-- PAGE HERO
			============================================= -->	
			<div id="gallery-page" class="page-hero-section division">
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
												    	<li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
												    	<li class="breadcrumb-item active" aria-current="page">Reset Password</li>
												  	</ol>
												</nav>
											</div>
										</div>
									</div> 
								</div>

								<!-- Title -->
								<h2 class="h2-xl">Reset Password</h2>

							</div>
						</div>	
					</div>	  <!-- End row -->
				</div>	   <!-- End container --> 
			</div>	<!-- END PAGE HERO -->	

            
            <div class="container-xl px-4 mt-4">
            @if(session('success'))
                <script>
                    Swal.fire({
                        title: "{{ session('success') }}",
                        icon: 'success',
                        timer: 3000,
                        showCancelButton: false,
                        showConfirmButton: false,
                        willClose: () => {
                        window.location.href = "{{ route('home') }}";
                        }
                    });
                </script>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    <strong>{{ session('error') }}</strong>
                </div>
            @endif
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="h4-xs">Reset Password Form</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('reset-password')}}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" name="email" class="form-control" autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="alert text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" autocomplete="new-password">
                                    @error('password')
                                    <span class="alert text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm New Password</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                    @error('password_confirmation')
                                    <span class="alert text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit" style="background-color: #f5b200">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection