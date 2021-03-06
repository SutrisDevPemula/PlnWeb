<!DOCTYPE html>
<html lang="en">

<head>
   <title>Pln Web Ui</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/9/97/Logo_PLN.png" type="image/x-icon">

   <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

   <link rel="stylesheet" href="{{ asset ('conselor/css/animate.css') }}">

   <link rel="stylesheet" href="{{ asset ('conselor/css/owl.carousel.min.css') }}">
   <link rel="stylesheet" href="{{ asset ('conselor/css/owl.theme.default.min.css') }}">
   <link rel="stylesheet" href="{{ asset ('conselor/css/magnific-popup.css') }}">

   <link rel="stylesheet" href="{{ asset ('conselor/css/flaticon.css') }}">
   <link rel="stylesheet" href="{{ asset ('conselor/css/style.css') }}">

   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


   <script>
      window.Laravel = `{!! json_encode(['csrfToken' => csrf_token()]) !!}`;
   </script>
</head>

<body>

   @include('users.layout.navbar')

   <!-- content -->
   @yield('content')
   <!-- end content -->

   <footer class="ftco-footer">
      <!-- <div class="container">
      <div class="row mb-5">
         <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4">
               <h2 class="ftco-heading-2 logo"><a href="#">Counselor</a></h2>
               <p>Far far away, behind the word mountains, far from the countries.</p>
               <ul class="ftco-footer-social list-unstyled mt-2">
                  <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
               </ul>
            </div>
         </div>
         <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
               <h2 class="ftco-heading-2">Explore</h2>
               <ul class="list-unstyled">
                  <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>About</a></li>
                  <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Contact</a></li>
                  <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>What We Do</a></li>
                  <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Plans &amp; Pricing</a></li>
               </ul>
            </div>
         </div>
         <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
               <h2 class="ftco-heading-2">Legal</h2>
               <ul class="list-unstyled">
                  <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Join us</a></li>
                  <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Blog</a></li>
                  <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Privacy &amp; Policy</a></li>
                  <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Term &amp; Conditions</a></li>
               </ul>
            </div>
         </div>
         <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4">
               <h2 class="ftco-heading-2">Company</h2>
               <ul class="list-unstyled">
                  <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>About Us</a></li>
                  <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Blog</a></li>
                  <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Contact</a></li>
                  <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Careers</a></li>
               </ul>
            </div>
         </div>
         <div class="col-sm-12 col-md">
            <div class="ftco-footer-widget mb-4">
               <h2 class="ftco-heading-2">Have a Questions?</h2>
               <div class="block-23 mb-3">
                  <ul>
                     <li><span class="icon fa fa-map marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                     <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                     <li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span class="text">info@yourdomain.com</span></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div> -->
      <div class="container-fluid px-0 py-5 bg-black">
         <div class="container">
            <div class="row">
               <div class="col-md-12">

                  <p class="mb-0" style="color: rgba(255,255,255,.5);">
                     <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                     Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                     </script> All rights reserved | This template is made with <i class="fa fa-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                     <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  </p>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <!-- loader -->
   <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
         <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
         <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
      </svg>
   </div>

   <script src="{{ asset ('conselor/js/jquery.min.js') }}"></script>
   <script src="{{ asset ('conselor/js/jquery-migrate-3.0.1.min.js') }}"></script>
   <script src="{{ asset ('conselor/js/popper.min.js') }}"></script>
   <script src="{{ asset ('conselor/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset ('conselor/js/jquery.easing.1.3.js') }}"></script>
   <script src="{{ asset ('conselor/js/jquery.waypoints.min.js') }}"></script>
   <script src="{{ asset ('conselor/js/jquery.stellar.min.js') }}"></script>
   <script src="{{ asset ('conselor/js/owl.carousel.min.js') }}"></script>
   <script src="{{ asset ('conselor/js/jquery.magnific-popup.min.js') }}"></script>
   <script src="{{ asset ('conselor/js/jquery.animateNumber.min.js') }}"></script>
   <script src="{{ asset ('conselor/js/scrollax.min.js') }}"></script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
   <script src="{{ asset ('conselor/js/google-map.js') }}"></script>
   <script src="{{ asset ('conselor/js/main.js') }}"></script>


</body>

</html>