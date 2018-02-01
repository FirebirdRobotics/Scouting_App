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
	
	// Insert the above variables into the table values
	$sql="REPLACE INTO robots (``)
		               VALUES ('')";
	
	
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