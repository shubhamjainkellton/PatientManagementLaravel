
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has -text-weight-bold is-size-4">New Admin</h1>

            <form method="POST" action="/admin">
            @csrf
                <div class="field">
                    <label class="label" for="name">Name</label>

                    <div class="control">
                        <input type="text" 
                        class="input @error('name') is-danger @enderror" 
                        name="name" 
                        id="name" 
                        value="{{ old('name')}}" >
                        @error('name')
                        <p class="help is-danger">{{ $errors->first('name')}}</p>
                        @enderror
                    </div>
                </div>  
                <div class="field">
                    <label class="label" for="email">Email</label>

                    <div class="control">
                        <input type="email"
                        class="input @error('email') is-danger @enderror"
                         name="email" 
                         id="email"
                         value="{{ old('email')}}">
                        @error('email')
                        <p class="help is-danger">{{ $errors->first('email')}}</p>
                        @enderror
                    </div>
                </div>  
                <div class="field">
                    <label class="label" for="password">Password</label>

                    <div class="control">
                        <input type="password"
                        class="input @error('password') is-danger @enderror"
                         name="password" 
                         id="password"
                         value="{{ old('password')}}">
                        @error('password')
                        <p class="help is-danger">{{ $errors->first('password')}}</p>
                        @enderror
                    </div>
                </div>  
                <div class="field">
                    <label class="label" for="address">Address</label>

                    <div class="control">
                        <input type="text" class="input @error('address') is-danger @enderror" 
                        name="address" 
                        id="address"
                        > 
                        @error('address')
                        <p class="help is-danger">{{ $errors->first('address')}}</p>
                        @enderror
                    </div>
                </div>    
                <div class="field">
                    <label class="label" for="phone_no">Phone No</label>

                    <div class="control">
                        <input type="phone"
                        class="input @error('phone_no') is-danger @enderror"
                         name="phone_no" 
                         id="phone_no"
                         value="{{ old('phone_no')}}">
                        @error('phone_no')
                        <p class="help is-danger">{{ $errors->first('phone_no')}}</p>
                        @enderror
                    </div>
                </div> 
                <div>
                    <input id="role_id" name="role_id" type="hidden" value="1">
                </div>
                
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" name="submit" >Submit</button>
                    </div>
                </div> 
            </form>
        </div>
    </div>

