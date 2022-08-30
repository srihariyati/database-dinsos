<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

    <link rel="stylesheet" href="/css/login.css">


	<body class="container" style="background-color:#EEEEEE" >
		<div class="text-center">
			<div class="card-group" >
	  			<div class="card" style="border-radius: 10px">
	    			<div class="card-body" style="color: #444941; margin-top: 5rem">
	    				<h1 class="header fw-bold mt-2 mb-3">Login</h1>
	      				<div class="row justify-content-center">
				            <div class="col-md-8 col-lg-8">
				                <div class="login-wrap p-0">
				                    <form action="{{ route('login') }}" class="signin-form" method="POST">
									@csrf
									<div class="form-group mt-3">
										<label for="username"></label>
										<input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									<div class="form-group mt-3">
										<label for="pass"></label>
										<input id="password-field" type="password" name="pass" id="pass" class="form-control" placeholder="Password" required>
										@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
										<!-- <i class="bi bi-eye-slash" id="togglePassword"></i> -->
									</div>
									<div>
										<input type="checkbox" value="" id="" class="mt-3"> <label for="rememberMe">Remember me <a href="" style="color: #032D23" class="tab text-decoration-underline">Forgot Password?</a></label> 
									</div>
									<div class="tombol btn-group justify-content-center">
										<button type="submit" name="login" class="text-white margin fw-bold form-control btn-lg mt-4" style="background-color: #4B7BE5">Login</button>
									@if (Route::has('password.request'))
									<a class="btn btn-link" href="{{ url('/dashboard') }}">
										<!-- {{ __('Forgot Your Password?') }} -->
									</a>
									@endif
									</div>
				                    </form>
				                </div>
				            </div>
				        </div>
	    			</div>
	    			<div class="justify-content-center text-center mb-3">
				    	<p class="card-text"><small>Copyright ©2022 <a href="https://informatika.unsyiah.ac.id/webinf/" style="color: #E6B325" class="text-decoration-underline">Informatika USK</a> All rights reserved.</small></p>
				    </div>
	  			</div>
	  			<div class="card" style="border: none; background-color:#EEEEEE; ">
	    			<img class="card-img-top" src="/img/log.png" style="object-fit:cover; width:550px; height:560px;border-radius: 10px; "alt="Card image cap">
	  			</div>
  
  			</div>
		</div>
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  	</body>
</html>