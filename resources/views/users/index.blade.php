@extends('users.layout.template')
@section('content')

<div class="hero-wrap" style="background-image: url({{asset('conselor/images/pln-4_169.jpeg')}});" data-stellar-background-ratio="0.5">
   <div class="overlay"></div>
   <div class="container">
      <div class="row no-gutters slider-text align-items-center">
         <div class="col-md-6 ftco-animate d-flex align-items-end">
            <div class="text w-100">
               <h1 class="mb-4">Perusahaan Listrik Negara (PLN)</h1>
               <p class="mb-4">Penyedia layanan listrik untuk Negeri</p>
               <!-- <p><a href="#" class="btn btn-primary py-3 px-4">Contact us</a> <a href="#" class="btn btn-white py-3 px-4">Read more</a></p> -->
            </div>
         </div>
         <!-- <a href="https://vimeo.com/45830194" class="img-video popup-vimeo d-flex align-items-center justify-content-center">
               <span class="fa fa-play"></span>
            </a> -->
      </div>
   </div>
</div>

<section class="ftco-intro">
   <div class="container">
      <div class="row no-gutters">
         <div class="col-md-4 d-flex">
            <div class="intro aside-stretch d-lg-flex w-100">
               <div class="icon">
                  <!-- <span class="flaticon-checklist"></span> -->
               </div>
               <div class="text">
                  <h2>Penyambungan Baru</h2>
                  <p>Layanan permohonan penyambungan baru listrik secara online yang cepat, mudah, nyaman, dan aman serta dapat dimonitor prosesnya</p>
               </div>
            </div>
         </div>
         <div class="col-md-4 d-flex">
            <div class="intro color-1 d-lg-flex w-100">
               <div class="icon">
                  <!-- <span class="flaticon-employee"></span> -->
               </div>
               <div class="text">
                  <h2>Perubahan Daya</h2>
                  <p>Layanan permohonan perubahan daya listrik secara online yang cepat, mudah, nyaman, dan aman serta dapat dimonitor prosesnya</p>
               </div>
            </div>
         </div>
         <!-- <div class="col-md-4 d-flex">
            <div class="intro color-2 d-lg-flex w-100">
               <div class="icon">
               </div>
               <div class="text">
                  <h2>Penyambungan Sementara</h2>
                  <p>Layanan permohonan penyambungan listrik sementara secara online yang cepat, mudah, nyaman, dan aman serta dapat dimonitor prosesnya</p>
               </div>
            </div>
         </div> -->
      </div>
   </div>
</section>

<section class="ftco-section">
   <div class="container">
      <h3 class="mb-3 text-center">Kami Terus Berkembang</h3>
      <hr class="bg-success">
      <br>
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
   </div>
</section>


<!-- <section class="ftco-section testimony-section">
   <div class="img img-bg border" style="background-image: url(images/bg_4.jpg);"></div>
   <div class="overlay"></div>
   <div class="container">
      <div class="row justify-content-center mb-5">
         <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <span class="subheading">Testimonial</span>
            <h2 class="mb-3">Happy Clients</h2>
         </div>
      </div>
      <div class="row ftco-animate">
         <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
               <div class="item">
                  <div class="testimony-wrap py-4">
                     <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
                     <div class="text">
                        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <div class="d-flex align-items-center">
                           <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                           <div class="pl-3">
                              <p class="name">Roger Scott</p>
                              <span class="position">Marketing Manager</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <div class="testimony-wrap py-4">
                     <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
                     <div class="text">
                        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <div class="d-flex align-items-center">
                           <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                           <div class="pl-3">
                              <p class="name">Roger Scott</p>
                              <span class="position">Marketing Manager</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <div class="testimony-wrap py-4">
                     <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
                     <div class="text">
                        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <div class="d-flex align-items-center">
                           <div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
                           <div class="pl-3">
                              <p class="name">Roger Scott</p>
                              <span class="position">Marketing Manager</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <div class="testimony-wrap py-4">
                     <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
                     <div class="text">
                        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <div class="d-flex align-items-center">
                           <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                           <div class="pl-3">
                              <p class="name">Roger Scott</p>
                              <span class="position">Marketing Manager</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <div class="testimony-wrap py-4">
                     <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
                     <div class="text">
                        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <div class="d-flex align-items-center">
                           <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                           <div class="pl-3">
                              <p class="name">Roger Scott</p>
                              <span class="position">Marketing Manager</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> -->


<!-- <section class="ftco-section bg-light">
   <div class="container">
      <div class="row justify-content-center pb-5 mb-3">
         <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Price &amp; Plans</span>
            <h2>Affordable Packages</h2>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 ftco-animate d-flex">
            <div class="block-7 w-100">
               <div class="text-center">
                  <span class="price"><sup>$</sup> <span class="number">49</span> <sub>/mo</sub></span>
                  <span class="excerpt d-block">For Adults</span>
                  <ul class="pricing-text mb-5">
                     <li><span class="fa fa-check mr-2"></span>Individual Counseling</li>
                     <li><span class="fa fa-check mr-2"></span>Couples Therapy</li>
                     <li><span class="fa fa-check mr-2"></span>Family Therapy</li>
                  </ul>

                  <a href="#" class="btn btn-primary d-block px-2 py-3">Get Started</a>
               </div>
            </div>
         </div>
         <div class="col-md-4 ftco-animate d-flex">
            <div class="block-7 w-100">
               <div class="text-center">
                  <span class="price"><sup>$</sup> <span class="number">79</span> <sub>/mo</sub></span>
                  <span class="excerpt d-block">For Children</span>
                  <ul class="pricing-text mb-5">
                     <li><span class="fa fa-check mr-2"></span>Counseling for Children</li>
                     <li><span class="fa fa-check mr-2"></span>Behavioral Management</li>
                     <li><span class="fa fa-check mr-2"></span>Educational Counseling</li>
                  </ul>

                  <a href="#" class="btn btn-primary d-block px-2 py-3">Get Started</a>
               </div>
            </div>
         </div>
         <div class="col-md-4 ftco-animate d-flex">
            <div class="block-7 w-100">
               <div class="text-center">
                  <span class="price"><sup>$</sup> <span class="number">109</span> <sub>/mo</sub></span>
                  <span class="excerpt d-block">For Business</span>
                  <ul class="pricing-text mb-5">
                     <li><span class="fa fa-check mr-2"></span>Consultancy Services</li>
                     <li><span class="fa fa-check mr-2"></span>Employee Counseling</li>
                     <li><span class="fa fa-check mr-2"></span>Psychological Assessment</li>
                  </ul>

                  <a href="#" class="btn btn-primary d-block px-2 py-3">Get Started</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> -->

<!-- <section class="ftco-appointment ftco-section img" style="background-image: url(images/bg_2.jpg);">
   <div class="overlay"></div>
   <div class="container">
      <div class="row">
         <div class="col-md-6 half ftco-animate">
            <h2 class="mb-4">Send a Message &amp; Get in touch!</h2>
            <form action="#" class="appointment">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Name">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <div class="form-field">
                           <div class="select-wrap">
                              <div class="icon"><span class="fa fa-chevron-down"></span></div>
                              <select name="" id="" class="form-control">
                                 <option value="">Services</option>
                                 <option value="">Relation Problem</option>
                                 <option value="">Couple Counseling</option>
                                 <option value="">Depression Treatment</option>
                                 <option value="">Family Problem</option>
                                 <option value="">Personal Problem</option>
                                 <option value="">Business Problem</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="submit" value="Send message" class="btn btn-primary py-3 px-4">
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</section> -->

<!-- <section class="ftco-section">
   <div class="container">
      <div class="row justify-content-center mb-5">
         <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Blog</span>
            <h2>Recent Blog</h2>
         </div>
      </div>
      <div class="row d-flex">
         <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry justify-content-end">
               <div class="text text-center">
                  <a href="blog-single.html" class="block-20 img" style="background-image: url('images/image_1.jpg');">
                  </a>
                  <div class="meta text-center mb-2 d-flex align-items-center justify-content-center">
                     <div>
                        <span class="day">18</span>
                        <span class="mos">April</span>
                        <span class="yr">2020</span>
                     </div>
                  </div>
                  <h3 class="heading mb-3"><a href="#">Social Media Risks To Mental Health</a></h3>
                  <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
               </div>
            </div>
         </div>
         <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry justify-content-end">
               <div class="text text-center">
                  <a href="blog-single.html" class="block-20 img" style="background-image: url('images/image_2.jpg');">
                  </a>
                  <div class="meta text-center mb-2 d-flex align-items-center justify-content-center">
                     <div>
                        <span class="day">18</span>
                        <span class="mos">April</span>
                        <span class="yr">2020</span>
                     </div>
                  </div>
                  <h3 class="heading mb-3"><a href="#">Social Media Risks To Mental Health</a></h3>
                  <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
               </div>
            </div>
         </div>
         <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry justify-content-end">
               <div class="text text-center">
                  <a href="blog-single.html" class="block-20 img" style="background-image: url('images/image_3.jpg');">
                  </a>
                  <div class="meta text-center mb-2 d-flex align-items-center justify-content-center">
                     <div>
                        <span class="day">18</span>
                        <span class="mos">April</span>
                        <span class="yr">2020</span>
                     </div>
                  </div>
                  <h3 class="heading mb-3"><a href="#">Social Media Risks To Mental Health</a mb-3></h3>
                  <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> -->



@endsection