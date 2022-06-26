@extends('login.layout.login')
@section('form-login')
<section>
  <div class="page-header min-vh-75">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
          <div class="card card-plain mt-8">
            <div class="card-header pb-0 text-left bg-transparent">
              <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
              <p class="mb-0">Enter your email and password to sign in</p>
            </div>
            <div class="card-body">
              <form role="form" action="{{url('/admin/sign_in')}}" method="POST">
                @csrf
                <label>Email</label>
                <div class="mb-3">
                  <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" aria-label="Email" aria-describedby="email-addon" autofocus required value="{{old('email')}}">
                  <!-- -->
                </div>
                <label>Password</label>
                <div class="mb-3">
                  <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" required>
                  <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <!-- <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                  <label class="form-check-label" for="rememberMe">Remember me</label>
                </div> -->
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                </div>
              </form>
              @if(session('status'))
              <div class="mt-3 fst-italic text-danger" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="body_1" width="18" height="18">
                  <g transform="matrix(1.3333334 0 0 1.3333334 0 0)">
                    <image x="0" y="0" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAD2SURBVDhPYxjc4LW1H+8rh1AeKJc08MLNjfudg889EAaxocLEg7cOPs1Azf9B+K2jbxNUmDjw1s5f9p29z9f33mH/QRhoyPf3DgEKUGnC4L2Dz2qQzT9WrgRjEPu9o+8qqDR+8M7B1wao4R/YgHVrwBjEBhvi4OMAVYYd/GdoYAIqPAPTgG4AEF/4HxrKDFWOCYC2pyMp/v8xJQeMkcXeOXqnQZWjgreennxABc+RFX+uqP3/ubwG1QAHn1fAABWAakMAYCDVoSn8/yk9//+ntDwUMRB+b+9dC9WGAEDn+7y39zkJVAAKA5wYrMbRxwuqbegDBgYAAInJBvMGMOgAAAAASUVORK5CYII=" width="12" height="12" />
                  </g>
                </svg>
                <small>{{session('status')}}</small>
              </div>
              @endif

            </div>
            <!-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
              <p class="mb-4 text-sm mx-auto">
                Don't have an account?
                <a href="javascript:;" class="text-info text-gradient font-weight-bold">Sign up</a>
              </p>
            </div> -->
          </div>
        </div>
        <!-- -->
      </div>
    </div>
  </div>
</section>
@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<!-- <script src="{{ asset('js/lib/jquery.min.js') }}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
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