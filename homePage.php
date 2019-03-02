<?php include('includes/database.php'); ?>
<?php
  $user = null;
	$scouter = null;

	if(isset($_GET['u'])) {
		$user = $_GET['u'];
		$scouter = $_GET['s'];
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
          <li class="active"><a href="homePage.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Home Page</a></li>
          <li><a href="teamList.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Team List</a></li>
          <li><a href="addTeam.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Add Team</a></li>
          <li><a href="robot.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Add Robot</a></li>
          <li><a href="scoutTeam.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Scout Team</a></li>
          <li><a href="importPaper.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Paper Scout</a></li>
          <li><a href="addMatchCount.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Add Match</a></li>
          <li><a href="viewMatchSetNumber.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">View Match</a></li>
          <li><a href="viewTeamSetNumber.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">View Team</a></li>
        </ul>
  		</div>
      <br />
      <script type="text/javascript">
        function go() {
          var user = document.getElementById('identity').options[document.getElementById('identity').selectedIndex].value;
          var scouter = document.getElementById('scouter').options[document.getElementById('scouter').selectedIndex].value;

          window.open('addTeam.php?u=' + user + "&s=" + scouter,'_self');
        }
      </script>
      <h1>Welcome to the 6544 Team Scouting App!</h1>
      <b>Who Are You?</b>
      <select name="identity" id="identity">
        <option value="Beaudoin_Max">Beaudoin, Max</option>
        <option value="Bornais_Jeremie">Bornais, Jeremie</option>
        <option value="Bornais_Justin">Bornais, Justin</option>
        <option value="Butler_Nathan">Butler, Nathan</option>
        <option value="Conaty_Keaton">Conaty, Keaton</option>
        <option value="de Bont_Justin">de Bont, Justin</option>
        <option value="Dimirci_Melike">Dimirci, Melike</option>
        <option value="Drouillard_Cody">Drouillard, Cody</option>
        <option value="Fox_Brendan">Fox, Brendan</option>
        <option value="Fox_Colin">Fox, Colin</option>
        <option value="Joncas_Joshua">Joncas, Joshua</option>
        <option value="Laframboise_Nick">Laframboise, Nick</option>
        <option value="Mickle_Kaeleb">Mickle, Kaeleb</option>
        <option value="O'Callahan_Ethan">O'Callahan, Ethan</option>
        <option value="Orchard_Adam">Orchard, Adam</option>
        <option value="Parks_Liam">Parks, Liam</option>
        <option value="Parks_Mackenzie">Parks, Mackenzie</option>
        <option value="Richard_Ethan">Richard, Ethan</option>
        <option value="Sun_Jason">Sun, Jason</option>
        <option value="Tronchin_Adam">Tronchin, Adam</option>
        <option value="Tronchin_Sebastien">Tronchin, Sebastien</option>
        <option value="Parent_or_Mentor">Parent or Mentor</option>
      </select><br /><br />
      <b>What Scouter Are You?</b>
      <select name="scouter" id="scouter">
        <option value="Scouter_1">Scouter 1</option>
        <option value="Scouter_2">Scouter 2</option>
        <option value="Scouter_3">Scouter 3</option>
        <option value="Scouter_4">Scouter 4</option>
        <option value="Scouter_5">Scouter 5</option>
        <option value="Scouter_6">Scouter 6</option>
      </select>
      <br /><br /><br /><button class="btn btn-default" onclick="go();">Start Scouting</button>

      <script type="text/javascript">
        document.getElementById('identity').options[1].selected = true;
        document.getElementById('identity').options[0].selected = true;
        document.getElementById('scouter').options[1].selected = true;
        document.getElementById('scouter').options[0].selected = true;
      </script>
      <!--
      <div class="row marketing">
        <div class="col-lg-12">
        <?php if(isset($_GET['msg'])){
          echo '<div class="msg">'.$_GET['msg'].'</div>';
        }
        ?>
        </div>
      </div>
      -->
      <div class="footer">
        <p style="color:purple;">&copy; A-Team Robotics 2018</p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>