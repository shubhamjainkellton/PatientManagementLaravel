@extends ('layouts')

@section('nav')

    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/doctor" class="nav-link">View Doctor</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/doctor/create" class="nav-link">Add Doctor</a>
        </li>
    </ul>
    <div class="col-md-4">
    <form action="/doctor/search" method="get">
      <div class="input-group">
        <input type="search" name="search" class="form-control">
        <span class="input-group-btn">
        <button type="submit" class="btn btn-primary">Search</button>
        </span>
      </div>
    </form>
  </div>
    <br>
    <br>
    <!-- SEARCH FORM -->
    

    <!-- Right navbar links -->
  
@endsection

@section('content')

<section class="content">
      <div class="container-fluid">
        <div class="row-auto">
          <div class="col-auto">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">View Doctor</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th scope="col">S. No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone_no</th>
                    <th scope="col">Department</th>
                    <th scope="col">Time From</th>
                    <th scope="col">Time To</th>
                    <th scope="col">Consultancy Fee</th>
                    <th scope="col">Consultancy Days</th>
                    @if(session('role_id')===1) <th scope="colspan = 2">Actions</th> @endif
                  </tr>
                </thead>
  <tbody>
    
    @foreach($users as $user)
    @if(($user->role_id) == '2')
    <tr>
      
      <th scope="row">{{++$i}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->address}}</td>
      <td>{{$user->phone_no}}</td>
      <td>{{$user->department}}</td>
      <td>{{$user->time_from}}</td>
      <td>{{$user->time_to}}</td>
      <td>{{$user->consultancy_fee}}</td>
      <td>{{$user->consultancy_days}}</td>
      @if(session('role_id')===1)
      <td>
        <a href="doctor/{{$user->id}}/edit" class='update btn btn-warning btn-sm'><span class="glyphicon glyphicon-pencil"></span></a>
      </td>  
        
      <td>
        <form action="doctor/{{$user->id}}" method="POST">
          @csrf
          @method('DELETE')
          <button class="delete btn btn-danger btn-sm" type="submit"><span class="glyphicon glyphicon-trash"></span></button> 
        </form> 
      </td>
      @endif
      </tr>
      @endif
      @endforeach
   
      </tbody>
      </table>
      </div>
              <!-- /.card-body -->
    </div>
            <!-- /.card -->
    </div>
    </div>
  </div>
</section>
@endsection