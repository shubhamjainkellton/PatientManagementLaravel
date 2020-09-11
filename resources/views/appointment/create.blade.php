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
                <h3 class="card-title">Add Patient Details</h3>
              </div>
              <br>
            <form role="form" method="POST" action="/appointment" >
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
                        value = "{{old('name')}}" 
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
                         value = "{{old('age')}}" 
                         >
                        @error('age')
                        <p class="help is-danger">{{ $errors->first('age')}}</p>
                        @enderror
                </div> 
                <br>  
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <br>
                    <select name="gender" id="gender">
                        <option value="" >Select Options</option>
                        <option value="male" >Male</option>
                        <option value="female" >Female</option>
                        <option value="others" >Others</option>
                    </select>   
                        @error('gender')
                        <p class="help is-danger">{{ $errors->first('gender')}}</p>
                        @enderror
                </div> 
                <br>  
                <div class="form-group">
                    <label for="blood_grp">Blood Group</label>
                    <br>
                    <select name="blood_grp" id="blood_grp">
                        <option value="">Select Options</option>
                        <option value="O postive" >O+ve</option>
                        <option value="O negative" >O-ve</option>
                        <option value="A positive" >A+ve</option>
                        <option value="A negative" >A+ve</option>
                        <option value="B positive" >B+ve</option>
                        <option value="B negative" >B-ve</option>
                        <option value="AB positive" >AB+ve</option>
                        <option value="AB negative" >AB-ve</option>

                    </select>
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
                         value = "{{old('dob')}}"
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
                         value = "{{old('email')}}"
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
                        value = "{{old('address')}}"
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
                         value = "{{old('phone_no')}}"
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
                    <h3 class="card-title">Add Appointment</h3>
                </div>
                <div class="card-body">
                <div class="form-group">
                    <label for="patient_name">Patient Name</label>
                        <input type= 'text' 
                        class='input @error ("patient_name") is-danger @enderror'
                        id="patient_name" 
                        name="patient_name" 
                        value="{{old('patient_name')}}" >
                        @error('patient_name')
                        <p class="help is-danger">{{ $errors->first('patient_name')}}</p>
                        @enderror 
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