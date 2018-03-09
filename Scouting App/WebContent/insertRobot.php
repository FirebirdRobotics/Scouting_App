<html>
<head>
	<meta http-equiv="refresh" content="0; viewData.php">
</head>
<body>

<?php
	
    include("database.php");
	
	// Add variables
	$robot_number = mysqli_real_escape_string($conn, $_POST['teamNumber']);
	$match_number = mysqli_real_escape_string($conn, $_POST['matchNumber']);
	$crossed_baseline = mysqli_real_escape_string($conn, $_POST['crossedBaseline']);
	$place_cube_auto = mysqli_real_escape_string($conn, $_POST['placedCubeAuto']);
	$switch_cube = mysqli_real_escape_string($conn, $_POST['switch']);
	$drop_cube = mysqli_real_escape_string($conn, $_POST['dropped']);
	$scale_cube = mysqli_real_escape_string($conn, $_POST['scale']);
	$cube_exchange = mysqli_real_escape_string($conn, $_POST['cubeExchange']);
	$attempt_climb = mysqli_real_escape_string($conn, $_POST['attemptedClimb']);
	$carry_robots = mysqli_real_escape_string($conn, $_POST['carriedRobots']);
	$comments = mysqli_real_escape_string($conn, $_POST['comments']);
	$rank = 0;
	
	// Insert the above variables into the table values
	$sql="REPLACE INTO robots (`robotNumber`, `matchNumber`, `crossedBaseline`, `placedCubeAuto`, `switch`, `dropped`, `scale`, `cubeExchange`, `attemptedClimb`, `carriedRobots`, `comments`, `rank`)
		               VALUES ('$robot_number', '$match_number', '$crossed_baseline', '$place_cube_auto', '$switch_cube', '$drop_cube', '$scale_cube', '$cube_exchange', '$attempt_climb', '$carry_robots', '$comments', '$rank')";
	
	
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
