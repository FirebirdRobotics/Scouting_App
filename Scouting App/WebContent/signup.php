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
			<a href="login.php">
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
		<a href="index.php">Home</a>
		<a href="addNewRobot.php">Add Robot</a>
		<a href="viewData.php">View Data</a>
	</div>
	
	<div class="innerCreateAccountBox">
		<img align="middle" class="loginImage" src="H:/transparentLogo.png">
		<hr>
		<form action="#"> <!-- The form action would be this same file linked on the website 
		                       (on firesoup the form action is "http://firesoup.com/login/signup.php" to create a new user).
		                       Find out where the actual PHP goes (at the beginning of the file or...? The php is in a separate file in the example) -->
		<div class="tableDiv">
		<div class="username">
			<label class="usernameLabel" align="left">Username</label>
			<input type="text" class="usernameInput" name="username" id="username">
		</div>
		<div class="email">
			<label class="emailLabel" align="left">Email</label>
			<input type="text" name="email" id="email">
		</div>
		<div class="password">
			<label class="passwordLabel" align="left">Password</label>
			<input type="text" name="password" id="password">
		</div>
		<div class="confirmPassword">
			<label class="confirmPasswordLabel" align="left">Confirm Password</label>
			<input type="text" name="confirmPassword" id="confirmPassword">
		</div>
		</div>
		<button type="submit" class="signupButton">Create a New Account</button>
		</form>
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
