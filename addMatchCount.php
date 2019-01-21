<?php include('includes/database.php'); ?>
<?php
	if($_POST){
		//Get variables from post array
		$numMatches = ($_POST['numMatches']);
		$startMatchNum = ($_POST['startMatchNum']); 
		$msg='num='. (string)$numMatches. '&start='.(string)$startMatchNum;
		header('Location: addMatch.php?num='. $numMatches. '&start='. $startMatchNum. '');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
	<!-- javascript to php = $var = "<script> document.write(var); </script>"; -->
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
			<li><a href="robot.php">Add Robot</a></li>
			<li><a href="scoutTeam.php">Scout Team</a></li>
          <li class="active"><a href="addMatchCount.php">Match Information</a></li>
				</ul>
  	  </div>
		</div>
		<br />
        <form role="form" method="post" action="addMatchCount.php">
            <div class="form-group">
				<label>Number of Matches to Input</label>
				<input name="numMatches" type="text" class="form-control" placeholder="Recommended: set value to number of Qualification Matches">
			</div>
			<div class="form-group">
				<label>Starting Match Number</label>
				<input name="startMatchNum" type="text" class="form-control" placeholder="Recommended: set value to 1">
			</div>
            <br><input type="submit" class="btn btn-default" value="Go" /></br>
        </form>
      <div class="footer">
			<p style="color:purple;">&copy; A-Team Robotics 2018</p>
      </div>
	</div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>