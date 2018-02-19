<html>
<head>
	<meta http-equiv="refresh" content="0; viewData.php">
</head>
<body>

<?php
	
    include("database.php");
	
	// Add variables
	$robot_number = mysqli_real_escape_string($conn, $_POST['robotNumber']);
	$team_name = mysqli_real_escape_string($conn, $_POST['teamName']);
	$crossed_baseline = mysqli_real_escape_string($conn, $_POST['crossedBaseline']);
	$place_cube_auto = mysqli_real_escape_string($conn, $_POST['placedCubeAuto']);
	$ally_switch = mysqli_real_escape_string($conn, $_POST['allySwitch']);
	$enemy_switch = mysqli_real_escape_string($conn, $_POST['enemySwitch']);
	$scale_cube = mysqli_real_escape_string($conn, $_POST['scale']);
	$cube_exchange = mysqli_real_escape_string($conn, $_POST['cubeExchange']);
	$attempt_climb = mysqli_real_escape_string($conn, $_POST['attemptedClimb']);
	$carry_robots = mysqli_real_escape_string($conn, $_POST['carriedRobots']);
	$comments = mysqli_real_escape_string($conn, $_POST['comments']);
	
	// Insert the above variables into the table values
	$sql="REPLACE INTO robots (`robotNumber`, `teamName`, `crossedBaseline`, `placedCubeAuto`, `allySwitch`, `enemySwitch`, `scale`, `cubeExchange`, `attemptedClimb`, `carriedRobots`, `comments`)
		               VALUES ('$robot_number', '$team_name', '$crossed_baseline', '$place_cube_auto', '$ally_switch', '$enemy_switch', '$scale_cube', '$cube_exchange', '$attempt_climb', '$carry_robots', '$comments')";
	
	
	if ($conn->query($sql) === TRUE) {
	    echo 'New robot successfully added' . '<br><a href="viewData.php">Click here to view data</a>';
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	echo "<br><br>";
	
	$conn->close();
	
	?>

</body>
</html>