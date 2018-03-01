<html>
<head>
	<meta http-equiv="refresh" content="0; viewSummary.php">
</head>
<body>

<?php
	
    include("database.php");
	
	// Add variables
	$robot_number = mysqli_real_escape_string($conn, $_POST['robotNumber']);
	$team_name = mysqli_real_escape_string($conn, $_POST['teamName']);
	
	// Insert the above variables into the table values
	$sql="REPLACE INTO teams (`robotNumber`, `teamName`)
		               VALUES ('$robot_number', '$team_name')";
	
	
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