<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Firebirds Robotics Scouting</title>
	<link href="css/styles.css" type="text/css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body class="profileBody">

	<?php 
    	include("database.php");
    	
    	if (!isset($_SESSION['username'])) {
    	    echo '<script type="text/javascript">location.href = "index.php";</script>';
    	}
	?>

    <?php 
    
        include("navbar.php");
    
    ?>
	
	<div id="side-menu" class="side-navbar">
		<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a><br>
		<a href="home.php">Home</a>
		<a href="addNewRobot.php">Add Robot</a>
		<a href="viewData.php">View Data</a>
	</div>
	
	<div class="profileBackground">
		<div class="profilePicture">
			<img class="loginImage" src="./images/transparentLogo.png" alt="placeholder image">
		</div>
		<?php 
    		
    		$sql = "SELECT * FROM users where username = '". $_SESSION["username"] ."'";
    		$result = $conn->query($sql);
    		$row = mysqli_fetch_assoc($result);
    		
    		extract($row);
    		
        	echo "$row[username]<br>";
        		
            echo "<font size='+1'>$row[firstName] $row[lastName]</font><br><br>";
    		
    		$conn->close();
		?>
		<form action="logoutUser.php">
			<button class="logoutButton">Logout</button>
		</form>
	</div>
	 
	<div class="footerDiv">
	<br><br><br>
	</div>
	
	<script type="text/javascript">
		//Sidebar
	function openSlideMenu(){
		document.getElementById('side-menu').style.width ='250px';
		document.getElementById('main').style.marginLeft ='250px';
	}
	
	function closeSlideMenu(){
		document.getElementById('side-menu').style.width ='0';
		document.getElementById('main').style.marginLeft ='0';
	}
	</script>
</body>
</html>