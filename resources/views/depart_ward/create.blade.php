@extends ('layouts')
@section('nav')

    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/depart_ward" class="nav-link">View Discharged Patient List</a>
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
                <h3 class="card-title">Discharge Patient</h3>
              </div>
              <br>
            <form role="form" method="POST" action="/depart_ward/{{$wardadmit->id}}" >
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="patient_name">Patient Name</label>
                    <br>
                    <input type="text" class="input @error('patient_name') is-danger @enderror" 
                        name="patient_name" 
                        id="patient_name"
                        value="{{$wardadmit->patient_name}}"> 
                        @error('patient_name')
                        <p class="help is-danger">{{ $errors->first('patient_name')}}</p>
                        @enderror
                </div>
                <br> 
                
                <div class="form-group">
                    <label for="doc_name">Doctor</label>
                    <br>
                    <input type="text" class="input @error('doc_name') is-danger @enderror" 
                        name="doc_name" 
                        id="doc_name"
                        value="{{$wardadmit->doc_name}}"> 
                        @error('doc_name')
                        <p class="help is-danger">{{ $errors->first('doc_name')}}</p>
                        @enderror
                </div>
                <br> 
                
                <div class="form-group">
                    <label for="department">Department</label>
                    <br>
                    <input type="text" class="input @error('department') is-danger @enderror" 
                        name="department" 
                        id="department"
                        value="{{$wardadmit->department}}"> 
                        @error('department')
                        <p class="help is-danger">{{ $errors->first('department')}}</p>
                        @enderror
                </div>
                <br>   
                <div class="form-group">
                    <label for="ward_type">Ward Type</label>
                    <br>
                    <input type="text" class="input @error('ward_type') is-danger @enderror" 
                        name="ward_type" 
                        id="ward_type"
                        value="{{$wardadmit->ward_type}}"> 
                        @error('ward_type')
                        <p class="help is-danger">{{ $errors->first('ward_type')}}</p>
                        @enderror
                </div> 
                <br>
                <div class="form-group">
                    <label for="bed_no">Bed No</label>
                    <br>
                    <input type="number" class="input @error('bed_no') is-danger @enderror" 
                        name="bed_no" 
                        id="bed_no"
                        value="{{$wardadmit->bed_no}}"> 
                        @error('bed_no')
                        <p class="help is-danger">{{ $errors->first('bed_no')}}</p>
                        @enderror
                </div> 
                <br>
                <div class="form-group">
                    <label for="date">Date</label>
                    <br>
                        <input type="date" class="input @error('date') is-danger @enderror" 
                        name="date" 
                        id="date"
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