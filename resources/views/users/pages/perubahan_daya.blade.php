@extends('users.layout.template')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url({{asset('conselor/images/pln_hero.jpg')}});" data-stellar-background-ratio="0.5">
   <div class="overlay"></div>
   <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
         <div class="col-md-9 ftco-animate mb-5 text-center">
            <p class="breadcrumbs mb-0"><span class="mr-2"><a href="{{url('/')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span class="mr-2">Perubahan Daya <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread">Permohonan Perubahan Daya</h1>
         </div>
      </div>
   </div>
</section>

<section class="ftco-section bg-light">
   <div class="container">
      @if(session('success'))
      <div class="alert" data-alert="{{session('success')}}"></div>
      @endif

      <form action="{{url('/postPerubahanDaya')}}" method="POST">
         @csrf
         <input type="text" name="id_pelanggan" hidden id="id_pelanggan" class="form-control">
         <div class="row mt-3">
            <div class="col-md-2">
               <!-- <label for="no_hp">No. HP</label> -->
            </div>
            <div class="col-md-7">
               <small class="ml-2 text-danger"> Inputkan No Hp untuk melanjutkan permohonan</small>
               <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Silahkan input no hp untuk mendapatkan data">
            </div>
            <div class="col-md-2 pt-4">
               <button type="button" class="btn btn-primary btn-cari form-control">Cari</button>
            </div>
         </div>
         <div class="data_permohonan" style="display: none;">
            <div class="row mt-2">
               <div class="col-md-2">
                  <label for="layanan">Produk Layanan <small class="text-danger">*</small></label>
               </div>
               <div class="col-md-7">
                  <select class="form-control" id="layanan" name="layanan">
                     <!-- <option>Pilih Layanan</option> -->
                     @foreach ($layanan as $layanan)
                     <option value="{{$layanan->id}}">{{$layanan->jenis_layanan}}</option>
                     @endforeach
                     <!-- <option>SIM</option> -->
                  </select>
               </div>
            </div>
            <div class="row mt-2">
               <div class="col-md-2">
                  <label for="daya">Daya <small class="text-danger">*</small></label>
               </div>
               <div class="col-md-7">
                  <select class="form-control" id="daya" name="daya">
                     <option value="">Pilih daya yang diinginkan</option>
                     @foreach ($daya as $daya)
                     <option value="{{$daya->id}}">{{$daya->jumlah_daya}}</option>
                     @endforeach
                     <!-- <option>SIM</option> -->
                  </select>
                  <!-- <input type="text" name="ppj" id="ppj" class="form-control" placeholder="Nama NPWP"> -->
               </div>
            </div>
            <div class="row mt-2">
               <div class="col-md-2">
                  <label for="layanan">Peruntukan <small class="text-danger">*</small></label>
               </div>
               <div class="col-md-7">
                  <select class="form-control" id="peruntukan" name="peruntukan">
                     <!-- <option>Pilih Layanan</option> -->

                     <option value="Rumah Tangga">Rumah Tangga</option>
                     <!-- <option>SIM</option> -->
                  </select>
               </div>
            </div>
            <div class="row mt-2">
               <div class="col-md-2">
                  <label for="waktu_instal">Waktu Instalasi</label>
               </div>
               <div class="col-md-7">
                  <input type="text" name="waktu_instal" id="waktu_instal" class="form-control">
                  <input type="text" hidden name="tot_bayar" id="tot_bayar" class="form-control">
               </div>
            </div>
            <div class="row mt-2">
               <div class="col-md-2">

               </div>
               <div class="col-md-7">
                  <button type="button" class="btn btn-primary btn-sm btn_hitung">Hitung Biaya</button>
               </div>
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
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Hp</th>
                     </thead>
                     <tbody>
                        <tr>
                           <td id="nama"></td>
                           <td id="alamat"></td>
                           <td id="nope"></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="row mt-5" id="biaya" style="display: none;">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-body">
                     <div class="card-title">Detail Biaya</div>
                     <!-- <h5>Detail Biaya</h5> -->
                     <br>
                     <table class="table  table-sm">
                        <tbody>
                           <tr>
                              <td>Biaya Pemasangan</td>
                              <td>:</td>
                              <td id="biaya_pasang">0</td>
                           </tr>
                           <tr>
                              <td>Biaya PPj</td>
                              <td>:</td>
                              <td id="ppj">0</td>
                           </tr>
                           <!-- <tr>
                              <td>Biaya SLO termasuk PPn</td>
                              <td>:</td>
                              <td id="slo">0</td>
                           </tr> -->
                           <tr>
                              <td></td>
                              <td>Total Biaya :</td>
                              <td id="total">0</td>
                           </tr>
                        </tbody>
                     </table>
                     <div class="mt-3">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan Permohonan</button>
                     </div>
                  </div>
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

         let nope = document.getElementById('no_hp').value

         console.log(nope)
         $.ajax({
            url: "{{ url('/pelanggan/detail') }}/" + nope,
            method: 'GET',
            dataType: 'json',
            success: function(result) {

               // console.log(result.nama)
               if (result.nama != null || result.kecamatan != null) {
                  $('.data_permohonan').css("display", "block")
                  $('#data_pelanggan').css("display", "block")

                  document.getElementById('id_pelanggan').value = result.id;
                  document.getElementById('nama').innerHTML = result.nama;
                  document.getElementById('alamat').innerHTML = "Kecamatan " + result.kecamatan + " Desa " + result.desa + " RT/RW " + result.rt + "/" + result.rw;
                  document.getElementById('nope').innerHTML = nope;
               } else {
                  swal({
                     title: "Warning?",
                     text: "Data tidak ditemukan atau belum terdaftar",
                     type: "warning",
                     showCancelButton: !0,
                     confirmButtonText: "Yes",
                     reverseButtons: !0
                  })
               }

            }
         })

      })

      $('.btn_hitung').on('click', function() {
         let daya = document.getElementById('daya').value
         let layanan = document.getElementById('layanan').value

         let nope = document.getElementById('no_hp').value

         console.log(daya)

         if (daya == "" || layanan == "" || nope == "") {
            swal({
               title: "Warning?",
               text: "Data dengan tanda (*) tidak boleh kosong !",
               type: "warning",
               showCancelButton: !0,
               confirmButtonText: "Yes",
               reverseButtons: !0
            })
         } else {
            $('#biaya').css("display", "block")
            $.ajax({
               url: "{{url('/getLayanan')}}",
               method: "POST",
               dataType: 'json',
               data: {
                  layanan: layanan,
                  daya: daya
               },
               success: function(result) {
                  document.getElementById('biaya_pasang').innerHTML = "Rp. " + convertToRupiahByValue(parseInt(result.tarif / 2))
                  document.getElementById('ppj').innerHTML = "Rp. " + convertToRupiahByValue(result.ppj)
                  // document.getElementById('slo').innerHTML = "Rp. " + convertToRupiahByValue(result.slo)
                  document.getElementById('total').innerHTML = "Rp. " + convertToRupiahByValue(parseInt(result.tarif / 2) + parseInt(result.ppj))
                  document.getElementById('tot_bayar').value = (parseInt(result.tarif / 2) + parseInt(result.ppj))

               }
            })
         }

      })
   });
</script>