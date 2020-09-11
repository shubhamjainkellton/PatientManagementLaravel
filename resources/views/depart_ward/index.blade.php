@extends ('layouts')

@section('nav')

    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/depart_ward" class="nav-link">View Discharged Patient List</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/depart_ward/create" class="nav-link">Discharge Patient</a>
        </li>
    </ul>
    <div class="col-md-4">
    <form action="/depart_ward/search" method="get">
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
                <h3 class="card-title">Discharged Patient List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th scope="col">S. No.</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Ward Type</th>
                    <th scope="col">Doctor Name</th>
                    @if(session('role_id')===1) <th scope="colspan = 2">Actions</th> @endif
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach($warddeparts as $warddepart)
                  @if($warddepart->status === 1)
                  <tr>
                    
                    <th scope="row">{{++$i}}</th>
                    <td>{{$warddepart->patient_name}}</td>
                    <td>{{$warddepart->ward_type}}</td>
                    <td>{{$warddepart->doc_name}}</td>
                    @if(session('role_id') === 1)
                    <td>
                      <a href="depart_ward/{{$warddepart->id}}/edit" class='update btn btn-warning btn-sm'><span class="glyphicon glyphicon-pencil"></span></a>
                    </td>  
                    
                    <td>
                    <form action="depart_ward/{{$warddepart->id}}" method="POST">
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