@extends('admin.layouts.layout')
@section('content')
<div class="row">
  <div class="col-lg-12 p-5">
    <a href="{{ url('/admin/daftar/informasi') }}" class="btn text-bold">Daftar Informasi</a>
    <a href="{{ url('/admin/informasi') }}" class="btn text-white btn-dark">Post Informasi</a>
    <div class="card p-3">
      <!-- <div class="card-header">kas</div> -->
      <div class="card-body">
        @if(session('success'))
        <div class="flash-data" data-flashdata="{{session('success')}}"></div>
        @endif
        <form action="{{url('/admin/informasi/post')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="category_list" class="form-label">Category</label>
            <select id="category_list" name="category" class="form-select" placeholder="Pilih Category">
              <!-- <option value="Select Data">Pilih Category Informasi</option> -->
              <option value=""></option>
              @foreach ($category as $data)
              <option value="{{$data->id}}">{{$data->category}}</option>
              @endforeach
              <!-- ... -->
              <!-- <option value="WY">Wyoming</option> -->
            </select>
          </div>
          <div class="mb-5">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>
          <div class="mb-5 ">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control-file" id="image" accept="image/*" name="image" onchange="loadFile(event)">
            <img id="output" class="rounded border-0" style="max-width: 400px; max-height: 300px;">
          </div>
          <div class="mb-3">
            <!-- <label for="desc" class="form-label">Desc</label> -->
            <textarea name="desc" class="my-editor form-control" id="my-editor" cols="50" rows="50"></textarea>
          </div>
          <button type="submit" class="btn btn-success btn-post"><i class="fa-brands fa-usps me-2"></i>Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
<!-- <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"> -->
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<!-- <script type="text/javascript"></script> -->
<script src="{{ asset('js/lib/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
<!-- <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('ckeditor/styles.js')}}"></script> -->
<script src="{{ asset('vendors/ckeditor/ckeditor/ckeditor.js') }}"></script>

<!-- <script src="//cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script> -->

<script>
  let id;
  $(document).ready(function() {
    CKEDITOR.replace('my-editor');
    CKEDITOR.config.height = 350;
    CKEDITOR.config.extraPlugins = 'autogrow';
    CKEDITOR.config.autoGrow_minHeight = 350;
    CKEDITOR.config.autoGrow_maxHeight = 600;
    CKEDITOR.config.uiColor = '#F5F5F5';

    $('#category_list').select2({
      placeholder: 'Pilih Category Informasi',
    });
    // console.log("1")

    $('#tbl_category').DataTable({
      responsive: true
    });

    const message = $('.flash-data').data('flashdata');
    // console.log(message)

    if (message) {
      swal("Success!", "Informasi Berhasil di Post", "success")
    }
  });
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>