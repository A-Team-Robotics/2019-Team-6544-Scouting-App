<?php include('includes/database.php'); ?>
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
          <li class="active"><a href="homePage.php">Home Page</a></li>
          <li><a href="teamList.php">Team List</a></li>
          <li><a href="addTeam.php">Add Team</a></li>
          <li><a href="robot.php">Add Robot</a></li>
          <li><a href="scoutTeam.php">Scout Team</a></li>
          <li><a href="addMatchCount.php">Add Match</a></li>
          <li><a href="viewMatchSetNumber.php">View Match</a></li>
          <li><a href="viewTeamSetNumber.php">View Team</a></li>
        </ul>
  		</div>
        <h3 style="color:purple; font:bold;">A-Team Scouting Page</h3>
      <div class="row marketing">
        <div class="col-lg-12">

		<?php if(isset($_GET['msg'])){
			echo '<div class="msg">'.$_GET['msg'].'</div>';
		}
		?>
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
