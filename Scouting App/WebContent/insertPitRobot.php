<html>
<head>
	<meta http-equiv="refresh" content="0; viewPitData.php">
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
	$bot_ability = mysqli_real_escape_string($conn, $_POST['botAbility']);
	$game_strategy = mysqli_real_escape_string($conn, $_POST['gameStrategy']);
	$bot_climber = mysqli_real_escape_string($conn, $_POST['botClimber']);
	$robot_weight = mysqli_real_escape_string($conn, $_POST['robotWeight']);
	$drive_train = mysqli_real_escape_string($conn, $_POST['driveTrain']);
	$user = mysqli_real_escape_string($conn, $user);
	
	// Insert the above variables into the table values
	$sql="REPLACE INTO pitrobots (`robotNumber`, `botAbility`, `gameStrategy`, `botClimber`, `robotWeight`, `driveTrain`, `user`)
		               VALUES ('$robot_number', '$bot_ability', '$game_strategy', '$bot_climber', '$robot_weight', '$drive_train', '$user')";
	
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