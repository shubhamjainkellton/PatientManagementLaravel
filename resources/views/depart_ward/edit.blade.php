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
    
    
    

    <!-- Right navbar links -->
  
@endsection
@section('content')


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" >
        <div class="row-auto">
          <!-- left column -->
          <div class="col-auto">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Discharged Patient</h3>
              </div>
              <br>
            <form role="form" method="POST" action="/depart_ward/{{$warddepart->id}}" >
            @csrf
            @method('PUT')
            <div class="card-body">
              @foreach($patients as $patient) 
                <div class="form-group">
                    <label for="patient_name">Patient Name</label>
                    <br>
                      <select name="patient_name">
                        <option value="{{$warddepart->patient_name}}" >{{$warddepart->patient_name}}</option>
                        <option value="{{$patient->patient_name}}" >{{$patient->patient_name}}</option>
                      </select>
                        @error('patient_name')
                        <p class="help is-danger">{{ $errors->first('patient_name')}}</p>
                        @enderror
                </div>
                <br>  
                <div class="form-group">
                    <label for="doc_name">Doctor</label>
                    <br>
                      <select name="doc_name">
                        <option value="{{$warddepart->doc_name}}" >{{$warddepart->doc_name}}</option>
                        <option value="{{$patient->doc_name}}" >{{$patient->doc_name}}</option>
                      </select>  
                        @error('doc_name')
                        <p class="help is-danger">{{ $errors->first('doc_name')}}</p>
                        @enderror
                </div>
                <br> 
                <div class="form-group">
                    <label for="department">Department</label>
                    <br>
                    <select name="department" id="department">
                    <option value="{{$warddepart->department}}" >{{$warddepart->department}}</option>
                      <option value="{{$patient->department}}" >{{$patient->department}}</option>   
                    </select>
                        @error('department')
                        <p class="help is-danger">{{ $errors->first('department')}}</p>
                        @enderror
                </div>
                <br>    
                <div class="form-group">
                    <label for="ward_type">Ward Type</label>
                    <br>
                      <select name="ward_type" id="ward_type">
                      <option value="{{$warddepart->ward_type}}" >{{$warddepart->ward_type}}</option>
                        <option value="general" >General</option>
                        <option value="private" >Private</option>
                        <option value="emergency" >Emergency</option>
                      </select>
                        @error('ward_type')
                        <p class="help is-danger">{{ $errors->first('ward_type')}}</p>
                        @enderror
                </div> 
                <br>
                <div class="form-group">
                    <label for="bed_no">Bed No</label>
                    <br>
                    <select name="bed_no" id="bed_no">
                      <option value="{{$warddepart->bed_no}}">{{$warddepart->bed_no}}</option>
                      <option value="{{$patient->bed_no}}">{{$patient->bed_no}}</option>
                      
                    </select>
                        @error('bed_no')
                        <p class="help is-danger">{{ $errors->first('bed_no')}}</p>
                        @enderror
                </div> 
                @endforeach
                <br> 
                <div class="form-group">
                    <label for="date">Date</label>
                    <br>
                        <input type="date" class="input @error('date') is-danger @enderror" 
                        name="date" 
                        id="date"
                        value="{{$warddepart->date}}"
                        > 
                        @error('date')
                        <p class="help is-danger">{{ $errors->first('date')}}</p>
                        @enderror
                    
                </div>
                <br> 
                <div class="form-group">
                    <label for="No_of_days">No of Days</label>
                    <br>
                        <input type="number"
                        class="input @error('No_of_days') is-danger @enderror"
                         name="No_of_days" 
                         id="No_of_days"
                         value="{{$warddepart->No_of_days}}"
                         >
                        @error('No_of_days')
                        <p class="help is-danger">{{ $errors->first('No_of_days')}}</p>
                        @enderror
                </div> 
                <br> 
                <div class="form-group">
                    <label for="charges">Charges</label>
                    <br>
                        <input type="number"
                        class="input @error('charges') is-danger @enderror"
                         name="charges" 
                         id="charges"
                         value="{{$warddepart->charges}}"
                         >
                        @error('charges')
                        <p class="help is-danger">{{ $errors->first('charges')}}</p>
                        @enderror
                </div> 
                <br> 
                <div>
                    <input id="status" name="status" type="hidden" value=1>
                </div>
                </div>
                <br>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
                </div> 
            </form>
        </div>
    </div>
    </div>
    </div>
</section> 
@endsection