@extends('layouts.cms')

@section('content')



<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <button type="button" class="btn btn-default" onclick="window.location='{{ url('cms/stad') }}'">< Terug</button>
            @if(!empty($location))
                <form action="{{ url('/cms/location-delete') }}" method="POST", class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="locationId" value="{{ $location->id }}">
                    <!--Future: ask for confirmation-->
                    <button type="submit" class="btn btn-danger pull-right">Locatie verwijderen</button>
                </form>
            @endif
        </div>
    </div><br>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(array('url'=>'/cms/location-post','method'=>'POST', 'files'=>true)) !!}
                <input type="hidden" name="locationId" value="{{ $location->id or 'new' }}">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <input class="form-control" placeholder="Locatie titel" type="text" name="name" value="{{ $location->name or '' }}" required>
                    </div>

                    <div class="panel-body">
                        <textarea id="textarea" class="form-control" placeholder="Uitleg" name="content" rows="10" required>{{ $location->content or '' }}</textarea><br/>
                        <input class="form-control" placeholder="URL naar meer info" type="text" name="site_url" value="{{ $location->site_url or '' }}">
                    </div>
                    @if(!empty($location->picture_url))
                        <div class="panel-body">
                            <img style='max-width: 100%' src='{{ URL::to('/') }}/{!! $location->picture_url !!}'>
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
