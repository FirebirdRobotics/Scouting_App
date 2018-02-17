<?php

    session_start();

    $servername = 'localhost';
    $dbusername = 'root';
    $dbpassword = 'root';
    $dbname = 'firebirds';
    
    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
?>
