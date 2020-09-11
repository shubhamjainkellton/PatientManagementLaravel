@extends ('layouts')

@section('nav')

    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/patient" class="nav-link">View Patient</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/patient/create" class="nav-link">Add Patient</a>
        </li>
    </ul>
    <br>
    <br>
    

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
                <h3 class="card-title">Edit Patient</h3>
              </div>
              <br>
            <form role="form" method="POST" action="/patient/{{$patient->id}}">
            @csrf
            @method('PUT')
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
                    <select name="gender" id="gender">
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
                    <select name="blood_grp" id="blood_grp" >
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
                <br>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary button is-link" name="submit" >Submit</button>
                </div> 
            </form>
        </div>
    </div>
    </div>
    </div>
</section>

@endsection