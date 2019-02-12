<?php include('includes/database.php'); ?>
<?php
    $matchNumber = 0;
    if(isset($_GET['num'])) {
        $matchNumber = $_GET['num'];
    }
    /*
    $query = "SELECT * FROM match_scout WHERE teamNumber = ".$teamNumber;
    $query2 = "SELECT * FROM match_scout_1 WHERE teamNumber = ".$teamNumber;
    $query3 = "SELECT * FROM match_scout_2 WHERE teamNumber = ".$teamNumber;
    $query4 = "SELECT * FROM match_scout_3 WHERE teamNumber = ".$teamNumber;
    $query5 = "SELECT * FROM match_scout_4 WHERE teamNumber = ".$teamNumber;
    $query6 = "SELECT * FROM matches WHERE blueTeam1=".$teamNumber." OR blueTeam2=".$teamNumber." OR blueTeam3=".$teamNumber." OR redTeam1=".$teamNumber." OR redTeam2=".$teamNumber." OR redTeam3=".$teamNumber;
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $result2 = $mysqli->query($query2) or die($mysqli->error.__LINE__);
    $result3 = $mysqli->query($query3) or die($mysqli->error.__LINE__);
    $result4 = $mysqli->query($query4) or die($mysqli->error.__LINE__);
    $result5 = $mysqli->query($query5) or die($mysqli->error.__LINE__);
    $result6 = $mysqli->query($query6) or die($mysqli->error.__LINE__);
    */
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
          <li><a href="teamList.php">Team List</a></li>
					<li><a href="addTeam.php">Add Team</a></li>
					<li><a href="robot.php">Add Robot</a></li>
					<li><a href="scoutTeam.php">Scout Team</a></li>
					<li><a href="addMatchCount.php">Add Match</a></li>
					<li class="active"><a href="viewMatch.php?num=<?php echo $matchNumber; ?>">View Match</a></li>
          <li><a href="viewTeamSetNumber.php">View Team</a></li>
        </ul>
        <h3 style="color:purple; font:bold;">A-Team Scouting Page</h3>
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