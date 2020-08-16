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
          <form action="/administration/clients/{{ $client->corporate_client_id }}" id="editClientForm" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Client name</label>
              <input class="form-control" id="nf-name" name="corporate_name" value="{{ $client->corporate_name }}"
                autocomplete="true">
            </div>
            {{-- <div class="form-group">
              <label for="nf-pass">Password</label>
              <input class="form-control" id="nf-pass" type="password" name="nf-pass" autocomplete="true">
            </div> --}}
            <div class="form-group">
              <label>Number of Licenses</label>
              <input class="form-control" id="nf-name" name="Number_licences" value="{{ $client->Number_licences }}"
                type="number" autocomplete="true">
            </div>
            <div class="form-group">
              <label>Program starting date</label>
              <input class="form-control" id="nf-name" name="plan_starting_date" value="{{ $client->plan_starting_date }}"
                type="date" autocomplete="true">
            </div>
            <div class="form-group">
              <label>Program expiration date</label>
              <input class="form-control" id="nf-name" name="plan_expiration_date"
                value="{{ $client->plan_expiration_date }}" type="date" autocomplete="true">
            </div>
          </form>
        </div>
        <div class="card-footer">
          <button class="btn btn-lg btn-success" onclick="document.getElementById('editClientForm').submit();"
            style="width: 100%"> Save Changes </button>
          <button class="btn btn-lg btn-danger" onclick="document.getElementById('removeClientForm').submit();"
            style="width: 100%; margin-top:12px;"> Remove Client </button>
        </div>
      </div>
    </div>
  </div>

  <form action="/administration/clients/{{ $client->corporate_client_id }}" id="removeClientForm" method="POST">
    @csrf
    @method('DELETE')
  </form>
@endsection


@section('javascript')

@endsection
