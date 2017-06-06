@extends('layouts.dashboard')

@section('content')
<h1>Hallo</h1>
    @if($user_role > 0)
      @if($user_role == 3)
      <div class="container">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>
                <form action="./dashboard/change" role="form" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" name="user_id" value="{{ $user->id }}">
                  <select name="permissions">
                    <option value="0" {{ ($user->user_role == 0) ? "selected" : "" }}>User</option>
                    <option value="1" {{ ($user->user_role == 1) ? "selected" : "" }}>Writer</option>
                    <option value="2" {{ ($user->user_role == 2) ? "selected" : "" }}>Editor</option>
                    <option value="3" {{ ($user->user_role == 3) ? "selected" : "" }}>Admin</option>
                  </select>
                  <input type="submit" value='change' />
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
          </table>
      </div>
      @endif
    @endif
@endsection
