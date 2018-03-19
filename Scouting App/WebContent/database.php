<?php

    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbname = 'firebirds';
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
        session_start();
?>