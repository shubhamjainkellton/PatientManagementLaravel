@extends ('layouts')

@section('nav')

    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/profile" class="nav-link">View Profile</a>
        </li>
    </ul>
    <br>
    <br>

    

   <!-- Right navbar links -->
  
@endsection

@section('content')
    <!-- /.content-header -->
@if(session('error'))
<div class="alert alert-danger" role="alert">
  {{session('error')}}
</div>
@endif
    <!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row-auto">
          <!-- left column -->
          <div class="col-auto">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header" >
                <h2 class="card-title">Manage Profile</h2>
              </div>
              <br>
            <form role="form" method="POST" action="/profile/{{ $user->id }}" >
            @csrf
            @method('PUT')
            <tr>
            <div class="card-body">
				<div class="form-group">
                    <label for="name">Name</label>
                    <br>
                        <input type="text" 
                        class="form-control @error('name') is-danger @enderror" 
                        name="name" 
                        id="name" 
						value="{{ $user->name}}"
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
                        class="form-control @error('email') is-danger @enderror"
                         name="email" 
                         id="email"
						 value="{{ $user->email}}"
                         >
                        @error('email')
                        <p class="help is-danger">{{ $errors->first('email')}}</p>
                        @enderror    
                </div>
                <br>
                <div class="form-group">
                    <label for="address">Address</label>
                    <br>
                        <input type="text" 
                        class="form-control @error('address') is-danger @enderror" 
                        name="address" 
                        id="address"
						value="{{ $user->address}}"
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
                        class="form-control @error('phone_no') is-danger @enderror"
                         name="phone_no" 
                         id="phone_no"
						 value="{{ $user->phone_no}}"
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
                <h3 class="card-title">Password</h3>
            </div>
            <div class="card-body">
				<div class="form-group">
                    <label for="current_password">Current Password</label>
                    <br>
                        <input type="password"
                        class="form-control"
                         name="current_password" 
                         id="current_password"
                        value="{{ $user->password}}">
                </div> 
                <br>
				<div class="form-group">
                    <label for="new_password">New Password</label>
                    <br>
                        <input type="password"
                        class="form-control"
                         name="new_password" 
                         id="new_password">
                </div>
				<br>
				<div class="form-group">
                    <label for="new_password_confirmation">Confirm New Password</label>
                    <br>
                        <input type="password"
                        class="form-control"
                         name="new_password_confirmation" 
                         id="new_password_confirmation">
                </div>
				<br>
            </div>
            </div>
            </tr>
                <br>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="submit" >Update</button>
            </div>
                  
            </form>
        </div>
    </div>

@endsection