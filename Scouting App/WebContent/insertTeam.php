<html>
<head>
	<meta http-equiv="refresh" content="0; addNewTeam.php">
</head>
<body>

<?php
	
    include("database.php");
	
	// Add variables 
	$team_number = mysqli_real_escape_string($conn, $_POST['teamNumber']);
	$team_name = mysqli_real_escape_string($conn, $_POST['teamName']);
	
	// Insert the above variables into the table values
	$sql="REPLACE INTO teams (`teamNumber`, `teamName`)
		               VALUES ('$team_number', '$team_name')";
	
	
	if ($conn->query($sql) === TRUE) {
	    echo 'New team successfully added' . '<br><a href="addNewTeam.php">Click here to add another team</a>';
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	echo "<br><br>";
	
	$conn->close();
	
	?>

</body>
</html>