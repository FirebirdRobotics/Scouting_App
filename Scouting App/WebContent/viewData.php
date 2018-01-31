<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Firebirds Robotics Scouting</title>
	<link href="styles.css" type="text/css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
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
	
	<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "firebirds";
	
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	echo "<pre>";
	print_r($_POST);
	echo "</pre>";	
	
	// Add variables
	$robot_number = mysqli_real_escape_string($conn, $_POST['robotNumber']);
	$crossed_baseline = mysqli_real_escape_string($conn, $_POST['crossedBaseline']); // for these four sets, we need to have it so that when the data is taken from the database, it displays something else
	$place_cube_auto = mysqli_real_escape_string($conn, $_POST['placedCubeAuto']); // above comment
	$ally_switch = mysqli_real_escape_string($conn, $_POST['allySwitch']);
	$enemy_switch = mysqli_real_escape_string($conn, $_POST['enemySwitch']);
	$scale_cube = mysqli_real_escape_string($conn, $_POST['scale']);
	$attempt_climb = mysqli_real_escape_string($conn, $_POST['attemptedClimb']); // above comment
	$carry_robots = mysqli_real_escape_string($conn, $_POST['carriedRobots']); // above comment
	$comments = mysqli_real_escape_string($conn, $_POST['comments']);
	
	// Insert the above variables into the table values
	$sql="REPLACE INTO robots (`robotNumber`, `crossedBaseline`, `placedCubeAuto`, `allySwitch`, `enemySwitch`, `scale`, `attemptedClimb`, `carriedRobots`, `comments`)
		               VALUES ('$robot_number', '$crossed_baseline', '$place_cube_auto', '$ally_switch', '$enemy_switch', '$scale_cube', '$attempt_climb', '$carry_robots', '$comments')";
	
	
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();
	
	?>
	
	<form action="addNewRobot.php">
		<input type="submit" value="Add another robot">
	</form>
	
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
