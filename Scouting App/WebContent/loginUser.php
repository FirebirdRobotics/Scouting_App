<html>
<head>
	<meta http-equiv="refresh" content="0; index.php">
</head>
<body>

<?php

    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    
    if (isset($_POST['submit'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $error = "Username or Password is invalid";
        } else {
        
        // Define $username and $password
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Database
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "root";
        $dbname = "firebirds";
        
        
        // Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
        
        // To protect MySQL injection for Security purpose
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
        // Selecting Database
        $db = mysqli_select_db("company", $conn);
        
        // SQL query to fetch information of registerd users and finds user match.
        $query = mysqli_query("select * from login where password='$password' AND username='$username'", $conn);
        $rows = mysqli_num_rows($query);
        
        if ($rows == 1) {
            $_SESSION['login_user']=$username; // Initializing Session
            header("location: viewData.php"); // Redirecting To Other Page
            exit;
        } else {
            $error = "Username or Password is invalid";
        }
            $conn->close(); // Closing Connection
        }
    }
    
?>