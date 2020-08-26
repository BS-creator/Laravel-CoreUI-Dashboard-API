@extends('dashboard.base')

@section('css')

  <link href="{{ asset('css/brand.min.css') }}" rel="stylesheet">

@endsection;


@section('content')

  <div class="container-fluid">
    <div class="fade-in">
      <div class="card" style="max-width: 65%; margin: auto;">
        <div class="card-header">
          <h3>{{ $tool->name_english }}</h3>
        </div>
        <div class="card-body">
          <form action="/content/tools/{{ $tool->tools_id }}" id="editClientForm" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Title (English)</label>
              <input class="form-control" id="nf-name" name="name_english" value="{{ $tool->name_english }}" required>
            </div>
            <div class="form-group">
              <label>Title (French)</label>
              <input class="form-control" id="nf-name" name="name_frensh" value="{{ $tool->name_frensh }}" required>
            </div>
            <div class="form-group">
              <label>Description (English)</label>
              <input class="form-control" name="description_english" value="{{ $tool->description_english }}" required>
            </div>
            <div class="form-group">
              <label>Description (French)</label>
              <input class="form-control" name="description_frensh" value="{{ $tool->description_frensh }}" required>
            </div>
          </form>
        </div>
        <div class="card-footer">
          <button class="btn btn-lg btn-success" onclick="document.getElementById('editClientForm').submit();"
            style="width: 100%"> Save Changes </button>
          <button class="btn btn-lg btn-danger" onclick="document.getElementById('removeClientForm').submit();"
            style="width: 100%; margin-top:12px;"> Remove Series </button>
        </div>
      </div>
    </div>
  </div>

  <form action="/content/tools/{{ $tool->tools_id }}" id="removeClientForm" method="POST">
    @csrf
    @method('DELETE')
  </form>
@endsection


@section('javascript')

@endsection
