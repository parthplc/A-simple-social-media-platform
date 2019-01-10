<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style> 
	html {
		scroll-behavior: smooth;
	}
	.intro {
    background-image: url(2.jpg);
	background-size: 1350px 850px;
    font-family: 'Sofia';font-size: 22px;
	width: 100%;
	height: 660px;
	}
	.container {
	background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%); 
	width: 100%;
	height: 660px;
	}
	a {
    width: 40px;
    text-align: center;
    padding: 12px 0;
    transition: all 0.3s ease;
    color: white;
    font-size: 36px;
	}
	</style>
</head>
<body>
	<div class="intro">
	<br>
	<h1 style="text-align: center; color: white; font-size:80px; text-shadow: 2px 1px black;"> Allury </h1>
	<br>
	<h4 style="color: white; text-align: center;"> I CAN SPREAD YOUR TALENT. </h4>
	<br><br>
	<div style="width: 600px; height: 100px; position: relative; top: 40px; left: 380px;">
	<h5 style="font-size: 30px; color: white; text-align: center; letter-spacing: 3px;"> Allury platform is for you because we know everyone has something amazing.Showcase your hidden talent in form of 
	STORY, POEM or PAINTING, which take us to a path, full of allure. </h5>
	</div>
	<a href="#login" style="position: relative; top: 230px; left: 670px;"><i class="fa fa-angle-double-down" aria-hidden="true"></i></a>
	</div>
	<div class="container" id="login">
		<div class="row">
  			<div class="col-lg-6">
  				<br>
  				<br>
				<br>
  				<h1> Login</h1>
  				<form action="validation.php" method="post">
  					<div class="form-group">
  						<label>Username</label>
  						<input type="text" name="user" class="form-control">
  					</div>
  					<div class="form-group">
  						<label>Password</label>
  						<input type="Password" name="password" class="form-control">
  					</div>
  					<button type="submit" class="btn btn-primary">Login</button>
  				</form>
  			</div>
 <br>
 <br>
 <br>
 <br> 	
  			<div class="col-lg-6">
  				<br>
  				<br>
				<br>
				
  				<h1> Sign-Up </h1>
  				<form action="registration.php" method="post">
  					<div class="form-group">
  						<label>Username</label>
  						<input type="text" name="user" class="form-control">
  					</div>
  					
  					<div class="form-group">
  						<label>Gender</label>
  						<br>
  						<input type="radio" name="gender" value="male" checked> Male<br>
						<input type="radio" name="gender" value="female"> Female<br>
  						<input type="radio" name="gender" value="other"> Other 
  					</div>
  					<div class="form-group">
  						<label>Age</label><br>
  						<input type="number" name="age" value="">
  					</div>
  					
  					<div class="form-group">
  						<label>E-mail</label>
  						<input type="email" name="email" size="35" class="form-control">
  						
  					</div>

  					<div class="form-group">
  						<label>Password</label>
  						<input type="Password" name="password" class="form-control">
  					</div>
  					<button class="btn btn-primary" type="submit">Sign Up</button>
  				</form>
  			</div>
  		</div>
  	</div>



</body>
</html>