@extends('layouts.cms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-body">
                    <p>
                        Welkom op de indexpagina van het Dashboard.
                    </p>
                    <p>
                        Kies bovenaan de pagina een pagina of item dat u wilt aanpassen.
                    </p>
                    <a href="{{ route('login') }}">of Log in</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
