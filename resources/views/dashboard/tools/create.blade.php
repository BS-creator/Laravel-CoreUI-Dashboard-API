@extends('dashboard.base')

@section('css')

  <link href="{{ asset('css/brand.min.css') }}" rel="stylesheet">

@endsection;


@section('content')

  <div class="container-fluid">
    <div class="fade-in">
      <div class="card" style="max-width: 65%; margin: auto;">
        <div class="card-header">Add Tool</div>
        <div class="card-body">
          <form action="{{ route('tools.store') }}" id="addClientForm" method="POST">
            @csrf
            <div class="form-group">
              <label>Title (English)</label>
              <input class="form-control" name="name_english" required="true">
            </div>
            <div class="form-group">
              <label>Title (French)</label>
              <input class="form-control" name="name_frensh" required="true">
            </div>
            <div class="form-group">
              <label>Description (English)</label>
              <input class="form-control" name="description_english" required="true">
            </div>
            <div class="form-group">
              <label>Description (French)</label>
              <input class="form-control" name="description_frensh" required="true">
            </div>
          </form>
        </div>
        <div class="card-footer">
          <button class="btn btn-lg btn-success" onclick="document.getElementById('addClientForm').submit();"
            style="width: 100%"> Create Tool </button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('javascript')

@endsection
