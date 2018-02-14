<html>
<head>
	<meta http-equiv="refresh" content="0; home.php">
</head>
<body>

<?php
	
    include("database.php");
	
	// Add variables
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$first_name = mysqli_real_escape_string($conn, $_POST['firstName']);
	$last_name = mysqli_real_escape_string($conn, $_POST['lastName']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$confirm_password = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	
	if ($_POST['password'] != $_POST['confirmPassword']) {
		die('Passwords do not match<br>' . '<a href="indexSignup.php">Click here to go back</a>');
	}
	
	//add an email checker here
    
	// Insert the above variables into the table values
	$sql="INSERT INTO users (`username`, `firstName`, `lastName`, `password`, `confirmPassword`, `email`)
		             VALUES ('$username', '$first_name', '$last_name', '$password', '$confirm_password', '$email')";
	
	
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
