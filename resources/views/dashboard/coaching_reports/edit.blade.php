@extends('dashboard.base')

@section('css')

  <link href="{{ asset('css/brand.min.css') }}" rel="stylesheet">

@endsection;


@section('content')

  <div class="container-fluid">
    <div class="fade-in">
      <div class="card" style="max-width: 65%; margin: auto;">
        <div class="card-header">Edit Session Report</div>
        <form action="/coaching_reports/{{ $coaching->report_id }}" id="addClientForm" method="POST">
          @csrf
          @method('PUT')
          <div class="card-body">
            @csrf
            <div class="form-group">
              <label>Session Date</label>
              <input class="form-control" value="{{ $coaching->session_date }}" name="session_date" type="date" required>
            </div>
            <div class="form-group">
              <label>Reason for Session</label>
              <input class="form-control" value="{{ $coaching->reason }}" name="reason" required>
            </div>
            <div class="form-group">
              <label>Coach</label>
              <input class="form-control" value="{{ $coaching->coach }}" name="coach" required>
            </div>
            <div class="form-group">
              <label>Coach Rating</label>
              <table class="table table-responsive-sm table-bordered">
                <tbody>
                  <tr>
                    <td style="width: 40px; border-right: none;">
                      <input style="width: 20px; height:20px;" type="radio" @if ($coaching->rating == 1) checked @endif
                      name="rating" value="1">
                    </td>
                    <td style="border-left: none">
                      1 Star
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40px; border-right: none;">
                      <input style="width: 20px; height:20px;" type="radio" @if ($coaching->rating == 2) checked @endif
                      name="rating" value="2">
                    </td>
                    <td style="border-left: none">
                      2 Star
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40px; border-right: none;">
                      <input style="width: 20px; height:20px;" type="radio" @if ($coaching->rating == 3) checked @endif
                      name="rating" value="3">
                    </td>
                    <td style="border-left: none">
                      3 Star
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40px; border-right: none;">
                      <input style="width: 20px; height:20px;" type="radio" @if ($coaching->rating == 4) checked @endif
                      name="rating" value="4">
                    </td>
                    <td style="border-left: none">
                      4 Star
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40px; border-right: none;">
                      <input style="width: 20px; height:20px;" type="radio" @if ($coaching->rating == 5) checked @endif
                      name="rating" value="5">
                    </td>
                    <td style="border-left: none">
                      5 Star
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-lg btn-success" style="width: 100%"> Save Changes </button>
            <button class="btn btn-lg btn-danger"
              onclick="event.preventDefault();document.getElementById('removeClientForm').submit();"
              style="width: 100%; margin-top:12px;"> Remove Session Report </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <form action="/coaching_reports/{{ $coaching->report_id }}" id="removeClientForm" method="POST">
    @csrf
    @method('DELETE')
  </form>

@endsection

@section('javascript')

@endsection
