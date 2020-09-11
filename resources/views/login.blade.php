<!DOCTYPE html>
<html>
    
<head>
	<title>PMS</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="{{ asset('/css/loginform.css') }}" rel="stylesheet" id="bootstrap-css">
<!--    <script src="{{ asset('/js/loginform.css') }}"></script>-->
</head>
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="{{ asset('/images/doctor.jpeg')}}" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form method="post" action="/login">
                        @csrf
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-envelope"></i></span>
							</div>
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Enter email address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input id="password" type="password" class="password form-control @error('password') is-invalid @enderror" name="password" required placeholder="Enter Password">
                            <i class=" show fa  fa-eye "></i>
                            <i class=" hide fa  fa-eye-slash "></i>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>
				    <div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" class="btn login_btn">Login</button>
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						<a href="forgotPassword">Forgot password?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
    
    <script>
        var password = document.querySelector('.password');
        var show = document.querySelector('.show');
        var hide = document.querySelector('.hide');
        
       show.onclick = function(){
           password.setAttribute("type","text");
           show.style.display = "none";
           hide.style.display = "block";
           
       }
       hide.onclick = function(){
           password.setAttribute("type","password");
           hide.style.display = "none";
           show.style.display = "block";
           
       }
    </script>
</body>
</html>
