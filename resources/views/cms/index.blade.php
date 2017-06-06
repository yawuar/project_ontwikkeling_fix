@extends('layouts.cms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <a href="cms/articles">
                <div class="panel panel-default">
                    <div class="panel-heading">Artikelen</div>
                </div>
            </a>

            <a href="cms/articles/gate15">
                <div class="panel panel-default">
                    <div class="panel-heading">Gate 15 Artikelen</div>
                </div>
            </a>

            <a href="cms/opleidingen">
                <div class="panel panel-default">
                    <div class="panel-heading">Opleidingen</div>
                </div>
            </a>

            <a href="cms/users">
                <div class="panel panel-default">
                    <div class="panel-heading">Gebruikers</div>
                </div>
            </a>
            
        </div>
    </div>
</div>
@endsection
