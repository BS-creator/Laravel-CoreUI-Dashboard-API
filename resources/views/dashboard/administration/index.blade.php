@extends('dashboard.base')

@section('css')

  <link href="{{ asset('css/brand.min.css') }}" rel="stylesheet">

@endsection;


@section('content')

  <div class="container-fluid">
    <div class="fade-in">
      <div class="nav-tabs-boxed">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#admins" role="tab" aria-controls="admins">Admins</a></li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#clients" role="tab" aria-controls="clients">Clients</a></li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#teams" role="tab" aria-controls="teams">Teams</a></li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#users" role="tab" aria-controls="users">Users</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="admins" role="tabpanel">
            <div class="row">
              <div class="col-lg-12">
                {{-- Admins --}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> Vieva Admins</div>
                  <div class="card-body">

                    <label>Super Admin</label>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($super as $admin)
                          <tr>
                            <th>{{ $admin->first_name }} {{ $admin->last_name }}</th>
                            <th style="width:46px"><i class="cil-pencil" style="font-size: 21px;cursor: pointer;"></i>
                            </th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                    <label>Admins</label>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        <tr>
                          <th style="color: green; text-align: center;">Add admin</th>
                          <th style="width:46px"><i class="cil-plus" style="font-size: 21px;cursor: pointer;"></i></th>
                        </tr>
                        @foreach ($admins as $admin)
                          <tr>
                            <th>{{ $admin->first_name }} {{ $admin->last_name }}</th>
                            <th><i class="cil-pencil" style="font-size: 21px;cursor: pointer;"></i></th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="tab-pane" id="clients" role="tabpanel">
            <div class="row">
              <div class="col-lg-12">
                {{-- Admins --}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> Vieva Admins</div>
                  <div class="card-body">
                    <label>Corporate Clients</label>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        <tr>
                          <th style="color: green; text-align: center;">Add client</th>
                          <th style="width:46px">
                            <a href="/administration/clients/create">
                              <i class="cil-plus" style="font-size: 21px;cursor: pointer; font-weight: bold;"></i></a>
                          </th>
                        </tr>
                        @foreach ($clients as $client)
                          <tr>
                            <th>{{ $client->corporate_name }}</th>
                            <th><a href="/administration/clients/{{ $client->corporate_client_id }}/edit"><i
                                  class="cil-pencil" style="font-size: 21px;cursor: pointer;"></i></a></th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="tab-pane" id="teams" role="tabpanel">
            <div class="row">
              <div class="col-lg-12">
                {{-- Admins --}}
                <div class="card custom-card">
                  {{-- <div class="card-header"><i class="fa fa-align-justify"></i> Vieva
                    Admins</div> --}}
                  <div class="card-body">
                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Select Client</label>
                        <select name="timeframe" class="form-control form-control-lg" id="Timeframe">
                          @foreach ($clients as $client)
                            <option value="{{ $client->corporate_client_id }}">{{ $client->corporate_name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </form>

                    <h2>Corporate client’s teams</h2>

                    <label>Teams</label>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        <tr>
                          <th style="color: green; text-align: center;">Create Team</th>
                          <th style="width:46px">
                            <a href="/administration/teams/create">
                              <i class="cil-plus" style="font-size: 21px; cursor: pointer; font-weight: bold;"></i></a>
                          </th>
                        </tr>
                        @foreach ($teams as $team)
                          <tr>
                            <th>{{ $team->group_name }}</th>
                            <th><a href="/administration/teams/{{ $team->group_id }}/edit"><i class="cil-pencil"
                                  style="font-size: 21px; cursor: pointer;"></i></a></th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                    <label>Team admins</label>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        <tr>
                          <th style="color: green; text-align: center;">Add Team Admin</th>
                          <th style="width:46px">
                            <a href="/administration/clients/create">
                              <i class="cil-plus" style="font-size: 21px;cursor: pointer; font-weight: bold;"></i></a>
                          </th>
                        </tr>
                        @foreach ($clients as $client)
                          <tr>
                            <th>{{ $client->corporate_name }}</th>
                            <th><i class="cil-pencil" style="font-size: 21px;cursor: pointer;"></i></th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="tab-pane" id="users" role="tabpanel">
            <div class="row">
              <div class="col-lg-12">
                {{-- User --}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> Search User</div>
                  <div class="card-body">
                    <div>
                      <div class="form-group">
                        <label>Email</label>
                        <input required class="form-control" id="emailsearch" value="{{ $email }}" type="email">
                      </div>
                      <button class="btn btn-lg btn-success" id="userbyemail" style="width: 100%"> Search user </button>
                      <br><br>
                    </div>

                    <label>Search Results</label>
                    <table class="table table-responsive-sm table-bordered">
                      @foreach ($users as $user)
                        <tr>
                          <th>{{ $user->first_name }} {{ $user->last_name }}</th>
                          <th><a href="/administration/clients/{{ $user->corporate_client_id }}/edit"><i
                                class="cil-pencil" style="font-size: 21px;cursor: pointer;"></i></a></th>
                        </tr>
                      @endforeach
                    </table>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('javascript')

  <script>
    $("#userbyemail").click(function() {
      event.preventDefault();
      var email = $("#emailsearch").val();
      console.log(email)
      window.location.href = "/administration?email=" + email + "&tab=users";
    });

  </script>
@endsection
