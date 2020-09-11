@extends ('layouts')
@section('nav')

    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/appointment" class="nav-link">View Appointment List</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/appointment/create" class="nav-link">Add Appointment</a>
        </li>
    </ul>
    
    
    

    <!-- Right navbar links -->  
@endsection

@section('content')
<section class="content">
      <div class="container-fluid" >
        <div class="row-auto">
          <!-- left column -->
          <div class="col-auto">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Appointment Details</h3>
              </div>
              <br>
            <form role="form" method="POST" action="/appointment/{{$appointment->id}}" >
            @csrf
            @method('PUT')
            <div class="card-body">
                
                <div class="form-group">
                    <label for="patient_id">Patient Id</label>
                    <br>
                      <input type = 'number'
                      name ='patient_id'
                      id = 'patient_id'
                      value ='{{$appointment->patient_id}}'>
                        @error('patient_id')
                        <p class="help is-danger">{{ $errors->first('patient_id')}}</p>
                        @enderror
                </div>
               
                <div class="form-group">
                  <input type= 'hidden' id="patient_name" name="patient_name" value="{{$appointment->patient_name}}" >
                </div>
               
                <br> 
               
                <div class="form-group">
                    <label for="doc_name">Doctor</label>
                    <br>
                      <select name="doc_name" id="doc_name">
                      <option value="{{$appointment->doc_name}}" >{{$appointment->doc_name}}</option> 
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
                      <option value="{{$appointment->department}}" >{{$appointment->department}}</option>
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
                        value="{{$appointment->date}}"
                        > 
                        @error('date')
                        <p class="help is-danger">{{ $errors->first('date')}}</p>
                        @enderror
                    
                </div>
                <br> 
                <div class="form-group">
                    <label for="time">Time</label>
                    <br>
                        <input type="time" class="input @error('time') is-danger @enderror" 
                        name="time" 
                        id="time"
                        value="{{$appointment->time}}"
                        > 
                        @error('time')
                        <p class="help is-danger">{{ $errors->first('time')}}</p>
                        @enderror
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