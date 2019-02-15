<?php include('includes/database.php'); ?>
<?php
    $matchNumber = 0;
    if(isset($_GET['num'])) {
        $matchNumber = $_GET['num'];
    }
    $query = "SELECT DISTINCT * FROM matches WHERE matchNumber = ".$matchNumber;
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
    <style>
      tr, td {
        border: 1px solid #000000;
        padding: 5px;
      }
      th {
        border: 2px solid #000000;
        padding: 3px;
      }
      tr:nth-child(odd) {
        background: #DDD;
      }
      tr:nth-child(even) {
        background: #FFF;
      }
      table {
        border: 1px solid #000000;
        /*table-layout: auto;
        width: 1000px;*/
      }
    </style>
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
      <div id="matchInfo">
        <table id="matchTable" style="border: 1px solid black;">
          <tr>
            <th>Blue Team 1</th>
            <th>Blue Team 2</th>
            <th>Blue Team 3</th>
            <th>Red Team 1</th>
            <th>Red Team 2</th>
            <th>Red Team 3</th>
          </tr>
          <?php
            //Loop through results
            $blue = 0;
            $blueScore = 0;
            $redScore = 0;
            while($row = $result->fetch_assoc()){
              //Display customer info
              $rows = array($row['blueTeam1'], $row['blueTeam2'], $row['blueTeam3'], $row['redTeam1'], $row['redTeam2'], $row['redTeam3']." AND matchNumber = ".$matchNumber);
              $output ='<tr>';
              $output .= '<td><a href="viewTeam.php?num='.$row['blueTeam1'].'"class="btn btn-default btn-sm">'.$row['blueTeam1'].'</td>';
              $output .= '<td><a href="viewTeam.php?num='.$row['blueTeam2'].'"class="btn btn-default btn-sm">'.$row['blueTeam2'].'</td>';
              $output .= '<td><a href="viewTeam.php?num='.$row['blueTeam3'].'"class="btn btn-default btn-sm">'.$row['blueTeam3'].'</td>';
              $output .= '<td><a href="viewTeam.php?num='.$row['redTeam1'].'"class="btn btn-default btn-sm">'.$row['redTeam1'].'</td>';
              $output .= '<td><a href="viewTeam.php?num='.$row['redTeam2'].'"class="btn btn-default btn-sm">'.$row['redTeam2'].'</td>';
              $output .= '<td><a href="viewTeam.php?num='.$row['redTeam3'].'"class="btn btn-default btn-sm">'.$row['redTeam3'].'</td>';
              $output .='</tr>';
              $blue = $row['blueTeam1'];

              for($i = 0;$i < 3;$i++) {
                $rowSQL = mysqli_query($mysqli, "SELECT score AS score FROM match_scout WHERE teamNumber = ".$rows[$i]." AND matchNumber = ".$matchNumber); 
                $row = mysqli_fetch_assoc($rowSQL); 
                $tempScore = $row['score'];
                $blueScore += $tempScore;
              }

              for($i = 3;$i < 6;$i++) {
                $rowSQL = mysqli_query($mysqli, "SELECT score AS score FROM match_scout WHERE teamNumber = ".$rows[$i]); 
                $row = mysqli_fetch_assoc($rowSQL); 
                $tempScore = $row['score'];
                $redScore += $tempScore;
              }

              //Echo output
              echo $output;
            }
          ?>
        </table>
        <br />
        <h4>Blue Score: <?php echo $blueScore; ?> Points.</h4>
        <h4>Red Score: <?php echo $redScore; ?> Points.</h4>
        <h4>Winning Alliance: <?php
          if($blueScore > $redScore) {
            echo "Blue Alliance";
          }
          else if($blueScore < $redScore) {
            echo "Red Alliance";
          }
          else {
            echo "Tie";
          }
        ?></h4>
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