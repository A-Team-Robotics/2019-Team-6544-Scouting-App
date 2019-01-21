<?php include('includes/database.php'); ?>
<?php
	//Create the select query
	$query ="SELECT DISTINCT
	     teamNumber
			 FROM team_info
			 ORDER BY teamNumber 
			 ";
			
	//Get results
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
?>
<?php
	if($_POST){
		//Get variables from post array
		$teamNumber = ($_POST['teamNumber']);
		$deliverCube = ($_POST['deliverCube']); 
		$hitScale = ($_POST['hitScale']); 
		$hitSwitch =($_POST['hitSwitch']);
		$crossBaseline = ($_POST['crossBaseline']); 
		
		//Create customer query
		$query ="INSERT INTO auto_info (teamNumber, deliverCube, hitScale, hitSwitch, crossBaseline)
								VALUES ('$teamNumber','$deliverCube','$hitScale','$hitSwitch','$crossBaseline')";
		//Run query
		$mysqli->query($query);
		
		$msg='Autonomous Added';
		header('Location: teamList.php?'.urlencode($msg).'');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>A-Team Robotics Scouting Page</title>
    <!-- Bootstrap core CSS -->
    <link href="css/main.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
				  <li><a href="homePage.php">Home Page</a></li>
          <li ><a href="teamList.php">Team List</a></li>
          <li ><a href="addTeam.php">Add Team</a></li>
					<li class="active"><a href="teamList.php">Autonomous</a></li>
        </ul>
        <h3 style="color:purple; font:bold;">A-Team Scouting Page</h3>
      </div> 
      <div class="row marketing">
        <div class="col-lg-12">
         <h2>Add Team</h2>
		 <form role="form" method="post" action="autonomous.php">
		 	<div class="form-group">
    		<label class="form-group">Team Number</label>
    		<input type="text" class="form-control" id="teamNumber">
  		</div>
		 	<div class="form-check">
		 		<input type="checkbox" class="form-check-input" id="deliverCube">
		 		<label class="form-check-label">Delivered a Cube?</label>
	 		</div>
			 <div class="form-check">
		 		<input type="checkbox" class="form-check-input" id="hitSwitch">
		 		<label class="form-check-label">Hit the Switch?</label>
	 		</div>
			<div class="form-check">
		 		<input type="checkbox" class="form-check-input" id="hitScale">
		 		<label class="form-check-label">Hit the Scale?</label>
	 		</div>
			<div class="form-check">
		 		<input type="checkbox" class="form-check-input" id="crossBaseline">
		 		<label class="form-check-label">Crossed the Baseline?</label>
	 		</div>
		 <br><input type="submit" class="btn btn-default" value="Add Auto Info" /></br>
		</form>
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