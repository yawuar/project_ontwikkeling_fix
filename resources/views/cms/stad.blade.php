@extends('layouts.cms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Introtekst</h3>
            {!! Form::open(array('url'=>url('/cms/stad-introtekst'),'method'=>'POST')) !!}
            <textarea id="textarea" class="form-control" placeholder="Introtekst aanpassen" name="introtekst" rows="5" required>{{ $introtekst or '' }}</textarea>
            <div class="btn-group">
            {!! Form::submit('Opslaan', array('class'=>'btn btn-default')) !!}
            {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Lijst van atypische locaties</h3>
            <button type="button" class="btn btn-default" onclick="window.location='{{ url('cms/location/editor/new') }}'">Nieuwe locatie toevoegen</button><br/><br/>
            @foreach ($locations as $location)
                <a href="{{ url('/cms/location/editor/' . $location->id) }}">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $location->name }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
