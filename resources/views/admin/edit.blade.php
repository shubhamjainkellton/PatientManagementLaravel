@extends ('layout')
@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
@endsection
@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has -text-weight-bold is-size-4">Edit Admin</h1>

            <form method="POST" action="/admin/{{$user->id}}">
            @csrf
            @method('PUT')
                <div class="field">
                    <label for="name">Name</label>

                    <div class="control">
                        <input type="text" 
                        class="input @error('name') is-danger @enderror" 
                        name="name" 
                        id="name" 
                        value="{{ $user->name}}" >
                        @error('name')
                        <p class="help is-danger">{{ $errors->first('name')}}</p>
                        @enderror
                    </div>
                </div>  
                <div class="field">
                    <label for="email">Email</label>

                    <div class="control">
                        <input type="email"
                        class="input @error('email') is-danger @enderror"
                         name="email" 
                         id="email"
                         value="{{ $user->email}}">
                        @error('email')
                        <p class="help is-danger">{{ $errors->first('email')}}</p>
                        @enderror
                    </div>
                </div>  
                <div class="field">
                    <label for="password">Password</label>

                    <div class="control">
                        <input type="password"
                        class="input @error('password') is-danger @enderror"
                         name="password" 
                         id="password"
                         value="{{ $user->password}}">
                        @error('password')
                        <p class="help is-danger">{{ $errors->first('password')}}</p>
                        @enderror
                    </div>
                </div>  
                <div class="field">
                    <label for="address">Address</label>

                    <div class="control">
                        <input type="text" class="input @error('address') is-danger @enderror" 
                        name="address" 
                        id="address"
                        value="{{ $user->address}}">
                        @error('address')
                        <p class="help is-danger">{{ $errors->first('address')}}</p>
                        @enderror
                    </div>
                </div>    
                <div class="field">
                    <label for="phone_no">Phone No</label>

                    <div class="control">
                        <input type="phone"
                        class="input @error('phone_no') is-danger @enderror"
                         name="phone_no" 
                         id="phone_no"
                         value="{{ $user->phone_no}}">
                        @error('phone_no')
                        <p class="help is-danger">{{ $errors->first('phone_no')}}</p>
                        @enderror
                    </div>
                </div> 
                
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" name="submit" >Submit</button>
                    </div>
                </div> 
            </form>
        </div>
    </div>

@endsection