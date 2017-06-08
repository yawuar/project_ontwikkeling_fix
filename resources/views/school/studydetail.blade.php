@extends('layouts.app')

@section('content')

  <div id="schoolOpleiding_detail">
    <div class="container">
      <nav>
        <ul id="breadcrumb">
          <li><a href="{{ url('/studeren') }}"><span/>school<span></a></li>
          <li><a href="{{ url('/studeren/' . str_slug($schools[0]['faculty_name'], '-')) }}"><span>{{ $schools[0]['faculty_name'] }}</span></a></li>
          <li><a><span>{{ $schools[0]['name'] }}</span></a></li>
        </ul>
      </nav>
      <div class="row">
        <div class="col-xs-12">
          <div style="background-image: url('{{ asset($schools[0]['image_url']) }}');" class="person">
            <div class="bv-info">
              <h2>{{ $schools[0]['name'] }}</h2>
            </div>
          </div>
          <div class="dummy"></div>
          <div class="text">
            <div class="col-xs-10">
              <p>{!! $schools[0]['content'] !!}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section id="sortSchools">
    <div class="container">
      <div class="row">
        @foreach($schools as $school)
          <div class="col-md-6 schools">
            <div class="shadow">
              <a target="_blank" href="{{ url($school['url']) }}" class="school_photo">
                <div class="f_photo {{ $school['abbreviation'] }}"></div>
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

@endsection
