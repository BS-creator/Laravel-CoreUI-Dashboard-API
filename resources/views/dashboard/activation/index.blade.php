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
            <a class="nav-link active" data-toggle="tab" href="#activation" role="tab" aria-controls="activation">
              Activation </a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="activation" role="tabpanel">
            <div class="row">
              <div class="col-lg-12">
                <div class="card custom-card">
                  <div class="card-header">
                    Generate activation code
                  </div>
                  <div class="card-body">
                    <div>
                      <div class="form-group">
                        <label>Single Email</label>
                        <input required class="form-control" name="session_date" type="email">
                      </div>

                      <label>Bulk Emails</label>
                      <button class="btn btn-lg btn-success" style="width: 100%"> Upload emails list (csv file) </button>

                      <br><br>
                      <div class="form-group">
                        <label>Select sponsor</label>
                        <select class="form-control" name="session_date">
                          <option>Vieva</option>
                        </select>
                      </div>

                      <p>
                        The validity date applies only when the sponsor is Vieva.
                        If the sponsor is a corporate client, the program validity dates are specified in the corporate
                        client
                        administration pannel.
                        That way we can extend or cancel the program over all corporate users at once.
                      </p>

                      <div class="form-group">
                        <label>Program starting date</label>
                        <input required class="form-control" name="session_date" type="date">
                      </div>

                      <div class="form-group">
                        <label>Program expiration date</label>
                        <input required class="form-control" name="session_date" type="date">
                      </div>

                      <table class="table table-responsive-sm table-bordered">
                        <tr>
                          <td style="width: 40px; border-right: none;">
                            <input style="width: 20px; height:20px;" type="checkbox" name="target">
                          </td>
                          <td style="border-left: none">
                            Indefinite Plan
                          </td>
                        </tr>
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
