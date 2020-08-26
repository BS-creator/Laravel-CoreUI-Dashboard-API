@extends('dashboard.base')

@section('css')

  <link href="{{ asset('css/brand.min.css') }}" rel="stylesheet">

@endsection;


@section('content')

  <div class="container-fluid">
    <div class="fade-in analytics-page">
      <div class="nav-tabs-boxed">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="home">General</a></li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Per Client</a></li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#messages" role="tab" aria-controls="messages">Per User</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="home" role="tabpanel">
            <div class="row">
              <div class="col-lg-12">
                {{-- General Stats --}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> General Stats</div>
                  <div class="card-body">
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($general_stats as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

                {{-- User engagement stats --}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> User engagement stats</div>
                  <div class="card-body">
                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Select Timeframe</label>
                        <select name="timeframe" class="form-control form-control-lg" id="Timeframe">
                          <option>Last Week</option>
                          <option>Last Month</option>
                        </select>
                      </div>
                    </form>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($engagement_stats as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

                {{-- Weekly Check Results --}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> Weekly Check Results</div>
                  <div class="card-body">
                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Select Timeframe</label>
                        <select name="timeframe" class="form-control form-control-lg" id="Timeframe">
                          <option>Last Week</option>
                          <option>Last Month</option>
                        </select>
                      </div>
                    </form>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($weekly_results as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

                {{-- Monthly Check Results && Main causes of
                stress--}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> Monthly Check Results</div>
                  <div class="card-body">
                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Select Timeframe</label>
                        <select name="timeframe" class="form-control form-control-lg" id="Timeframe">
                          <option>Last Week</option>
                          <option>Last Month</option>
                        </select>
                      </div>
                    </form>
                    <p>The mood score is the average of questions 1 and 2 of the monthly check. The energy score is the
                      average of questions 3 and 4. The engagement score is the result of question. </p>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($monthly_results as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Main causes of stress</label>
                      </div>
                    </form>
                    <p>Causes of stress are sourced from question 6 of the monthly check.</p>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($causes_stress as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                </div>

                {{-- Population risk distribution --}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> Population risk distribution </div>
                  <div class="card-body">
                    <p>Population risk distribution is a measure derived from the monthly checks results. A well-being
                      score below 35 is classified as high risk, between 35 et 65 as moderate risk, and above 65 as low
                      risk.</p>
                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Select Timeframe</label>
                        <select name="timeframe" class="form-control form-control-lg" id="Timeframe">
                          <option>Last Week</option>
                          <option>Last Month</option>
                        </select>
                      </div>
                    </form>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($population_risks as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

                {{-- Coaching reports && Reasons for sessions
                --}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> Coaching reports</div>
                  <div class="card-body">
                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Select Timeframe</label>
                        <select name="timeframe" class="form-control form-control-lg" id="Timeframe">
                          <option>Last Week</option>
                          <option>Last Month</option>
                        </select>
                      </div>
                    </form>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($coaching_reports as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Reasons for sessions</label>
                      </div>
                    </form>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($reasons_sessions as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="profile" role="tabpanel">
            <div class="row">
              <div class="col-lg-12">
                {{-- General Stats --}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> General Stats</div>
                  <div class="card-body">
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($general_stats as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

                {{-- User engagement stats --}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> User engagement stats</div>
                  <div class="card-body">
                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Select Timeframe</label>
                        <select name="timeframe" class="form-control form-control-lg" id="Timeframe">
                          <option>Last Week</option>
                          <option>Last Month</option>
                        </select>
                      </div>
                    </form>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($engagement_stats as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

                {{-- Weekly Check Results --}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> Weekly Check Results</div>
                  <div class="card-body">
                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Select Timeframe</label>
                        <select name="timeframe" class="form-control form-control-lg" id="Timeframe">
                          <option>Last Week</option>
                          <option>Last Month</option>
                        </select>
                      </div>
                    </form>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($weekly_results as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

                {{-- Monthly Check Results && Main causes of
                stress--}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> Monthly Check Results</div>
                  <div class="card-body">
                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Select Timeframe</label>
                        <select name="timeframe" class="form-control form-control-lg" id="Timeframe">
                          <option>Last Week</option>
                          <option>Last Month</option>
                        </select>
                      </div>
                    </form>
                    <p>The mood score is the average of questions 1 and 2 of the monthly check. The energy score is the
                      average of questions 3 and 4. The engagement score is the result of question. </p>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($monthly_results as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Main causes of stress</label>
                      </div>
                    </form>
                    <p>Causes of stress are sourced from question 6 of the monthly check.</p>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($causes_stress as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                </div>

                {{-- Population risk distribution --}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> Population risk distribution </div>
                  <div class="card-body">
                    <p>Population risk distribution is a measure derived from the monthly checks results. A well-being
                      score below 35 is classified as high risk, between 35 et 65 as moderate risk, and above 65 as low
                      risk.</p>
                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Select Timeframe</label>
                        <select name="timeframe" class="form-control form-control-lg" id="Timeframe">
                          <option>Last Week</option>
                          <option>Last Month</option>
                        </select>
                      </div>
                    </form>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($population_risks as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

                {{-- Coaching reports && Reasons for sessions
                --}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> Coaching reports</div>
                  <div class="card-body">
                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Select Timeframe</label>
                        <select name="timeframe" class="form-control form-control-lg" id="Timeframe">
                          <option>Last Week</option>
                          <option>Last Month</option>
                        </select>
                      </div>
                    </form>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($coaching_reports as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Reasons for sessions</label>
                      </div>
                    </form>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($reasons_sessions as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="messages" role="tabpanel">
            <div class="row">
              <div class="col-lg-12">
                {{-- General Stats --}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> General Stats</div>
                  <div class="card-body">
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($general_stats as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

                {{-- User engagement stats --}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> User engagement stats</div>
                  <div class="card-body">
                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Select Timeframe</label>
                        <select name="timeframe" class="form-control form-control-lg" id="Timeframe">
                          <option>Last Week</option>
                          <option>Last Month</option>
                        </select>
                      </div>
                    </form>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($engagement_stats as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

                {{-- Weekly Check Results --}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> Weekly Check Results</div>
                  <div class="card-body">
                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Select Timeframe</label>
                        <select name="timeframe" class="form-control form-control-lg" id="Timeframe">
                          <option>Last Week</option>
                          <option>Last Month</option>
                        </select>
                      </div>
                    </form>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($weekly_results as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

                {{-- Monthly Check Results && Main causes of
                stress--}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> Monthly Check Results</div>
                  <div class="card-body">
                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Select Timeframe</label>
                        <select name="timeframe" class="form-control form-control-lg" id="Timeframe">
                          <option>Last Week</option>
                          <option>Last Month</option>
                        </select>
                      </div>
                    </form>
                    <p>The mood score is the average of questions 1 and 2 of the monthly check. The energy score is the
                      average of questions 3 and 4. The engagement score is the result of question. </p>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($monthly_results as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Main causes of stress</label>
                      </div>
                    </form>
                    <p>Causes of stress are sourced from question 6 of the monthly check.</p>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($causes_stress as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                </div>

                {{-- Population risk distribution --}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> Population risk distribution </div>
                  <div class="card-body">
                    <p>Population risk distribution is a measure derived from the monthly checks results. A well-being
                      score below 35 is classified as high risk, between 35 et 65 as moderate risk, and above 65 as low
                      risk.</p>
                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Select Timeframe</label>
                        <select name="timeframe" class="form-control form-control-lg" id="Timeframe">
                          <option>Last Week</option>
                          <option>Last Month</option>
                        </select>
                      </div>
                    </form>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($population_risks as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

                {{-- Coaching reports && Reasons for sessions
                --}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> Coaching reports</div>
                  <div class="card-body">
                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Select Timeframe</label>
                        <select name="timeframe" class="form-control form-control-lg" id="Timeframe">
                          <option>Last Week</option>
                          <option>Last Month</option>
                        </select>
                      </div>
                    </form>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($coaching_reports as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                    <form action="">
                      <div class="form-group">
                        <label for="Timeframe">Reasons for sessions</label>
                      </div>
                    </form>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @foreach ($reasons_sessions as $stats)
                          <tr>
                            <th style="width: 40%;">{{ $stats['label'] }}</th>
                            <th>{{ $stats['value'] }}</th>
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
