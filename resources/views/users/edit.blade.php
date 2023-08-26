@extends('layout.app')

@section('content')
<h1>Edit User</h1>
<form action="{{route('users.update', $user->id)}}" method="POST">
     @csrf
     @method('PUT')
     <div class="form-group">
        <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{$user->name}}">
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
     </div>
     <div class="form-group">
        <label for="name">Email</label>
            <input type="email" name="email" class="form-control" value="{{$user->email}}">
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
     </div>
     <div class="form-group">
        <label for="password">Password</label>
            <input type="password" name="password" class="form-control" >
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
     </div>

     <div class="form-group">
        <label for="roles">Roles</label>
         <select class="form-select" name="roles[]" multiple aria-label="multiple select example">
            @foreach ($roles as $role )
                <option value="{{$role->id}}"
                @if(
                    in_array($role->id, $user->roles->pluck('id')->toArray())
                ) selected @endif
                >{{$role->name}}</option>
            @endforeach
              </select>
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
     </div>
     <button type="submit" class="btn btn-dark px-4">Update User</button>
</form>
@endsection