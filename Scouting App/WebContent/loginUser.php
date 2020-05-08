<html>

<?php

    include("database.php");
    
    if (isset($_SESSION['username'])) {
        echo '<script type="text/javascript">location.href = "home.php";</script>';
    }
    
    if (empty($_POST['username']) && empty($_POST['password'])) {
        // die('Please enter in a Username and Password' . '<br><a href="index.php">Click here to go back</a>');
        $_SESSION["error"] = "Please enter in a Username and Password.";
        die('<script type="text/javascript">location.href = "index.php";</script>');
    }
    
    if (!empty($_POST['username']) || !empty($_POST['password'])) {
        
        if(empty($_POST['username'])) {
            $_SESSION["error"] = "Please enter a username.";
            die('<script type="text/javascript">location.href = "index.php";</script>');
        }
        
        if(empty($_POST['password'])) {
            $_SESSION["error"] = "Please enter a password.";
            die('<script type="text/javascript">location.href = "index.php";</script>');
        }
        
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        
        if (!CheckLoginInDB($username,$password,$conn)) {
            $_SESSION["error"] = "Invalid username and/or password.";
            die('<script type="text/javascript">location.href = "index.php";</script>');
        }
        
        $_SESSION["username"] = $username;
        $_SESSION["error"] = "";

        echo '<script type="text/javascript">location.href = "home.php";</script>';
    }

    function CheckLoginInDB($username,$password,$conn) {
        
        $qry = "Select * from users where username='$username' and password='$password'";
        
        $result = mysqli_query($conn, $qry);
        
        if(!$result || mysqli_num_rows($result) <= 0) {
            return false;
        }
        
        return true;
    }

    $conn->close();

?>

</html>