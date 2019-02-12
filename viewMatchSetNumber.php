<?php include('includes/database.php'); ?>
<?php
    $query = "SELECT * FROM matches ORDER BY matchNumber ASC";
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
        var matchNumber = 1;

        function save(selection) {
            matchNumber = selection[selection.selectedIndex].id;
        }

        function go() {
            window.open('viewMatch.php?num=' + matchNumber,'_self');
        }
    </script>
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
            <li class="active"><a href="viewMatchSetNumber.php">View Match</a></li>
            <li><a href="viewTeamSetNumber.php">View Team</a></li>
        </ul>
        <h3 style="color:purple; font:bold;">A-Team Scouting Page</h3>
      </div>

      </select>
        Select Match: <select id="matchNum" onchange="save(this);">
            <?php
                $output = '';
                while($row = $result->fetch_assoc()) {
                    $output .= '<option id="'.$row['matchNumber'].'" value="'.$row['matchNumber'].'">MATCH ' .$row['matchNumber'].': BLUE = ('.$row['blueTeam1'].', '.$row['blueTeam2']
                                .', '.$row['blueTeam3'].') RED = ('.$row['redTeam1'].', '.$row['redTeam2'].', '.$row['redTeam3'].')</option>';
                }
                echo $output;
            ?>
      </select>
      <br /><br />
      <button onclick="go();">Go</button>

      <div class="footer">
			<p style="color:purple;">&copy; A-Team Robotics 2018</p>
      </div>
    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>