<html>
<head>
	<meta http-equiv="refresh" content="0; viewData.php">
</head>
<body>

<?php
	
    include("database.php");
	
    // Get user who added
    $sqlForUser = "SELECT * FROM users where username = '". $_SESSION["username"] ."'";
    $resultForUser = $conn->query($sqlForUser);
    $rowForUser = mysqli_fetch_assoc($resultForUser);
    extract($rowForUser);
    
    $user = "$rowForUser[firstName] $rowForUser[lastName]";
    
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
	$user = mysqli_real_escape_string($conn, $user);
	$rank = 0;

	
	// Insert the above variables into the table values
	$sql="REPLACE INTO robots (`robotNumber`, `matchNumber`, `crossedBaseline`, `placedCubeAuto`, `switch`, `dropped`, `scale`, `cubeExchange`, `attemptedClimb`, `carriedRobots`, `comments`, `user`, `rank`)
		               VALUES ('$robot_number', '$match_number', '$crossed_baseline', '$place_cube_auto', '$switch_cube', '$drop_cube', '$scale_cube', '$cube_exchange', '$attempt_climb', '$carry_robots', '$comments', '$user', '$rank')";
	
	
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