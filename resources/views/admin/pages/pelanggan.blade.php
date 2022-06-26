@extends('admin.layouts.layout')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card p-3">
      <div class="card-header">
        <nav class="nav navbar-transparent bg-transparent shadow-none m-0">
          <div class="nav-item me-auto">
            <h5 class="font-weight-bolder mb-4 pt-2 nav-item">Daftar Pelanggan</h5>
          </div>
          <!-- <div class="nav-item">
            <button type="button" class="btn btn-success btn-sm btn-rounded text-capitalize" data-bs-toggle="modal" data-bs-target="#modal1">
              Insert
            </button>
          </div> -->
          <!-- <div class="nav-item" style="margin-left: 0.3em;">
            <button type="button" class="btn btn-success btn-sm btn-rounded text-capitalize" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Insert
            </button>
          </div> -->
          <!-- <div class="nav-item" style="margin-left: 0.3em;">
            <form action="" method="POST" name="_methodDeleteAll">
              @csrf
              <input type="hidden" value="DELETEALL" name="_methodDeleteAll">
              <button type="submit" class="btn btn-danger btn-sm btn-rounded text-capitalize">Clear</button>
            </form>
          </div> -->
        </nav>
        <!-- <small>Dataset diperoleh dari <a href="https://www.kaggle.com/uciml/pima-indians-diabetes-database" class="fst-italic text-decoration-underline" target="_blank">kaggle.com pima indian diabetes</a></small> -->
      </div>
      <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
        <div class="table-responsive p-3">
          <table class="table mb-5" id="tbl_category">
            <thead>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No telp</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Hp</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Identitas</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NPWP</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
            </thead>
            <tbody>
              @foreach ($pelanggan as $data)
              <tr>
                <td class="align-middle text-sm ps-4">{{$data->nama}}</td>
                <td class="align-middle text-sm ps-4">{{$data->email}}</td>
                <td class="align-middle text-sm ps-4">{{$data->no_telp}}</td>
                <td class="align-middle text-sm ps-4">{{$data->no_hp}}</td>
                <td class="align-middle text-sm ps-4">{{"Kecamatan : " . $data->kecamatan . ", RT/RW : " . $data->rt . "/" . $data->rw}}</td>
                <td class="align-middle text-sm ps-4">{{strtoupper($data->jenis_identitas). "-" . $data->no_identitas}}</td>
                <td class="align-middle text-sm ps-4">{{$data->no_npwp. "-" . strtoupper($data->nama_npwp)}}</td>
                <td class="align-middle text-sm text-center">
                  <a href="" class="text-capitalize btn_update" data-bs-toggle="modal" data-bs-target="#modalUpdate" id="{{$data->id}}" data-id="{{$data->id}}">
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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalUpdate">Detail Alamat Pelanggan</h5>
        <button type="button" class="btn btn-link" data-bs-dismiss="modal" aria-label="Close">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
          </svg>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input class="form-control" type="text" name="nama" id="nama" readonly>
          </div>
          <div class="mb-3">
            <label for="kecamatan" class="form-label">Kecamatan</label>
            <input class="form-control" type="text" name="kecamatan" id="kecamatan" readonly>
          </div>
          <div class="mb-3">
            <label for="desa" class="form-label">Desa</label>
            <input class="form-control" type="text" name="desa" id="desa" readonly>
          </div>
          <div class="mb-3">
            <label for="rt" class="form-label">RT/RW</label>
            <input class="form-control" type="text" name="rt" id="rt" readonly>
          </div>
          <div class="mb-3">
            <label for="no_rumah" class="form-label">No rumah</label>
            <input class="form-control" type="text" name="no_rumah" id="no_rumah" readonly>
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Tambahan</label>
            <textarea class="form-control" name="alamat" id="alamat" style="height: 100px" readonly></textarea>
          </div>
          <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
<!-- <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<!-- <script type="text/javascript"></script> -->
<script src="{{ asset('js/lib/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>


<script>
  let id;
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    // console.log("1")

    $('.btn_update').on('click', function() {
      id_category = $(this).attr("id");
      console.log(id)
      $('.spinner-border').show();

      $.ajax({
        url: "{{ url('/admin/pelanggan/detail') }}/" + id_category,
        method: 'GET',
        dataType: 'json',
        success: function(result) {
          document.getElementById('nama').value = result.nama;
          document.getElementById('kecamatan').value = result.kecamatan;
          document.getElementById('desa').value = result.desa;
          document.getElementById('rt').value = result.rt + "/" + result.rw;
          document.getElementById('no_rumah').value = result.no_rumah;
          document.getElementById('alamat').value = result.alamat;

          // console.log("data" + result.category);
          // console.log("data" + result.id);
          // console.log("data" + result.description);
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