<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Firebirds Robotics Scouting</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<link href="styles.css" type="text/css" rel="stylesheet"/>
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
		<form action="insertTeam.php" method="post">
		
		<b><font size="+3">Robot/Team:</font></b><br>
			Team Number:
			<br>
			<input type="number" class="teamNumber" name="teamNumber" placeholder="ex. 3019" required><br>
			<br>
			Team Name:
			<br>
			<input type="text" class="teamName" name="teamName" placeholder="ex. Firebirds" required><br>
			<br>
			<input type="submit" value="Submit">
    	</form>
    </div>
</body>
</html>