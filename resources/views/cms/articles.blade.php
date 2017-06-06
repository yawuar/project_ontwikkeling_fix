@extends('layouts.cms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <button type="button" class="btn btn-default" onclick="window.location='{{ url('cms') }}'">< Terug</button><br/><br/>
            @if (!$articleUriPrefix)
                <button type="button" class="btn btn-default" onclick="window.location='{{ url('cms/articles/editor/new') }}'">Nieuw artikel aanmaken</button>
            @endif
        </div>
    </div>

    <div class="row">
            
        <div class="col-md-8 col-md-offset-2">
            <h2>(Editor) Review wachtrij</h2>
            @foreach ($articles as $article)
                @if ($article->is_accepted == 0)
                <a href="{{ url('cms/articles/editor') . '/' . $articleUriPrefix . $article->id }}">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $article->title }}</div>
                    </div>
                </a>
                @endif
            @endforeach
        </div>

        <div class="col-md-8 col-md-offset-2">
            <h2>Gepubliceerde artikelen</h2>
            @foreach ($articles as $article)
                @if ($article->is_accepted == 1)
                <a href="{{ url('cms/articles/editor') . '/' . $articleUriPrefix . $article->id }}">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $article->title }}</div>
                    </div>
                </a>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
