@extends('admin.layouts.layout')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card p-3">
      <div class="card-header">
        <nav class="nav navbar-transparent bg-transparent shadow-none m-0">
          <div class="nav-item me-auto">
            <h5 class="font-weight-bolder mb-4 pt-2 nav-item">Filter Data</h5>
          </div>
        </nav>
      </div>
      <div class="card-body position-relative z-index-1 d-flex flex-column h-100">
        <div class="row">
          <div class="col-4">
            <label for="status_byr" class="form-label">Status Pembayaran</label>
            <input class="form-control" list="list_status_byr" id="status_byr" placeholder="Pilih Status Pembayaran">
            <datalist id="list_status_byr">
              <option value="RELEASED">
              <option value="APROVED">
              <option value="REJECTED">
              <option value="LET PAY">
            </datalist>
          </div>
          <div class="col-4">
            <label for="status_trx" class="form-label">Status Transaksi</label>
            <input class="form-control" list="list_status_trx" id="status_trx" placeholder="Pilih Status Transaksi">
            <datalist id="list_status_trx">
              <option value="RELEASED">
              <option value="APPROVED">
              <option value="REJECTED">
            </datalist>
          </div>
          <div class="col-4">
            <label for="metode_byr" class="form-label">Metode Pembayaran</label>
            <input class="form-control" list="list_metode_byr" id="metode_byr" placeholder="Pilih Metode Pembayaran">
            <datalist id="list_metode_byr">
              <option value="TRF BANK BRI"></option>
              <option value="TRF BANK BNI"></option>
              <option value="TRF BANK MANDIRI"></option>
              <option value="TRF BANK BCA"></option>
              <option value="TRF ALFAMART"></option>
              <option value="TRF INDOMART"></option>
            </datalist>
          </div>
          <div class="row mt-5">
            <div class="col-4">
              <button class="btn btn-success" type="button" id="btn_filter"><i class="fa-solid fa-arrows-rotate me-1"></i> Aplly Filter</button>
              <button class="btn btn-danger" type="button" id="btn_refresh"><i class="fa-solid fa-arrows-rotate me-1"></i> Refresh Filter</button>
            </div>
            <div class="col-4">
            </div>
            <div class="col-4">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row mt-3">
  <div class="col-lg-12">
    <div class="card p-3">
      <div class="card-header">
        <nav class="nav navbar-transparent bg-transparent shadow-none m-0">
          <div class="nav-item me-auto">
            <h5 class="font-weight-bolder mb-4 pt-2 nav-item">Daftar Pembayaran</h5>
          </div>
        </nav>
      </div>
      <div class="card-body position-relative z-index-1 d-flex flex-column h-100">
        <div class="table-responsive p-3">
          <table class="table mb-5" id="tbl_category">
            <thead>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode Bayar</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode Transaksi</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Metode</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu Bayar</th>
              <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Telat Bayar</th> -->
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Pembayaran</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Transaksi</th>
              <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Pemasangan</th> -->
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pelanggan</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
            </thead>
            <tbody>
              @foreach ($pembayaran as $data)
              <tr>
                <td class="align-middle text-sm ps-4">{{$data->kode_byr}}</td>
                <td class="align-middle text-sm ps-4">{{$data->kode_transaksi}}</td>
                <td class="align-middle text-sm ps-4">{{$data->metode_bayar}}</td>
                <td class="align-middle text-sm ps-4">
                  {{ $data->waktu_bayar  }}
                </td>
                <td class="align-middle text-sm ps-4">
                  <?php
                  $awal  = strtotime($data->waktu_bayar); // 2022-06-08 11:31:21
                  $akhir = strtotime($data->waktu_permohonan);

                  $diff  = $awal - $akhir;
                  $tgl = floor($diff / (60 * 60));
                  ?>


                  @if ($data->status_bayar == "RELEASED" OR $data->status_bayar == "WAITING VERIFICATION")
                  <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info text-white">
                    {{$data->status_bayar}}
                  </span>
                  @elseif ($data->status_bayar == "EXPIRED" OR $data->status_bayar == "REJECTED")
                  <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger text-white">
                    {{$data->status_bayar}}
                  </span>
                  @elseif($data->status_bayar == "APPROVED")
                  <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success text-white">
                    {{$data->status_bayar}}
                  </span>
                  @endif
                </td>
                <td class="align-middle text-sm ps-4">
                  @if ($data->status_transaksi == "RELEASED")
                  <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning text-white">
                    {{$data->status_transaksi}}
                  </span>
                  @elseif ($data->status_transaksi == "APPROVED")
                  <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info text-white">
                    {{$data->status_transaksi}}
                  </span>
                  @elseif ($data->status_transaksi == "REJECTED")
                  <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger text-white">
                    {{$data->status_transaksi}}
                  </span>
                  @elseif ($data->status_transaksi == "FINISH")
                  <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success text-white">
                    {{$data->status_transaksi}}
                  </span>
                  @endif
                </td>
                <td class="align-middle text-sm ps-4">{{$data->nama_pelanggan}}</td>
                <!-- <td class="align-middle text-sm ps-4">{{--$data->status_pemasangan--}}</td> -->
                <td class="align-middle text-sm text-center">
                  @if ($data->status_bayar == "WAITING VERIFICATION" AND $data->status_transaksi == "APPROVED")

                  <a href="#" class="text-capitalize btn_approved me-1" data-bs-toggle="modal" data-bs-target="#modalUpdate" id="{{$data->id}}" data-id="{{$data->id}}">
                    <i class="fa-solid fa-2x fa-square-check text-success"></i>
                  </a>
                  <a href="#" class="text-capitalize btn_rejected me-1" data-bs-toggle="modal" data-bs-target="#modalUpdate" id="{{$data->id}}" data-id="{{$data->id}}">
                    <i class="fa-solid fa-2x fa-rectangle-xmark text-danger"></i>
                  </a>
                  <a href="{{asset('buktiBayar').'/'.$data->bukti}}" class="text-capitalize me-1" download>
                    <i class="fa-solid fa-2x fa-eye text-primary"></i>
                    <!-- <i class="fa-solid fa-eye"></i> -->
                  </a>
                  @elseif ($data->status_transaksi == "REJECTED" OR $data->status_bayar == "EXPIRED" OR $data->status_bayar == "REJECTED")
                  @else
                  <a href="#" class="text-capitalize btn_rejected me-1" data-bs-toggle="modal" data-bs-target="#modalUpdate" id="{{$data->id}}" data-kode="{{$data->kode_transaksi}}" data-id="{{$data->id}}">
                    <i class="fa-solid fa-2x fa-rectangle-xmark text-danger me-1"></i>
                  </a>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('js/lib/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>

<script>
  let id;

  $(document).ready(function() {
    $('#btn_refresh').on('click', function() {
      valueStatus = document.getElementById('status_byr').value = "";
      valueStatusTrx = document.getElementById('status_trx').value = "";
      metode = document.getElementById('metode_byr').value = "";

      location.reload();
    })
    $('#btn_filter').on('click', function() {
      var valueStatus = document.getElementById('status_byr').value;
      var valueStatusTrx = document.getElementById('status_trx').value;
      var metode = document.getElementById('metode_byr').value;

      var table = $('#tbl_category').DataTable();
      table.search('').columns().search('').draw();

      if (valueStatus != null) {
        table.column(4).search(valueStatus).draw();
      }

      if (valueStatusTrx != null) {
        table.column(5).search(valueStatusTrx).draw();
      }

      if (metode != null) {
        table.column(2).search(metode).draw();
      }
    })

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('.btn_approved').on('click', function() {
      id = $(this).attr("id");
      swal({
        title: "APPROVED?",
        text: "Please ensure and then confirm!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        reverseButtons: !0
      }).then(function(ex) {
        if (ex.value === true) {
          $.ajax({
            url: "{{url('/admin/pembayaran/approved')}}",
            method: "POST",
            data: {
              id_bayar: id,
              status: "APPROVED",
            },
            success: function(result) {
              swal("Success!", "Pembayaran berhasil disetujui", "success").then((value) => {
                location.reload();
              });
            }
          })
        }
      })
    })

    $('.btn_rejected').on('click', function() {
      id = $(this).attr("id");
      kode_tr = $(this).attr("data-kode");

      // console.log(kode_tr)
      swal({
        title: "REJECTED?",
        text: "Please ensure and then confirm!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        reverseButtons: !0
      }).then(function(ex) {
        if (ex.value === true) {
          $.ajax({
            url: "{{url('/admin/pembayaran/approved')}}",
            method: "POST",
            data: {
              id_bayar: id,
              kode_tr: kode_tr,
              status: "REJECTED",

            },
            success: function(result) {
              console.log(result)
              swal("Success!", "Pembayaran berhasil dibatalkan", "success").then((value) => {
                location.reload();
              });
            }
          })
        }
      })
    })

    $('#tbl_category').DataTable({
      responsive: true,
      language: {
        oPaginate: {
          sNext: '<i class="fa fa-forward"></i>',
          sPrevious: '<i class="fa fa-backward"></i>',
          sFirst: '<i class="fa fa-step-backward"></i>',
          sLast: '<i class="fa fa-step-forward"></i>'
        }
      }
    });

  });
</script>