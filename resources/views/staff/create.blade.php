@extends ('layouts')

@section('nav')

    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/staff" class="nav-link">View Staff</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/staff/create" class="nav-link">Add Staff</a>
        </li>
    </ul>
    <br>
    <br>
    <!-- SEARCH FORM -->
    <!-- Right navbar links -->
   
@endsection
@section('content')
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row-auto">
          <!-- left column -->
          <div class="col-auto">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header" >
                <h2 class="card-title">Add Staff</h2>
              </div>
              <br>
            <form method="POST" action="/staff" role="form">
            @csrf
              <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <br>
                        <input type="text" 
                        class="input @error('name') is-danger @enderror" 
                        name="name" 
                        id="name" 
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
                         >
                        @error('phone_no')
                        <p class="help is-danger">{{ $errors->first('phone_no')}}</p>
                        @enderror
                </div> 
                <div>
                    <input id="role_id" name="role_id" type="hidden" value='3'>       
                </div>
                <br>
              </div>
              <br>
              <div class="card-footer">
                <button class="btn btn-primary" name="submit" type="submit">Submit</button>
              </div> 
            </form>
        </div>
    </div>
    </div> 
    </div>
  </section>
@endsection