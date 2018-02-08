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
		<table>
		<tr>
			<td><label align="left">Username</label></td> <!-- Would like to add a username checker -->
			<td><input type="text" name="username" required></td>
		</tr>
		<tr>
			<td><label align="left">First Name</label></td>
			<td><input type="text" name="firstName" required></td>
		</tr>
		<tr>
			<td><label align="left">Last Name</label></td>
			<td><input type="text" name="lastName" required></td>
		</tr>
		<tr>
			<td><label align="left">Password</label></td> <!-- Also would like to add character blurs/blocks for password -->
			<td><input type="password" name="password" required></td>
		</tr>
		<tr>
			<td><label align="left">Confirm Password</label></td> <!-- ALSO would like password dots for this -->
			<td><input type="password" name="confirmPassword" required></td>
		</tr>
		<tr>
			<td><label align="left">Email</label></td>
			<td><input type="text" name="email" required></td>
		</tr>
		</table>
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