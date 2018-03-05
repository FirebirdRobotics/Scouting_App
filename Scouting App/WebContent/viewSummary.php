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
    $('#summaryTable').DataTable({
      lengthMenu: [[10, 20, 100, -1], [10, 20, 100, "All"]],
      order: [2, 'desc'],
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
	<table class="table-responsive table-hover table display table-bordered" id="summaryTable" width="98%"><thead>
	<?php 
	echo "<tr>
                    <th>Team Number</th>
                    <th>Team Name</th>
                    <th>Rank/Score</th>
          </tr></thead><tbody>";
	
	$sql = "SELECT * FROM teams";
	$result = $conn->query($sql);
	
	while($row = mysqli_fetch_assoc($result))
	{
    	extract($row);
    	// text values that display in the table
    	
	
    	$sqlForRank = "SELECT * FROM robots where robotNumber = '$teamNumber'";
    	$resultForRank = $conn->query($sqlForRank);
    	$rank = 0;
    	$scoresExist = false;
    	
    	while($rowForRank = mysqli_fetch_assoc($resultForRank))
    	{
    	    extract($rowForRank);
    	    $scoresExist = true;
    	    
    	    // add rank points for baseline
    	    $rank += ($crossedBaseline == 'yes' ? 10 : 0);
    	    
    	    // add rank points for autonomous cube
    	    $rank += ($placedCubeAuto == 'placedOnScale' || $placedCubeAuto == 'placedOnSwitch' || $placedCubeExchange == 'placedOnExchange' ? 10 : 0);
    	    $rank += ($placedCubeAuto == 'didNotPlace' ? -10 : 0);
    	    
    	    // add rank points for ally switch
    	    $rank += ($switch >= 1 ? 5 : 0);
    	    $rank += ($switch >= 2 ? 5 : 0);
    	    $rank += ($switch >= 3 ? 5 : 0);
    	    $rank += ($switch >= 4 ? 5 : 0);
    	    $rank += ($switch >= 5 ? 5 : 0);
    	    $rank += ($switch >= 6 ? 5 : 0);
    	    $rank += ($switch >= 7 ? 5 : 0);
    	    $rank += ($switch >= 8 ? 5 : 0);
    	    $rank += ($switch >= 9 ? 5 : 0);
    	    $rank += ($switch >= 10 ? 5 : 0);
    	    
    	    // add rank points for enemy switch
    	    $rank += ($dropped >= 1 ? -5 : 0);
    	    $rank += ($dropped >= 2 ? -5 : 0);
    	    $rank += ($dropped >= 3 ? -5 : 0);
    	    $rank += ($dropped >= 4 ? -5 : 0);
    	    $rank += ($dropped >= 5 ? -5 : 0);
    	    $rank += ($dropped >= 6 ? -5 : 0);
    	    $rank += ($dropped >= 7 ? -5 : 0);
    	    $rank += ($dropped >= 8 ? -5 : 0);
    	    $rank += ($dropped >= 9 ? -5 : 0);
    	    $rank += ($dropped >= 10 ? -5 : 0);
    	    
    	    // add rank points for scale
    	    $rank += ($scale >= 1 ? 5 : 0);
    	    $rank += ($scale >= 2 ? 5 : 0);
    	    $rank += ($scale >= 3 ? 5 : 0);
    	    $rank += ($scale >= 4 ? 5 : 0);
    	    $rank += ($scale >= 5 ? 10 : 0);
    	    $rank += ($scale >= 6 ? 10 : 0);
    	    $rank += ($scale >= 7 ? 10 : 0);
    	    $rank += ($scale >= 8 ? 10 : 0);
    	    $rank += ($scale >= 9 ? 10 : 0);
    	    $rank += ($scale >= 10 ? 10 : 0);
    	    
    	    // add rank points for cube exchange
    	    $rank += ($cubeExchange >= 1 ? 10 : 0);
    	    $rank += ($cubeExchange >= 2 ? 10 : 0);
    	    $rank += ($cubeExchange >= 3 ? 10 : 0);
    	    $rank += ($cubeExchange >= 4 ? 10 : 0);
    	    $rank += ($cubeExchange >= 5 ? 10 : 0);
    	    $rank += ($cubeExchange >= 6 ? 10 : 0);
    	    $rank += ($cubeExchange >= 7 ? 10 : 0);
    	    $rank += ($cubeExchange >= 8 ? 10 : 0);
    	    $rank += ($cubeExchange >= 9 ? 10 : 0);
    	    $rank += ($cubeExchange >= 10 ? 10 : 0);
    	    
    	    // add rank points for climb
    	    $rank += ($attemptedClimb == 'successfulClimb' ? 10 : 0);
    	    $rank += ($attemptedClimb == 'unsuccessfulClimb' ? -5 : 0);
    	    $rank += ($attemptedClimb == 'parked' ? 5 : 0);
    	    $rank += ($attemptedClimb == 'didNotTry' ? -10 : 0);
    	    
    	    // add rank points for carrying other robots
    	    $rank += ($carriedRobots == 'yes' ? 10 : 0);
	    
    	}
	    
    	if ($scoresExist)
    	{
          	echo "<tr>
                  <td><a href='viewData.php?team=$teamNumber'>$teamNumber</a></td>
                  <td>$teamName</td>";
    	    echo "<td>$rank</td>
                  </tr>";
    	}
	}
	
	echo "</tbody></table><br><br>";
	
	$conn->close();
	
	?>
</body>
</html>