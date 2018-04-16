<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Firebirds Robotics Scouting</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<link href="styles.css" type="text/css" rel="stylesheet"/>
    <script>
        $(document).ready(function() {
            $('#pitDataTable').DataTable({
              lengthMenu: [[10, 20, 100, -1], [10, 20, 100, "All"]],
              order: [0, 'desc'],
            });
        });
    </script>
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
	
	<?php
	
	echo "<br><br>"; 
	?>
	<table class="table-responsive table-hover table display table-bordered" id="pitDataTable" width="98%"><thead>
	<?php 
	echo "<tr>
                    <th>Robot Number</th>
                    <th>What can your robot do?</th>
                    <th>Game Strategy</th>
                    <th>Climber</th>
                    <th>Weight</th>
                    <th>Center of Mass</th>
                    <th>Drive Train</th>
                    <th>Self-Rating</th>
                    <th>Added By:</th>
          </tr></thead><tbody>";
	$where = (isset($_GET['team']) ? "where robotNumber = '{$_GET['team']}'" : '');
	$sql = "SELECT * FROM pitrobots $where";
	$result = $conn->query($sql);
	
	while($row = mysqli_fetch_assoc($result))
	{
	    extract($row);
	    
	    // text values that display in the table
	           echo "<tr>
                    <td>$robotNumber</td>
                    <td>$botAbility</td>
                    <td>$gameStrategy</td>
                    <td>$botClimber</td>
                    <td>$robotWeight</td>
                    <td>$centerOfMass</td>
                    <td>$driveTrain</td>
                    <td>$rating</td>
                    <td>$user</td>
            </tr>";
	}
	echo "</tbody></table><br><br>";
	
	$conn->close();
	
	?>
	
	<form action="addNewPitRobot.php">
		<input type="submit" value="Add new robot">
	</form>
</body>
</html>