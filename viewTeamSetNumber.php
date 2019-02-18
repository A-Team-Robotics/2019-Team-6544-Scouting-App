<?php include('includes/database.php'); ?>
<?php
  $user = null;
	$scouter = null;

	if(isset($_GET['u'])) {
		$user = $_GET['u'];
		$scouter = $_GET['s'];
  }
  
  $query = "SELECT DISTINCT teamNumber FROM team_info ORDER BY teamNumber ASC";
  $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
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
    <script type="text/javascript">
        var teamNumber = 0;

        function save(selection) {
            teamNumber = selection[selection.selectedIndex].value;
        }
        function go() {
            window.open('viewTeam.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>&num=' + teamNumber,'_self');
        }
    </script>
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
            <li><a href="addMatchCount.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Add Match</a></li>
            <li><a href="viewMatchSetNumber.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">View Match</a></li>
            <li class="active"><a href="viewTeamSetNumber.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">View Team</a></li>
        </ul>
      </div>

      </select>
        Select Team: <select id="teamNum" onchange="save(this);">
            <?php
                $output = '';
                while($row = $result->fetch_assoc()) {
                    $output .= '<option value="'.$row['teamNumber'].'">' . $row['teamNumber'] . '</option>';
                }
                echo $output;
            ?>
      </select>
      <br /><br />
      <button onclick="go();">Go</button>
      <script type="text/javascript">
        teamNumber = document.getElementById('teamNum').options[0].value;
      </script>
      <div class="footer">
			<p style="color:purple;">&copy; A-Team Robotics 2018</p>
      </div>
    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>