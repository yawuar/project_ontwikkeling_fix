@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <a href="cms/articles">
                <div class="panel panel-default">
                    <div class="panel-heading">Articles</div>
                </div>
            </a>

            <a href="cms/opleidingen">
                <div class="panel panel-default">
                    <div class="panel-heading">Opleidingen</div>
                </div>
            </a>

            <a href="cms/users">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>
                </div>
            </a>

            <a href="cms/contactinfo">
                <div class="panel panel-default">
                    <div class="panel-heading">Contactinfo</div>
                </div>
            </a>

        </div>
    </div>
</div>
@endsection
