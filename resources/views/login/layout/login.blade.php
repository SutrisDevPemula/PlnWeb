<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PLN WEB UI</title>
  <!-- css file -->
  <link rel="stylesheet" href="{{ asset('them-asset/css/soft-ui-dashboard.css?v=1.0.3')}}" />
  <!-- font and icon -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link rel="stylesheet" href="{{ asset('them-asset/css/neucleo-icons.css') }}" />
  <link rel="stylesheet" href="{{ asset('them-asset/css/neucleo-svg.css') }}" />
  <!-- font awesome icons -->
  <script src="{{ asset('them-asset/myJsAwesome.js') }}" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('them-asset/css/neucleo-svg.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
  <style>
    /* show hide password */
    .field-icon {
      float: right;
      margin-left: -25px;
      margin-right: 20px;
      margin-top: -25px;
      position: relative;
      z-index: 3;
    }
  </style>
</head>

<body>

  <!-- navbar -->

  <!-- content -->
  <main class="main-content  mt-0">
    @yield('form-login')
  </main>

  <!-- footer -->
  <footer class="footer py-5">
    <div class="container">
      <!-- <div class="row">
        <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-dribbble"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-twitter"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-instagram"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-pinterest"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-github"></span>
          </a>
        </div>
      </div> -->
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> by Creative Tim Soft UI.
          </p>
        </div>
      </div>
    </div>
  </footer>

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