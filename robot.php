<?php include('includes/database.php'); ?>
<?php
	$user = null;
	$scouter = null;

	if(isset($_GET['u'])) {
		$user = $_GET['u'];
		$scouter = $_GET['s'];
	}
	$query = "SELECT DISTINCT teamNumber
							FROM team_info
							ORDER BY id DESC
							";
	//Get results
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
?>
<?php
	if($_POST){
		$teamNumber = ($_POST['teamNumber']);
		//Get robot information
		$speedMPS = ($_POST['speedMPS']);
		$weightP = ($_POST['weightP']);
		$strength = ($_POST['strength']);
		$numWheels = ($_POST['numWheels']);
		$omniWheels = ($_POST['omniWheels']);
		$canPlaceHatch2 = ($_POST['canPlaceHatch2']);
		$canPlaceHatch3 = ($_POST['canPlaceHatch3']);
		$canPlaceCargo2 = ($_POST['canPlaceCargo2']);
		$canPlaceCargo3 = ($_POST['canPlaceCargo3']);
		$canPickUpHatch = ($_POST['canPickUpHatch']);
		$speedPickUp = ($_POST['speedPickUp']);
		$canClimb2 = ($_POST['canClimb2']);
		$canClimb3 = ($_POST['canClimb3']);
		$extraInformation = ($_POST['extraInformation']);
		$extraInformation = addslashes($extraInformation);
		//Get auto information
		$canCollectHatch = ($_POST['canCollectHatch']);
		$canCollectCargo = ($_POST['canCollectCargo']);
		$aextraInformation = ($_POST['aextraInformation']);
		$aextraInformation = addslashes($aextraInformation);
		//Get teleop information
		$averageNumHatches = ($_POST['averageNumHatches']);
		$averageNumCargo = ($_POST['averageNumCargo']);
		$speedClimb2 = ($_POST['speedClimb2']);
		$speedClimb3 = ($_POST['speedClimb3']);
		$textraInformation = ($_POST['textraInformation']);
		$textraInformation = addslashes($textraInformation);

		$user = ($_POST['user']);
		$scouter = ($_POST['scouter']);

		$query = "INSERT INTO robot_info (teamNumber, speedMPS, weightP, strength, numWheels, omniWheels, canPlaceHatch2, canPlaceHatch3, canPlaceCargo2, canPlaceCargo3, canPickUpHatch, speedPickUp,
																			canClimb2, canClimb3, extraInformation)
								VALUES ('$teamNumber','$speedMPS','$weightP','$strength','$numWheels','$omniWheels','$canPlaceHatch2','$canPlaceHatch3','$canPlaceCargo2','$canPlaceCargo3','$canPickUpHatch',
												'$speedPickUp','$canClimb2','$canClimb3','$extraInformation')";
		$query2 = "INSERT INTO auto_info (teamNumber, canCollectHatch, canCollectCargo, extraInformation) 
								VALUES ('$teamNumber','$canCollectHatch','$canCollectCargo','$aextraInformation')";
		$query3 = "INSERT INTO teleop_info (teamNumber, averageNumHatches, averageNumCargo, speedClimb2, speedClimb3, extraInformation)
								VALUES ('$teamNumber','$averageNumHatches','$averageNumCargo','$speedClimb2','$speedClimb3','$textraInformation')";

		$mysqli->query($query) or die($mysqli->error.__LINE__);
		$mysqli->query($query2) or die($mysqli->error.__LINE__);
		$mysqli->query($query3) or die($mysqli->error.__LINE__);
		/*
		$msg='Robot Info Added';
		header('Location: teamList.php?'.urlencode($msg).'');
		*/
		header('Location: teamList.php?u='.$user.'&s='.$scouter);
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="FIRSTicon_RGB_withTM.jpg">
    <title>A-Team Robotics Scouting Page</title>
    <!-- Bootstrap core CSS -->
		
    <link href="css/main.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="header">
        <h3 style="color:purple; font:bold;">A-Team Scouting Page</h3>
        <ul class="nav nav-pills pull-right">
          <li><a href="homePage.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Home Page</a></li>
          <li><a href="teamList.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Team List</a></li>
          <li><a href="addTeam.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Add Team</a></li>
					<li class="active"><a href="robot.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Add Robot</a></li>
					<li><a href="scoutTeam.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Scout Team</a></li>
          <li><a href="addMatchCount.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Add Match</a></li>
					<li><a href="viewMatchSetNumber.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">View Match</a></li>
          <li><a href="viewTeamSetNumber.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">View Team</a></li>
				</ul>
  	  </div>
    </div>
    <div class="row marketing">
			<div class="col-lg-12">
				<script type="text/javascript">
					function addToForm() {
						var user = document.createElement('input');
						user.type = 'hidden';
						user.name = 'user';
						user.id = 'user';
						user.value = '<?php echo $user; ?>';

						var scouter = document.createElement('input');
						scouter.type = 'hidden';
						scouter.name = 'scouter';
						scouter.id = 'scouter';
						scouter.value = '<?php echo $scouter; ?>';

						document.getElementById("robotAdd").appendChild(user);
						document.getElementById("robotAdd").appendChild(scouter);
					}
				</script>
				<form id="robotAdd" role="form" method="post" action="robot.php">
					<div class="form-group">
						<label style="font-size: 18px">Team Number</label>
						<select name="teamNumber">
							<?php
									// $teams->fetch_assoc()
									if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {
											echo "<option>" . $row["teamNumber"]. "<br>" . "</option>";
										}
									} else {
										echo "No results.";
									}
							?>
						</select>
					</div>
					<!--
						ROBOT TIME
					-->
					<h2>Add Robot Information</h2>
					<div class="form-group">
						<label>Speed of Robot in Meters Per Second (if given feet per second, estimate the number by quickly dividing by three)</label>
						<input name="speedMPS" type="number" class="form-control" placeholder="Enter Meters Per Second Here" required>
					</div>
					<div class="form-group">
						<label>Weight of Robot in Pounds</label>
						<input name="weightP" type="number" class="form-control" placeholder="Enter Pounds Here" required>
					</div>
					<div class="form-group">
						<label>General Strength of Robot</label>
						<div>
							<input type="radio" name="strength" class="form-check-input" id="strength" value="Very Weak" required><b> Very Weak (can be pushed around very easily)</b><br />
							<input type="radio" name="strength" class="form-check-input" id="strength" value="Weak"><b> Weak (can be pushed around with ease)</b><br />
							<input type="radio" name="strength" class="form-check-input" id="strength" value="Strong"><b> Strong (can push around)</b><br />
							<input type="radio" name="strength" class="form-check-input" id="strength" value="Very Strong"><b> Very Strong (like a tank)</b><br /><br />
						</div>
					</div>
					<div class="form-group"> 
						<label>Number of Wheels on the Robot</label> 
						<input name="numWheels" type="number" class="form-control" placeholder="Enter Number of Wheels Here" required>
					</div>
					<div class="form-group">
						<label>Does the Robot Have Omni-Wheels?</label>
						<div>
							<input type="radio" name="omniWheels" class="form-check-input" id="omniWheels" value="Yes" required><b> Yes</b><br />
							<input type="radio" name="omniWheels" class="form-check-input" id="omniWheels" value="No"><b> No</b><br />
						</div>
					</div>
					<div class="form-group">
						<label>Can they Place a Hatch on Rocket Level 2?</label>
						<div>
							<input type="radio" name="canPlaceHatch2" class="form-check-input" id="canPlaceHatch2" value="Yes" required><b> Yes</b><br />
							<input type="radio" name="canPlaceHatch2" class="form-check-input" id="canPlaceHatch2" value="No"><b> No</b><br />
						</div>
					</div>
					<div class="form-group">
						<label>Can they Place a Hatch on Rocket Level 3?</label>
						<div>
							<input type="radio" name="canPlaceHatch3" class="form-check-input" id="canPlaceHatch3" value="Yes" required><b> Yes</b><br />
							<input type="radio" name="canPlaceHatch3" class="form-check-input" id="canPlaceHatch3" value="No"><b> No</b><br />
						</div>
					</div>
					<div class="form-group">
						<label>Can they Place Cargo on Rocket Level 2?</label>
						<div>
							<input type="radio" name="canPlaceCargo2" class="form-check-input" id="canPlaceCargo2" value="Yes" required><b> Yes</b><br />
							<input type="radio" name="canPlaceCargo2" class="form-check-input" id="canPlaceCargo2" value="No"><b> No</b><br />
						</div>
					</div>
					<div class="form-group">
						<label>Can they Place Cargo on Rocket Level 3?</label>
						<div>
							<input type="radio" name="canPlaceCargo3" class="form-check-input" id="canPlaceCargo3" value="Yes" required><b> Yes</b><br />
							<input type="radio" name="canPlaceCargo3" class="form-check-input" id="canPlaceCargo3" value="No"><b> No</b><br />
						</div>
					</div>
					<div class="form-group">
						<label>Can they Pick up a Hatch Off the Ground?</label>
						<div>
							<input type="radio" name="canPickUpHatch" class="form-check-input" id="canPickUpHatch" value="Yes" required><b> Yes</b><br />
							<input type="radio" name="canPickUpHatch" class="form-check-input" id="canPickUpHatch" value="No"><b> No</b><br />
						</div>
					</div>
					<div class="form-group">
						<label>If So, How Fast Can They Pick One Up?</label>
						<div>
						<input type="radio" name="speedPickUp" class="form-check-input" id="speedPickUp" value="No" required><b> They Can't</b><br />
							<input type="radio" name="speedPickUp" class="form-check-input" id="speedPickUp" value="Very Slow"><b> More Than 8 Seconds</b><br />
							<input type="radio" name="speedPickUp" class="form-check-input" id="speedPickUp" value="Slow"><b> 5 - 8 Seconds</b><br />
							<input type="radio" name="speedPickUp" class="form-check-input" id="speedPickUp" value="Fast"><b> 3 - 4 Seconds</b><br />
							<input type="radio" name="speedPickUp" class="form-check-input" id="speedPickUp" value="Very Fast"><b> Less Than 3 Seconds</b><br /><br />
						</div>
					</div>
					<div class="form-group">
						<label>Can They Climb Level 2?</label>
						<div>
							<input type="radio" name="canClimb2" class="form-check-input" id="canClimb2" value="Yes" required><b> Yes</b><br />
							<input type="radio" name="canClimb2" class="form-check-input" id="canClimb2" value="No"><b> No</b><br />
						</div>
					</div>
					<div class="form-group">
						<label>Can They Climb Level 3?</label>
						<div>
							<input type="radio" name="canClimb3" class="form-check-input" id="canClimb3" value="Yes" required><b> Yes</b><br />
							<input type="radio" name="canClimb3" class="form-check-input" id="canClimb3" value="No"><b> No</b><br />
						</div>
					</div>
					<div class="form-group">
						<label>Any Other Information about the robot's design?</label>
						<input name="extraInformation" type="text" class="form-control" placeholder="Enter Any Extra Information Here">
					</div>
					<!--
						AUTO TIME
					-->
					<h2>Add Auto Information</h2>
					<div class="form-group">
						<label>Can Place Hatch</label>
						<div>
							<input type="radio" name="canCollectHatch" class="form-check-input" id="canCollectHatch" value="Yes" required><b> Yes</b><br />
							<input type="radio" name="canCollectHatch" class="form-check-input" id="canCollectHatch" value="No"><b> No</b><br />
						</div>
					</div>
					<div class="form-group">
						<label>Can Place Cargo</label>
						<div>
							<input type="radio" name="canCollectCargo" class="form-check-input" id="canCollectCargo" value="Yes" required><b> Yes</b><br />
							<input type="radio" name="canCollectCargo" class="form-check-input" id="canCollectCargo" value="No"><b> No</b><br />
						</div>
					</div>
					<div class="form-group">
						<label>Any Other Information About Autonomous?</label>
						<input name="aextraInformation" type="text" class="form-control" placeholder="Enter Any Extra Information Here">
					</div><br/>
					<!--
						TELEOP TIME
					-->
					<div class="form-group">
						<label>On Average, How Many Hatches Per Round?</label>
						<input name="averageNumHatches" type="number" class="form-control" placeholder="Enter Average Number of Hatches Here" required>
					</div>
					<div class="form-group">
						<label>On Average, How Much Cargo Per Round?</label>
						<input name="averageNumCargo" type="number" class="form-control" placeholder="Enter Average Number of Cargo Here" required>
					</div>
					<div class="form-group">
						<label>On Average, How Fast Can They Climb Level 2 In Seconds?</label>
						<input name="speedClimb2" type="number" class="form-control" placeholder="Enter Average Level 2 Climb Speed in Seconds Here" required>
					</div>
					<div class="form-group">
						<label>On Average, How Fast Can They Climb Level 3 In Seconds?</label>
						<input name="speedClimb3" type="number" class="form-control" placeholder="Enter Average Level 3 Climb Speed in Seconds Here" required>
					</div>
					<div class="form-group">
						<label>Any Other Information About Teleop?</label>
						<input name="textraInformation" type="text" class="form-control" placeholder="Enter Any Extra Information Here">
					</div><br/>
					<br><input type="submit" class="btn btn-default" value="Add Robot Info"/></br>
				</form>
				<script type="text/javascript">
					addToForm();
				</script>
			</div>
		</div>
		<div class="footer">
			<p style="color:purple;">&copy; A-Team Robotics 2018</p>
		</div>
	</div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>