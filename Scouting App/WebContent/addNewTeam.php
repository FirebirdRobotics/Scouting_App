<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Firebirds Robotics Scouting</title>
	<link href="styles.css" type="text/css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>

	<?php 
    	include("database.php");
    	
    	if (!isset($_SESSION['username'])) {
    	    echo '<script type="text/javascript">location.href = "index.php";</script>';
    	}
	?>

	<?php 
    
        include("navbar.php");
    
    ?>
    
    <div id="main">
		<form action="insertTeam.php" method="POST">
		
		<b><font size="+3">Robot/Team:</font></b><br>
			Team Number:
			<br>
			<input type="number" class="robotNumber" name="robotNumber" placeholder="ex. 3019" required><br>
			<br>
			Team Name:
			<br>
			<input type="text" class="teamName" name="teamName" placeholder="ex. Firebird Robotics" required><br>
			<br>
			<input type="submit" value="Submit">
    	</form>
    </div>
</body>
</html>