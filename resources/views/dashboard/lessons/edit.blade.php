@extends('dashboard.base')

@section('css')

  <link href="{{ asset('css/brand.min.css') }}" rel="stylesheet">

@endsection;


@section('content')

  <div class="container-fluid">
    <div class="fade-in">
      <div class="card" style="max-width: 65%; margin: auto;">
        <div class="card-header">Edit Lesson</div>
        <form action="/content/lessons/{{ $lesson->lesson_id }}" id="editClientForm" method="POST"
          enctype="multipart/form-data">
          <div class="card-body">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Series Picture</label>
              <input type="file" name="video_file" id="fileU" style="visibility:hidden">
              <video width="400" style="margin:auto; display:block; margin-bottom:5px;" controls>
                <source src="/{{ str_replace('public', 'storage', $lesson->video_file) }}" id="video_here">
                Your browser does not support HTML5 video.
              </video>
              <button class="btn btn-lg btn-danger"
                onclick="event.preventDefault();document.getElementById('fileU').click();" style="width: 100%"> Choose
                File ... </button>
            </div>
            <div class="form-group">
              <label>Title (English)</label>
              <input class="form-control" id="nf-name" name="title_english" value="{{ $lesson->title_english }}" required>
            </div>
            <div class="form-group">
              <label>Title (French)</label>
              <input class="form-control" id="nf-name" name="title_frensh" value="{{ $lesson->title_frensh }}" required>
            </div>
            <div class="form-group">
              <label>Description (English)</label>
              <input class="form-control" name="description_english" value="{{ $lesson->description_english }}" required>
            </div>
            <div class="form-group">
              <label>Description (French)</label>
              <input class="form-control" name="description_frensh" value="{{ $lesson->description_frensh }}" required>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-lg btn-success" style="width: 100%"> Save Changes </button>
            <button class="btn btn-lg btn-danger" onclick="document.getElementById('removeClientForm').submit();"
              style="width: 100%; margin-top:12px;"> Remove Lesson </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <form action="/administration/clients/{{ $lesson->lesson_id }}" id="removeClientForm" method="POST">
    @csrf
    @method('DELETE')
  </form>
@endsection


@section('javascript')

  <script>
    $(document).on("change", "#fileU", function(evt) {
      var $source = $('#video_here');
      $source[0].src = URL.createObjectURL(this.files[0]);
      $source.parent()[0].load();
    });

  </script>
@endsection
