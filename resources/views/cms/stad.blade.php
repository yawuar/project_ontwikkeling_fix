@extends('layouts.cms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="btn-group">
                <button type="button" class="btn btn-default" onclick="window.location='{{ url('cms') }}'">< Terug</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Introtekst</h2>
            {!! Form::open(array('url'=>'/cms/stad-introtekst','method'=>'POST')) !!}
            <textarea id="textarea" class="form-control" placeholder="Introtekst aanpassen" name="introtekst" rows="5" required>{{ $introtekst or '' }}</textarea>
            <div class="btn-group">
            {!! Form::submit('Opslaan', array('class'=>'btn btn-default')) !!}
            {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Lijst van atypische locaties</h2>
            <button type="button" class="btn btn-default" onclick="window.location='{{ url('cms/location/editor/new') }}'">Nieuwe locatie toevoegen</button><br/><br/>
            @foreach ($locations as $location)
                <a href="/cms/location/editor/{{ $location->id }}">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $location->name }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
