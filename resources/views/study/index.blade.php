@extends('layouts.cms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Lijst van alle opleidingen</h2>
            <button type="button" class="btn btn-default" onclick="window.location='{{ url('cms/studeren/opleidingen/editor/new') }}'">Nieuwe opleiding toevoegen</button><br/><br/>
            @foreach ($studies as $study)
                <a href="/cms/studeren/opleidingen/editor/{{ $study->opleiding_id }}">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $study->name }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
