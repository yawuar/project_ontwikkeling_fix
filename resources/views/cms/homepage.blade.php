@extends('layouts.cms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Tagline</h3>
            {!! Form::open(array('url'=>url('/cms/homepage-tagline'),'method'=>'POST')) !!}
            <input class="form-control" placeholder="Tagline" type="text" name="tagline" value="{{ $tagline or '' }}" required>
            {!! Form::submit('Opslaan', array('class'=>'btn btn-default')) !!}
            {!! Form::close() !!}

            <h3>Introtekst</h3>
            {!! Form::open(array('url'=>url('/cms/homepage-introtekst'),'method'=>'POST')) !!}
            <textarea id="textarea" class="form-control" placeholder="Introtekst aanpassen" name="introtekst" rows="5" required>{{ $introtekst or '' }}</textarea>
            <div class="btn-group">
            {!! Form::submit('Opslaan', array('class'=>'btn btn-default')) !!}
            {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>
@endsection
