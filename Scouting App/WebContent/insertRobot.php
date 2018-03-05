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
	
	   // CODE FOR CALCULATING RANK
	// add rank points for baseline
	$rank += ($crossed_baseline == 'yes' ? 10 : 0);
	
	// add rank points for autonomous cube
	$rank += ($place_cube_auto == 'placedOnScale' || $place_cube_auto == 'placedOnSwitch' || $place_cube_auto == 'placedOnExchange' ? 10 : 0);
	$rank += ($place_cube_auto == 'didNotPlace' ? -10 : 0);
	
	// add rank points for ally switch
	$rank += ($switch_cube >= 1 ? 5 : 0);
	$rank += ($switch_cube >= 2 ? 5 : 0);
	$rank += ($switch_cube >= 3 ? 5 : 0);
	$rank += ($switch_cube >= 4 ? 5 : 0);
	$rank += ($switch_cube >= 5 ? 5 : 0);
	$rank += ($switch_cube >= 6 ? 5 : 0);
	$rank += ($switch_cube >= 7 ? 5 : 0);
	$rank += ($switch_cube >= 8 ? 5 : 0);
	$rank += ($switch_cube >= 9 ? 5 : 0);
	$rank += ($switch_cube >= 10 ? 5 : 0);
	
	// add rank points for enemy switch
	$rank += ($drop_cube >= 1 ? -5 : 0);
	$rank += ($drop_cube >= 2 ? -5 : 0);
	$rank += ($drop_cube >= 3 ? -5 : 0);
	$rank += ($drop_cube >= 4 ? -5 : 0);
	$rank += ($drop_cube >= 5 ? -5 : 0);
	$rank += ($drop_cube >= 6 ? -5 : 0);
	$rank += ($drop_cube >= 7 ? -5 : 0);
	$rank += ($drop_cube >= 8 ? -5 : 0);
	$rank += ($drop_cube >= 9 ? -5 : 0);
	$rank += ($drop_cube >= 10 ? -5 : 0);
	
	// add rank points for scale
	$rank += ($scale_cube >= 1 ? 5 : 0);
	$rank += ($scale_cube >= 2 ? 5 : 0);
	$rank += ($scale_cube >= 3 ? 5 : 0);
	$rank += ($scale_cube >= 4 ? 5 : 0);
	$rank += ($scale_cube >= 5 ? 10 : 0);
	$rank += ($scale_cube >= 6 ? 10 : 0);
	$rank += ($scale_cube >= 7 ? 10 : 0);
	$rank += ($scale_cube >= 8 ? 10 : 0);
	$rank += ($scale_cube >= 9 ? 10 : 0);
	$rank += ($scale_cube >= 10 ? 10 : 0);
	
	// add rank points for cube exchange
	$rank += ($cube_exchange >= 1 ? 10 : 0);
	$rank += ($cube_exchange >= 2 ? 10 : 0);
	$rank += ($cube_exchange >= 3 ? 10 : 0);
	$rank += ($cube_exchange >= 4 ? 10 : 0);
	$rank += ($cube_exchange >= 5 ? 10 : 0);
	$rank += ($cube_exchange >= 6 ? 10 : 0);
	$rank += ($cube_exchange >= 7 ? 10 : 0);
	$rank += ($cube_exchange >= 8 ? 10 : 0);
	$rank += ($cube_exchange >= 9 ? 10 : 0);
	$rank += ($cube_exchange >= 10 ? 10 : 0);
	
	// add rank points for climb
	$rank += ($attempt_climb == 'successfulClimb' ? 10 : 0);
	$rank += ($attempt_climb == 'unsuccessfulClimb' ? -5 : 0);
	$rank += ($attempt_climb == 'parked' ? 5 : 0);
	$rank += ($attempt_climb == 'didNotTry' ? -10 : 0);
	
	// add rank points for carrying other robots
	$rank += ($carry_robots == 'yes' ? 10 : 0);
	
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