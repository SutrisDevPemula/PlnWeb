@extends('login.layout.login')
@section('form-login')
<section class="min-vh-100 mb-8">
  <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('{{ asset('conselor/images/pln-4_169.jpeg') }}');">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 text-center mx-auto">
          <h1 class="text-white mb-2 mt-5">Welcome!</h1>
          <!-- <p class="text-lead text-white">Silahkan buat akun baru anda untuk dapat menggunakan semua fitur yang ada pada aplikasi diabtes checker ini.</p> -->
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row mt-lg-n10 mt-md-n11 mt-n10">
      <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
        <div class="card z-index-0">
          <div class="card-header text-center pt-4">
            <h5>Buat Akun Baru</h5>
          </div>
          <div class="card-body">
            <form action="{{url('/admin/create_account')}}" method="POST" role="form text-left">
              @csrf
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="name" name="name" aria-label="Name">
              </div>
              <div class="mb-3">
                <input type="text" class="form-control" placeholder="No Telp" name="no_telp" aria-label="no">
              </div>
              <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email">
              </div>
              <div class="mb-3">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
              </div>
              <div class="form-check form-check-info text-left">
                <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                <label class="form-check-label" for="flexCheckDefault"> -->
                <!-- I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a> -->
                <!-- </label> -->
              </div>
              <div class="text-center">
                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                <a href="{{url('/admin')}}" class="btn btn-danger w-100">BACK to home</a>
              </div>
              <!-- <p class="text-sm mt-3 mb-0">Already have an account? <a href="javascript:;" class="text-dark font-weight-bolder">Sign in</a></p> -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<!-- <script type="text/javascript"></script> -->
<script src="{{ asset('js/lib/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
<!-- <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('ckeditor/styles.js')}}"></script> -->
<script src="{{ asset('vendors/ckeditor/ckeditor/ckeditor.js') }}"></script>
<script>
  $(function() {
    $(".toggle-password").click(function() {
      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
  })
</script>