@extends('admin.layouts.layout')

@section('content')
<div class="row">
   <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
         <div class="card-body p-3">
            <div class="row">
               <div class="col-8">
                  <div class="numbers">
                     <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Pelanggan</p>
                     <h5 class="font-weight-bolder mb-0">
                        {{$countPelanggan}}
                        <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                     </h5>
                  </div>
               </div>
               <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                     <!-- <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i> -->
                     <i class="fa-solid fa-users"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
         <div class="card-body p-3">
            <div class="row">
               <div class="col-8">
                  <div class="numbers">
                     <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Transaksi</p>
                     <h5 class="font-weight-bolder mb-0">
                        {{$countTransaksi}}
                        <!-- <span class="text-success text-sm font-weight-bolder">+3%</span> -->
                     </h5>
                  </div>
               </div>
               <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                     <!-- <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i> -->
                     <!-- <i class="fa-regular fa-receipt"></i> -->
                     <i class="fa-solid fa-receipt"></i>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
         <div class="card-body p-3">
            <div class="row">
               <div class="col-8">
                  <div class="numbers">
                     <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Pembayaran</p>
                     <h5 class="font-weight-bolder mb-0">
                        {{$countPembayaran}}
                        <!-- <span class="text-danger text-sm font-weight-bolder">-2%</span> -->
                     </h5>
                  </div>
               </div>
               <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                     <!-- <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i> -->
                     <i class="fa-solid fa-money-bill-wave"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
         <div class="card-body p-3">
            <div class="row">
               <div class="col-8">
                  <div class="numbers">
                     <p class="text-sm mb-0 text-capitalize font-weight-bold">Categori Informasi</p>
                     <h5 class="font-weight-bolder mb-0">
                        {{$countCategory}}
                        <!-- <span class="text-danger text-sm font-weight-bolder">-2%</span> -->
                     </h5>
                  </div>
               </div>
               <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                     <!-- <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i> -->
                     <i class="fa-solid fa-braille"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row mt-4">
   <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
         <div class="card-body p-3">
            <div class="row">
               <div class="col-8">
                  <div class="numbers">
                     <p class="text-sm mb-0 text-capitalize font-weight-bold">Pelayanan PLN</p>
                     <h5 class="font-weight-bolder mb-0">
                        {{$countLayanan}}
                        <!-- <span class="text-danger text-sm font-weight-bolder">-2%</span> -->
                     </h5>
                  </div>
               </div>
               <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                     <!-- <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i> -->
                     <i class="fa-solid fa-bolt-lightning"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row mt-4">
   <div class="col-lg-12">
      <div class="card h-100 p-3">
         <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="">
            <span class="mask bg-gradient-dark"></span>
            <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
               <h5 class="text-white font-weight-bolder mb-4 pt-2">Hallo, Admin</h5>
               <p class="text-white">Selamat datang di dashboard PLN WEB UI</p>
               <p class="text-white">Dengan ini kamu dapat memantau atau menyetujui permohonan pelanggan baru PLN, kamu juga dapat memantau dengan mudah atau me mangement informasi-informasi seputar pelayanan listrik oleh PLN</p>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection