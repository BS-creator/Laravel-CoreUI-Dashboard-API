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
            <a class="nav-link active" data-toggle="tab" href="#notifications" role="tab" aria-controls="notifications">
              Notifications </a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="notifications" role="tabpanel">
            <div class="row">
              <div class="col-lg-12">
                <div class="card custom-card">
                  <div class="card-body">
                    <h4> Send Notifications </h4>
                    <a href="/notifications/create">
                      <button class="btn btn-lg btn-success" style="width: 100%"> New Notifications </button></a>

                    <br /><br /><br />

                    <h4>Notifications History</h4>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($notifications as $item)
                          <tr>
                            <th style="vertical-align: middle">
                              <p style="margin-bottom: 0">{{ $item->notification_name }}</p>
                              <p style="font-size: 11px; margin-bottom: 0">{{ $item->date }}</p>
                            </th>
                            <th style="width:46px; vertical-align: middle;"><a
                                href="/notifications/{{ $item->notification_id }}"><i class="cil-chevron-right"
                                  style="font-size: 21px;cursor: pointer;"></i></a> </th>
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

@endsection
