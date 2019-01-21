<?php include('includes/database.php'); ?>
<?php
	if($_POST){
		//Get variables from post array
		$teamName = ($_POST['teamName']);
		$teamNumber = ($_POST['teamNumber']); 
		$teamSchoolName = ($_POST['teamSchoolName']); 
		$teamEmail =($_POST['teamEmail']);
		$teamAge = ($_POST['teamAge']); 
		$teamLocation = ($_POST['teamLocation']);
		
		//Create customer query
		$query ="INSERT INTO team_info (teamName, teamNumber, teamSchoolName, teamEmail, teamAge, teamLocation)
								VALUES ('$teamName','$teamNumber','$teamSchoolName','$teamEmail','$teamAge','$teamLocation')";
		//Run query
		$mysqli->query($query);
		
		$msg='Team Added';
		header('Location: robot.php?'.urlencode($msg).'');
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
        <ul class="nav nav-pills pull-right">
				  <li><a href="homePage.php">Home Page</a></li>
          <li ><a href="teamList.php">Team List</a></li>
					<li class="active"><a href="addTeam.php">Add Team</a></li>
					<li><a href="robot.php">Add Robot</a></li>
					<li><a href="scoutTeam.php">Scout Team</a></li>
					<li><a href="addMatchCount.php">Match Information</a></li>
        </ul>
        <h3 style="color:purple; font:bold;">A-Team Scouting Page</h3>
      </div>

      <div class="row marketing">
        <div class="col-lg-12">
         <h2>Add Team</h2>
		 <form role="form" method="post" action="addTeam.php">
			<div class="form-group">
				<label>Team Name</label>
				<input name="teamName" type="text" class="form-control" placeholder="Enter Team Name">
			</div>
			<div class="form-group">
				<label>Team Number</label>
				<input name="teamNumber" type="text" class="form-control" placeholder="Enter Last Name">
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
				<input name="teamAge" type="text" class="form-control" placeholder="Enter Age">
			</div>
			<div class="form-group"> 
			<label>Team Location</label> 
			<input name="teamLocation" type="text" class="form-control" placeholder="Enter Team Location">
			</div>
			<br><input type="submit" class="btn btn-default" value="Add Team" /></br>
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