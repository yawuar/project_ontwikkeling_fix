@extends('layouts.cms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @if(!$addingUser)
                <button type="button" class="btn btn-default" onclick="window.location='{{ url('cms/gebruikers/new') }}'">Nieuwe gebruiker aanmaken</button>
            @else
                <div class="panel panel-default">
                    <div class="panel-heading">Nieuwe gebruiker aanmaken</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/cms/addNewUser') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Naam</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail Adress</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Wachtwoord</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="user_role" class="col-md-4 control-label">Gebruikersrol</label>

                                <div class="col-md-6">
                                    <select name="user_role" class="form-control">
                                        <option value="0">User</option>
                                        <option value="1">Writer</option>
                                        <option value="2">Editor</option>
                                        <option value="3">Admin</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Gebruiker Aanmaken
                                    </button>
                                    <a href="/cms/gebruikers" class="btn btn-danger pull-right">Annuleren</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif

                <table class="table table-striped">
                <thead>
                    <th>Gebruikersnaam</th>
                    <th>Email</th>
                    <th>Gebruikersrol</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <form action="/cms/changeUserPermissions" role="form" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <select name="permissions">
                            <option value="0" {{ ($user->user_role == 0) ? "selected" : "" }}>User</option>
                            <option value="1" {{ ($user->user_role == 1) ? "selected" : "" }}>Writer</option>
                            <option value="2" {{ ($user->user_role == 2) ? "selected" : "" }}>Editor</option>
                            <option value="3" {{ ($user->user_role == 3) ? "selected" : "" }}>Admin</option>
                        </select>
                        <input type="submit" value='aanpassen' />
                        </form>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
