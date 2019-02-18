<?php include('includes/database.php'); ?>
<?php
	$user = null;
	$scouter = null;

	if(isset($_GET['u'])) {
		$user = $_GET['u'];
		$scouter = $_GET['s'];
	}
	//Create the select query
	$query ="SELECT 
			 team_info.id,
			 team_info.teamName,
			 team_info.teamNumber,
			 team_info.teamSchoolName,
			 team_info.teamEmail,
			 team_info.teamAge,
			 team_info.teamLocation			
			 FROM team_info
			 ORDER BY teamNumber
			 ";
	//Get results
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$query2 = "SELECT * FROM match_scout ORDER BY teamNumber";
	$result2 = $mysqli->query($query2) or die($mysqli->error.__LINE__);
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
			var teamScores = [<?php
					$output = "";
					$numResults = mysqli_num_rows($result2);
					$counter = 0;
					while($row2 = $result2->fetch_assoc()) {
							$counter += 1;
							$output .= '['.$row2['teamNumber'].',';
							if($counter == $numResults) {
								$output .= ''.$row2['score'].']';
							}
							else {
								$output .= ''.$row2['score'].'],';
							}
					}
					echo $output;
					mysqli_data_seek($result2, 0);
				?>];
			var tempTeam = 0;
			var tempScore = 0;
			var tempTotal = 0;

			for(var i = 0;i < teamScores.length;i++) {
				if(i == 0) {
					tempTeam = teamScores[i][0];
					tempScore = teamScores[i][1];
				}
				else {
					if(teamScores[i][0] == tempTeam) {
						teamScores[i][1] += tempScore;
						i -= 1;
						teamScores.splice(i, 1);
					}
					tempTeam = teamScores[i][0];
					tempScore = teamScores[i][1];
				}
			}

			teamScores.sort(function(a, b){
				return a[1] + b[1];
			});
		</script>
  </head>
  <body>
    <div class="container">
      <div class="header">
				<h3 style="color:purple; font:bold;">A-Team Scouting Page</h3>
        <ul class="nav nav-pills pull-right">
				  <li><a href="homePage.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Home Page</a></li>
          <li class="active"><a href="teamList.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Team List</a></li>
          <li><a href="addTeam.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Add Team</a></li>
					<li><a href="robot.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Add Robot</a></li>
					<li><a href="scoutTeam.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Scout Team</a></li>
					<li><a href="addMatchCount.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Add Match</a></li>
					<li><a href="viewMatchSetNumber.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">View Match</a></li>
          <li><a href="viewTeamSetNumber.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">View Team</a></li>
  		</div>
        </ul>
      <div class="row marketing">
        <div class="col-lg-12">

		<?php
			if(isset($_GET['msg'])){
				echo '<div class="msg">'.$_GET['msg'].'</div>';
			}
		?>
    <h2>Team Info</h2>
		 <table class="table table-striped">
			<tr>
				<th>Team Name/Number</th>
				<th>School Name</th>
				<th>Email</th>
				<th>Age</th>
				<th>Location</th>
				<th>Edit</th>
			</tr>
			<?php 
				//Check if at least one row is found
				if($result->num_rows > 0) {
				//Loop through results
				while($row = $result->fetch_assoc()){
					//Display customer info
					$output ='<tr>';
					$output .='<td><a href="viewTeam.php?num='.$row['teamNumber'].'">'.$row['teamName'].'-'.$row['teamNumber'].'</td>';
					$output .='<td>'.$row['teamSchoolName'].'</td>';
					$output .='<td>'.$row['teamEmail'].'</td>';
					$output .='<td>'.$row['teamAge'].'</td>';
					$output .='<td>'.$row['teamLocation'].'</td>';
					$output .='<td><a href="editTeam.php?id='.$row['id'].'"class="btn btn-default btn-sm">Edit</a></td>';
					$output .='</tr>';
					
					//Echo output
					echo $output;
				}
			} else {
				echo "Sorry, no teams were found";
			}
			?>
		</table>
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