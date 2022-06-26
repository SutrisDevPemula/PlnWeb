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
            <label for="jns_permohonan" class="form-label">Jenis Permohonan</label>
            <input class="form-control" list="list_jns_permohonan" id="jns_permohonan" placeholder="Pilih Jenis Permohonan">
            <datalist id="list_jns_permohonan">
              <option value="Pasang Baru">
              <option value="Ubah Daya">
            </datalist>
          </div>
          <div class="col-4">
            <label for="jns_layanan" class="form-label">Jenis Layanan</label>
            <input class="form-control" list="list_jns_layanan" id="jns_layanan" placeholder="Pilih Jenis Layanan">
            <datalist id="list_jns_layanan">
              <option value="Pasca Bayar">
              <option value="Pra Bayar">
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
            <h5 class="font-weight-bolder mb-4 pt-2 nav-item">Daftar Transaksi Pelanggan</h5>
          </div>

        </nav>
      </div>
      <div class="card-body position-relative z-index-1 d-flex flex-column h-100">
        <div class="table-responsive pb-3">
          <table class="table mb-5" id="tbl_category">
            <thead>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pemohon</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Permohonan</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Layanan</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Peruntukkan</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Transaksi</th>
              <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Pemasangan</th> -->
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengajuan Daya</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
            </thead>
            <tbody>
              @foreach ($transaksi as $data)
              <tr>
                <td class="align-middle text-sm ps-4">{{$data->nama}}</td>
                <td class="align-middle text-sm ps-4">{{$data->jenis_permohonan}}</td>
                <td class="align-middle text-sm ps-4">{{$data->jenis_layanan}}</td>
                <td class="align-middle text-sm ps-4">{{$data->peruntukan}}</td>
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
                <!-- <td class="align-middle text-sm ps-4">{{$data->status_pemasangan}}</td> -->
                <td class="align-middle text-sm ps-4">{{$data->jumlah_daya}}</td>
                <td class="align-middle text-sm text-center">
                  <a href="" class="text-capitalize btn_review" data-bs-toggle="modal" data-bs-target="#modalUpdate" id="{{$data->id}}" data-id="{{$data->id}}">
                    <!-- <i class="fa-solid fa-2x fa-eye text-info"></i> -->
                    <i class="fa-brands fa-2x fa-searchengin text-info"></i>
                  </a>
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

<div class="spinner-border" hidden role="status">
  <span class="visually-hidden">Loading...</span>
</div>

<!-- modal update data -->
<div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="modalUpdate" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <small id="status_transaksi"></small>
        <h5 class="modal-title" id="modalUpdate">Detail Transaksi / Permohonan </h5>
        <button type="button" class="btn btn-link" data-bs-dismiss="modal" aria-label="Close">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
          </svg>
        </button>
      </div>
      <div class="modal-body p-3">
        <input type="text" id="id_transaksi" hidden>
        <div class="mt-3 mb-2">
          <b>Detail Data Pemohon</b>
          <hr>
        </div>
        <div class="table-responsive">
          <table class="table table-striped mb-3">
            <thead>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pemohon</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Identitas</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Telp Pemohon</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Hp Pemohon</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kecamatan</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Desa</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RT / RW</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Rumah</th>
            </thead>
            <tbody>
              <td class="align-middle text-sm ps-4" id="nama"></td>
              <td class="align-middle text-sm ps-4" id="identitas"></td>
              <td class="align-middle text-sm ps-4" id="telp"></td>
              <td class="align-middle text-sm ps-4" id="hp"></td>
              <td class="align-middle text-sm ps-4" id="kecamatan"></td>
              <td class="align-middle text-sm ps-4" id="desa"></td>
              <td class="align-middle text-sm ps-4" id="rt_rw"></td>
              <td class="align-middle text-sm ps-4" id="no_rumah"></td>
            </tbody>
          </table>
        </div>

        <div class="mt-3 mb-2">
          <b>Detail Data Permohonan</b>
          <hr>
        </div>
        <div class="table-responsive">
          <table class="table table-striped mb-3">
            <thead>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Permohoanan</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Layanan</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Peruntukan</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengajuan Daya</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu Instalasi</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Permohonan</th>
            </thead>
            <tbody>
              <td class="align-middle text-sm ps-4" id="jenis_permohonan"></td>
              <td class="align-middle text-sm ps-4" id="jenis_layanan"></td>
              <td class="align-middle text-sm ps-4" id="peruntukan"></td>
              <td class="align-middle text-sm ps-4" id="daya"></td>
              <td class="align-middle text-sm ps-4" id="instalasi"></td>
              <td class="align-middle text-sm ps-4" id="tgl_permohonan"></td>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info btn-setujui">
          <i class="fa-solid fa-check me-2"></i>
          Approved
        </button>
        <button type="submit" class="btn btn-success btn-selesai">
          <i class="fa-solid fa-check me-2"></i>
          Finish
        </button>
        <button type="submit" class="btn btn-danger btn-tolak">
          <i class="fa-solid fa-xmark me-2"></i>
          Rejected
        </button>
        <button type="submit" class="btn btn-secondary btn-cetak">
          <i class="fa-solid fa-print me-2"></i>
          Cetak Invoice
        </button>
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
      valueStatusTrx = document.getElementById('status_trx').value = "";
      valueJenisLayanan = document.getElementById('jns_layanan').value = "";
      valueJenisPermohonan = document.getElementById('jns_permohonan').value = "";

      location.reload();
    })
    $('#btn_filter').on('click', function() {
      valueStatusTrx = document.getElementById('status_trx').value;
      valueJenisLayanan = document.getElementById('jns_layanan').value;
      valueJenisPermohonan = document.getElementById('jns_permohonan').value;

      var table = $('#tbl_category').DataTable();
      table.search('').columns().search('').draw();

      if (valueJenisPermohonan != null) {
        table.column(1).search(valueJenisPermohonan).draw();
      }

      if (valueJenisLayanan != null) {
        table.column(2).search(valueJenisLayanan).draw();
      }

      if (valueStatusTrx != null) {
        table.column(4).search(valueStatusTrx).draw();
      }

    })

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('.btn-setujui').on('click', function() {
      let id_transaksi = document.getElementById('id_transaksi').value;

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
            url: "{{url('/admin/transaksi/update')}}",
            method: "POST",
            data: {
              id_transaksi: id_transaksi,
              status: "APPROVED",
            },
            success: function(result) {
              swal("Success!", "Permohonan berhasil Disetujui", "success").then((value) => {
                location.reload();
              });
            }
          })
        }
      })
    })

    $('.btn-selesai').on('click', function() {
      let id_transaksi = document.getElementById('id_transaksi').value;
      swal({
        title: "FINISH?",
        text: "Please ensure and then confirm!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        reverseButtons: !0
      }).then(function(ex) {
        if (ex.value === true) {
          $.ajax({
            url: "{{url('/admin/transaksi/update')}}",
            method: "POST",
            data: {
              id_transaksi: id_transaksi,
              status: "FINISH",
            },
            success: function(result) {
              swal("Success!", "Permohonan berhasil Disetujui", "success").then((value) => {
                location.reload();
              });
            }
          })
        }
      })
    })

    $('.btn-tolak').on('click', function() {
      let id_transaksi = document.getElementById('id_transaksi').value;
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
            url: "{{url('/admin/transaksi/update')}}",
            method: "POST",
            data: {
              id_transaksi: id_transaksi,
              status: "REJECTED",
            },
            success: function(result) {
              swal("Success!", "Permohonan berhasil Ditolak", "success").then((value) => {
                location.reload();
              });
            }
          })
        }
      })

    })

    $('.btn-cetak').on('click', function() {
      let id_transaksi = document.getElementById('id_transaksi').value;

      $.ajax({
        url: "{{url('/admin/transaksi/struk')}}/ " + id_transaksi,
        method: "GET",
        success: function(result) {
          swal("Success!", "Struk Sedang di Cetak", "success").then((value) => {
            location.reload();
          });
        }
      })
    })

    $('.btn_review').on('click', function() {
      id_category = $(this).attr("id");
      $('.spinner-border').show();

      $.ajax({
        url: "{{ url('/admin/transaksi/detail') }}/" + id_category,
        method: 'GET',
        dataType: 'json',
        success: function(result) {
          document.getElementById('nama').innerHTML = result.nama;
          document.getElementById('identitas').innerHTML = result.identitas + "-" + result.no_identitas;
          document.getElementById('telp').innerHTML = result.telp;
          document.getElementById('hp').innerHTML = result.hp;
          document.getElementById('kecamatan').innerHTML = result.kecamatan;
          document.getElementById('desa').innerHTML = result.desa;
          document.getElementById('rt_rw').innerHTML = result.rt + "/" + result.rw;
          document.getElementById('no_rumah').innerHTML = result.no_rumah;

          // data transaksi
          document.getElementById('id_transaksi').value = result.id;
          document.getElementById('jenis_permohonan').innerHTML = result.jenis_permohonan;
          document.getElementById('jenis_layanan').innerHTML = result.jenis_layanan;
          document.getElementById('peruntukan').innerHTML = result.peruntukan;
          document.getElementById('daya').innerHTML = result.daya + " VA";
          document.getElementById('tgl_permohonan').innerHTML = result.tgl_permohonan;
          document.getElementById('instalasi').innerHTML = result.instalasi;
          if (result.status_transaksi == "RELEASED") {
            document.getElementById('status_transaksi').classList.add("bg-warning")
            document.getElementById('status_transaksi').classList.add("rounded-pill")
            document.getElementById('status_transaksi').classList.add("p-2")
            document.getElementById('status_transaksi').classList.add("text-white")
            $(".btn-cetak").css("display", "none");
          } else if (result.status_transaksi == "APPROVED") {
            document.getElementById('status_transaksi').classList.add("bg-info")
            document.getElementById('status_transaksi').classList.add("rounded-pill")
            document.getElementById('status_transaksi').classList.add("p-2")
            document.getElementById('status_transaksi').classList.add("text-white")
            $(".btn-tolak").css("display", "none");
            $(".btn-setujui").css("display", "none");
            $(".btn-cetak").css("display", "on");
          } else if (result.status_transaksi == "FINISH") {
            document.getElementById('status_transaksi').classList.add("bg-success")
            document.getElementById('status_transaksi').classList.add("rounded-pill")
            document.getElementById('status_transaksi').classList.add("p-2")
            document.getElementById('status_transaksi').classList.add("text-white")
            $(".btn-tolak").css("display", "none");
            $(".btn-setujui").css("display", "none");
            $(".btn-selesai").css("display", "none");
            $(".btn-cetak").css("display", "on");
          } else if (result.status_transaksi == "REJECTED") {
            document.getElementById('status_transaksi').classList.add("bg-danger")
            document.getElementById('status_transaksi').classList.add("rounded-pill")
            document.getElementById('status_transaksi').classList.add("p-2")
            document.getElementById('status_transaksi').classList.add("text-white")
            $(".btn-tolak").css("display", "none");
            $(".btn-setujui").css("display", "none");
            $(".btn-cetak").css("display", "none");
          }
          document.getElementById('status_transaksi').innerHTML = result.status_transaksi;

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