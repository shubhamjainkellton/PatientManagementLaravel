@extends ('layouts')

@section('nav')

    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/staff" class="nav-link">View Staff</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/staff/create" class="nav-link">Add Staff</a>
        </li>
    </ul>
    <div class="col-md-4">
    <form action="/staff/search" method="get">
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
   

    <!-- Right navbar links -->
 </nav>  
@endsection
@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row-auto">
          <div class="col-auto">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">View Staff</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th scope="col"> S. No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone_no</th>
                    @if(session('role_id')===1) <th scope="colspan = 2">Actions</th> @endif
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach($staffs as $staff)
                  @if(($staff->role_id) == '3') 
                  <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{$staff->name}}</td>
                    <td>{{$staff->email}}</td>
                    <td>{{$staff->address}}</td>
                    <td>{{$staff->phone_no}}</td>
                    @if(session('role_id')===1)
                    <td>
                      <a href="staff/{{$staff->id}}/edit" class='update btn btn-warning btn-sm'><span class="glyphicon glyphicon-pencil"></span></a>
                    </td>
                    
                    <td>  
                      <form action="staff/{{$staff->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="delete btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button>
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