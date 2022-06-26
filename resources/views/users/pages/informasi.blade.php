@extends('users.layout.template')
@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url({{asset('conselor/images/pln_hero.jpg')}});" data-stellar-background-ratio="0.5">
   <div class="overlay"></div>
   <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
         <div class="col-md-9 ftco-animate mb-5 text-center">
            <p class="breadcrumbs mb-0"><span class="mr-2"><a href="{{url('/')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Informasi & Berita <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread">Informasi & Berita</h1>
         </div>
      </div>
   </div>
</section>

<section class="ftco-section">
   <div class="container">
      <form action="{{url('/informasi')}}" method="GET">
         <div class="row mb-5">
            <div class="col-md-2"></div>
            <div class="col-md-7">
               <select class="form-control" id="category" name="category">
                  @if(isset($getCategory))
                  <option value="">{{$getCategory->category}}</option>
                  @endif
                  <option value="">All</option>
                  @foreach ($category as $category)
                  <option value="{{$category->id}}">{{$category->category}}</option>
                  @endforeach
               </select>
            </div>
            <div class="col-md-2"> <button type="submit" class="btn form-control btn-primary btn-cari">Cari</button></div>
         </div>
      </form>
      <div class="row d-flex justify-content-center">
         @foreach ($informasi as $informasi)
         <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry justify-content-end">
               <div class="text text-center">

                  <a href="{{url('/informasi/detail').'/'.$informasi->slug}}" class="block-20 img" style="background-image: url({{asset('informasi').'/'.$informasi->img}});">
                  </a>
                  <div class="meta text-center mb-2 d-flex align-items-center justify-content-center">
                     @php
                     $mounth = "";
                     if(substr($informasi->created_at, 5, 2) == "01") {
                     $mounth = "Januari";
                     }elseif(substr($informasi->created_at, 5, 2) == "02") {
                     $mounth = "Februari";
                     }
                     elseif(substr($informasi->created_at, 5, 2) == "03") {
                     $mounth = "Maret";
                     }
                     elseif(substr($informasi->created_at, 5, 2) == "04") {
                     $mounth = "April";
                     }
                     elseif(substr($informasi->created_at, 5, 2) == "05") {
                     $mounth = "Mei";
                     }
                     elseif(substr($informasi->created_at, 5, 2) == "06") {
                     $mounth = "Juni";
                     }
                     elseif(substr($informasi->created_at, 5, 2) == "07") {
                     $mounth = "Juli";
                     }
                     elseif(substr($informasi->created_at, 5, 2) == "08") {
                     $mounth = "Agustus";
                     }
                     elseif(substr($informasi->created_at, 5, 2) == "09") {
                     $mounth = "September";
                     }
                     elseif(substr($informasi->created_at, 5, 2) == "10") {
                     $mounth = "Oktober";
                     }
                     elseif(substr($informasi->created_at, 5, 2) == "11") {
                     $mounth = "November";
                     }
                     elseif(substr($informasi->created_at, 5, 2) == "12") {
                     $mounth = "Desember";
                     }
                     @endphp
                     <div>
                        <span class="day">{{substr($informasi->created_at, 8, 2)}}</span>
                        <span class="mos">{{$mounth}}</span>
                        <span class="yr">{{substr($informasi->created_at, 0, 4)}}</span>
                     </div>
                  </div>
                  <h3 class="heading mb-3"><a href="{{url('/informasi/detail/$informasi->slug')}}">{{$informasi->judul}}</a></h3>
                  <p>{{$informasi->slug}}</p>
               </div>
            </div>
         </div>
         @endforeach
      </div>
      <div class="row mt-5">
         <div class="col text-center">
            <div class="block-27">
               <ul>
                  {{$info->links()}}
                  <br>
                  <p>Showing {{$info->currentPage()}} of {{$info->lastPage()}} Pages</p>
               </ul>
            </div>
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