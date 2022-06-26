<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>PLN WEB UI</title>
  <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/9/97/Logo_PLN.png" type="image/x-icon">
  <!-- css file -->
  <link rel="stylesheet" href="{{ asset('them-asset/css/soft-ui-dashboard.css?v=1.0.3')}}" />
  <!-- font and icon -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- icon` -->

  <link rel="stylesheet" href="{{ asset('css/all.css') }}" />
  <!-- Nucleo Icons -->
  <!-- <link rel="stylesheet" href="{{ asset('them-asset/css/neucleo-icons.css') }}" />
  <link rel="stylesheet" href="{{ asset('them-asset/css/neucleo-svg.css') }}" /> -->
  <!-- font awesome icons -->
  <!-- http://localhost/listrikWeb/public/them-asset/img/logo-ct.png -->
  <script src="{{ asset('them-asset/myJsAwesome.js') }}" crossorigin="anonymous"></script>
  <!-- <link rel="stylesheet" href="{{ asset('them-asset/css/neucleo-svg.css') }}" /> -->
  <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" /> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

  <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script> -->
  <!-- <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.js"></script> -->

  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" /> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script> -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <!-- <script src="{{ asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script> -->

  <script>
    window.Laravel = `{!! json_encode(['csrfToken' => csrf_token()]) !!}`;
  </script>
</head>


<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{ url('/admin') }}">
        <img src="https://upload.wikimedia.org/wikipedia/commons/9/97/Logo_PLN.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">PLN WEB UI</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">

    <!-- menu sidebar -->
    @include('admin.layouts.sidebar')
    <!-- end menu sidebar -->

  </aside>

  <!-- content and navbar -->
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">

    <!-- Navbar -->
    @include('admin.layouts.navbar')
    <!-- End Navbar -->

    <div class="container-fluid py-4">

      <!-- content -->
      @yield('content')
      <!-- end content -->

      <!-- footer -->
      @include('admin.layouts.footer')
      <!-- end footer -->
    </div>

  </main>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

  <!--   Core JS Files   -->
  <script src="{{asset('them-asset/js/core/popper.min.js')}}"></script>
  <script src="{{asset('them-asset/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('them-asset/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('them-asset/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <!-- <script src="{{asset('them-asset/')}}js/plugins/chartjs.min.js"></script> -->
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('them-asset/js/soft-ui-dashboard.min.js?v=1.0.3')}}"></script>

</body>

</html>