<?php
	// Assuming you have established a MySQL database connection
	$connection = mysqli_connect("localhost", "root", "root", "experiment");
	// Check if the form is submitted
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	    // Retrieve the username and password from the form
	    $username = $_POST['username'];
	    $password = $_POST['password'];
	
	    // Validate the username and password against the database
	    $sql = "SELECT * FROM users WHERE userId = '$username' AND password = '$password'";
	    $result = mysqli_query($connection, $sql);
	
	    // Check if a matching record is found
	    if (mysqli_num_rows($result) === 1) {
	        // Username and password are valid, redirect to viewexperiment.php
	        header("Location: adminindex.php");
	        exit;
	    } else {
	        // Invalid username or password
	        $error = "Invalid username or password";
	    }
	}
	?>
<!DOCTYPE html>
<html>
	<head>
		<title>SIET Chem Lab</title>
		<link rel="icon" type="image/x-icon" href="logo.png">
		<style>
			@import url('https://fonts.googleapis.com/css?family=Raleway:400,700');
			* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;	
			font-family: Raleway, sans-serif;
			}
			body {
				background: linear-gradient(90deg, #2D2D3C, #1A1A2E);		
			}
			.container {
			display: flex;
			align-items: center;
			justify-content: center;
			min-height: 100vh;
			}
			.screen {		
				background: linear-gradient(90deg, #4D4D5E, #333344);
  border-radius: 10px;	
			position: relative;	
			height: 600px;
			width: 360px;	
			box-shadow: 0px 0px 24px black;
			}
			.screen__content {
			z-index: 1;
			position: relative;	
			height: 100%;
			}
			.screen__background {		
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			z-index: 0;
			-webkit-clip-path: inset(0 0 0 0);
			clip-path: inset(0 0 0 0);	
			}
			.screen__background__shape {
			transform: rotate(45deg);
			position: absolute;
			
			}
			.screen__background__shape1 {
			height: 520px;
			width: 520px;
			background: #FFF;	
			top: -50px;
			right: 120px;	
			border-radius: 0 72px 0 0;
			}
			.screen__background__shape2 {
			height: 220px;
			width: 220px;
			background: #5C5C6B;	
			top: -172px;
			right: 0;	
			border-radius: 32px;
			}
			.screen__background__shape3 {
			height: 540px;
			width: 190px;
			background: linear-gradient(270deg, #4D4D5E, #3F3F4F);
			top: -24px;
			right: 0;	
			border-radius: 32px;
			}
			.screen__background__shape4 {
			height: 400px;
			width: 200px;
			background: #6E6E7D;	
			top: 220px;
			right: 50px;	
			border-radius: 60px;
			}
			.login {
			width: 320px;
			padding: 30px;
			padding-top: 156px;
			}
			.login__field {
			padding: 20px 0px;	
			position: relative;	
			}
			.login__icon {
			position: absolute;
			top: 30px;
			color: #7875B5;
			}
			.login__input {
			border: none;
			border-bottom: 2px solid #D1D1D4;
			background: none;
			padding: 10px;
			padding-left: 24px;
			font-weight: 700;
			width: 75%;
			transition: .2s;
			}
			.login__input:active,
			.login__input:focus,
			.login__input:hover {
			outline: none;
			border-bottom-color: #6A679E;
			}
			.login__submit {
			background: #fff;
			font-size: 14px;
			margin-top: 30px;
			padding: 16px 20px;
			border-radius: 26px;
			border: 1px solid #D4D3E8;
			text-transform: uppercase;
			font-weight: 700;
			display: flex;
			align-items: center;
			width: 100%;
			color: black;
			box-shadow: 0px 2px 2px #5C5696;
			cursor: pointer;
			transition: .2s;
			}
			.login__submit:active,
			.login__submit:focus,
			.login__submit:hover {
			border-color: #6A679E;
			outline: none;
			}
			.button__icon {
			font-size: 24px;
			margin-left: auto;
			color: #7875B5;
			}
			.social-login {	
			position: absolute;
			height: 10px;
			width: 160px;
			text-align: center;
			bottom: 0px;
			right: 0px;
			color: #fff;
			}
			.social-icons {
			display: flex;
			align-items: center;
			justify-content: center;
			}
			.social-login__icon {
			padding: 20px 10px;
			color: #fff;
			text-decoration: none;	
			text-shadow: 0px 0px 8px #7875B5;
			}
			.social-login__icon:hover {
			transform: scale(1.5);	
			}
			.login__icon {
  color: #B1B1C2;
}


.button__icon {
  color: #B1B1C2;
}
.social-login__icon {
  text-shadow: 0px 0px 8px #888888;
}
.social-login__icon:hover {
  transform: scale(1.5);
  filter: brightness(1.2);
}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="screen">
				<div class="screen__content">
					<form class="login" method="POST" action="">
						<div class="login__field">
							<i class="login__icon fas fa-user"></i>
							<input type="text" class="login__input" name="username" placeholder="User name / Email" required>
						</div>
						<div class="login__field">
							<i class="login__icon fas fa-lock"></i>
							<input type="password" class="login__input" name="password" placeholder="Password" required>
						</div>
						<button class="button login__submit" type="submit">
						<span class="button__text" style="text-align: center;">Log In</span>
						<i class="button__icon fas fa-chevron-right"></i>
						</button>
						<?php if (isset($error)): ?>
						<p><?php echo $error; ?></p>
						<?php endif; ?>
					</form>
				</div>
				<div class="screen__background">
					<span class="screen__background__shape screen__background__shape4"></span>
					<span class="screen__background__shape screen__background__shape3"></span>        
					<span class="screen__background__shape screen__background__shape2"></span>
					<span class="screen__background__shape screen__background__shape1"></span>
				</div>
			</div>
		</div>
	</body>
</html>