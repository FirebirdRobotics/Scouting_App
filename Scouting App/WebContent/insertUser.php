<html>
<head>
	<meta http-equiv="refresh" content="0; index.php">
</head>
<body>

<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "firebirds";
	
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
	// Add variables
	$first_name = mysqli_real_escape_string($conn, $_POST['firstName']);
	$last_name = mysqli_real_escape_string($conn, $_POST['lastName']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$confirm_password = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	
	// Insert the above variables into the table values
	$sql="REPLACE INTO users (`firstName`, `lastName`, `username`, `password`, `confirmPassword`, `email`)
		               VALUES ('$first_name', '$last_name', '$username', '$password', '$confirm_password', '$email')";
	
	
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
