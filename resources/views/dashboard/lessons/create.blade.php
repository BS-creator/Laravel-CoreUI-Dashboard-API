@extends('dashboard.base')

@section('css')

  <link href="{{ asset('css/brand.min.css') }}" rel="stylesheet">

@endsection;


@section('content')

  <div class="container-fluid">
    <div class="fade-in">
      <div class="card" style="max-width: 65%; margin: auto;">
        <div class="card-header">Add Lesson</div>
        <form action="{{ route('lessons.store') }}" id="addClientForm" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            @csrf
            <div class="form-group">
              <label>Series Picture</label>
              <input type="file" required name="video_file" id="fileU" style="visibility:hidden">
              <video width="400" style="margin:auto; display:block; margin-bottom:5px;" controls>
                <source src="mov_bbb.mp4" id="video_here">
                Your browser does not support HTML5 video.
              </video>
              <button class="btn btn-lg btn-danger"
                onclick="event.preventDefault();document.getElementById('fileU').click();" style="width: 100%"> Choose
                File ... </button>
            </div>
            <div class="form-group">
              <label>Title (English)</label>
              <input class="form-control" name="title_english" required>
            </div>
            <div class="form-group">
              <label>Title (French)</label>
              <input class="form-control" name="title_frensh" required>
            </div>
            <div class="form-group">
              <label>Description (English)</label>
              <input class="form-control" name="description_english" required>
            </div>
            <div class="form-group">
              <label>Description (French)</label>
              <input class="form-control" name="description_frensh" required>
            </div>
            <input type="hidden" name="serie_id" value="1">
          </div>
          <div class="card-footer">
            <button class="btn btn-lg btn-success" style="width: 100%"> Create Lesson </button>
          </div>
        </form>
      </div>
    </div>
  </div>

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
