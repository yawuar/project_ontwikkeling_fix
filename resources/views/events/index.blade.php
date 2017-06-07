@extends('layouts.app')

@section('content')
<header class="event_bg video">
  <div class="header-content">
    <div class="header-content-inner">
      <h1 id="homeHeading">Evenementen</h1>
    </div>
  </div>
  <div class="box"></div>
</header>

<div id="random">
  <p>Geef een willekeurig evenement</p>
  <a href="{{ url('events/random/event') }}"></a>
</div>

<div class="filter events">
  <div class="container">
    <h1>Categorie</h1>
    <ul>
      <li><a href="{{ url('events/filter/all') }}">Alle events</a></li>
      @foreach($uniqueTags as $tag)
      <li><a href="{{ url('events/filter/' . str_replace(' ', '_', $tag['event_type'])) }}">{{ $tag['event_type'] }}</a></li>
      @endforeach
    </ul>
  </div>
</div>

<section id="events_gate15">
  <div class="container">
    <div class="row">
      @foreach($events as $event)
        <div class="col-xs-12 col-sm-6 col-lg-4">
          <a href=" {{ url('events/' . strtolower(str_replace(' ', '_', $event->title))) }}" style="background-image: url('{{ $event->picture_url }}')" class="photo">
            <div class="bv-info">
              <h2>{{ $event->title }}</h2>
            </div>
            <span>{{ gmdate("d-m-Y", $event->event_begin_date) }}</span>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
