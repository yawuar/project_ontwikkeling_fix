@extends('layouts.cms')

@section('content')



<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <button type="button" class="btn btn-default" onclick="window.location='{{ url('cms/articles') }}'">< Terug</button>
            @if(!empty($article))
                <form action="{{ url('/cms/article-delete') }}" method="POST", class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="postId" value="{{ $article->id }}">
                    <!--Future: ask for confirmation-->
                    <button type="submit" class="btn btn-danger pull-right">Artikel verwijderen</button>
                </form>
            @endif
        </div>
    </div><br>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(array('url'=>'/cms/article-post','method'=>'POST', 'files'=>true)) !!}
                <input type="hidden" name="postId" value="{{ $article->id or 'new' }}">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <input class="form-control" placeholder="Artikel titel" type="text" name="title" value="{{ $article->title or '' }}" required>
                    </div>

                    <div class="panel-body">
                        <textarea id="textarea" class="form-control" placeholder="Artikel tekst" name="content" rows="10" required>{{ $article->content or '' }}</textarea>
                    </div>
                    @if(!empty($article->picture_url))
                        <div class="panel-body">
                            <img style='max-width: 100%' src='{{ URL::to('/') }}/{!! $article->picture_url !!}'>
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

            @if(!empty($article))
                <form action="{{ url('/cms/article-toggle-accept') }}" method="POST", class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="postId" value="{{ $article->id }}">
                    @if($article->is_accepted == 0)
                        <button type="submit" class="btn btn-success">Accepteer dit artikel</button>
                    @else
                        <button type="submit" class="btn btn-danger">Weiger dit artikel</button>
                    @endif
                </form>
            @endif

        </div>
    </div>
</div>

@endsection
