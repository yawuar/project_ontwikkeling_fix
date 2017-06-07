@extends('layouts.cms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <button type="button" class="btn btn-default" onclick="window.location='{{ url('cms/studeren/scholen') }}'">< Terug</button>
            @if(!empty($school))
                <form action="{{ url('/cms/studeren/scholen/study-delete/' . $school->school_id ) }}" method="POST", class="form-horizontal">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE">
                    <!--Future: ask for confirmation-->
                    <button type="submit" class="btn btn-danger pull-right">School verwijderen</button>
                </form>
            @endif
        </div>
    </div><br>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(array('url'=>url('/cms/studeren/scholen/study-post'),'method'=>'POST', 'files'=>true)) !!}
                <input type="hidden" name="school_id" value="{{ $school['school_id'] or 'new' }}">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <input class="form-control" placeholder="School naam" type="text" name="name" value="{{ $school->name or '' }}" required>
                    </div>

                    <div class="panel-heading">
                        <input class="form-control" placeholder="School afkorting" type="text" name="abbreviation" value="{{ $school->abbreviation or '' }}" required>
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
