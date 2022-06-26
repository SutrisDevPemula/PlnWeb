@extends('users.layout.template')
@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url({{asset('conselor/images/pln_hero.jpg')}});" data-stellar-background-ratio="0.5">
   <div class="overlay"></div>
   <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
         <div class="col-md-9 ftco-animate mb-5 text-center">
            <p class="breadcrumbs mb-0"><span class="mr-2"><a href="{{url('/')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span class="mr-2">Pembayaran <i class="fa fa-chevron-right"></i></span></p>
            <!-- <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Pricing <i class="fa fa-chevron-right"></i></span></p> -->
            <h1 class="mb-0 bread">Transaksi Pembayaran</h1>
         </div>
      </div>
   </div>
</section>

<section class="ftco-section bg-light">
   <div class="container">
      @if(session('success'))
      <div class="alert" data-alert="{{session('success')}}"></div>
      @endif
      <form action="{{url('/postPembayaran')}}" method="POST" enctype="multipart/form-data">
         @csrf
         <input type="text" name="id_bayar" hidden id="id_bayar" class="form-control">
         <div class="row mt-3">
            <div class="col-md-2"></div>
            <div class="col-md-7">
               <small class="ml-2 text-danger"> Inputkan Kode Pembayaran atau Kode Transaksi untuk melakukan pembayaran</small>
               <input type="text" name="key" id="key" class="form-control" placeholder="Kode Pembayaran atau Kode Transaksi">
            </div>
            <div class="col-md-2 pt-4">
               <button type="button" class="btn btn-primary btn-cari form-control">Cari</button>
            </div>
         </div>
         <div class="row mt-2" id="data_pelanggan" style="display: none;">
            <div class="card">
               <div class="card-body">
                  <div class="card-title">
                     Data Ditemukan
                  </div>
                  <table class="table">
                     <thead>
                        <th>Jumlah Bayar</th>
                        <th>Kode Transaksi</th>
                        <th>Jenis Permohonan</th>
                        <th>Status Pembayaran</th>
                     </thead>
                     <tbody>
                        <tr>
                           <td id="jml_bayar"></td>
                           <td id="kode_transaksi"></td>
                           <td id="jenis_permohonan"></td>
                           <td id="status"></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="metode_pembayaran" id="pembayaran" style="display: none;">
            <div class="row mt-2">
               <div class="col-md-2">
                  <label for="metode_bayar">Metode Pembayaran</label>
               </div>
               <div class="col-md-7">
                  <select class="form-control" id="metode_bayar" name="metode_bayar">
                     <option value="">Pilih Metode Pembayaran</option>
                     <option value="TRF BANK BRI">TRF BANK BRI</option>
                     <option value="TRF BANK BNI">TRF BANK BNI</option>
                     <option value="TRF BANK MANDIRI">TRF BANK MANDIRI</option>
                     <option value="TRF BANK BCA">TRF BANK BCA</option>
                     <option value="TRF ALFAMART">TRF ALFAMART</option>
                     <option value="TRF INDOMART">TRF INDOMART</option>
                  </select>
               </div>
            </div>
            <div class="row mt-2">
               <div class="col-md-2">
                  <label for="bukti_bayar">Bukti Pembayaran</label>
               </div>
               <div class="col-md-4">
                  <small class="text-danger">File harus bertipe image ( jpeg, png, jpg ) </small>
                  <input type="file" class="form-control-file" id="bukti_bayar" name="bukti_bayar" placeholder="Upload Bukti Bayar">
               </div>
            </div>
            <div class="row mt-3">
               <div class="col-md-2"></div>
               <div class="col-md-2">
                  <button type="submit" class="btn btn-primary btn-sm" id="btn_upload">Simpan Pembayaran</button>
               </div>
            </div>
         </div>
      </form>
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
   function convertToRupiahByValue(angka) {
      var rupiah = '';
      var angkarev = angka.toString().split('').reverse().join('');
      var dataMinus = angkarev.replace("-", "").length;

      for (var i = 0; i < angkarev.length; i++) {
         if (i % 3 == 0) {
            var dataComa = angkarev.substr(i, 3) + ',';

            rupiah += dataComa;
         }
      }

      var result = "";

      if (dataMinus <= 3) {
         result = rupiah.split('', rupiah.length - 1).reverse().join('').replace(",", "");
      } else {
         result = rupiah.split('', rupiah.length - 1).reverse().join('')
      }

      return result;
   }

   $(document).ready(function() {

      const alert = $('.alert').data('alert');
      console.log(alert)

      if (alert) {
         swal("Success!", alert, "success")
      }

      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });


      $('.btn-cari').on('click', function() {

         let key = document.getElementById('key').value;

         console.log(key)
         $.ajax({
            url: "{{ url('/getPembayaran') }}/" + key,
            method: 'GET',
            dataType: 'json',
            success: function(result) {

               // console.log(result.nama)
               if (result.jml_bayar != null || result.kode_transaksi != null) {
                  $('#data_pelanggan').css("display", "block")
                  document.getElementById('jml_bayar').innerHTML = "Rp. " + convertToRupiahByValue(result.jml_bayar);
                  document.getElementById('kode_transaksi').innerHTML = result.kode_transaksi;
                  document.getElementById('jenis_permohonan').innerHTML = result.jenis_permohonan
                  document.getElementById('id_bayar').value = result.id_bayar;

                  if (result.status === "APPROVED") {
                     $("#btn_upload").css("display", "none")
                     $("#pembayaran").css("display", "none")
                     document.getElementById('status').innerHTML = `<span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success text-white">` + result.status + `</span>`
                  } else if (result.status === "REJECTED") {
                     $("#btn_upload").css("display", "none")
                     $("#pembayaran").css("display", "none")
                     document.getElementById('status').innerHTML = `<span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger text-white">` + result.status + `</span>`
                  } else if (result.status === "WAITING VERIFICATION") {
                     $("#btn_upload").css("display", "block")
                     $("#pembayaran").css("display", "block")
                     document.getElementById('status').innerHTML = `<span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info text-white">` + result.status + `</span>`
                  } else if (result.status === "RELEASED") {
                     $("#btn_upload").css("display", "block")
                     $("#pembayaran").css("display", "block")
                     document.getElementById('status').innerHTML = `<span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning text-white">` + result.status + `</span>`
                  }

               } else {
                  swal({
                     title: "Warning?",
                     text: "Kode Pembayaran atau Kode Transaksi tidak tersedia",
                     type: "warning",
                     showCancelButton: !0,
                     confirmButtonText: "Yes",
                     reverseButtons: !0
                  })
               }

            }
         })

      })
   });
</script>