@extends('dashboard.base')

@section('css')

  <link href="{{ asset('css/brand.min.css') }}" rel="stylesheet">

@endsection;


@section('content')

  <div class="container-fluid">
    <div class="fade-in">
      <div class="card" style="max-width: 65%; margin: auto;">
        <div class="card-header">Add Session Report</div>
        <form action="{{ route('coaching_reports.store') }}" id="addClientForm" method="POST">
          <div class="card-body">
            @csrf
            <div class="form-group">
              <label>Session Date</label>
              <input required class="form-control" name="session_date" type="date">
            </div>
            <div class="form-group">
              <label>Reason for Session</label>
              <input required class="form-control" name="reason">
            </div>
            <div class="form-group">
              <label>Coach</label>
              <input required class="form-control" name="coach">
            </div>
            <div class="form-group">
              <label>Coach Rating</label>
              <table class="table table-responsive-sm table-bordered">
                <tbody>
                  <tr>
                    <td style="width: 40px; border-right: none;">
                      <input style="width: 20px; height:20px;" type="radio" checked name="rating" value="1">
                    </td>
                    <td style="border-left: none">
                      1 Star
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40px; border-right: none;">
                      <input style="width: 20px; height:20px;" type="radio" checked name="rating" value="2">
                    </td>
                    <td style="border-left: none">
                      2 Star
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40px; border-right: none;">
                      <input style="width: 20px; height:20px;" type="radio" checked name="rating" value="3">
                    </td>
                    <td style="border-left: none">
                      3 Star
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40px; border-right: none;">
                      <input style="width: 20px; height:20px;" type="radio" checked name="rating" value="4">
                    </td>
                    <td style="border-left: none">
                      4 Star
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40px; border-right: none;">
                      <input style="width: 20px; height:20px;" type="radio" checked name="rating" value="5">
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
            <button class="btn btn-lg btn-success" style="width: 100%"> Add Session Report </button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('javascript')

@endsection
