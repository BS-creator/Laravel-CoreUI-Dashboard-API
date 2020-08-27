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
            <a class="nav-link active" data-toggle="tab" href="#coaching" role="tab" aria-controls="coaching">
              Per User </a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="coaching" role="tabpanel">
            <div class="row">
              <div class="col-lg-12">
                <div class="card custom-card">
                  <div class="card-body">
                    <div>
                      <div class="form-group">
                        <label>Search user by email</label>
                        <input required class="form-control" id="emailsearch" name="session_date" value="{{ $email }}"
                          type="email">
                      </div>
                      <button class="btn btn-lg btn-success" id="userbyemail" style="width: 100%"> Search ...
                      </button>
                      <br><br>
                    </div>
                    <p>Select an user in search results</p>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($users as $item)
                          <tr>
                            <td style="width: 40px; border-right: none;">
                              <input style="width: 20px; height:20px;" type="radio" name="rating" value="{{ $item->id }}">
                            </td>
                            <td style="border-left: none">
                              {{ $item->first_name }} {{ $item->last_name }}
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <br><br>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        <tr>
                          <th style="color: green; text-align: center;">Add Session Report</th>
                          <th style="width:46px">
                            <a href="/coaching_reports/create">
                              <i class="cil-plus" style="font-size: 21px;cursor: pointer; font-weight: bold;"></i></a>
                          </th>
                        </tr>
                        @foreach ($coachings as $item)
                          <tr>
                            <th>{{ $item->session_date }}</th>
                            <th style="width:46px"><a href="/coaching_reports/{{ $item->report_id }}/edit"><i
                                  class="cil-pencil" style="font-size: 21px;cursor: pointer;"></i></a> </th>
                          </tr>
                        @endforeach
                      </tbody>
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
      window.location.href = "/coaching_reports?email=" + email;
    });

  </script>
@endsection
