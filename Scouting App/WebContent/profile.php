<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Firebirds Robotics Scouting</title>
	<link href="styles.css" type="text/css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body class="profileBody">
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
	
	<div class="profileBackground">
		<div class="profilePicture">
		</div>
		<?php 
    		// link to the username, firstname, and lastname (check loginUser for hints on how to reference)
    		
    		echo "Username<br>";
    		
            echo "<font size='+1'>Firstname Lastname</font><br><br>";
		?>
		<form action="logoutUser.php">
			<button class="logoutButton">Logout</button>
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