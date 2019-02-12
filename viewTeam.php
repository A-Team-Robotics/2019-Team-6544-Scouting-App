<?php include('includes/database.php'); ?>
<?php
    $teamNumber = 0;
    if(isset($_GET['num'])) {
        $teamNumber = $_GET['num'];
    }

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
      tr, th, td {
        border: 1px solid #000000;
      }
      table {
        border: 1px solid #000000;
        /*table-layout: auto;
        width: 1000px;*/
      }
    </style>
    <script src="setScores.js" type="text/javascript"></script>
    <script type="text/javascript">
      var mainScoutInformation = [
        <?php
            $output = "";
            $numResults = mysqli_num_rows($result);
            $counter = 0;
            while($row = $result->fetch_assoc()) {
                $counter += 1;
                $output .= '['.$row['matchNumber'].',';
                $output .= '"'.$row['startLocation'].'",';
                $output .= '"'.$row['climb'].'",';
                $output .= '"'.$row['climbLevel'].'",';
                $output .= '"'.$row['climbFail'].'",';
                $output .= '"'.$row['climbFailLevel'].'",';
                $output .= '"'.$row['yellowCard'].'",';
                $output .= '"'.$row['redCard'].'",';
                $output .= '"'.$row['foul'].'",';
                $output .= '"'.$row['defense'].'",';
                $output .= '"'.$row['fallover'].'",';
                $output .= '"'.$row['falloverSave'].'",';
                $output .= '"'.$row['win'].'",';
                if($counter == $numResults) {
                  $output .= '"'.$row['extraInformation'].'"]';
                }
                else {
                  $output .= '"'.$row['extraInformation'].'"],';
                }
            }
            echo $output;
            mysqli_data_seek($result, 0);
        ?>
      ];
      var autoRockets = [
        <?php
          $output = "";
          $numResults = mysqli_num_rows($result);
          $counter = 0;
          while($row2 = $result2->fetch_assoc()) {
            $counter += 1;
            $output .= '['.$row2['autoHatchRocketsSuccess1'].',';
            $output .= $row2['autoHatchRocketsSuccess2'].',';
            $output .= $row2['autoHatchRocketsSuccess3'].',';
            $output .= $row2['autoCargoRocketsSuccess1'].',';
            $output .= $row2['autoCargoRocketsSuccess2'].',';
            $output .= $row2['autoCargoRocketsSuccess3'].',';
            $output .= $row2['autoHatchRocketsFail1'].',';
            $output .= $row2['autoHatchRocketsFail2'].',';
            $output .= $row2['autoHatchRocketsFail3'].',';
            $output .= $row2['autoCargoRocketsFail1'].',';
            $output .= $row2['autoCargoRocketsFail2'].',';
            if($counter == $numResults) {
              $output .= ''.$row2['autoCargoRocketsFail3'].']';
            }
            else {
              $output .= ''.$row2['autoCargoRocketsFail3'].'],';
            }
          }
          echo $output;
          mysqli_data_seek($result2, 0);
        ?>
      ];
      var autoShip = [
        <?php
          $output = "";
          $numResults = mysqli_num_rows($result);
          $counter = 0;
          while($row3 = $result3->fetch_assoc()) {
            $counter += 1;
            $output .= '['.$row3['autoHatchShipSuccess1'].',';
            $output .= $row3['autoHatchShipSuccess2'].',';
            $output .= $row3['autoHatchShipSuccess3'].',';
            $output .= $row3['autoCargoShipSuccess1'].',';
            $output .= $row3['autoCargoShipSuccess2'].',';
            $output .= $row3['autoCargoShipSuccess3'].',';
            $output .= $row3['autoHatchShipFail1'].',';
            $output .= $row3['autoHatchShipFail2'].',';
            $output .= $row3['autoHatchShipFail3'].',';
            $output .= $row3['autoCargoShipFail1'].',';
            $output .= $row3['autoCargoShipFail2'].',';
            if($counter == $numResults) {
              $output .= ''.$row3['autoCargoShipFail3'].']';
            }
            else {
              $output .= ''.$row3['autoCargoShipFail3'].'],';
            }
          }
          echo $output;
          mysqli_data_seek($result3, 0);
        ?>
      ];
      var teleopRockets = [
        <?php
          $output = "";
          $numResults = mysqli_num_rows($result);
          $counter = 0;
          while($row4 = $result4->fetch_assoc()) {
            $counter += 1;
            $output .= '['.$row4['teleopHatchRocketsSuccess1'].',';
            $output .= $row4['teleopHatchRocketsSuccess2'].',';
            $output .= $row4['teleopHatchRocketsSuccess3'].',';
            $output .= $row4['teleopCargoRocketsSuccess1'].',';
            $output .= $row4['teleopCargoRocketsSuccess2'].',';
            $output .= $row4['teleopCargoRocketsSuccess3'].',';
            $output .= $row4['teleopHatchRocketsFail1'].',';
            $output .= $row4['teleopHatchRocketsFail2'].',';
            $output .= $row4['teleopHatchRocketsFail3'].',';
            $output .= $row4['teleopCargoRocketsFail1'].',';
            $output .= $row4['teleopCargoRocketsFail2'].',';
            if($counter == $numResults) {
              $output .= ''.$row4['teleopCargoRocketsFail3'].']';
            }
            else {
              $output .= ''.$row4['teleopCargoRocketsFail3'].'],';
            }
          }
          echo $output;
          mysqli_data_seek($result4, 0);
        ?>
      ];
      var teleopShip = [
        <?php
          $output = "";
          $numResults = mysqli_num_rows($result);
          $counter = 0;
          while($row5 = $result5->fetch_assoc()) {
            $counter += 1;
            $output .= '['.$row5['teleopHatchShipSuccess1'].',';
            $output .= $row5['teleopHatchShipSuccess2'].',';
            $output .= $row5['teleopHatchShipSuccess3'].',';
            $output .= $row5['teleopCargoShipSuccess1'].',';
            $output .= $row5['teleopCargoShipSuccess2'].',';
            $output .= $row5['teleopCargoShipSuccess3'].',';
            $output .= $row5['teleopHatchShipFail1'].',';
            $output .= $row5['teleopHatchShipFail2'].',';
            $output .= $row5['teleopHatchShipFail3'].',';
            $output .= $row5['teleopCargoShipFail1'].',';
            $output .= $row5['teleopCargoShipFail2'].',';
            if($counter == $numResults) {
              $output .= ''.$row5['teleopCargoShipFail3'].']';
            }
            else {
              $output .= ''.$row5['teleopCargoShipFail3'].'],';
            }
          }
          echo $output;
          mysqli_data_seek($result5, 0);
        ?>
      ];
      var scores = setScores(mainScoutInformation, autoRockets, autoShip, teleopRockets, teleopShip);
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
					<li><a href="viewMatchSetNumber.php">View Match</a></li>
          <li class="active"><a href="viewTeam.php?num=<?php echo $teamNumber; ?>">View Team</a></li>
        </ul>
        <h3 style="color:purple; font:bold;">A-Team Scouting Page</h3>
      </div>
      <h2>Team <?php echo $teamNumber; ?></h2><br />

      <div id="matchHistory">
        <table id="data" style="border: 1px solid black;">
          <tr>
            <th>Match Number</th>
            <th>Start Position</th>
            <th>Climb Success</th>
            <th>Climb Level</th>
            <th>Climb Fail</th>
            <th>Climb Fail Level</th>
            <th>Yellow Cards</th>
            <th>Red Cards</th>
            <th>Other Fouls</th>
            <th>Defense</th>
            <th>Fallovers</th>
            <th>Fallover Saves</th>
            <th>Alliance Win</th>
            <th>Extra Information</th>
          </tr>
          <script type="text/javascript">
            var table = document.getElementById("data");

            for(var i = 0;i < mainScoutInformation.length;i++) {
              var row = table.insertRow(i + 1);
              for(var j = 0;j < 14;j++) {
                var cell = row.insertCell(j);
                cell.innerHTML = mainScoutInformation[i][j];
              }
            }
          </script>
          <script type="text/javascript">
            /*
            var table = document.getElementById('data');
            var rows = new Array(mainScoutInformation.length + autoRockets.length + autoShip.length + teleopRockets.length + teleopShip.length);
            var titles = ['Match Number','Start Position','Climb','Climb Fail','Yellow Cards','Red Cards','Other Fouls','Defense','Fallovers','Fallover Saves','Alliance Win','Extra Information'];
            for(var i = 0;i < (mainScoutInformation.length + autoRockets.length + autoShip.length + teleopRockets.length + teleopShip.length);i++) {
              rows[i] = table.insertRow(i);
              var cells = rows[i].insertCell(0);
              cells.style.border = "1px solid black;";
              cells.innerHTML = titles[i];
              for(var j = 0;j < mainScoutInformation.length;j++) {
                var cells = rows[i].insertCell(j + 1);
                cells.style.border = "1px solid black;";
                cells.innerHTML = mainScoutInformation[j][i];
              }
            }
           /*
            var row1 = table.insertRow(0);
            var cells = row1.insertCell(0);
            cells.style.border = "1px solid black;";
            cells.innerHTML = "Match Number";
            for(var i = 0;i <= mainScoutInformation.length;i++) {
              var cells = row1.insertCell(i);
              cells.innerHTML = mainScoutInformation[i][0];
            }

            var row2 = table.insertRow(1);
            var cells = row2.insertCell(0);
            cells.style.border = "1px solid black;";
            cells.innerHTML = "Start Position";
            for(var i = 0;i <= mainScoutInformation.length;i++) {
              var cells = row2.insertCell(i);
              cells.innerHTML = mainScoutInformation[i][1];
            }

            var row3 = table.insertRow(2);
            var cells = row3.insertCell(0);
            cells.style.border = "1px solid black;";
            cells.innerHTML = "Start Position";
            for(var i = 0;i <= mainScoutInformation.length;i++) {
              var cells = row3.insertCell(i);
              cells.innerHTML = mainScoutInformation[i][2];
            }
            */
          </script>
        </table>
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