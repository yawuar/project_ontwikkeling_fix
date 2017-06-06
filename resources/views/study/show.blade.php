@extends('layouts.cms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <button type="button" class="btn btn-default" onclick="window.location='{{ url('cms/studeren/opleidingen') }}'">< Terug</button>
            @if(!empty($study))
                <form action="{{ url('/cms/studeren/opleidingen/study-delete/' . $study->opleiding_id ) }}" method="POST", class="form-horizontal">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE">
                    <!--Future: ask for confirmation-->
                    <button type="submit" class="btn btn-danger pull-right">Opleiding verwijderen</button>
                </form>
            @endif
        </div>
    </div><br>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(array('url'=>'/cms/studeren/opleidingen/study-post','method'=>'POST', 'files'=>true)) !!}
                <input type="hidden" name="opleiding_id" value="{{ $study['opleiding_id'] or 'new' }}">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <input class="form-control" placeholder="Study name" type="text" name="name" value="{{ $study->name or '' }}" required>
                    </div>

                    <div class="panel-body">
                        <textarea id="textarea" class="form-control" placeholder="Study tekst" name="content" rows="10" required>{{ $study->content or '' }}</textarea>
                    </div>

                    <div class="panel-heading">
                        <input class="form-control" placeholder="Study url" type="text" name="url" value="{{ $study->url or '' }}" required>
                    </div>

                    @if(!empty($study->image_url))
                        <div class="panel-body">
                            <img style='max-width: 100%' src='{{ URL::to('/') }}/{!! $study->image_url !!}'>
                        </div>
                    @endif
                    <div class="panel-body">
                      <select name="faculty">
                        @foreach($faculties as $faculty)
                          <option value="{{ $faculty['faculty_id'] }}" {{ (isset($study['faculty_id']) && $study['faculty_id'] == $faculty['faculty_id']) ? 'selected' : '' }}>{{ $faculty['name'] }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="panel-body">
                      <select name="school">
                        @foreach($schools as $school)
                          <option value="{{ $school['school_id'] }}" {{ (isset($school['school_id']) && $study['school_id'] == $school['school_id']) ? 'selected' : '' }}>{{ $school['name'] }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="panel-body">
                        Foto: {!! Form::file('image') !!}
                    </div>
                </div>

                <div class="btn-group">
                    {!! Form::submit('Opslaan', array('class'=>'btn btn-default')) !!}
                </div>
            {!! Form::close() !!}<br>

        </div>
    </div>
</div>
@endsection
