@extends ('layout')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
@endsection

@section('content')
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">S. No.</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Phone_no</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  {{$serial_no = 0}}
    @foreach($admins as $serial_no => $user)
    @if(($user->role_id) == '1')
    <tr>
     
      <th scope="row">{{$serial_no +1}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->address}}</td>
      <td>{{$user->phone_no}}</td>
      <td>
        <a href="admin/{{$user->id}}/edit" class='update btn btn-warning btn-sm'><span class="glyphicon glyphicon-pencil"></span></a>
        
        <form action="admin/{{$user->id}}" method="post">
          @csrf
          @method('DELETE')
	        <button type="button" class="delete btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button>
        </form>
      </td>
      
    </tr>
    @endif
    @endforeach
  </tbody>
</table>
@endsection