<html>
<head>
</head>
<body>

<?php

    include("database.php");
    
    if (isset($_SESSION['username'])) {
        echo '<script type="text/javascript">location.href = "home.php";</script>';
    }
    
    if (empty($_POST['username']) && empty($_POST['password'])) {
        die('Please enter in a Username and Password' . '<br><a href="index.php">Click here to go back</a>');
    }
    
    if (!empty($_POST['username']) || !empty($_POST['password'])) {
        
        if(empty($_POST['username'])) {
            die('Username is empty' . '<br><a href="index.php">Click here to go back</a>');
        }
        
        if(empty($_POST['password'])) {
            die('Password is empty' . '<br><a href="index.php">Click here to go back</a>');
        }
        
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        
        if (!CheckLoginInDB($username,$password,$conn)) {
            die('Invalid username and/or password' . '<br><a href="index.php">Click here to go back</a>');
        }
        
        session_start();
        
        $_SESSION["username"] = $username;
        
        echo '<script type="text/javascript">location.href = "home.php";</script>';
    }

    function CheckLoginInDB($username,$password,$conn) {
        
        $qry = "Select * from users where username='$username' and password='$password'";
        
        $result = mysqli_query($conn, $qry);
        
        if(!$result || mysqli_num_rows($result) <= 0) {
            $_SESSION["error"] = "The username or password does not match";
            return false;
        }
        
        return true;
    }

    $conn->close();

?>

</body>
</html>