@extends('layouts.app')

@section('content')

  <div id="school_detail">
    <div class="container">
      <nav>
        <ul id="breadcrumb">
          <li><a href="{{ url('/studeren#school') }}"><span class="icon icon-home">studeren</span></a></li>
          <li><a><span>{{ $facultyName }}</span></a></li>
        </ul>
      </nav>
      <div class="row">
        @foreach($studies as $key => $study)
          <div class="col-sm-4 col-md-3">
            <div class="shadow">
              <div class="faculty_photo">
                @if(Session::has('courses'))
                  @if(!empty(Session::get('courses.course' . $study['opleiding_id'])))
                    <a class="fullHeart course{{ $study['opleiding_id'] }} opleiding_{{ $key }}"></a>
                  @else
                    <a class="heart course{{ $study['opleiding_id'] }} opleiding_{{ $key }}"></a>
                  @endif
                @else
                  <a class="heart course{{ $study['opleiding_id'] }} opleiding_{{ $key }}"></a>
                @endif
                <div onclick="location.href='{{ url('/studeren/' . str_slug($facultyName, '-') . '/' . str_slug($study['name'], '-')) }}'" class="f_photo" style="background-image: url('{{ asset($study['image_url']) }}')"></div>
              </div>
              <div class="text">
                <p><a href="{{ url('/studeren/' . str_slug($facultyName, '-') . '/' . str_slug($study['name'], '-')) }}">{{ $study['name'] }}</a></p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

@endsection
