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
            <a class="nav-link active" data-toggle="tab" href="#series" role="tab" aria-controls="series">Series</a></li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#lessons" role="tab" aria-controls="lessons">Lessons</a></li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#quotes" role="tab" aria-controls="quotes">Quotes</a></li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tools" role="tab" aria-controls="tools">Tools</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="series" role="tabpanel">
            <div class="row">
              <div class="col-lg-12">
                {{-- Admins --}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> Series List </div>
                  <div class="card-body">

                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        <tr>
                          <th style="color: green; text-align: center;">Add Series</th>
                          <th style="width:46px">
                            <a href="/content/series/create">
                              <i class="cil-plus" style="font-size: 21px;cursor: pointer; font-weight: bold;"></i></a>
                          </th>
                        </tr>
                        @foreach ($series as $item)
                          <tr>
                            <th>{{ $item->title_english }}</th>
                            <th style="width:46px"><a href="/content/series/{{ $item->serie_id }}/edit"><i
                                  class="cil-pencil" style="font-size: 21px;cursor: pointer;"></i></a> </th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                    <br><br>
                    <h3>Series Display</h3>
                    <p>Display Order</p>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        @for ($i = 0; $i < count($series); $i++)
                          <tr>
                            <th>{{ $series[$i]->title_english }}</th>

                            <th style="width:46px">
                              @if ($i == 0)
                                <a href="javascript:void(0)">
                                  <i class="cil-chevron-top" style="font-size: 21px;cursor: pointer;"></i></a>
                              @else
                                <a
                                  href="/content/series/set_order/{{ $series[$i]->serie_id }}/{{ $series[$i - 1]->serie_id }}/{{ $series[$i]->display_order }}/{{ $series[$i - 1]->display_order }}">
                                  <i class="cil-chevron-top" style="font-size: 21px;cursor: pointer;"></i></a>
                              @endif
                            </th>
                            <th style="width:46px">
                              @if ($i + 1 == count($series))
                                <a href="javascript:void(0)">
                                  <i class="cil-chevron-bottom" style="font-size: 21px;cursor: pointer;"></i></a>
                              @else
                                <a
                                  href="/content/series/set_order/{{ $series[$i]->serie_id }}/{{ $series[$i + 1]->serie_id }}/{{ $series[$i]->display_order }}/{{ $series[$i + 1]->display_order }}">
                                  <i class="cil-chevron-bottom" style="font-size: 21px;cursor: pointer;"></i></a>
                              @endif
                            </th>
                          </tr>
                        @endfor
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="tab-pane" id="lessons" role="tabpanel">
            <div class="row">
              <div class="col-lg-12">
                {{-- Admins --}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> Lessions List</div>
                  <div class="card-body">
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        <tr>
                          <th style="color: green; text-align: center;">Add lesson</th>
                          <th style="width:46px">
                            <a href="/content/lessons/create">
                              <i class="cil-plus" style="font-size: 21px;cursor: pointer; font-weight: bold;"></i></a>
                          </th>
                        </tr>
                        @foreach ($lessons as $lesson)
                          <tr>
                            <th>{{ $lesson->title_english }}</th>
                            <th><a href="/content/lessons/{{ $lesson->lesson_id }}/edit"><i class="cil-pencil"
                                  style="font-size: 21px;cursor: pointer;"></i></a></th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="tab-pane" id="quotes" role="tabpanel">
            <div class="row">
              <div class="col-lg-12">
                {{-- Admins --}}
                <div class="card custom-card">
                  {{-- <div class="card-header"><i class="fa fa-align-justify"></i> Vieva
                    Admins</div> --}}
                  <div class="card-body">
                    <h3>Quotes Stats</h3>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        <tr>
                          <th style="width:30%">English Quotes</th>
                          <th style="">{{ $english_quotes }}</th>
                        </tr>
                        <tr>
                          <th style="width:30%">French Quotes</th>
                          <th style="">{{ $frensh_quotes }}</th>
                        </tr>
                      </tbody>
                    </table>

                    <h3>Quotes list</h3>
                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        <tr>
                          <th style="color: green; text-align: center;">Add Quote</th>
                          <th style="width:46px">
                            <a href="/content/quotes/create">
                              <i class="cil-plus" style="font-size: 21px; cursor: pointer; font-weight: bold;"></i></a>
                          </th>
                        </tr>
                        @foreach ($quotes as $quote)
                          <tr>
                            <th>{{ $quote->content }}</th>
                            <th><a href="/content/quotes/{{ $quote->quote_id }}/edit"><i class="cil-pencil"
                                  style="font-size: 21px; cursor: pointer;"></i></a></th>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="tab-pane" id="tools" role="tabpanel">
            <div class="row">
              <div class="col-lg-12">
                {{-- Admins --}}
                <div class="card custom-card">
                  <div class="card-header"><i class="fa fa-align-justify"></i> Tools List </div>
                  <div class="card-body">

                    <table class="table table-responsive-sm table-bordered">
                      <tbody>
                        <tr>
                          <th style="color: green; text-align: center;">Add Tools</th>
                          <th style="width:46px">
                            <a href="/content/tools/create">
                              <i class="cil-plus" style="font-size: 21px;cursor: pointer; font-weight: bold;"></i></a>
                          </th>
                        </tr>
                        @foreach ($tools as $item)
                          <tr>
                            <th>{{ $item->name_english }}</th>
                            <th style="width:46px"><a href="/content/tools/{{ $item->tools_id }}/edit"><i
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

@endsection
