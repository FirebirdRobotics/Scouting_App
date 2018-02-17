<html>
<head>
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
	
	// strpos variables
	$contains = '@';
    $pos = strpos($email, $contains);
	
	// Insert the above variables into the table values
	$sql="INSERT INTO users (`username`, `firstName`, `lastName`, `password`, `confirmPassword`, `email`)
		             VALUES ('$username', '$first_name', '$last_name', '$password', '$confirm_password', '$email')";
	
	if (!empty($_POST['username'])) {
    	if ($_POST['password'] !== $_POST['confirmPassword']) {
    	    die('Passwords do not match<br>' . '<a href="indexSignup.php">Click here to go back</a>');
    	}
    	
    	if ($pos === FALSE) {
    	    die('Not a valid email<br>' . '<a href="indexSignup.php">Click here to go back</a>');
    	}
	}
	
	if (CheckLoginInDB($username,$conn)) {
	    die('A user with this username already exists' . '<br><a href="indexSignup.php">Click here to go back</a>');
	}
	
	if ($conn->query($sql) === TRUE) {
	    die('New account successfully created' . '<br><a href="index.php">Click here to log in</a>');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	function CheckLoginInDB($username,$conn) {
	    
	    $qry = "Select * from users where username='$username'";
	    
	    $result = mysqli_query($conn, $qry);
	    
	    if(!$result || mysqli_num_rows($result) <= 0) {
	        $_SESSION["error"] = "A user with this username already exists";
	        return false;
	    }
	    
	    return true;
	}
	
	$conn->close();
	
	?>

</body>
</html>