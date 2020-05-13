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
	$started_with_ball = mysqli_real_escape_string($conn, $_POST['startedWithBall']);
	$crossed_baseline = mysqli_real_escape_string($conn, $_POST['crossedBaseline']);
	$low_goal_auto = mysqli_real_escape_string($conn, $_POST['lowGoalAuto']);
	$dropped_ball_auto = mysqli_real_escape_string($conn, $_POST['droppedBallAuto']);
	$high_goal_auto = mysqli_real_escape_string($conn, $_POST['highGoalAuto']);
	$inner_high_goal_auto = mysqli_real_escape_string($conn, $_POST['innerHighGoalAuto']);
	$low_goal_ball = mysqli_real_escape_string($conn, $_POST['lowGoal']);
	$drop_ball = mysqli_real_escape_string($conn, $_POST['dropped']);
	$high_goal_ball = mysqli_real_escape_string($conn, $_POST['highGoal']);
	$inner_high_goal = mysqli_real_escape_string($conn, $_POST['innerHighGoal']);
	$color_wheel_spun = mysqli_real_escape_string($conn, $_POST['colorWheelSpun']);
    $color_wheel = mysqli_real_escape_string($conn, $_POST['colorWheel']);
	$balanced_climb = mysqli_real_escape_string($conn, $_POST['balancedClimb']);
    $attempt_climb = mysqli_real_escape_string($conn, $_POST['attemptedClimb']);
    $carry_robots = mysqli_real_escape_string($conn, $_POST['carriedRobots']);
    $comments = mysqli_real_escape_string($conn, $_POST['comments']);
	$user = mysqli_real_escape_string($conn, $user);
	$rank = 0;

	
	// Insert the above variables into the table values
	$sql="REPLACE INTO robots (`robotNumber`, `matchNumber`, `startedWithBall`, `crossedBaseline`, `lowGoalAuto`, `droppedBallAuto`, `highGoalAuto`, `innerHighGoalAuto`, `lowGoal`, `dropped`, `highGoal`, `innerHighGoal`, `colorWheelSpun`, `colorWheel`, `balancedClimb`, `attemptedClimb`, `carriedRobots`, `comments`, `user`, `rank`)
					VALUES ('$robot_number', '$match_number', '$started_with_ball','$crossed_baseline', '$low_goal_auto', '$dropped_ball_auto', '$high_goal_auto', '$inner_high_goal_auto',  '$low_goal_ball', '$drop_ball', '$high_goal_ball', '$inner_high_goal', '$color_wheel_spun', '$color_wheel', '$balanced_climb', '$attempt_climb', '$carry_robots', '$comments', '$user', '$rank')";
	
	
	if ($conn->query($sql) === TRUE) {
	    echo 'Robot successfully added' . '<br><a href="viewData.php">Click here to view data</a>';
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	echo '<br><br>';
	
	$conn->close();
	
	?>

</body>
</html>