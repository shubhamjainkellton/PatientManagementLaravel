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
                <h3 class="card-title"> Edit Admitted Patient</h3>
              </div>
              <br>
            <form role="form" method="POST" action="/admit_ward/{{$wardadmit->id}}" >
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="patient_name">Patient Name</label>
                    <br>
                      <select name="patient_name" >
                       <option value="{{$wardadmit->patient_name}}" >{{$wardadmit->patient_name}}</option>
                      @foreach($patients as $patient)
                        <option value="{{$patient->name}}" >{{$patient->name}}</option>
                      @endforeach
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
                        <option value="{{$wardadmit->doc_name}}" >{{$wardadmit->doc_name}}</option>
                      @foreach($docs as $doc)
                        <option value="{{$doc->name}}" >{{$doc->name}}</option>
                      @endforeach
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
                      <option value="{{$wardadmit->department}}" >{{$wardadmit->department}}</option> 
                    @foreach($docs as $doc)
                    @if('$doc->name')
                     <option value="{{$doc->department}}" >{{$doc->department}}</option> 
                    @endif
                    @endforeach   
                    </select>
                        @error('department')
                        <p class="help is-danger">{{ $errors->first('department')}}</p>
                        @enderror
                </div>
                
                <br> 
                <div class="form-group">
                    <label for="date">Date</label>
                    <br>
                        <input type="date" class="input @error('date') is-danger @enderror" 
                        name="date" 
                        id="date"
                        value="{{$wardadmit->date}}"
                        > 
                        @error('date')
                        <p class="help is-danger">{{ $errors->first('date')}}</p>
                        @enderror
                    
                </div>
                <br>    
                <div class="form-group">
                    <label for="ward_type">Ward Type</label>
                    <br>
                      <select name="ward_type" id="ward_type">
                      <option value="{{$wardadmit->ward_type}}" >{{$wardadmit->ward_type}}</option>
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
                        <input type="number"
                        class="input @error('bed_no') is-danger @enderror"
                         name="bed_no" 
                         id="bed_no"
                         value="{{$wardadmit->bed_no}}"
                         >
                        @error('bed_no')
                        <p class="help is-danger">{{ $errors->first('bed_no')}}</p>
                        @enderror
                </div> 
                <br> 
                <div>
                    <input id="status" name="status" type="hidden" value=0>
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