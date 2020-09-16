@extends ('layouts')

@section('nav')

    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/admit_ward" class="nav-link">View Admitted Patient List</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/admit_ward/create" class="nav-link">Admit Patient</a>
        </li>
    </ul>
    <div class="col-md-4">
    <form action="/admit_ward/search" method="get">
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
                <h3 class="card-title">Admitted Patient List</h3>
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
                    <th scope="col">Discharge Patient</th>
                    @if(session('role_id')===1) <th scope="colspan = 2">Actions</th> @endif
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach($wardadmits ?? '' as $wardadmit)
                  @if($wardadmit->status === 0)
                  <tr>
                    
                    <th scope="row">{{++$i}}</th>
                    <td>{{$wardadmit->patient_name}}</td>
                    <td>{{$wardadmit->ward_type}}</td>
                    <td>{{$wardadmit->doc_name}}</td> 
                    <td>
                      <a href="depart_ward/{{$wardadmit->id}}/create" class='update btn btn-warning btn-sm'><span class="glyphicon glyphicon-minus-sign"></span></a>
                    </td>
                    @if(session('role_id') === 1)
                    <td>
                      <a href="admit_ward/{{$wardadmit->id}}/edit" class='update btn btn-warning btn-sm'><span class="glyphicon glyphicon-pencil"></span></a>
                    </td>  
                    
                    <td>
                    <form action="admit_ward/{{$wardadmit->id}}" method="POST">
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
              <!-- /.card-body -->
          </div>
            <!-- /.card -->
        </div>
      </div>
  </div>
</div>
</section>
@endsection