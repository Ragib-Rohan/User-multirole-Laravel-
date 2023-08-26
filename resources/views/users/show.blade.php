@extends('layout.app')

@section('content')
<h1>User Details</h1>
<div class="row">
    <div class="col-sm-4">
            <label for="name">Name</label>
            <p>{{$user->name}}</p>
    </div>
    <div class="col-sm-4">
            <label for="email">Email</label>
            <p>{{$user->email}}</p>
    </div>
    <div class="col-sm-4">
            <label for="role">Roles</label>
            @foreach ($user->roles as $role )
                <p >{{$role->name}}</p>
            @endforeach
    </div>
    </div>
    @endsection