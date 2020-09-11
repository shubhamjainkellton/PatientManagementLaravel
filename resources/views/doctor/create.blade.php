@extends ('layouts')
@section('nav')

    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/doctor" class="nav-link">View Doctor</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/doctor/create" class="nav-link">Add Doctor</a>
        </li>
    </ul>
    <br>
    
    

    <!-- Right navbar links -->
  
@endsection
@section('content')
 <!-- Main content -->
    <section class="content">
      <div class="container" >
        <div class="row-auto">
          <!-- left column -->
          <div class="col-auto">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Doctor</h3>
              </div>
              <br>
            <form role="form" method="POST" action="/doctor" >
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
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
                    <label for="password">Password</label>
                    <br>
                        <input type="password"
                        class="input @error('password') is-danger @enderror"
                         name="password" 
                         id="password"
                         value = "{{old('password')}}"
                         >
                        @error('password')
                        <p class="help is-danger">{{ $errors->first('password')}}</p>
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
                <br>
                <div class="form-group">
                    <label for="department">Department</label>
                    <br>
                        <input type="department"
                        class="input @error('phone_no') is-danger @enderror"
                         name="department" 
                         id="department"
                         value = "{{old('department')}}"
                         >
                        @error('department')
                        <p class="help is-danger">{{ $errors->first('department')}}</p>
                        @enderror
                </div>
                <br> 
                <div class="form-group">
                    <label for="time_from">Time From</label>
                    <br>
                        <input type="time"
                        class="input @error('time_from') is-danger @enderror"
                        name="time_from" 
                        id="time_from"
                        value="{{ old('time_from')}}">
                        @error('time_from')
                        <p class="help is-danger">{{ $errors->first('time_from')}}</p>
                        @enderror
                </div>
                <br> 
                <div class="form-group">
                    <label for="time_to">Time To</label>
                    <br>
                        <input type="time"
                        class="input @error('time_to') is-danger @enderror"
                         name="time_to" 
                         id="time_to"
                         value = "{{old('time_to')}}"
                         >
                        @error('time_to')
                        <p class="help is-danger">{{ $errors->first('time_to')}}</p>
                        @enderror    
                </div>
                <br> 
                <div class="form-group">
                    <label for="consultancy_fee">Consultancy Fee</label>
                    <br>
                        <input type="number"
                        class="input @error('consultancy_fee') is-danger @enderror"
                        min = '1'
                        step = 'any'
                        name="consultancy_fee" 
                        id="consultancy_fee"
                        value = "{{old('consultancy_fee')}}"
                        >
                        @error('consultancy_fee')
                        <p class="help is-danger">{{ $errors->first('consultancy_fee')}}</p>
                        @enderror
                </div>
                <br>
                <div class="form-group">
                    <label for="consultancy_days">Consultancy Days</label>
                    <br>
                        <input type="text"
                        class="input @error('consultancy_days') is-danger @enderror"
                        name="consultancy_days" 
                        id="consultancy_days"
                        value = "{{old('consultancy_days')}}"
                        >
                        @error('consultancy_days')
                        <p class="help is-danger">{{ $errors->first('consultancy_days')}}</p>
                        @enderror
                </div>
                <br> 
                <div>
                    <input id="role_id" name="role_id" type="hidden" value="2">
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