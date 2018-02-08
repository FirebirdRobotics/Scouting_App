<html>
<head>
	<meta http-equiv="refresh" content="0; viewData.php">
</head>
<body>

<?php
	
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbname = 'firebirds';
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
	// Add variables
	$robot_number = mysqli_real_escape_string($conn, $_POST['robotNumber']);
	$crossed_baseline = mysqli_real_escape_string($conn, $_POST['crossedBaseline']);
	$place_cube_auto = mysqli_real_escape_string($conn, $_POST['placedCubeAuto']);
	$ally_switch = mysqli_real_escape_string($conn, $_POST['allySwitch']);
	$enemy_switch = mysqli_real_escape_string($conn, $_POST['enemySwitch']);
	$scale_cube = mysqli_real_escape_string($conn, $_POST['scale']);
	$attempt_climb = mysqli_real_escape_string($conn, $_POST['attemptedClimb']);
	$carry_robots = mysqli_real_escape_string($conn, $_POST['carriedRobots']);
	$comments = mysqli_real_escape_string($conn, $_POST['comments']);
	
	// Insert the above variables into the table values
	$sql="REPLACE INTO robots (`robotNumber`, `crossedBaseline`, `placedCubeAuto`, `allySwitch`, `enemySwitch`, `scale`, `attemptedClimb`, `carriedRobots`, `comments`)
		               VALUES ('$robot_number', '$crossed_baseline', '$place_cube_auto', '$ally_switch', '$enemy_switch', '$scale_cube', '$attempt_climb', '$carry_robots', '$comments')";
	
	
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	echo "<br><br>";
	
	$conn->close();
	
	?>

</body>
</html>