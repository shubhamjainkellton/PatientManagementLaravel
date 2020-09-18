@extends ('layouts')

@section('nav')

    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/appointment" class="nav-link">View Appointment List</a>
        </li>
      @if(session('role_id')==1 || session('role_id')==3)
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/appointment/create" class="nav-link">Add Appointment</a>
        </li>
      @endif  
    </ul>
    <div class="col-md-4">
    <form action="/appointment/search" method="get">
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
                <h3 class="card-title">Appointment List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th scope="col">S. No.</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    
                    @if(session('role_id')===1) <th scope="colspan = 2">Actions</th> @endif
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach($appointments as $appointment)
                  
                  <tr>
                   @if(session('department') == $appointment->department) 
                    <th scope="row">{{++$i}}</th>
                    <td>{{$appointment->patient_name}}</td>
                    <td>{{$appointment->doc_name}}</td>
                    <td>{{$appointment->date}}</td>
                    <td>{{$appointment->time}}</td>
                    @endif
                    @if(session('role_id')==1 || session('role_id')==3)
                    <th scope="row">{{++$i}}</th>
                    <td>{{$appointment->patient_name}}</td>
                    <td>{{$appointment->doc_name}}</td>
                    <td>{{$appointment->date}}</td>
                    <td>{{$appointment->time}}</td>
                    @endif
                    @if(session('role_id') === 1)
                    <td>
                      <a href="appointment/{{$appointment->id}}/edit" class='update btn btn-warning btn-sm'><span class="glyphicon glyphicon-pencil"></span></a>
                    </td>  
                    
                    <td>
                    <form action="appointment/{{$appointment->id}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="delete btn btn-danger btn-sm" type="submit"><span class="glyphicon glyphicon-trash"></span></button> 
                    </form>   
                    </td>
                    @endif
                  </tr>
                  
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