<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Firebirds Robotics Scouting</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<link href="css/styles.css" type="text/css" rel="stylesheet"/>
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
	
    <div class="images">
    	<img src="images/Logo.png" alt="Logo" width=100% height=auto>
    </div>
	
	<div class="scoutingDescriptionAll">
		<b>What is scouting?</b><br>
		<div class="scoutingDescription">
        		The purpose of scouting is to collect information about other teams' robots. 
        		With this information, we can then see how our and other teams compare to each other. 
        		This data is also useful for forming alliances in the final rounds of competitions. <br><br>
        		There are two different categories of scouting: Pit Scouting and Stand Scouting.
        		You can help collect information by clicking the 'Add Robot' tab in the side bar.
        		From there you will be taken to a form to fill out with information about a specific robot.
        		To view round data, you can click on the 'View Data' tab in the side bar.
        		This will show you a table full of all the data collected on the robots per round.
        		To view ranking data, you can click on the 'View Ranking' tab in the side bar.
        		This will show you a table comparing robots/teams by average performance per round. 
		</div>
	</div>
</body>
</html>