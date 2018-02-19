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
    $('#table1').DataTable({
      lengthMenu: [[10, 20, 100, -1], [10, 20, 100, "All"]],
      order: [1, 'desc'],
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
	
	<div id="side-menu" class="side-navbar">
		<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a><br>
		<a href="home.php">Home</a>
		<a href="addNewRobot.php">Add Robot</a>
		<a href="viewData.php">View Data</a>
	</div>
	
	<?php
	
	echo "<br><br>"; 
	?>
	<table class="table-responsive table-hover table display table-bordered" id="table1" width="98%"><thead>
	<?php 
	echo "<tr>
                    <th>Robot Number</th>
                    <th>Rank</th>
                    <th>Crossed Baseline</th>
                    <th>Placed Cube in Autonomous</th>
                    <th>Cubes (Ally Switch)</th>
                    <th>Cubes (Enemy Switch)</th>
                    <th>Cubes (Scale)</th>
                    <th>Attempted Climb</th>
                    <th>Carried Robots</th>
                    <th>Comments</th>
          </tr><thead><tbody>";
	$sql = "SELECT * FROM robots";
	$result = $conn->query($sql);
	
	while($row = mysqli_fetch_assoc($result))
	{
	    extract($row);
	    $rank = 0;
	    $rank += ($crossedBaseline == 'yes' ? 10 : 0);
	    $rank += ($placedCubeAuto == 'placedOnScale' || $placedCubeAuto == 'placedOnSwitch' ? 10 : 0);
	    $rank += ($allySwitch >= 10 ? 10 : 0);
	    $rank += ($enemySwitch < 1 ? 10 : 0); 
	    $rank += ($scale >= 1 ? 10 : 0);                                                           
	    $rank += ($attemptedClimb == 'successfulClimb' ? 10 : 0);
	    $rank += ($carriedRobots == 'yes' ? 10 : 0);
	           echo "<tr>
                    <td>$robotNumber</td>
                    <td>$rank</td>
                    <td>"
                    /* Code to display better text values */
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
                        } elseif ($placedCubeAuto == 'didNotPlace') {
                            echo "Did not place";
                        }
                        ?><?php
               echo "</td>
                    <td>$allySwitch</td>
                    <td>$enemySwitch</td>
                    <td>$scale</td>
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
		<input type="submit" value="Add another robot">
	</form>
	
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