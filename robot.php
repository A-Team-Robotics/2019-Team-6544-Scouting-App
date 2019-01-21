<?php include('includes/database.php'); ?>
<?php
    $query = "SELECT DISTINCT teamNumber
                FROM team_info
                ORDER BY teamNumber DESC
                ";
    //Get results
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
?>
<?php
	if($_POST){
		//Get variables from post array
		$teamNumber = ($_POST['matchNumber']);
		$blueTeam1 = ($_POST['blueTeam1']); 
		$blueTeam2 = ($_POST['blueTeam2']); 
		$blueTeam3 = ($_POST['blueTeam3']);
		$redTeam1 = ($_POST['redTeam1']);
		$redTeam2 = ($_POST['redTeam2']);
		$redTeam3 = ($_POST['redTeam3']);

		$query = "INSERT INTO match_info (matchNumber, blueTeam1, blueTeam2, blueTeam3, redTeam1, redTeam2, redTeam3) 
								VALUES ('$matchNumber','$blueTeam1','$blueTeam2','$blueTeam3','$redTeam1','$redTeam2','$redTeam3')";

		$mysqli->query($query);
		$msg='Match Info Added';
		header('Location: matchInfo.php?'.urlencode($msg).'');
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
          <li><a href="homePage.php">Home Page</a></li>
          <li><a href="teamList.php">Team List</a></li>
          <li><a href="addTeam.php">Add Team</a></li>
			<li class="active"><a href="robot.php">Add Robot</a></li>
			<li><a href="scoutTeam.php">Scout Team</a></li>
          <li><a href="addMatchCount.php">Match Information</a></li>
		</ul>
  	  </div>
    </div>
    <div class="row marketing">
        <div class="col-lg-12">
         <h2>Add Robot Information</h2>
				 
		 <form role="form" method="post" action="addMatch.php">
			<div class="form-group">
				<label>Team Number</label>
				<select>
                    <?php
                        // $teams->fetch_assoc()
                        while ($row = mysqli_fetch_array($result)){
                            echo "<option value=\"teamNumber\">" . $row['teamNumber'] . "</option>";
                        }
                    ?>
				</select>
			</div>
			<div class="form-group">
				<label>Second Blue Team</label>
				<input name="blueTeam2" type="text" class="form-control" placeholder="Enter Second Blue Team">
			</div>
			<div class="form-group">
				<label>Third Blue Team</label>
				<input name="blueTeam3" type="text" class="form-control" placeholder="Enter Third Blue Team">
			</div>
			<div class="form-group">
				<label>First Red Team (order does not matter)</label>
				<input name="redTeam1" type="text" class="form-control" placeholder="Enter First Red Team">
			</div>
			<div class="form-group"> 
				<label>Second Red Team</label> 
				<input name="redTeam2" type="text" class="form-control" placeholder="Enter Second Red Team">
			</div>
			<div class="form-group"> 
				<label>Third Red Team</label> 
				<input name="redTeam3" type="text" class="form-control" placeholder="Enter Third Red Team">
			</div>
			<br><input type="submit" class="btn btn-default" value="Add Match"/></br>
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