<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

    <link rel="stylesheet" href="/css/login.css">


	<body class="container" style="background-color:#EEEEEE" >
		<div class="text-center">
			
					
			<div class="card-group" >
	  			<div class="card" style="border-radius: 2%; width:90%;">
	    			<div class="card-body" style="color: #444941; margin-top: 3rem">
						
						@if(session('loginError'))
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<b>Opps!</b> {{session('loginError')}}
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
							</div>
						@endif

						<h1 class="header fw-bold mt-2 mb-3">Login</h1>
	      				<div class="row justify-content-center">
				            <div class="col-md-8 col-lg-8">
				                <div class="login-wrap p-0" style="margin-top : 3rem;">
				                    <form action="{{ url ('/actionlogin') }}"  method="post">
									{{ csrf_field() }}
										<!-- @csrf -->
										<div class="form-group mt-3">
											<label for="email"></label>
											<input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus>
											
										</div>
										<div class="form-group mt-3">
											<label for="password"></label>
											<input id="password" type="password" name="password" id="password" class="form-control" placeholder="Password" required>
										</div>

										<div style= "margin-top : 4rem; margin-left:2rem;" class="tombol btn-group justify-content-center">
											<button type="submit" name="login" class="text-white margin fw-bold form-control btn-lg " style="background-color: #4B7BE5">Login</button>
										</div>
				                    </form>
				                </div>
				            </div>
				        </div>
	    			</div>
	    			<div class="justify-content-center text-center mb-3">
				    	<p class="card-text"><small>Copyright ©2022 <a href="https://informatika.unsyiah.ac.id/webinf/" target="blank"style="color: #E6B325" class="text-decoration-underline">Informatika USK</a> All rights reserved.</small></p>
				    </div>
	  			</div>

	  			<div class="card" style="border: none; background-color:#EEEEEE; ">
	    			<img class="card-img-top" src="/img/log.png" style="object-fit:cover; width:90%; border-radius: 2%; "alt="Card image cap">
	  			</div>
  
  			</div>
		</div>
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  	</body>
</html>