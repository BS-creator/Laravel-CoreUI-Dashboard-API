@extends('dashboard.base')

@section('css')

  <link href="{{ asset('css/brand.min.css') }}" rel="stylesheet">

@endsection;


@section('content')

  <div class="container-fluid">
    <div class="fade-in">
      <div class="card" style="max-width: 65%; margin: auto;">
        <div class="card-header">Add Quote</div>
        <form action="{{ route('quotes.store') }}" id="addClientForm" method="POST">
          <div class="card-body">
            @csrf
            <div class="form-group">
              <label>Quote</label>
              <textarea required class="form-control" name="content" style="height: 150px" autocomplete="true"></textarea>
            </div>
            <div class="form-group">
              <label>Author</label>
              <input required class="form-control" name="Author" autocomplete="true">
            </div>
            <div class="form-group">
              <label>Language</label>
              <table class="table table-responsive-sm table-bordered">
                <tbody>
                  <tr>
                    <th style="width:40px">
                      <input class="" type="checkbox" name="language" value="1">
                    </th>
                    <th style=""> English </th>
                  </tr>
                  <tr>
                    <th style="width:40px">
                      <input class="" type="checkbox" name="language" value="0">
                    </th>
                    <th style=""> French </th>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="form-group">
              <label>Associated Lesson</label>
              <select class="form-control" name="video_id" autocomplete="true">
                @foreach ($lessons as $lesson)
                  <option value="{{ $lesson->lesson_id }}">{{ $lesson->title_english }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-lg btn-success" style="width: 100%"> Create Quote </button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('javascript')

@endsection
