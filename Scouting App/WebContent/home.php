<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Firebirds Robotics Scouting</title>
	<link href="styles.css" type="text/css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body class="homeBody">

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
	
    <div class="images">
    	<img src="Logo.png" alt="Logo" width=100% height=auto>
    </div>
	
	<div class="scoutingDescriptionAll">
		<b>What is scouting?</b><br>
		<div class="scoutingDescription">
        		The purpose of scouting is to collect information about other teams' robots. 
        		With this information, we can then see how our and other teams compare to each other. 
        		This data is also useful for forming alliances in the final rounds of competitions. <br><br>
        		You can help collect information by clicking the 'Add Robot' tab in the side bar.
        		From there you will be taken to a form to fill out with information about how the robot did in the round.
        		To view current data, you can click on the 'View Data' tab in the side bar.
        		This will show you a table full of all the data collected on the robots.
		</div>
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