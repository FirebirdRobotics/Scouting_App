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
	<style>
	   body{
	       font-family: 'Open Sans', sans-serif;
	       font-size: 24px;
	   }
	</style>
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
		<form action="insertRobot.php" method="post">
		
		<b><font size="+3">Robot/Team:</font></b><br>
		<font size="+1">Note: Please communicate with fellow scouting team members about who is scouting each robot</font><br>
		<?php 
		
    		$sql = "SELECT teamNumber, teamName FROM teams";
    		$result = $conn->query($sql);
    		
    		echo "<select name='teamNumber' class='selectpicker dropdown-button' data-style='btn-primary' required>
                  <option value='' disabled selected>Select Team</option>";
    		while ($row = mysqli_fetch_array($result)) {
    		    extract($row);
    		    echo "<option value='" . $row['teamNumber'] . "'>" . $row['teamNumber'] . ' - ' . substr($row['teamName'],0,20) .  "</option>";
    		}
    		echo "</select>";
    		
		?>
                
                <input class="robotWeight" type="text" size="5" name="matchNumber" placeholder="Match #" REQUIRED>
		
		<br><br>
		
		<!-- need to fix the id and label later -->
		
		<b><font size="+3">Autonomous:</font></b><br>
			How many power cells did the robot start with (0-3)?
			<div class="numCounter">
				<input class="qty" id="qty10" value="0" name="startedWithBall">
				<button class="redButton counterButton" id="sub" onclick="modifyQty10(-1); return false;">━</button>
				<button class="greenButton counterButton" id="add" onclick="modifyQty10(1); return false;">╋</button>
			</div><br><br><br><br>

			Did it cross the initiation line?
			<ul>
			<li>
				<input type="radio" name="crossedBaseline" value="yes" id="baseline-yes">
				<label for="baseline-yes">Yes</label>
				
				<div class="check"><div class="inside"></div></div>
			</li>
			<li>
				<input type="radio" name="crossedBaseline" value="no" id="baseline-no">
				<label for="baseline-no">No</label>
				
				<div class="check"><div class="inside"></div></div>
			</li>
			</ul>
			
			Did it shoot a power cell? Where?
			<ul>
			Bottom Port<br>
			<div class="numCounter">
				<input class="qty" id="qty9" value="0" name="lowGoalAuto"/>
				<button class="redButton counterButton" id="sub" onclick="modifyQty9(-1); return false;">━</button>
				<button class="greenButton counterButton" id="add" onclick="modifyQty9(1); return false;">╋</button>
			</div><br><br><br><br>
			
			Dropped (Failed to shoot)?<br>
			<div class="numCounter">
				<input class="qty" id="qty8" value="0" name="droppedBallAuto"/>
				<button class="redButton counterButton" id="sub" onclick="modifyQty8(-1); return false;">━</button>
				<button class="greenButton counterButton" id="add" onclick="modifyQty8(1); return false;">╋</button>
			</div><br><br><br><br>
			
			Outer high goal<br>
			<div class="numCounter">
				<input class="qty" id="qty7" value="0" name="highGoalAuto"/>
				<button class="redButton counterButton" id="sub" onclick="modifyQty7(-1); return false;">━</button>
				<button class="greenButton counterButton" id="add" onclick="modifyQty7(1); return false;">╋</button>
			</div><br><br><br><br>
			
            Inner high goal<br>
			<div class="numCounter">
				<input class="qty" id="qty6" value="0" name="innerHighGoalAuto"/>
				<button class="redButton counterButton" id="sub" onclick="modifyQty6(-1); return false;">━</button>
				<button class="greenButton counterButton" id="add" onclick="modifyQty6(1); return false;">╋</button>
			</div><br><br><br><br>
            
		<b><font size="+3">Teleop:</font></b><br>
			How many power cells did it shot in the bottom port?<br>
			<div class="numCounter">
				<input class="qty" id="qty" value="0" name="lowGoal"/>
				<button class="redButton counterButton" id="sub" onclick="modifyQty(-1); return false;">━</button>
				<button class="greenButton counterButton" id="add" onclick="modifyQty(1); return false;">╋</button>
			</div><br><br><br><br>
			
			How many power cells did it drop (fail to shoot)?<br>
			<div class="numCounter">
				<input class="qty" id="qty2" value="0" name="dropped"/>
				<button class="redButton counterButton" id="sub" onclick="modifyQty2(-1); return false;">━</button>
				<button class="greenButton counterButton" id="add" onclick="modifyQty2(1); return false;">╋</button>
			</div><br><br><br><br>
			
			How many power cells did it shoot in the high goal?<br>
			<div class="numCounter">
				<input class="qty" id="qty3" value="0" name="highGoal"/>
				<button class="redButton counterButton" id="sub" onclick="modifyQty3(-1); return false;">━</button>
				<button class="greenButton counterButton" id="add" onclick="modifyQty3(1); return false;">╋</button>
			</div><br><br><br><br>
			
            How many power cells did it shoot in the inner high goal?<br>
			<div class="numCounter">
				<input class="qty" id="qty5" value="0" name="innerHighGoal"/>
				<button class="redButton counterButton" id="sub" onclick="modifyQty5(-1); return false;">━</button>
				<button class="greenButton counterButton" id="add" onclick="modifyQty5(1); return false;">╋</button>
			</div><br><br><br><br>
			
            Did they spin the color wheel? If so, how many times?<br>
			<div class="numCounter">
				<input class="qty" id="qty4" value="0" name="colorWheelSpun"/>
				<button class="redButton counterButton" id="sub" onclick="modifyQty4(-1); return false;">━</button>
				<button class="greenButton counterButton" id="add" onclick="modifyQty4(1); return false;">╋</button>
			</div><br><br><br><br>
            
            Did they spin the color wheel and attempt to land on a color? If so, were they successful?<br>
				<ul>
			<li>
				<input type="radio" name="colorWheel" value="setColor" id="setColor-successful">
				<label for="setColor-successful">Attempted to set color on wheel, successful</label>
				
				<div class="check"><div class="inside"></div></div>
			</li>
			<li>
				<input type="radio" name="colorWheel" value="setColorUnsuccessful" id="setColor-unsuccessful">
				<label for="setColor-unsuccessful">Attempted to set color on wheel, unsuccessful</label>
				
				<div class="check"><div class="inside"></div></div>
			</li>
			<li>
				<input type="radio" name="colorWheel" value="didNotSpin" id="didNotSpin">
				<label for="didNotSpin">Did not spin the wheel</label>
				
				<div class="check"><div class="inside"></div></div>
			</li>
			</ul>
			
            Did they balance?
			<ul>
                <li>
				<input type="radio" name="balancedClimb" value="balancedClimbSuccessful" id="balancedClimbSuccessful">
				<label for="balancedClimbSuccessful">Attempted to balance on generator switch, successful</label>
				
				<div class="check"><div class="inside"></div></div>
			</li>
			<li>
				<input type="radio" name="balancedClimb" value="balancedClimbUnsuccessful" id="balancedClimbUnsuccessful">
				<label for="balancedClimbUnsuccessful">Attempted to balance on generator switch, unsuccessful</label>
				
				<div class="check"><div class="inside"></div></div>
            </li>
			</ul>
            
            Do they park or attempt to climb? Are they successful in their climb? 
			<ul>
                <li>
				<input type="radio" name="attemptedClimb" value="successfulClimb" id="attemptedClimbSuccessful">
				<label for="attemptedClimbSuccessful">Attempted climb, successful</label>
				
				<div class="check"><div class="inside"></div></div>
			</li>
			<li>
				<input type="radio" name="attemptedClimb" value="unsuccessfulClimb" id="attemptedClimbUnsuccessful">
				<label for="attemptedClimbUnsuccessful">Attempted climb, unsuccessful</label>
				
				<div class="check"><div class="inside"></div></div>
			</li>
			<li>
				<input type="radio" name="attemptedClimb" value="parked" id="attemptedClimbParked">
				<label for="attemptedClimbParked">Parked</label>
				
				<div class="check"><div class="inside"></div></div>
			</li>
			<li>
				<input type="radio" name="attemptedClimb" value="didNotTry" id="didNotTry">
				<label for="didNotTry">Did not try</label>
				
				<div class="check"><div class="inside"></div></div>
			</li>
			</ul>
			
            Did it buddy climb (carry other) robots?
			<ul>
			<li>
				<input type="radio" name="carriedRobots" value="yes" id="carriedRobotsYes">
				<label for="carriedRobotsYes">Yes</label>
				
				<div class="check"><div class="inside"></div></div>
			</li>
			<li>
				<input type="radio" name="carriedRobots" value="no" id="carriedRobotsNo">
				<label for="carriedRobotsNo">No</label>
				
				<div class="check"><div class="inside"></div></div>
			</li>
			</ul>
			
			<b><font size="+3">Comments:</font></b><br>
		<div>
			<textarea name="comments" id="comments" rows="6" placeholder="ex. speed/accuracy of the robot, did it break down, did their drive team seem confused, etc."></textarea>
		</div>
		<br>
			<input type="submit" value="Submit">
		</form>
		<br>
	</div>
	<script type="text/javascript">
		// Number Counter Code
	function modifyQty(val) {
    	var qty = document.getElementById('qty').value;
    	var new_qty = parseInt(qty,10) + val;
    	
    	if (new_qty < 0) {
    	    new_qty = 0;
    	}
    	
    	document.getElementById('qty').value = new_qty;
    	return new_qty;
	}
	
	function modifyQty2(val) {
    	var qty = document.getElementById('qty2').value;
    	var new_qty = parseInt(qty,10) + val;
    	
    	if (new_qty < 0) {
    	    new_qty = 0;
    	}
    	
    	document.getElementById('qty2').value = new_qty;
    	return new_qty;
	}
	
	function modifyQty3(val) {
    	var qty = document.getElementById('qty3').value;
    	var new_qty = parseInt(qty,10) + val;
    	
    	if (new_qty < 0) {
    	    new_qty = 0;
    	}
    	
    	document.getElementById('qty3').value = new_qty;
    	return new_qty;
	}

	function modifyQty4(val) {
    	var qty = document.getElementById('qty4').value;
    	var new_qty = parseInt(qty,10) + val;
    	
    	if (new_qty < 0) {
    	    new_qty = 0;
    	}
    	
    	document.getElementById('qty4').value = new_qty;
    	return new_qty;
	}
	
        function modifyQty5(val) {
    	var qty = document.getElementById('qty5').value;
    	var new_qty = parseInt(qty,10) + val;
    	
    	if (new_qty < 0) {
    	    new_qty = 0;
    	}
    	
    	document.getElementById('qty5').value = new_qty;
    	return new_qty;
	}
	function modifyQty6(val) {
    	var qty = document.getElementById('qty6').value;
    	var new_qty = parseInt(qty,10) + val;
    	
    	if (new_qty < 0) {
    	    new_qty = 0;
    	}
    	
    	document.getElementById('qty6').value = new_qty;
    	return new_qty;
	}
	function modifyQty7(val) {
    	var qty = document.getElementById('qty7').value;
    	var new_qty = parseInt(qty,10) + val;
    	
    	if (new_qty < 0) {
    	    new_qty = 0;
    	}
    	
    	document.getElementById('qty7').value = new_qty;
    	return new_qty;
	}
	function modifyQty8(val) {
    	var qty = document.getElementById('qty8').value;
    	var new_qty = parseInt(qty,10) + val;
    	
    	if (new_qty < 0) {
    	    new_qty = 0;
    	}
    	
    	document.getElementById('qty8').value = new_qty;
    	return new_qty;
	}
	function modifyQty9(val) {
    	var qty = document.getElementById('qty9').value;
    	var new_qty = parseInt(qty,10) + val;
    	
    	if (new_qty < 0) {
    	    new_qty = 0;
    	}
    	
    	document.getElementById('qty9').value = new_qty;
    	return new_qty;
	}
	function modifyQty10(val) {
    	var qty = document.getElementById('qty10').value;
    	var new_qty = parseInt(qty,10) + val;
    	
    	if (new_qty < 0) {
    	    new_qty = 0;
    	}
    	
    	document.getElementById('qty10').value = new_qty;
    	return new_qty;
	}
    
    </script>
</body>
</html>