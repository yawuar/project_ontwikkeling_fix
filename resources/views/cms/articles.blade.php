@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <button type="button" class="btn btn-default" onclick="window.location='{{ url('cms') }}'">< Back</button><br><br>

            @foreach ($articles as $article)
            <a href="articles/{{ $article->id }}">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $article->title }}</div>
                </div>
            </a>
            @endforeach

            <button type="button" class="btn btn-default" onclick="window.location='{{ url('cms/articles/new') }}'">New article</button>

        </div>
    </div>
</div>
@endsection
