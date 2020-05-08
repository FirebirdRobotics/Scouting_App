<html>

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
			$_SESSION["error"] = "Passwords do not match.";
			die('<script type="text/javascript">location.href = "indexSignup.php";</script>');
    	}
    	
    	if ($pos === FALSE) {
			$_SESSION["error"] = "Please enter a valid email address.";
			die('<script type="text/javascript">location.href = "indexSignup.php";</script>');
    	}
	}
	
	if($_POST['signupCode'] != "3019"){
		$_SESSION["error"] = "Invalid signup code.";
		die('<script type="text/javascript">location.href = "indexSignup.php";</script>');
	}
	
	if (CheckLoginInDB($username,$conn)) {
		$_SESSION["error"] = "A user with this username already exists.";
		die('<script type="text/javascript">location.href = "indexSignup.php";</script>');
	}
	
	if ($conn->query($sql) === TRUE) {
		$_SESSION["success"] = "New account successfully created. You may now log in";
		die('<script type="text/javascript">location.href = "index.php";</script>');
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	function CheckLoginInDB($username,$conn) {
	    
	    $qry = "Select * from users where username='$username'";
	    
	    $result = mysqli_query($conn, $qry);
	    
	    if(!$result || mysqli_num_rows($result) <= 0) {
	        return false;
	    }
	    
	    return true;
	}
	
	$conn->close();
	
	?>
</html>