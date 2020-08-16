@extends('dashboard.base')

@section('css')

  <link href="{{ asset('css/brand.min.css') }}" rel="stylesheet">

@endsection;


@section('content')

  <div class="container-fluid">
    <div class="fade-in">
      <div class="card" style="max-width: 65%; margin: auto;">
        <div class="card-header">Add Client</div>
        <div class="card-body">
          <form action="{{ route('clients.store') }}" id="addClientForm" method="POST">
            @csrf
            <div class="form-group">
              <label>Client name</label>
              <input class="form-control" id="nf-name" name="corporate_name" autocomplete="true">
            </div>
            {{-- <div class="form-group">
              <label for="nf-pass">Password</label>
              <input class="form-control" id="nf-pass" type="password" name="nf-pass" autocomplete="true">
            </div> --}}
            <div class="form-group">
              <label>Number of Licenses</label>
              <input class="form-control" id="nf-name" name="Number_licences" type="number" autocomplete="true">
            </div>
            <div class="form-group">
              <label>Program starting date</label>
              <input class="form-control" id="nf-name" name="plan_starting_date" type="date" autocomplete="true">
            </div>
            <div class="form-group">
              <label>Program expiration date</label>
              <input class="form-control" id="nf-name" name="plan_expiration_date" type="date" autocomplete="true">
            </div>
          </form>
        </div>
        <div class="card-footer">
          <button class="btn btn-lg btn-success" onclick="document.getElementById('addClientForm').submit();"
            style="width: 100%"> Create Client </button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('javascript')

@endsection
