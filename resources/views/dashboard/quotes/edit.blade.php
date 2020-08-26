@extends('dashboard.base')

@section('css')

  <link href="{{ asset('css/brand.min.css') }}" rel="stylesheet">

@endsection;


@section('content')

  <div class="container-fluid">
    <div class="fade-in">
      <div class="card" style="max-width: 65%; margin: auto;">
        <div class="card-header">Edit Quote</div>
        <form action="/content/quotes/{{ $quote->quote_id }}" id="addClientForm" method="POST">
          <div class="card-body">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Quote</label>
              <textarea class="form-control" name="content" style="height: 150px"
                required>{{ $quote->content }}</textarea>
            </div>
            <div class="form-group">
              <label>Author</label>
              <input class="form-control" value="{{ $quote->Author }}" name="Author" required>
            </div>
            <div class="form-group">
              <label>Language</label>
              <table class="table table-responsive-sm table-bordered">
                <tbody>
                  <tr>
                    <th style="width:40px">
                      <input @if ($quote->language == 1) checked @endif
                      type="radio" name="language" value="1">
                    </th>
                    <th style=""> English </th>
                  </tr>
                  <tr>
                    <th style="width:40px">
                      <input @if ($quote->language == 0) checked @endif
                      type="radio" name="language" value="0">
                    </th>
                    <th style=""> French </th>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="form-group">
              <label>Associated Lesson</label>
              <select class="form-control" name="video_id" required>
                @foreach ($lessons as $lesson)
                  <option value="{{ $lesson->lesson_id }}" @if ($related_lesson_id == $lesson->lesson_id) selected
                @endif>{{ $lesson->title_english }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-lg btn-success" style="width: 100%"> Save Changes </button>
            <button class="btn btn-lg btn-danger" onclick="document.getElementById('removeClientForm').submit();"
              style="width: 100%; margin-top:12px;"> Remove Quote </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <form action="/content/quotes/{{ $quote->quote_id }}" id="removeClientForm" method="POST">
    @csrf
    @method('DELETE')
  </form>

@endsection

@section('javascript')

@endsection
