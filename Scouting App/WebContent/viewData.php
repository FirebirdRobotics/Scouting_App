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
  order: [0, 'asc'],
}
);
} );
</script>
</head>
<body>

	<nav class="navbar">
		<span class="open-slide">
			<a href="#" onClick="openSlideMenu()">
				<svg width="30" height="30">
					<path d="M0,6 30,6" stroke="#fff" stroke-width="4"/>
					<path d="M0,17 30,17" stroke="#fff" stroke-width="4"/>
					<path d="M0,28 30,28" stroke="#fff" stroke-width="4"/>
				</svg>
			</a>
		</span>
		
		<span class="login">
			<a href="loginMenu.php">
				<svg width="30" height="30">
					<path d="M28,30 28,4" stroke="#fff" stroke-width="4"/>
					<path d="M11,6 28,6" stroke="#fff" stroke-width="4"/>
					<path d="M11,28 28,28" stroke="#fff" stroke-width="4"/>
					<path d="M13,6 13,10" stroke="#fff" stroke-width="4"/>
					<path d="M13,28 13,24" stroke="#fff" stroke-width="4"/>
					
					<path d="M0,17 21,17" stroke="#fff" stroke-width="3"/>
					<path d="M10,12 21,18" stroke="#fff" stroke-width="3"/>
					<path d="M10,22 21,17" stroke="#fff" stroke-width="3"/>
				</svg>
			</a>
		</span>
	</nav>
	
	<div id="side-menu" class="side-navbar">
		<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a><br>
		<a href="index.php">Home</a>
		<a href="addNewRobot.php">Add Robot</a>
		<a href="viewData.php">View Data</a>
	</div>
	
	<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "firebirds";
	
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
	echo "<br><br>";
	?>
	<table class="display" id="table1"><thead>
	<?php 
	echo "<tr>
                    <th>Robot Number</th>
                    <th>Crossed Baseline?</th>
                    <th>Placed Cube Autonomous</th>
                    <th>Cubes on Ally Switch</th>
                    <th>Cubes on Enemy Switch</th>
                    <th>Cubes on Scale</th>
                    <th>Attempted Climb</th>
                    <th>Climb</th>
                    <th>Comments</th>
          </tr><thead><tbody>";
	$sql = "SELECT * FROM robots";
	$result = $conn->query($sql);
	
	while($row = mysqli_fetch_assoc($result))
	{
	    extract($row);
	    echo "<tr>
                    <td>$robotNumber</td>
                    <td>$crossedBaseline</td>
                    <td>$placedCubeAuto</td>
                    <td>$allySwitch</td>
                    <td>$enemySwitch</td>
                    <td>$scale</td>
                    <td>$attemptedClimb</td>
                    <td>$carriedRobots</td>
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
