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
    
    

    <!-- Right navbar links -->
 
@endsection
@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row-auto">
          <!-- left column -->
          <div class="col-auto">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Staff</h3>
              </div>
              <br>
            <form role="form" method="POST" action="/staff/{{$staff->id}}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <br>
                        <input type="text" 
                        class="input @error('name') is-danger @enderror" 
                        name="name" 
                        id="name" 
                        value="{{ $staff->name}}" >
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
                         value="{{ $staff->email}}">
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
                        value="{{ $staff->address}}">
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
                        value="{{ $staff->phone_no}}">
                        @error('phone_no')
                        <p class="help is-danger">{{ $errors->first('phone_no')}}</p>
                        @enderror
                </div> 
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