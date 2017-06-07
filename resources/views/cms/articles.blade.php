@extends('layouts.cms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (!$articleUriPrefix)
                <button type="button" class="btn btn-default" onclick="window.location='{{ url('cms/articles/editor/new') }}'">Nieuw artikel aanmaken</button>
            @endif
        </div>
    </div>

    <div class="row">
        
        @if (Auth::user()->user_role >= 2)
        <div class="col-md-8 col-md-offset-2">
            <h3>Review wachtrij</h3>
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
        @endif

        @if (Auth::user()->user_role == 1)
        <div class="col-md-8 col-md-offset-2">
            <h3>Uw ongepubliceerde artikelen</h3>
            @foreach ($articles as $article)
                @if ($article->is_accepted == 0 &&  $article->user_id == Auth::user()->id)
                <a href="{{ url('cms/articles/editor') . '/' . $articleUriPrefix . $article->id }}">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $article->title }}</div>
                    </div>
                </a>
                @endif
            @endforeach
        </div>
        @endif

        <div class="col-md-8 col-md-offset-2">
            <h3>Gepubliceerde artikelen</h3>
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
