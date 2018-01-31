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
			<a href="login.php">
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
	
	<div id="main">
		<form action="viewData.php">
		<b><font size="+3">Robot/Team Number:</font></b><br>
			<input type="text" class="robotNumber" name="robotNumber"><br>
		<br>
		<b><font size="+3">Autonomous:</font></b><br>
			Did it cross the base line?<br>
			<input type="radio" name="crossedBaseline" value="Yes"> Yes<br>
			<input type="radio" name="crossedBaseline" value="No"> No<br>
		<br>
			Did it place a cube? Where?<br>
			<input type="radio" name="placedCubeAuto" value="Yes, on scale"> Yes, on scale<br>
			<input type="radio" name="placedCubeAuto" value="Yes, on switch"> Yes, on switch<br>
			<input type="radio" name="placedCubeAuto" value="Did not place"> No<br>
		<br>
		<b><font size="+3">Teleop:</font></b><br>
			How many cubes did it place on ally switch?<br>
			<div class="numCounter">
				<input class="qty" id="qty" value="0" name="allySwitch"/>
				<button class="redButton counterButton" id="sub" onclick="modifyQty(-1)">━</button>
				<button class="greenButton counterButton" id="add" onclick="modifyQty(1)">╋</button>
			</div><br><br><br>
		<br>
			How many cubes did it place on the enemy switch?<br>
			<div class="numCounter">
				<input class="qty" id="qty2" value="0" name="enemySwitch"/>
				<button class="redButton counterButton" id="sub" onclick="modifyQty2(-1)">━</button>
				<button class="greenButton counterButton" id="add" onclick="modifyQty2(1)">╋</button>
			</div><br><br><br>
		<br>
			How many cubes did it place on the scale?<br>
			<div class="numCounter">
				<input class="qty" id="qty3" value="0" name="scale"/>
				<button class="redButton counterButton" id="sub" onclick="modifyQty3(-1)">━</button>
				<button class="greenButton counterButton" id="add" onclick="modifyQty3(1)">╋</button>
			</div><br><br><br>
		<br>
			Do they park or attempt to climb? Are they successful in their climb?<br>
			<input type="radio" name="attemptedClimb" value="Attempted climb, successful" > Attempted climb, successful<br>
			<input type="radio" name="attemptedClimb" value="Attempt climb, unsuccessful" > Attempted climb, unsuccessful<br>
			<input type="radio" name="attemptedClimb" value="Parked" > Parked<br>
			<input type="radio" name="attemptedClimb" value="Did not try" > Did not try<br>
		<br>
			Did it carry other robots?<br>
			<input type="radio" name="carriedRobots" value="Yes" > Yes<br>
			<input type="radio" name="carriedRobots" value="No" > No<br>
		<br>
			<b><font size="+3">Comments:</font></b><br>
		<div>
			<textarea name="comments" id="comments" rows="8" placeholder="ex. speed/accuracy of the robot, did it break down, did their drive team seem confused, etc."></textarea>
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
