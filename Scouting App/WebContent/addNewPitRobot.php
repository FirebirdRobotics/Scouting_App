<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Firebirds Robotics Scouting</title>
	<link href="styles.css" type="text/css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
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
        <form action="insertPitRobot.php" method="post">
        <b><font size="+3">Robot/Team:</font></b><br>
        <?php 
		
    		$sql = "SELECT teamNumber, teamName FROM teams";
    		$result = $conn->query($sql);
    		
    		echo "<select name='teamNumber' class='dropdown-button'>
                  <option value='' disabled selected>Select Team</option>";
    		while ($row = mysqli_fetch_array($result)) {
    		    extract($row);
    		    echo "<option value='" . $row['teamNumber'] . "'>" . $row['teamNumber'] . ' - ' . substr($row['teamName'],0,20) .  "</option>";
    		}
    		echo "</select>";
    		
		?>
		
		<br><br>
        
        <b><font size="+3">Comments:</font></b><br>
        What can your bot do?
		<div>
			<textarea name="botAbility" id="botAbility" rows="6" placeholder="ex. Switch/Scale/Climb"></textarea>
		</div>
		<br>
		What is your game strategy?
		<div>
			<textarea name="gameStrategy" id="gameStrategy" rows="6" placeholder="ex. Do you focus on just the switch/scale, do you try for power-ups, etc."></textarea>
		</div>
		<br>
		What is your climber (if any) like?
		<div>
			<textarea name="botClimber" id="botClimber" rows="6" placeholder="ex. Does it allow for multiple climbs, bots driving on your bot, etc."></textarea>
		</div>
		<br>
		What is the weight of your robot?
		<div>
			<input class="robotWeight" type="text" name="robotWeight" placeholder="# lbs">
		</div>
		<br>
		What drive train does your robot use?
		<div>
			<textarea name="driveTrain" id="driveTrain" rows="6" placeholder="ex. U-frame"></textarea>
		</div>
		<br>
			<input type="submit" value="Submit">
		</form>
    </div>
</body>
</html>