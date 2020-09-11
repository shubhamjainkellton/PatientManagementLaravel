@extends ('layouts')

@section('nav')

    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/patient" class="nav-link">View Patients</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/patient/create" class="nav-link">Add Patient</a>
        </li>
    </ul>
    <div class="col-md-4">
    <form action="/patient/search" method="get">
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
                <h3 class="card-title">View Patients</h3>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>S. No.</th>
                      <th>Patient Id</th>
                      <th>Patient Name</th>
                      <th>Age</th>
                      <th>Gender</th>
                      <th>Blood Group</th>
                      <th>D.O.B.</th>
                      <th>Make Appointment</th>
                      @if(session('role_id')===1) <th scope="colspan = 2">Actions</th> @endif
                    </tr>
                  </thead>
                  @foreach($patients as $patient)
                  <tbody>
                    <tr>
                      <td>{{++$i}}</td>
                      <td>{{$patient->id}}</td>
                      <td>{{$patient->name}}</td>
                      <td>{{$patient->age}}</td>
                      <td>{{$patient->gender}}</td>
                      <td>{{$patient->blood_grp}}</td>
                      <td>{{$patient->dob}}</td>
                      <td>
                      <a href="appointment/{{$patient->id}}/show" class='update btn btn-warning btn-sm'><span class="glyphicon glyphicon-share-alt"></span></a>
                      </td>
                      @if(session('role_id')===1)
                      
                      <td>
                      <a href="patient/{{$patient->id}}/edit" class='update btn btn-warning btn-sm'><span class="glyphicon glyphicon-pencil"></span></a>
                      </td>
                     
                      <td>
                      <form action="patient/{{$patient->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="delete btn btn-danger btn-sm" type="submit"><span class="glyphicon glyphicon-trash"></span></button> 
                      </form>

                      </td>
                      @endif
                    </tr>
                  </tbody>
                  @endforeach
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