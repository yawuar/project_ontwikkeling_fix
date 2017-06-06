@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <button type="button" class="btn btn-default" onclick="window.location='{{ url('cms/articles') }}'">< Back</button><br><br>

            <form action="{{ url('/post-article') }}" method="POST", class="form-horizontal">
                {{ csrf_field() }}
                <div class="panel panel-default">
                    <div class="panel-heading"><input class="form-control" placeholder="Article title" type="text" name="title" value="{{ $article->title or '' }}"></div>

                    <div class="panel-body">
                        <textarea class="form-control" placeholder="Article content" name="content" rows="10">{{ $article->content or '' }}</textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
