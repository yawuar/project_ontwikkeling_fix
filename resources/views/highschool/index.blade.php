@extends('layouts.cms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Lijst van alle opleidingen</h2>
            <button type="button" class="btn btn-default" onclick="window.location='{{ url('cms/studeren/scholen/editor/new') }}'">Nieuwe School toevoegen</button><br/><br/>
            @foreach ($schools as $school)
                <a href="/cms/studeren/scholen/editor/{{ $school->school_id }}">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $school->name }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
