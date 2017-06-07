@extends('layouts.app')

@section('content')
<section id="event_detail">
  <div class="container">
    <nav>
      <ul id="breadcrumb">
        <li><a href="{{ url('/#events_gate15') }}"><span>Overzicht</span></a></li>
        <li><a><span>{{ str_limit($event['title'], 50) }}</span></a></li>
      </ul>
    </nav>
    <div class="row">
      <div class="col-xs-12">
        <div style="background-image: url('{{ asset($event['picture_url']) }}');" class="person">
          <div class="bv-info">
            <span class="date">{{ gmdate("d-m-Y", $event['event_begin_date']) }}</span>
            <h2>{{ $event['title'] }}</h2>
          </div>
        </div>
        <div class="dummy"></div>
        <div class="text">
          <div class="col-xs-10">
            <p>{!! $event['content'] !!}</p>
            <div onclick="window.open('{{ $event['event_url'] }}', '_blank')" id="url" style="margin-top: 50px;">
              <p>Naar origineel artikel</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
