@extends('layouts.cms')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <button type="button" class="btn btn-default" onclick="window.location='{{ url('cms/articles/gate15') }}'">< Terug</button>
            <form action="{{ url('/cms/gate15-article-delete') }}" method="POST", class="form-horizontal">
                {{ csrf_field() }}
                <input type="hidden" name="postId" value="{{ $article->id }}">
                <!--Future: ask for confirmation-->
                <button type="submit" class="btn btn-danger pull-right">Artikel verwijderen</button>
            </form>
        </div>
    </div><br>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>{{ $article->title or '' }}</h3></div>

                <div class="panel-body">
                    <img src="{{ $article->picture_url }}" style="max-width: 100%">
                    <p><strong>{{ $article->published_on }}</strong></p>
                    <p>{!! $article->content or '' !!}</p><br/>
                    <p><a href="{{ $article->article_url }}">Origineel artikel op gate15.be</a></p>
                </div>
            </div>

            <form action="{{ url('/cms/article-toggle-accept') }}" method="POST", class="form-horizontal">
                {{ csrf_field() }}
                <input type="hidden" name="postId" value="{{ $article->id }}">
                <input type="hidden" name="gate15" value="true">
                @if($article->is_accepted == 0)
                    <button type="submit" class="btn btn-success">Accepteer dit artikel</button>
                @else
                    <button type="submit" class="btn btn-danger">Weiger dit artikel</button>
                @endif
            </form>

        </div>
    </div>
</div>
@endsection
