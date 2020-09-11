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
                <h3 class="card-title">Patient Details</h3>
              </div>
              <br>
              <form role="form" method="POST" action="/appointment/{{$patient->id}}" >
            @csrf
            <tr>
            
            <div class="card-body">
            
                <div class="form-group">
                    <label for="name">Patient Name</label>
                    <br>
                        <input type="text" 
                        class="input @error('name') is-danger @enderror" 
                        name="name" 
                        id="name" 
                        value = "{{$patient->name}}" 
                        >
                        @error('name')
                        <p class="help is-danger">{{ $errors->first('name')}}</p>
                        @enderror
                </div>
                <br>
                <div class="form-group">
                    <label for="age">Age</label>
                    <br>
                        <input type="number"
                        class="input @error('age') is-danger @enderror"
                         name="age" 
                         id="age"
                         value = "{{$patient->age}}" 
                         >
                        @error('age')
                        <p class="help is-danger">{{ $errors->first('age')}}</p>
                        @enderror
                </div> 
                <br>  
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <br>
                    <input type="text"
                        class="input @error('gender') is-danger @enderror"
                         name="gender" 
                         id="gender"
                         value = "{{$patient->gender}}" 
                         >
                       
                        @error('gender')
                        <p class="help is-danger">{{ $errors->first('gender')}}</p>
                        @enderror
                </div> 
                <br>  
                <div class="form-group">
                    <label for="blood_grp">Blood Group</label>
                    <br>
                    <input type="text"
                        class="input @error('blood_grp') is-danger @enderror"
                         name="blood_grp" 
                         id="blood_grp"
                         value = "{{$patient->blood_grp}}" 
                         >
                    
                        @error('blood_grp')
                        <p class="help is-danger">{{ $errors->first('blood_grp')}}</p>
                        @enderror
                </div> 
                <br>  
                <div class="form-group">
                    <label for="dob">Date Of Birth</label>
                    <br>
                        <input type="date"
                        class="input @error('dob') is-danger @enderror"
                         name="dob" 
                         id="dob"
                         value = "{{$patient->dob}}"
                         >
                        @error('dob')
                        <p class="help is-danger">{{ $errors->first('dob')}}</p>
                        @enderror
                </div> 
                <br>  
                <div class="form-group">
                    <label for="email">Email</label>
                    <br>
                        <input type="email"
                        class="input @error('email') is-danger @enderror"
                         name="email" 
                         id="email"
                         value = "{{$patient->email}}"
                         >
                        @error('email')
                        <p class="help is-danger">{{ $errors->first('email')}}</p>
                        @enderror
                </div> 
                <br> 
                <div class="form-group">
                    <label for="address">Address</label>
                    <br>
                        <input type="text" class="input @error('address') is-danger @enderror" 
                        name="address" 
                        id="address"
                        value = "{{$patient->address}}"
                        > 
                        @error('address')
                        <p class="help is-danger">{{ $errors->first('address')}}</p>
                        @enderror
                    
                </div>
                <br>    
                <div class="form-group">
                    <label for="phone_no">Phone No</label>
                    <br>
                        <input type="phone"
                        class="input @error('phone_no') is-danger @enderror"
                         name="phone_no" 
                         id="phone_no"
                         value = "{{$patient->phone_no}}"
                         >
                        @error('phone_no')
                        <p class="help is-danger">{{ $errors->first('phone_no')}}</p>
                        @enderror
                </div> 
                </div>
                </tr>
                <tr>
                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Repeat Appointment</h3>
                </div>
                <div class="card-body">
                <div class="form-group">
                    <label for="patient_id">Patient Id</label>
                    <br>
                      <select name="patient_id" >
                       
                        <option value="{{$patient->id}}" >{{$patient->id}}</option>
                      
                      </select>
                        @error('patient_id')
                        <p class="help is-danger">{{ $errors->first('patient_id')}}</p>
                        @enderror
                </div>
                <div class="form-group">
                @if('$patient->id')
                <input type= 'hidden' id="patient_name" name="patient_name" value="{{$patient->name}}" >
                @endif
                </div>
                
                <br> 
               
                <div class="form-group">
                    <label for="doc_name">Doctor</label>
                    <br>
                      <select name="doc_name">
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
                        > 
                        @error('time')
                        <p class="help is-danger">{{ $errors->first('time')}}</p>
                        @enderror
                </div>
                </div>
                </div>
                </tr>
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