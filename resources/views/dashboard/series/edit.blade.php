@extends('dashboard.base')

@section('css')

  <link href="{{ asset('css/brand.min.css') }}" rel="stylesheet">

@endsection;


@section('content')

  <div class="container-fluid">
    <div class="fade-in">
      <div class="card" style="max-width: 65%; margin: auto;">
        <div class="card-header">Edit Series</div>
        <form action="/content/series/{{ $series->serie_id }}" id="editClientForm" method="POST"
          enctype="multipart/form-data">
          <div class="card-body">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Series Picture</label>
              <input type="file" name="picture" id="fileU" style="visibility:hidden" onchange="readURL(this)">
              <img id="blah" src="/{{ str_replace('public', 'storage', $series->picture) }}" alt="your image"
                style="width:100%; max-height: 270px; margin-bottom: 3px; border-radius: 5px" />
              <button class="btn btn-lg btn-danger"
                onclick="event.preventDefault();document.getElementById('fileU').click();" style="width: 100%"> Choose
                File ... </button>
            </div>
            <div class="form-group">
              <label>Title (English)</label>
              <input class="form-control" id="nf-name" name="title_english" value="{{ $series->title_english }}" required>
            </div>
            <div class="form-group">
              <label>Title (French)</label>
              <input class="form-control" id="nf-name" name="title_frensh" value="{{ $series->title_frensh }}" required>
            </div>
            <div class="form-group">
              <label>Description (English)</label>
              <input class="form-control" name="description_english" value="{{ $series->description_english }}" required>
            </div>
            <div class="form-group">
              <label>Description (French)</label>
              <input class="form-control" name="description_frensh" value="{{ $series->description_frensh }}" required>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-lg btn-success" style="width: 100%"> Save Changes </button>
            <button class="btn btn-lg btn-danger" onclick="document.getElementById('removeClientForm').submit();"
              style="width: 100%; margin-top:12px;"> Remove Series </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <form action="/content/series/{{ $series->serie_id }}" id="removeClientForm" method="POST">
    @csrf
    @method('DELETE')
  </form>
@endsection


@section('javascript')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
