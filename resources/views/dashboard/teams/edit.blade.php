@extends('dashboard.base')

@section('css')

  <link href="{{ asset('css/brand.min.css') }}" rel="stylesheet">

@endsection;


@section('content')

  <div class="container-fluid">
    <div class="fade-in">
      <div class="card" style="max-width: 65%; margin: auto;">
        <div class="card-header">Add Client</div>
        <form action="" method="post">
          <div class="card-body">
            <div class="form-group">
              <label>Client name</label>
              <input class="form-control" id="nf-name" name="nf-name" required>
            </div>
            <div class="form-group">
              <label for="nf-pass">Password</label>
              <input class="form-control" id="nf-pass" type="password" name="nf-pass" required>
            </div>
            <div class="form-group">
              <label>Number of Licenses</label>
              <input class="form-control" id="nf-name" name="nf-name" required>
            </div>
            <div class="form-group">
              <label>Program starting date</label>
              <input class="form-control" id="nf-name" name="nf-name" required>
            </div>
            <div class="form-group">
              <label>Program expiration date</label>
              <input class="form-control" id="nf-name" name="nf-name" required>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-success" type="submit" style="width: 100%"> Save Changes </button>
            <button class="btn btn-danger " type="submit" style="width: 100%; margin-top:10px"> Remove Client </button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('javascript')

@endsection
