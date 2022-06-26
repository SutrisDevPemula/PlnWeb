@extends('admin.layouts.layout')

@section('content')
<div class="row">

  @if(session('success'))
  <div class="alert" data-alert="{{session('success')}}"></div>
  @endif

  <div class="col-lg-12">
    <div class="card p-3">
      <div class="card-header">
        <nav class="nav navbar-transparent bg-transparent shadow-none m-0">
          <div class="nav-item me-auto">
            <h5 class="font-weight-bolder mb-4 pt-2 nav-item">Daftar Categori Informasi</h5>
          </div>
          <div class="nav-item" style="margin-left: 0.3em;">
            <button type="button" class="btn btn-success btn-sm btn-rounded text-capitalize" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Insert
            </button>
          </div>

        </nav>
      </div>
      <div class="card-body position-relative z-index-1 d-flex flex-column h-100">
        <div class="table-responsive p-3">
          <table class="table mb-3" id="tbl_category">
            <thead>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
            </thead>
            <tbody>
              @foreach ($category as $data)
              <tr>
                <td class="align-middle text-sm ps-4">{{$data->category}}</td>
                <td class="align-middle text-sm ps-4">{{$data->description}}</td>
                <td class="align-middle text-sm text-center">
                  <a href="" class="text-capitalize btn_update" data-bs-toggle="modal" data-bs-target="#modalUpdate" id="{{$data->id}}" data-id="{{$data->id}}">
                    <i class="fa-solid fa-2x fa-square-pen text-info me-1"></i>
                  </a>
                  <a href="#" class="btn_delete" id="{{$data->id}}" data-id="{{$data->id}}">
                    <i class="fa-solid fa-2x fa-eraser text-danger"></i>
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


<!-- modal insert data -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Category</h5>
        <button type="button" class="btn btn-link" data-bs-dismiss="modal" aria-label="Close">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
          </svg>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('admin/master/category/save')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="category" class="form-label">Nama Category</label>
            <input class="form-control" type="text" name="category" id="category" multiple>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Keterangan / Deskripsi</label>
            <textarea class="form-control" name="description" placeholder="Sisipkan keterangan untuk kategori diatas" id="description" style="height: 100px"></textarea>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- modal update data -->
<div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="modalUpdate" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalUpdate">Update Category Information</h5>
        <button type="button" class="btn btn-link" data-bs-dismiss="modal" aria-label="Close">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
          </svg>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('/admin/master/category/update')}}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="category" class="form-label">Nama Category</label>
            <input class="form-control" hidden type="text" name="categoryId" id="id_category" multiple>
            <input class="form-control" type="text" name="category" id="category_result">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Keterangan / Deskripsi</label>
            <textarea class="form-control" name="description" placeholder="Sisipkan keterangan untuk kategori diatas" id="description_result" style="height: 100px"></textarea>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Simpan</button>
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
    // console.log("1")

    $('.btn_delete').on('click', function() {
      id = $(this).attr("id");
      console.log(id)
      $('.spinner-border').show();

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
            url: "{{ url('/admin/master/category/delete') }}",
            method: 'POST',
            data: {
              id: id,
            },
            // dataType: 'json',
            success: function(detail) {
              // spinner.hide();
              swal("Success!", "Data berhasil diubah", "success").then((value) => {
                location.reload();
              });
            }
          })
        }
      });
    })

    $('.btn_update').on('click', function() {
      id_category = $(this).attr("id");
      console.log(id)
      $('.spinner-border').show();

      $.ajax({
        url: "{{ url('/admin/master/category/update') }}/" + id_category,
        method: 'GET',
        dataType: 'json',
        success: function(result) {
          document.getElementById('id_category').value = result.id;
          document.getElementById('category_result').value = result.category;
          document.getElementById('description_result').value = result.description;
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