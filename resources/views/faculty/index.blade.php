@extends('layouts.cms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Lijst van alle faculteiten</h3>
            <button type="button" class="btn btn-default" onclick="window.location='{{ url('cms/studeren/faculties/editor/new') }}'">Nieuwe Faculteit toevoegen</button><br/><br/>
            @foreach ($faculties as $faculty)
                <a href="{{ url('/cms/studeren/faculties/editor/' . $faculty->faculty_id) }}">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $faculty->name }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
