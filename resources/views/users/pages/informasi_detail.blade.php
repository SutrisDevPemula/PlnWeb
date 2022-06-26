@extends('users.layout.template')
@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url({{asset('conselor/images/pln_hero.jpg')}});" data-stellar-background-ratio="0.5">
   <div class="overlay"></div>
   <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
         <div class="col-md-9 ftco-animate mb-5 text-center">
            <p class="breadcrumbs mb-0"><span class="mr-2"><a href="{{url('/')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span class="mr-2"><a href="{{url('/informasi')}}">Informasi & Berita <i class="fa fa-chevron-right"></i></a></span> <span class="mr-2">Detail <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread">Informasi & Berita</h1>
         </div>
      </div>
   </div>
</section>

<section class="ftco-section ftco-degree-bg">
   <div class="container">
      <div class="row">
         @if ($informasi)
         <div class="col-lg-8 ftco-animate">
            <p>
            <h3 class="text-bold" style="font-weight: bold;">{{$informasi->judul}}</h3>
            </p>
            <div><span class="fa fa-calendar"></span> {{date_format($informasi->created_at, "d-M-Y")}} </div>

            <p>
               <img src="{{asset('informasi').'/'.$informasi->img}}" alt="" class="img-fluid">
            </p>
            <p>@php
               print_r($informasi->description)
               @endphp
            </p>
         </div> <!-- .col-md-8 -->
         @endif

         <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
            <!-- <div class="sidebar-box">
               <form action="#" class="search-form">
                  <div class="form-group">
                     <span class="fa fa-search"></span>
                     <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                  </div>
               </form>
            </div> -->
            <div class="sidebar-box ftco-animate">
               <div class="categories">
                  <h3>Category Information</h3>
                  @foreach ($category as $category)
                  <li><a href="{{url('/informasi/detaill').'/'.$category->id}}">{{$category->category}} <span class="fa fa-chevron-right"></span></a></li>
                  @endforeach
               </div>
            </div>

            <div class="sidebar-box ftco-animate">
               <h3>Baca Juga</h3>
               @foreach ($splashInfo as $recent)
               <div class="block-21 mb-4 d-flex">
                  <a href="{{url('/informasi/detail').'/'.$recent->slug}}" class="blog-img mr-4" style="background-image: url({{asset('informasi').'/'.$recent->img}});"></a>
                  <div class="text">
                     <h3 class="heading"><a href="{{url('/informasi/detail').'/'.$recent->slug}}">{{$recent->judul}}</a></h3>
                     <div class="meta">
                        <div><a href="{{url('/informasi/detail').'/'.$recent->slug}}"><span class="fa fa-calendar"></span> {{date_format($informasi->created_at, "d-M-Y")}}</a></div>
                        <div><a href="{{url('/informasi/detail').'/'.$recent->slug}}"><span class="fa fa-user"></span> Admin</a></div>
                        <!-- <div><a href="#"><span class="fa fa-comment"></span> 19</a></div> -->
                     </div>
                  </div>
               </div>
               @endforeach
            </div>

         </div>
      </div>
</section>


@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('js/lib/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>

<script>
   $(document).ready(function() {

   });
</script>