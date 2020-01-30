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
                    <th>Team Number</th>
                    <th>Round Number</th>
                    <th>Started With Ball</th>
                    <th>Crossed Baseline</th>
                    <th>Placed Ball in Autonomous</th>
                    <th>Power Cells (Low Goal)</th>
                    <th>Power Cells (Dropped)</th>
                    <th>Power Cells (High Goal)</th>
                    <th>Power Cells (Inner High Goal)</th>
                    <th>Color Wheel Spun</th>
                    <th>Color Wheel</th>
                    <th>Balanced Climb</th>
                    <th>Attempted Climb</th>
                    <th>Carried Robots</th>
                    <th>Stage One</th>
                    <th>Stage two</th>
                    <th>Stage three</th>
                    <th>Comments</th>
                    <th>Added By:</th>
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
                        if ($startedWithBall == 'yes') {
                            echo "Did start with power cell";
                        } elseif ($startedWithBall == 'no') {
                            echo "Did not start with power cell";
                        }
                        ?><?php
              echo "</td>
                    <td>"
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
                        if ($shotBallAuto == 'shotLowGoal') {
                            echo "Shot in the low goal";
                        } elseif ($shotBallAuto == 'shotHighGoal') {
                            echo "Shot in the high goal";
                        } elseif ($shotBallAuto == 'shotHighandLowGoal') {
                            echo "Shot in high and low goal";
                        } elseif ($shotBallAuto == 'shotHighandInnerGoal') {
                            echo "Shot in high and inner high goal";
                        } elseif ($shotBallAuto == 'shotLowandInnerGoal') {
                            echo "Shot in low and inner goal";
                        } elseif ($shotBallAuto == 'shotAllAuto') {
                            echo "Shot in all goals";
                        }elseif ($shotBallAuto == 'didNotShoot') {
                            echo "Did not try";
                        }
                        ?><?php
               echo "</td>
                    <td>$lowGoal</td>
                    <td>$dropped</td>
                    <td>$highGoal</td>
                    <td>$innerHighGoal</td>
                    <td>$colorWheelSpun</td>
                    <td>"
                         
                                         
                        ?><?php
                        if ($colorWheel == 'setColor') {
                            echo "Attempted to set color on wheel, successful";
                        } elseif ($colorWheel == 'setColorUnsuccessful') {
                            echo "Attempted to set color on wheel, unsuccessful";
                        } elseif ($colorWheel == 'didNotSpin') {
                            echo "Did not spin color wheel";
                        }
                        ?><?php
                        
                        echo "</td>
                             <td>"
                        ?><?php
                        if ($balancedClimb == 'balancedClimbSuccessful')  {
                             echo "Balanced Climb Successful";   
                        } elseif ($balancedClimb == 'balancedClimbUnsuccessful') 
                        echo "Balanced Climb Unsuccessful";
                        
                        ?><?php
                       echo "</td>
                             <td>" 
                        ?><?php
                        if ($attemptedClimb == 'successfulClimb') {
                            echo "Successful Climb";
                        } elseif ($attemptedClimb == 'unsuccessfulClimb') {
                            echo "Unsuccessful Climb";
                        } elseif ($attemptedClimb == 'parked') {
                            echo "Parked";
                        } elseif ($attemptedClimb == 'didNotTry') {
                            echo "Did not try";
                        }
                        ?><?php
              echo "</td>
                    <td>"
                        ?><?php  if ($carriedRobots == 'yes') {
                            echo "Did carry others";
                        } elseif ($carriedRobots == 'no') {
                            echo "Did not carry others";
                        }?>
                        <?php
              echo "</td>
                    <td>$comments</td>
                    <td>$user</td>
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