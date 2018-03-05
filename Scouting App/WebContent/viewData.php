<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Firebirds Robotics Scouting</title>
	<link href="styles.css" type="text/css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<style>
	   td,th{
	       border: 1px solid black;
	   }
	</style>
<link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
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
	<table class="table-responsive table-hover table display table-bordered" id="dataTable" width="98%"><thead>
	<?php 
	echo "<tr>
                    <th>Robot Number</th>
                    <th>Round Number</th>
                    <th>Crossed Baseline</th>
                    <th>Placed Cube in Autonomous</th>
                    <th>Cubes (Switch)</th>
                    <th>Cubes (Dropped)</th>
                    <th>Cubes (Scale)</th>
                    <th>Cubes (Exchange)</th>
                    <th>Attempted Climb</th>
                    <th>Carried Robots</th>
                    <th>Comments</th>
          </tr></thead><tbody>";
	$where = (isset($_GET['team']) ? "where robotNumber = '{$_GET['team']}'" : '');
	$sql = "SELECT * FROM robots $where";
	$result = $conn->query($sql);
	
	while($row = mysqli_fetch_assoc($result))
	{
	    extract($row);
	    
	    // text values that display in the table
	           echo "<tr>
                    <td>$robotNumber</td>
                    <td>$matchNumber</td>
                    <td>"
                    // Code to display better text values
                        ?><?php
                        if ($crossedBaseline == 'yes') {
                            echo "Did cross baseline";
                        } elseif ($crossedBaseline == 'no') {
                            echo "Did not cross baseline";
                        }
                        ?><?php
              echo "</td>
                    <td>"
                        ?><?php
                        if ($placedCubeAuto == 'placedOnScale') {
                            echo "Placed on Scale";
                        } elseif ($placedCubeAuto == 'placedOnSwitch') {
                            echo "Placed on Switch";
                        } elseif ($placedCubeAuto == 'placedOnExchange') {
                            echo "Placed in Cube Exchange";
                        } elseif ($placedCubeAuto == 'didNotPlace') {
                            echo "Did not place";
                        }
                        ?><?php
               echo "</td>
                    <td>$switch</td>
                    <td>$dropped</td>
                    <td>$scale</td>
                    <td>$cubeExchange</td>
                    <td>"
                        ?><?php
                        if ($attemptedClimb == "successfulClimb") {
                            echo "Successful Climb";
                        } elseif ($attemptedClimb == "unsuccessfulClimb") {
                            echo "Unsuccessful Climb";
                        } elseif ($attemptedClimb == "parked") {
                            echo "Parked";
                        } elseif ($attemptedClimb == "didNotTry") {
                            echo "Did not try";
                        }
                        ?><?php
              echo "</td>
                    <td>"
                        ?><?php
                        if ($carriedRobots == "yes") {
                            echo "Did carry others";
                        } elseif ($carriedRobots == "no") {
                            echo "Did not carry others";
                        }
                        ?><?php
              echo "</td>
                    <td>$comments</td>
            </tr>";
	}
	echo "</tbody></table><br><br>";
	
	$conn->close();
	
	?>
	
	<form action="addNewRobot.php">
		<input type="submit" value="Add new robot">
	</form>
</body>
</html>