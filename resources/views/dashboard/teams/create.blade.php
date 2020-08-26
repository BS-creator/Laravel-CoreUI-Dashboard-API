@extends('dashboard.base')

@section('css')

  <link href="{{ asset('css/brand.min.css') }}" rel="stylesheet">

@endsection;


@section('content')

  <div class="container-fluid">
    <div class="fade-in">
      <div class="card" style="max-width: 65%; margin: auto;">
        <div class="card-header">Create team</div>
        <form action={{ route('teams.store') }} method="post" id="createTeamForm">
          <div class="card-body">
            @csrf
            <div class="form-group">
              <label>Team name</label>
              <input name="group_name" class="form-control" id="nf-name" required>
            </div>
            <div class="form-group">
              <label>Team members</label>
              <input class="form-control" id="nf-name" required>
            </div>
            <div class="form-group">
              <label>Team admin</label>
              <select name="corporate_group_admin_id" class="form-control form-control-lg" id="Timeframe">
                @foreach ($admins as $admin)
                  <option value="{{ $admin->id }}"> {{ $admin->first_name }} {{ $admin->last_name }} </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-lg btn-success" type="submit" style="width: 100%"> Create Team </button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('javascript')

@endsection
