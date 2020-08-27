@extends('dashboard.base')

@section('css')

  <link href="{{ asset('css/brand.min.css') }}" rel="stylesheet">

@endsection;


@section('content')

  <div class="container-fluid">
    <div class="fade-in">
      <div class="card" style="max-width: 65%; margin: auto;">
        <div class="card-header">New Notification</div>
        <form action="{{ route('notifications.store') }}" id="addClientForm" method="POST">
          <div class="card-body">
            @csrf
            <div class="form-group">
              <label>Name (only used for dashboard history)</label>
              <input required class="form-control" name="notification_name">
            </div>
            <br>
            <h4>Notification Message</h4>
            <p>Will be sent as push notification if app notifications are enabled. Maximum of 140 characters.</p>
            <div class="form-group">
              <label>English (0/140)</label>
              <input required class="form-control" name="content_english">
            </div>
            <div class="form-group">
              <label>Français (0/140)</label>
              <input required class="form-control" name="content_frensh">
            </div>
            <div class="form-group">
              <label>Target</label>
              <table class="table table-responsive-sm table-bordered">
                <tbody>
                  <tr>
                    <td style="width: 40px; border-right: none;">
                      <input style="width: 20px; height:20px;" type="radio" checked name="target" value="9">
                    </td>
                    <td style="border-left: none">
                      All Users
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40px; border-right: none;">
                      <input style="width: 20px; height:20px;" type="radio" name="target" value="2">
                    </td>
                    <td style="border-left: none">
                      Corporate Users
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 40px; border-right: none;">
                      <input style="width: 20px; height:20px;" type="radio" name="target" value="1">
                    </td>
                    <td style="border-left: none">
                      Premium Users
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-lg btn-success" style="width: 100%"> Create Notification </button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('javascript')

@endsection
