<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Firebirds Robotics Scouting</title>
	<link href="styles.css" type="text/css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body class="login-bg">
	
	<div class="innerCreateAccountBox">
		<img align="middle" class="loginImage" src="transparentLogo.png" alt="Logo">
		<hr>
		<form action="insertUser.php" method="post">
			<input type="text" name="username" placeholder="Username" class="form-control" required> <!-- Would like to add a username checker -->
			<input type="text" name="firstName" placeholder="First Name" class="form-control" required>
			<input type="text" name="lastName" placeholder="Last Name" class="form-control" required>
			<input type="password" name="password" placeholder="Password" class="form-control" required>
			<input type="password" name="confirmPassword" placeholder="Confirm Password" class="form-control" required> <!-- Need to make sure that it is the same -->
			<input type="text" name="email" placeholder="Email" class="form-control" required> <!-- dont really need their emails tbh -->
			<input type="text" name="signupCode" placeholder="Signup Code" class="form-control" required>
			<button type="submit" class="signupButton">Create a New Account</button>
		</form>
	</div>
	
	<div class="innerBoxLower">
		<h2>Already have an account?</h2>
		<form class="signupForm" action="index.php" method="get" id="signup">
			<button type="submit" class="signupButton">Log In</button>
		</form>
	</div>
	
	<div class="footerDiv">
	<br><br><br>
	</div>
</body>
</html>