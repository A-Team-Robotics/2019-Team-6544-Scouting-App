<?php include('includes/database.php'); ?>
<?php
	$user = null;
	$scouter = null;

	if(isset($_GET['u'])) {
		$user = $_GET['u'];
		$scouter = $_GET['s'];
	}
?>
<?php
	if($_POST){
		//Get variables from post array
		$teamName = ($_POST['teamName']);
		$teamName = addslashes($teamName);
		$teamNumber = ($_POST['teamNumber']);
		$teamSchoolName = ($_POST['teamSchoolName']);
		$teamSchoolName = addslashes($teamSchoolName);
		$teamEmail =($_POST['teamEmail']);
		$teamAge = ($_POST['teamAge']);
		$teamLocation = ($_POST['teamLocation']);
		$teamLocation = addslashes($teamLocation);

		$user = ($_POST['user']);
		$scouter = ($_POST['scouter']);
		
		//Create customer query
		$query ="INSERT INTO team_info (teamName, teamNumber, teamSchoolName, teamEmail, teamAge, teamLocation)
								VALUES ('$teamName','$teamNumber','$teamSchoolName','$teamEmail','$teamAge','$teamLocation')";
		//Run query
		$mysqli->query($query);
		
		//$msg='Team Added';
		//header('Location: robot.php?'.urlencode($msg).'');
		header('Location: robot.php?u='.$user.'&s='.$scouter);
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
          <li ><a href="teamList.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Team List</a></li>
					<li class="active"><a href="addTeam.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Add Team</a></li>
					<li><a href="robot.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Add Robot</a></li>
					<li><a href="scoutTeam.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Scout Team</a></li>
					<li><a href="importPaper.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Paper Scout</a></li>
					<li><a href="addMatchCount.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Add Match</a></li>
					<li><a href="viewMatchSetNumber.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">View Match</a></li>
          <li><a href="viewTeamSetNumber.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">View Team</a></li>
        </ul>
      </div>
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

					document.getElementById("teamAdd").appendChild(user);
					document.getElementById("teamAdd").appendChild(scouter);
				}
			</script>
      <div class="row marketing">
        <div class="col-lg-12">
         <h2>Add Team</h2>
		 <form id="teamAdd" role="form" method="post" action="addTeam.php">
			<div class="form-group">
				<label>Team Name</label>
				<input name="teamName" type="text" class="form-control" placeholder="Enter Team Name" required>
			</div>
			<div class="form-group">
				<label>Team Number</label>
				<input name="teamNumber" type="number" class="form-control" placeholder="Enter Team Number" required>
			</div>
			<div class="form-group">
				<label>Team School Name</label>
				<input name="teamSchoolName" type="text" class="form-control" placeholder="Enter School Name">
			</div>
			<div class="form-group">
				<label>Team Email</label>
				<input name="teamEmail" type="email" class="form-control" placeholder="Enter Email">
			</div>
			<div class="form-group">
				<label>Team Years Old</label>
				<input name="teamAge" type="number" class="form-control" placeholder="Enter Age">
			</div>
			<div class="form-group"> 
			<label>Team Location</label> 
			<input name="teamLocation" type="text" class="form-control" placeholder="Enter Team Location" required>
			</div>
			<br /><input type="submit" class="btn btn-default" value="Add Team" />
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