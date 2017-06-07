@extends('layouts.cms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <button type="button" class="btn btn-default" onclick="window.location='{{ url('cms/studeren/faculties') }}'">< Terug</button>
            @if(!empty($faculty))
                <form action="{{ url('/cms/studeren/faculties/study-delete/' . $faculty->faculty_id ) }}" method="POST", class="form-horizontal">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE">
                    <!--Future: ask for confirmation-->
                    <button type="submit" class="btn btn-danger pull-right">Faculteit verwijderen</button>
                </form>
            @endif
        </div>
    </div><br>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(array('url'=>url('/cms/studeren/faculties/study-post'),'method'=>'POST', 'files'=>true)) !!}
                <input type="hidden" name="faculty_id" value="{{ $faculty['faculty_id'] or 'new' }}">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <input class="form-control" placeholder="Faculteit naam" type="text" name="name" value="{{ $faculty->name or '' }}" required>
                    </div>
                    @if(!empty($faculty->image_url))
                        <div class="panel-body">
                            <img style='max-width: 100%' src='{{ URL::to('/') }}/{!! $faculty->image_url !!}'>
                        </div>
                    @endif
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
