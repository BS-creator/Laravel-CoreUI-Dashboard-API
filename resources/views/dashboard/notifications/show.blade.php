@extends('dashboard.base')

@section('css')

  <link href="{{ asset('css/brand.min.css') }}" rel="stylesheet">

@endsection;


@section('content')

  <div class="container-fluid">
    <div class="fade-in">
      <div class="card" style="margin: auto;">
        <div class="card-header">Edit Quote</div>
        <div class="card-body">
          <table class="table table-responsive-sm table-bordered">
            <tbody>
              <tr>
                <td style="width: 35%; font-size: 15px;">Name</td>
                <th>{{ $notification->notification_name }}</th>
              </tr>
              <tr>
                <td style="width: 35%; font-size: 15px;">Date</td>
                <th>{{ $notification->date }}</th>
              </tr>
              <tr>
                <td style="width: 35%; font-size: 15px;">Target</td>
                <th>{{ $notification->target }}</th>
              </tr>
              <tr>
                <td style="width: 35%; font-size: 15px;">English Message ({{ strlen($notification->content_english) }}
                  char)</td>
                <th>{{ $notification->content_english }}</th>
              </tr>
              <tr>
                <td style="width: 35%; font-size: 15px;">Message en français ({{ $notification->content_frensh }} char)
                </td>
                <th>{{ $notification->content_frensh }}</th>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <button class="btn btn-lg btn-danger" onclick="document.getElementById('removeClientForm').submit();"
            style="width: 100%; margin-top:12px;"> Remove from History </button>
        </div>
      </div>
    </div>
  </div>

  <form action="/notifications/{{ $notification->notification_id }}" id="removeClientForm" method="POST">
    @csrf
    @method('DELETE')
  </form>

@endsection

@section('javascript')

@endsection
