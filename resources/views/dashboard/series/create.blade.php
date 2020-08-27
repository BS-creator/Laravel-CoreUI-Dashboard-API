@extends('dashboard.base')

@section('css')

  <link href="{{ asset('css/brand.min.css') }}" rel="stylesheet">

@endsection;


@section('content')

  <div class="container-fluid">
    <div class="fade-in">
      <div class="card" style="max-width: 65%; margin: auto;">
        <div class="card-header">Add Series</div>
        <form action="{{ route('series.store') }}" id="addClientForm" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            @csrf
            <div class="form-group">
              <label>Series Picture</label>
              <input type="file" required name="picture" id="fileU" style="visibility:hidden" onchange="readURL(this)">
              <img id="blah" src="/assets/img/preview.png" alt="your image"
                style="width:100%; max-height: 270px; margin-bottom: 3px; border-radius: 5px" />
              <button class="btn btn-lg btn-danger"
                onclick="event.preventDefault();document.getElementById('fileU').click();" style="width: 100%"> Choose
                File ... </button>
            </div>
            <div class="form-group">
              <label>Title (English)</label>
              <input class="form-control" required name="title_english">
            </div>
            <div class="form-group">
              <label>Title (French)</label>
              <input class="form-control" required name="title_frensh">
            </div>
            <div class="form-group">
              <label>Description (English)</label>
              <input class="form-control" required name="description_english">
            </div>
            <div class="form-group">
              <label>Description (French)</label>
              <input class="form-control" required name="description_frensh">
            </div>
            <input type="hidden" required name="display_order" value="100000">
          </div>
          <div class="card-footer">
            <button class="btn btn-lg btn-success" style="width: 100%"> Create Series </button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('javascript')

  <script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }

  </script>
@endsection
