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
		<form action="deleteRecordsAction.php" method="post">
			<ul>
    			<li>
        			<input type="radio" name="deleteRecords" value="deleteRecords-robots" id="deleteRecords-robots">
        			<label for="deleteRecords-robots" class="deleteRecordsRadioLabels">Delete robot entries</label><br><br>
        			
        			<div class="check"><div class="inside"></div></div>
    			</li>
    			<li>
        			<input type="radio" name="deleteRecords" value="deleteRecords-pitrobots" id="deleteRecords-pitrobots">
        			<label for="deleteRecords-pitrobots" class="deleteRecordsRadioLabels">Delete pit robot entries</label><br><br>
        			
        			<div class="check"><div class="inside"></div></div>
    			</li>
    			<li>
        			<input type="radio" name="deleteRecords" value="deleteRecords-teams" id="deleteRecords-teams">
        			<label for="deleteRecords-teams" class="deleteRecordsRadioLabels">Delete teams</label><br><br>
        			
        			<div class="check"><div class="inside"></div></div>
    			</li>
			</ul>
			<br><br>
			<font size="+1">Type in the admin code to confirm:</font><br>
			<input type="password" name="adminCode" class="form-control adminCode" placeholder="Admin ONLY" required><br><br>
			
			<input type="submit" value="Submit">
    	</form>
    </div>
    
</body>
</html>