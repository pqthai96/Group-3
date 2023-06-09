<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Testo Admin Dashboard</title>

  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('backend/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/vendors/typicons/typicons.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/vendors/simple-line-icons/css/simple-line-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->

  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/js/select.dataTables.min.css') }}">
  <!-- End plugin css for this page -->

  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('backend/css/vertical-layout-light/style.css') }}">

  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('backend/images/favicon.png') }}" />

  {{-- SWEET ALERT --}}
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.js"></script>
</head>
<body>
  <div class="container-scroller" style="zoom: 110%">
    
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="{{ route('show_dashboard') }}">
            <img src="{{ asset('backend/images/logo-02.png') }}" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="{{ route('show_dashboard') }}">
            <img src="{{ asset('backend/images/logo-02.png') }}" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Welcome back, <span class="text-black fw-bold">{{ Session::get('admin_name') }}</span>!</h1>
            <h3 class="welcome-sub-text">It's good to see you again.</h3>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item d-none d-lg-block">
            <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
              <input type="text" class="form-control">
            </div>
          </li>          
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="{{ asset('backend/images/usericon.png') }}" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <p class="mb-1 mt-3 font-weight-semibold" style="font-size:1rem">{{ Session::get('admin_name') }}</p>
              </div>
              <a class="dropdown-item" href="{{ route('view.admin') }}"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i>Change Password</a>
              <a class="dropdown-item btn-signout" href="{{ route('logout') }}"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('show_dashboard') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Contact Us</li>
          <?php
          $count_contact = DB::table('ContactUs')->where('ContactStatus', 'pending')->count();
          ?>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#contact" aria-expanded="false" aria-controls="contact">
              <i class="menu-icon mdi mdi-account-card-details"></i>
              <span class="menu-title">Contact <span class="badge badge-pill badge-danger">{{ $count_contact }}</span></span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="contact">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('all_contact_pending') }}">Pending<span class="badge badge-pill badge-danger" style="margin-left:2px">{{ $count_contact }}</span></a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('all_contact_processed') }}">Processed</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">pages</li>
          <?php
          if(Session::get('role') == 1){
          ?>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ad-auth" aria-expanded="false" aria-controls="ad-auth">
              <i class="menu-icon mdi mdi-account-star"></i>
              <span class="menu-title">Admin</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ad-auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('all_admin') }}">View Admin Acount</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('add_admin') }}">Add Admin Account</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">User</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('all_user') }}">User Management</a></li>
              </ul>
            </div>
          </li>
          <?php
          } else {
          ?>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">User</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('all_user') }}">User Management</a></li>
              </ul>
            </div>
          </li>
          <?php
          }
          ?>
          <li class="nav-item nav-category">Product</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#pizza" aria-expanded="false" aria-controls="pizza">
              <i class="menu-icon mdi mdi-pizza"></i>
              <span class="menu-title">Pizza</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="pizza">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('all_pizza') }}">View Pizza</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('add_pizza') }}">Add Pizza</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#side" aria-expanded="false" aria-controls="side">
              <i class="menu-icon mdi mdi-sausage"></i>
              <span class="menu-title">Supplement</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="side">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('all_supplement') }}">View Supplement</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('add_supplement') }}">Add Supplement</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Order Management</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#order" aria-expanded="false" aria-controls="order">
              <i class="menu-icon mdi mdi-truck-delivery"></i>
              <span class="menu-title">Order</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="order">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('all_order') }}">All Order</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Promotions & Blogs</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#promotion" aria-expanded="false" aria-controls="promotion">
              <i class="menu-icon mdi mdi-sale"></i>
              <span class="menu-title">Promotions</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="promotion">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('all_promotions') }}">View Promotions</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('add_promotions') }}">Add Promotions</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#blog" aria-expanded="false" aria-controls="blog">
              <i class="menu-icon mdi mdi-blogger"></i>
              <span class="menu-title">Blogs</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="blog">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('all_blog') }}">View Blogs</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('add_blog') }}">Add Blogs</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-panel">

      <div class="content-wrapper">
        @yield('content')
      </div>

      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"><a href="https://www.bootstrapdash.com/" target="_blank">Testo Pizza</a> from Testo Inc.</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2020. All rights reserved.</span>
        </div>
      </footer>
      <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('backend/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('backend/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('backend/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('backend/vendors/progressbar.js/progressbar.min.js') }}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('backend/js/off-canvas.js') }}"></script>
  <script src="{{ asset('backend/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('backend/js/template.js') }}"></script>
  <script src="{{ asset('backend/js/settings.js') }}"></script>
  <script src="{{ asset('backend/js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('backend/js/jquery.cookie.js') }}" type="text/javascript"></script>
  <script src="{{ asset('backend/js/dashboard.js') }}"></script>
  <script src="{{ asset('backend/js/Chart.roundedBarCharts.js') }}"></script>

  
  {{-- ALERT LOGOUT --}}
  <script>
    $("a.btn-signout").click(function(event) {

			event.preventDefault();
			Swal.fire({
				title: 'Are you sure to sign out?',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Sign out',
				cancelButtonText: 'Cancel'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = $(this).attr("href");
				}
			});
		});
  </script>

  @yield('scripts')
</body>

</html>

