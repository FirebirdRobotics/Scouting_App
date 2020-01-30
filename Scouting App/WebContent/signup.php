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
	<nav class="navbar">
		<span class="open-slide">
			<a href="#" onClick="openSlideMenu()">
				<svg width="30" height="30">
					<path d="M0,6 30,6" stroke="#fff" stroke-width="4"/>
					<path d="M0,17 30,17" stroke="#fff" stroke-width="4"/>
					<path d="M0,28 30,28" stroke="#fff" stroke-width="4"/>
				</svg>
			</a>
		</span>
		
		<span class="login">
			<a href="profile.php"> <!-- THIS SHOULD BE THE LOGOUT -->
				<svg width="30" height="30">
					<path d="M28,30 28,4" stroke="#fff" stroke-width="4"/>
					<path d="M11,6 28,6" stroke="#fff" stroke-width="4"/>
					<path d="M11,28 28,28" stroke="#fff" stroke-width="4"/>
					<path d="M13,6 13,10" stroke="#fff" stroke-width="4"/>
					<path d="M13,28 13,24" stroke="#fff" stroke-width="4"/>
					
					<path d="M0,17 21,17" stroke="#fff" stroke-width="3"/>
					<path d="M10,12 21,18" stroke="#fff" stroke-width="3"/>
					<path d="M10,22 21,17" stroke="#fff" stroke-width="3"/>
				</svg>
			</a>
		</span>
	</nav>
	
	<div id="side-menu" class="side-navbar">
		<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a><br>
		<a href="home.php">Home</a>
		<a href="addNewRobot.php">Add Robot</a>
		<a href="viewData.php">View Data</a>
	</div>
	
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
	
	<div class="footerDiv">
	<br><br><br>
	</div>
	
	<script type="text/javascript">
		//Sidebar
	function openSlideMenu(){
		document.getElementById('side-menu').style.width ='250px';
		document.getElementById('main').style.marginLeft ='250px';
	}
	
	function closeSlideMenu(){
		document.getElementById('side-menu').style.width ='0';
		document.getElementById('main').style.marginLeft ='0';
	}
	</script>
</body>
</html>
