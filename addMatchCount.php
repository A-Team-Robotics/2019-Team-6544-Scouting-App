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
		$numMatches = ($_POST['numMatches']);
		$msg='num='. (string)$numMatches;
		header('Location: addMatch.php?u='. $user. '&s='. $scouter. '&num='. $numMatches. '');
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
          <li><a href="homePage.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Home Page</a></li>
          <li><a href="teamList.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Team List</a></li>
          <li><a href="addTeam.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Add Team</a></li>
          <li><a href="robot.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Add Robot</a></li>
          <li><a href="scoutTeam.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Scout Team</a></li>
          <li><a href="importPaper.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Paper Scout</a></li>
          <li class="active"><a href="addMatchCount.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Add Match</a></li>
          <li><a href="viewMatchSetNumber.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">View Match</a></li>
           <li><a href="viewTeamSetNumber.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">View Team</a></li>
				</ul>
  	  </div>
		</div>
		<br />
        <form role="form" method="post" action="addMatchCount.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">
          <div class="form-group">
				    <label>Number of Matches to Input</label>
				    <input name="numMatches" type="text" class="form-control" placeholder="Recommended: set value to number of Qualification Matches">
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