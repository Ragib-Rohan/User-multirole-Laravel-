@extends('layout.app')

@section('content')

<h3>All users</h3>

<a href="{{route('users.create')}}" class="btn btn-dark mb-2" title="Add New User"><i class="bi bi-person-plus-fill h1"></i></a>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Roles</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($users as $user)
        <tr>
          <th scope="row">{{$loop->index+1}}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>
            @foreach ($user->roles as $role )
                {{$role->name}}{{ !$loop->last ? ', ' : ''}}
            @endforeach
          </td>
          <td class="d-inline">
            <a href="{{ route('users.show', $user->id) }}" title="View" class="btn btn-primary btn-sm "><i class="bi bi-person-circle"></i></a>
            <a href="{{route('users.edit',$user->id)}}" title='Edit' class="btn btn-sm btn-success"><i class="bi bi-pencil-fill"></i></a>
            <form action="{{route('users.destroy',$user->id)}}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm d-inline" title="Delete"><i class="bi bi-x-octagon"></i></button>
            </form>
          </td>
        </tr> 
      @endforeach  
  </tbody>
</table>

@endsection