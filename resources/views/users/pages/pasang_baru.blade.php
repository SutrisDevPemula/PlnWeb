@extends('users.layout.template')
@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url({{asset('conselor/images/pln_hero.jpg')}});" data-stellar-background-ratio="0.5">
   <div class="overlay"></div>
   <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
         <div class="col-md-9 ftco-animate mb-5 text-center">
            <p class="breadcrumbs mb-0"><span class="mr-2"><a href="{{url('/')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span class="mr-2">Pemasangan Baru <i class="fa fa-chevron-right"></i></span></p>
            <!-- <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Pricing <i class="fa fa-chevron-right"></i></span></p> -->
            <h1 class="mb-0 bread">Pelanggan Baru / Pasang Baru</h1>
         </div>
      </div>
   </div>
</section>

<section class="ftco-section bg-light">
   <form action="{{url('/daftar_pemasangan_baru')}}" method="POST">
      @csrf
      <div class="container">

         @if(session('success'))
         <div class="alert" data-alert="{{session('success')}}"></div>
         @endif

         <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
               <!-- <h2>Affordable Packages</h2> -->
               <span>Data pemohon</span>
            </div>
         </div>
         <div class="row">
            <div class="col-md-2">
               <label for="nama_pelanggan">Nama <small class="text-danger">*</small></label>
            </div>
            <div class="col-md-7">
               <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control">
            </div>
         </div>
         <div class="row mt-2">
            <div class="col-md-2">
               <label for="kec">Kecamatan <small class="text-danger">*</small></label>
            </div>
            <div class="col-md-7">
               <input type="text" name="kec" id="kec" class="form-control">
            </div>
         </div>
         <div class="row mt-2">
            <div class="col-md-2">
               <label for="desa">Desa <small class="text-danger">*</small></label>
            </div>
            <div class="col-md-7">
               <input type="text" name="desa" id="desa" class="form-control">
            </div>
         </div>
         <div class="row mt-2">
            <div class="col-md-2">
               <label for="alamat">Alamat <small class="text-danger">*</small></label>
            </div>
            <div class="col-md-7">
               <input type="text" name="alamat" id="alamat" class="form-control">
            </div>
         </div>
         <div class="row mt-2">
            <div class="col-md-2">
               <label for="rt">RT <small class="text-danger">*</small></label>
            </div>
            <div class="col-md-2">
               <input type="text" name="rt" id="rt" class="form-control">
            </div>
            <div class="col-md-1">
               <label for="rw">RW <small class="text-danger">*</small></label>
            </div>
            <div class="col-md-2">
               <input type="text" name="rw" id="rw" class="form-control">
            </div>
            <div class="col-md-2">
               <label for="no_rmh">No rumah</label>
            </div>
            <div class="col-md-3">
               <input type="text" name="no_rmh" id="no_rmh" class="form-control">
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-2">
               <label for="no_hp">No. HP <small class="text-danger">*</small></label>
            </div>
            <div class="col-md-7">
               <input type="text" name="no_hp" id="no_hp" class="form-control">
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-2">
               <label for="no_telp">No. Telp</label>
            </div>
            <div class="col-md-7">
               <input type="text" name="no_telp" id="no_telp" class="form-control">
            </div>
         </div>
         <div class="row mt-2">
            <div class="col-md-2">
               <label for="email">Email <small class="text-danger">*</small></label>
            </div>
            <div class="col-md-7">
               <input type="text" name="email" id="email" class="form-control">
            </div>
         </div>
         <div class="row mt-2">
            <div class="col-md-2">
               <label for="identitas">Identitas <small class="text-danger">*</small></label>
            </div>
            <div class="col-md-3">
               <select class="form-control" id="jenis_identitas" name="jenis_identitas">
                  <option value="KTP">KTP</option>
                  <option value="SIM">SIM</option>
                  <!-- <option>SIM</option> -->
               </select>
            </div>
            <div class="col-md-7">
               <input type="text" name="no_identitas" id="no_identitas" class="form-control">
            </div>
         </div>
         <div class="row mt-2">
            <div class="col-md-2">
               <label for="npwp">NPWP</label>
            </div>
            <div class="col-md-5">
               <input type="text" name="no_npwp" id="npwp" class="form-control" placeholder="No NPWP">
            </div>
            <div class="col-md-5">
               <input type="text" name="nama_npwp" id="nama_npwp" class="form-control" placeholder="Nama NPWP" value="">
            </div>
         </div>
         <div class="row justify-content-center pb-5 mt-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
               <!-- <h2>Affordable Packages</h2> -->
               <span>Data permohonan</span>
            </div>
         </div>
         <div class="row mt-3">
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
               <label for="waktu_instal">Waktu Instalasi</label>
            </div>
            <div class="col-md-7">
               <input type="text" name="waktu_instal" id="waktu_instal" class="form-control">
               <input type="text" name="tot_bayar" hidden id="tot_bayar" class="form-control">
            </div>
         </div>
         <div class="row mt-2">
            <div class="col-md-2">

            </div>
            <div class="col-md-7">
               <button type="button" class="btn btn-primary btn-sm btn_hitung">Hitung Biaya</button>
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
                           <tr>
                              <td>Biaya SLO termasuk PPn</td>
                              <td>:</td>
                              <td id="slo">0</td>
                           </tr>
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
      </div>
   </form>
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


      $('.btn_hitung').on('click', function() {
         let daya = document.getElementById('daya').value
         let layanan = document.getElementById('layanan').value
         let nama = document.getElementById('nama_pelanggan').value
         let kec = document.getElementById('kec').value
         let desa = document.getElementById('desa').value
         let alamat = document.getElementById('alamat').value
         let nope = document.getElementById('no_hp').value
         let email = document.getElementById('email').value
         // let jenis_identitas = document.getElementById('jenis_identitas').value
         let no_identitas = document.getElementById('no_identitas').value

         console.log(daya)

         if (nama == "" || daya == "" || layanan == "" || kec == "" || desa == "" || alamat == "" || nope == "" || email == "" || no_identitas == "") {
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
                  document.getElementById('biaya_pasang').innerHTML = "Rp. " + convertToRupiahByValue(result.tarif)
                  document.getElementById('ppj').innerHTML = "Rp. " + convertToRupiahByValue(result.ppj)
                  document.getElementById('slo').innerHTML = "Rp. " + convertToRupiahByValue(result.slo)
                  document.getElementById('total').innerHTML = "Rp. " + convertToRupiahByValue(parseInt(result.tarif) + parseInt(result.ppj) + parseInt(result.slo))
                  document.getElementById('tot_bayar').value = (parseInt(result.tarif) + parseInt(result.ppj) + parseInt(result.slo))

               }
            })
         }

      })
   });
</script>