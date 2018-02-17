<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Firebirds Robotics Scouting</title>
	<link href="styles.css" type="text/css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>

	<?php 
    	include("database.php");
    	
    	if (!isset($_SESSION['username'])) {
    	    echo '<script type="text/javascript">location.href = "index.php";</script>';
    	}
	?>

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
			<a href="profile.php"> <!-- THIS SHOULD BE THE LOGOUT -->
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
		<a href="home.php">Home</a>
		<a href="addNewRobot.php">Add Robot</a>
		<a href="viewData.php">View Data</a>
	</div>
	
	<div id="main">
		<form action="insertRobot.php" method="POST">
		
		<b><font size="+3">Robot/Team Number:</font></b><br>
		<font size="-1">(Please communicate with scouting team members)</font><br>
			<input type="number" class="robotNumber" name="robotNumber" required><br>
		<br>
		<b><font size="+3">Autonomous:</font></b><br>
			Did it cross the base line?
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
			
			Did it place a cube? Where?
			<ul>
			<li>
				<input type="radio" name="placedCubeAuto" value="placedOnScale" id="autoCube-scale">
				<label for="autoCube-scale">Yes, on scale</label>
				
				<div class="check"><div class="inside"></div></div>
			</li>
			<li>
				<input type="radio" name="placedCubeAuto" value="placedOnSwitch" id="autoCube-switch">
				<label for="autoCube-switch">Yes, on switch</label>
				
				<div class="check"><div class="inside"></div></div>
			</li>
			<li>
				<input type="radio" name="placedCubeAuto" value="didNotPlace" id="autoCube-none">
				<label for="autoCube-none">None</label>
				
				<div class="check"><div class="inside"></div></div>
			</li>
			</ul>
			
		<b><font size="+3">Teleop:</font></b><br>
			How many cubes did it place on ally switch?<br>
			<div class="numCounter">
				<input class="qty" id="qty" value="0" name="allySwitch"/>
				<button class="redButton counterButton" id="sub" onclick="modifyQty(-1); return false;">â”�</button>
				<button class="greenButton counterButton" id="add" onclick="modifyQty(1); return false;">â•‹</button>
			</div><br><br><br><br>
			
			How many cubes did it place on the enemy switch?<br>
			<div class="numCounter">
				<input class="qty" id="qty2" value="0" name="enemySwitch"/>
				<button class="redButton counterButton" id="sub" onclick="modifyQty2(-1); return false;">â”�</button>
				<button class="greenButton counterButton" id="add" onclick="modifyQty2(1); return false;">â•‹</button>
			</div><br><br><br><br>
			
			How many cubes did it place on the scale?<br>
			<div class="numCounter">
				<input class="qty" id="qty3" value="0" name="scale"/>
				<button class="redButton counterButton" id="sub" onclick="modifyQty3(-1); return false;">â”�</button>
				<button class="greenButton counterButton" id="add" onclick="modifyQty3(1); return false;">â•‹</button>
			</div><br><br><br><br>
			
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
			
			Did it carry other robots?
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
	
		// Sidebar
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