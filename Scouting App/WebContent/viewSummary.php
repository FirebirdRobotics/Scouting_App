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
                    <th>Rank/Avg</th>
          </tr></thead><tbody>";
	
	$sql = "SELECT * FROM teams";
	$result = $conn->query($sql);
	
	while($row = mysqli_fetch_assoc($result))
	{
    	extract($row);
    	// text values that display in the table
    	
	
    	$sqlForRank = "SELECT * FROM robots where robotNumber = '$teamNumber'";
    	$resultForRank = $conn->query($sqlForRank);
    	$tot_rank = 0;
    	$count = 0;
    	
    	while($rowForRank = mysqli_fetch_assoc($resultForRank))
    	{
    	    extract($rowForRank);
    	    $count++;
    	    
    	    // add rank points for baseline
    	    $tot_rank += ($crossedBaseline == 'yes' ? 10 : 0);
    	    
    	    // add rank points for autonomous cube
    	    $tot_rank += ($placedCubeAuto == 'placedOnScale' || $placedCubeAuto == 'placedOnSwitch' || $placedCubeAuto == 'placedOnExchange' ? 10 : 0);
    	    $tot_rank += ($placedCubeAuto == 'placedOnScaleAndSwitch' || $placedCubeAuto == 'placedOnScaleAndExchange' || $placedCubeAuto == 'placedOnSwitchAndExchange' ? 15 : 0);
    	    $tot_rank += ($placedCubeAuto == 'placedOnAll' ? 20 : 0);
    	    $tot_rank += ($placedCubeAuto == 'didNotPlace' ? 0 : 0);
    	    
    	    // add rank points for ally switch
    	    $tot_rank += ($switch >= 1 ? 5 : 0);
    	    $tot_rank += ($switch >= 2 ? 5 : 0);
    	    $tot_rank += ($switch >= 3 ? 5 : 0);
    	    $tot_rank += ($switch >= 4 ? 5 : 0);
    	    $tot_rank += ($switch >= 5 ? 5 : 0);
    	    $tot_rank += ($switch >= 6 ? 5 : 0);
    	    $tot_rank += ($switch >= 7 ? 5 : 0);
    	    $tot_rank += ($switch >= 8 ? 5 : 0);
    	    $tot_rank += ($switch >= 9 ? 5 : 0);
    	    $tot_rank += ($switch >= 10 ? 5 : 0);
    	    
    	    // add rank points for enemy switch
    	    $tot_rank += ($dropped >= 1 ? 5 : 0);
    	    $tot_rank += ($dropped >= 2 ? 5 : 0);
    	    $tot_rank += ($dropped >= 3 ? 5 : 0);
    	    $tot_rank += ($dropped >= 4 ? 5 : 0);
    	    $tot_rank += ($dropped >= 5 ? 5 : 0);
    	    $tot_rank += ($dropped >= 6 ? 5 : 0);
    	    $tot_rank += ($dropped >= 7 ? 5 : 0);
    	    $tot_rank += ($dropped >= 8 ? 5 : 0);
    	    $tot_rank += ($dropped >= 9 ? 5 : 0);
    	    $tot_rank += ($dropped >= 10 ? 5 : 0);
    	    
    	    // add rank points for scale
    	    $tot_rank += ($scale >= 1 ? 10 : 0);
    	    $tot_rank += ($scale >= 2 ? 10 : 0);
    	    $tot_rank += ($scale >= 3 ? 10 : 0);
    	    $tot_rank += ($scale >= 4 ? 10 : 0);
    	    $tot_rank += ($scale >= 5 ? 10 : 0);
    	    $tot_rank += ($scale >= 6 ? 10 : 0);
    	    $tot_rank += ($scale >= 7 ? 10 : 0);
    	    $tot_rank += ($scale >= 8 ? 10 : 0);
    	    $tot_rank += ($scale >= 9 ? 10 : 0);
    	    $tot_rank += ($scale >= 10 ? 10 : 0);
    	    
    	    // add rank points for cube exchange
    	    $tot_rank += ($cubeExchange >= 1 ? 5 : 0);
    	    $tot_rank += ($cubeExchange >= 2 ? 5 : 0);
    	    $tot_rank += ($cubeExchange >= 3 ? 5 : 0);
    	    $tot_rank += ($cubeExchange >= 4 ? 5 : 0);
    	    $tot_rank += ($cubeExchange >= 5 ? 5 : 0);
    	    $tot_rank += ($cubeExchange >= 6 ? 5 : 0);
    	    $tot_rank += ($cubeExchange >= 7 ? 5 : 0);
    	    $tot_rank += ($cubeExchange >= 8 ? 5 : 0);
    	    $tot_rank += ($cubeExchange >= 9 ? 5 : 0);
    	    $tot_rank += ($cubeExchange >= 10 ? 5 : 0);
    	    
    	    // add rank points for climb
    	    $tot_rank += ($attemptedClimb == 'successfulClimb' ? 25 : 0);
    	    $tot_rank += ($attemptedClimb == 'unsuccessfulClimb' ? 5 : 0);
    	    $tot_rank += ($attemptedClimb == 'parked' ? 2 : 0);
    	    $tot_rank += ($attemptedClimb == 'didNotTry' ? 0 : 0);
    	    
    	    // add rank points for carrying other robots
    	    $tot_rank += ($carriedRobots == 'yes' ? 50 : 0);
	    
    	}
	    
    	if ($count)
    	{
          	echo "<tr>
                  <td><a href='viewData.php?team=$teamNumber'>$teamNumber</a></td>
                  <td>$teamName</td>";
    	    echo "<td>". number_format($tot_rank / $count, 2) . "</td>
                  </tr>";
    	}
	}
	
	echo "</tbody></table><br><br>";
	
	$conn->close();
	
	?>
</body>
</html>