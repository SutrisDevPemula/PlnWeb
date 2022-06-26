@extends('admin.layouts.layout')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <a href="{{ url('/admin/daftar/informasi') }}" class="btn text-white btn-dark">Daftar Informasi</a>
    <a href="{{ url('/admin/informasi') }}" class="btn text-bold">Post Informasi</a>
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
            <label for="status_byr" class="form-label">Catgory Informasi</label>
            <input class="form-control" list="list_status_byr" id="status_byr" placeholder="Pilih Catgory">
            <datalist id="list_status_byr">
              @foreach ($category as $category)
              <option value="{{$category->category}}" />
              @endforeach
            </datalist>
          </div>
          <!-- <div class="col-4">
            <label for="status_trx" class="form-label">Status Transaksi</label>
            <input class="form-control" list="list_status_trx" id="status_trx" placeholder="Pilih Status Transaksi">
            <datalist id="list_status_trx">
              <option value="RELEASED">
              <option value="APPROVED">
              <option value="REJECTED">
            </datalist>
          </div> -->
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
            <h5 class="font-weight-bolder mb-4 pt-2 nav-item">Daftar Informasi</h5>
          </div>
        </nav>
      </div>
      <div class="card-body position-relative z-index-1 d-flex flex-column h-100">
        <div class="table-responsive p-3">
          <table class="table mb-5" id="tbl_category">
            <thead>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Slug</th>
              <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th> -->
              <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Telat Bayar</th> -->
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Post</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- <a href="#" class="btn_delete" id="1" data-id="1">
  <i class="fa-solid fa-2x fa-eraser text-danger"></i>
</a> -->
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('js/lib/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>

<script>
  let id;

  // function DeleteData() {
  //   const id = $(this).value;
  //   // let id = document.getElementById('id_data').value;
  //   console.log("data " + id)
  // }
  $(document).ready(function() {
    $('#btn_refresh').on('click', function() {
      valueStatus = document.getElementById('status_byr').value = "";
      // valueStatusTrx = document.getElementById('status_trx').value = "";
      // metode = document.getElementById('metode_byr').value = "";

      location.reload();
    })
    $('#btn_filter').on('click', function() {
      var valueStatus = document.getElementById('status_byr').value;
      // var valueStatusTrx = document.getElementById('status_trx').value;
      // var metode = document.getElementById('metode_byr').value;

      var table = $('#tbl_category').DataTable();
      table.search('').columns().search('').draw();

      if (valueStatus != null) {
        table.column(1).search(valueStatus).draw();
      }

      // if (valueStatusTrx != null) {
      //   table.column(5).search(valueStatusTrx).draw();
      // }

      // if (metode != null) {
      //   table.column(2).search(metode).draw();
      // }
    })


    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#tbl_category').DataTable({
      processing: true,
      serverSide: true,
      // responsive: true,
      language: {
        oPaginate: {
          sNext: '<i class="fa fa-angle-right"></i>',
          sPrevious: '<i class="fa fa-angle-left"></i>',
          sFirst: '<i class="fa fa-step-backward"></i>',
          sLast: '<i class="fa fa-step-forward"></i>'
        }
      },
      ajax: "{{url('/getDataPost')}}",
      columns: [{
          className: 'align-middle text-sm ps-4',
          data: 'judul'
        },
        {
          className: 'align-middle text-sm ps-4',
          data: 'category'
        },
        {
          className: 'align-middle text-sm ps-4',
          data: 'slug'
        },
        {
          className: 'align-middle text-sm ps-4',
          data: 'tanggal'
        },
        {
          className: 'align-middle text-sm text-center',
          data: 'aksi'
        }
      ]
    });

    $('#tbl_category').on('click', 'a', function() {
      const id_delete = $(this).data('id_delete');
      const id_update = $(this).data('id_update');

      if (id_delete != undefined) {
        console.log("delete " + id_delete)
        swal({
          title: "Warning?",
          text: "Apa anda yakin akan menghapus informasi ini ?",
          type: "warning",
          showCancelButton: !0,
          confirmButtonText: "Yes",
          reverseButtons: !0
        }).then(function(ex) {
          if (ex.value === true) {
            $.ajax({
              url: "{{url('/actionInformasi')}}",
              method: 'post',
              data: {
                id_delete: id_delete,
                status_acton: 'delete'
              },
              success: function(result) {
                swal("Success!", "Informasi berhasil dihapus", "success").then((value) => {
                  location.reload();
                });
              }
            });
          }
        });
      }
      // console.log("data " + id)
    });

  });
</script>