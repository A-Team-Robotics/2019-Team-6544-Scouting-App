<?php include('includes/database.php'); ?>
<?php
	$user = null;
	$scouter = null;

	if(isset($_GET['u'])) {
		$user = $_GET['u'];
		$scouter = $_GET['s'];
	}
	$numRows = 1;
	if(isset($_GET['num'])) {
		$numRows = $_GET["num"];
	}
  $query = "SELECT DISTINCT teamNumber
                FROM team_info
                ORDER BY teamNumber
				";
	/*$query2 = "SELECT MAX(matchNumber)
				FROM matches"; */
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	/*
	$query2 = "SELECT DISTINCT matchNumber FROM matches ORDER BY matchNumber ASC";
	$result2 = $mysqli->query($query2) or die($mysqli->error.__LINE__);

	$matchNums = array();
	$i = 0;

	while($row2 = $result2->fetch_assoc()) {
		$matchNums[$i] = $row2['matchNumber'];
	}

	$startMatchNum = $matchNums[sizeof($matchNums) - 1]; //I may be able to get rid of this '-1' and all the successive '+1's, but I don't want to risk messing up the program.
	*/

	$query2 = mysqli_query($mysqli, "SELECT COUNT(matchNumber) AS num FROM matches");
	$row2 = mysqli_fetch_array($query2);
	$num = $row2['num'];
	$startMatchNum = $num; // no +1 to account for the ones later on in the program.

	$doc = new DomDocument;
	$values = array('blue1Team','blue2Team','blue3Team','red1Team','red2Team','red3Team');
?>
<?php
	if($_POST){
		//Get variables from post array
		$user = $_POST['user'];
		$scouter = $_POST['scouter'];
		if($numRows > 1) {
			$blueTeam1 = explode ("|", $_POST['blue1Team']);
			$blueTeam2 = explode ("|", $_POST['blue2Team']);
			$blueTeam3 = explode ("|", $_POST['blue3Team']);
			$redTeam1 = explode ("|", $_POST['red1Team']);
			$redTeam2 = explode ("|", $_POST['red2Team']);
			$redTeam3 = explode ("|", $_POST['red3Team']);

			for($i = 0;$i < $numRows;$i++) {
				$matchNumber = $i + $startMatchNum + 1;
				$query = "INSERT INTO matches(matchNumber, blueTeam1, blueTeam2, blueTeam3, redTeam1, redTeam2, redTeam3)
									VALUES ('$matchNumber','$blueTeam1[$i]','$blueTeam2[$i]','$blueTeam3[$i]','$redTeam1[$i]','$redTeam2[$i]','$redTeam3[$i]')";
				$mysqli->query($query) or die($mysqli->error.__LINE__);
			}
		}
		else {
			$matchNumber = $startMatchNum + 1;
			$blueTeam1 = ($_POST['blue1Team']);
			$blueTeam2 = ($_POST['blue2Team']);
			$blueTeam3 = ($_POST['blue3Team']);
			$redTeam1 = ($_POST['red1Team']);
			$redTeam2 = ($_POST['red2Team']);
			$redTeam3 = ($_POST['red3Team']);
			$query = "INSERT INTO matches (matchNumber, blueTeam1, blueTeam2, blueTeam3, redTeam1, redTeam2, redTeam3) 
								VALUES ('$matchNumber','$blueTeam1','$blueTeam2','$blueTeam3','$redTeam1','$redTeam2','$redTeam3')";
			$mysqli->query($query) or die($mysqli->error.__LINE__);
		}

		//$msg='Match Info Added'.$numRows;
		//header('Location: teamList.php?'.urlencode($msg).'');
		header('Location: teamList.php?u='.$user.'&s='.$scouter);
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
		<style>
			table {
				border: 1px solid black;
				width: 75%;
				position: relative;
				left: 30px;
			}
			tr, td, th {
				border: 1px solid black;
			}
			td, th {
				text-align: center;
			}
			textarea {
  			resize: none;
			}
			p {
				margin: 0;
				display: inline;
			}
		</style>
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
					<li class="active"><a href="<?php echo "addMatch.php?u=".$user."&s=".$scouter."&num=".$numRows; ?>">Enter Match</a></li>
					<li><a href="viewMatchSetNumber.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">View Match</a></li>
					<li><a href="viewTeamSetNumber.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">View Team</a></li>
				</ul>
  	  </div>
		</div>
		<br />
		<div id="matchTable">
			<table id="matches">
				<tr>
					<th>Match Number</th>
					<th>Blue Team 1</th>
					<th>Blue Team 2</th>
					<th>Blue Team 3</th>
					<th>Red Team 1</th>
					<th>Red Team 2</th>
					<th>Red Team 3</th>
				</tr>
				<?php
					$num = 0;
					for($num2 = $startMatchNum;$num2 < ($numRows + $startMatchNum);$num2++) {
						echo '<tr><td>'. ($num2 + 1). '</td>';
						$count = 0;
						for($i = 0;$i < 6;$i++) {
							$value = $values[$count].$num;
							echo '<td><select id="'.$value.'">';
							
							while ($row = mysqli_fetch_array($result)) {
								echo '<option value="'.$row['teamNumber'].'">' . $row['teamNumber'] . '</option>';
							}
							echo '</select></td>';
							mysqli_data_seek($result, 0);
							$count++;
						}
						echo '</tr>';
						$num++;
					}
					echo '</table>';
				?>
				
				<div id="hidden_form_container" style="display:none;">
					<script type="text/javascript">
						var teamIds = ['blue1Team','blue2Team','blue3Team','red1Team','red2Team','red3Team'];
						function getSelectionValue(rowNum, columnNum) {
							var id = teamIds[columnNum] + rowNum;
							var e = document.getElementById(id);
							var selectedValue = e.options[e.selectedIndex].value;
							return selectedValue;
						}

						function postRefreshPage() {
							var theForm, newInput1, newInput2, newInput3, newInput4, newInput5, newInput6;
							var rows = <?php echo $numRows; ?>;
							var start = <?php echo $startMatchNum; ?>;
							//var nums1 = new Array(rows);
							// Start by creating a <form>
							theForm = document.createElement('form');
							theForm.action = 'addMatch.php?num=' + rows;
							theForm.method = 'post';
							// Next create the <input>s in the form and give them names and values
							newInput1 = document.createElement('input');
							newInput1.type = 'hidden';
							newInput1.name = 'blue1Team';
							newInput1.id = 'blue1Team'; //new concept
							newInput1.value = "";

							newInput2 = document.createElement('input');
							newInput2.type = 'hidden';
							newInput2.name = 'blue2Team';
							newInput2.id = 'blue2Team';
							newInput2.value = "";
							
							newInput3 = document.createElement('input');
							newInput3.type = 'hidden';
							newInput3.name = 'blue3Team';
							newInput3.id = 'blue3Team';
							newInput3.value = "";
							
							newInput4 = document.createElement('input');
							newInput4.type = 'hidden';
							newInput4.name = 'red1Team';
							newInput4.id = 'red1Team';
							newInput4.value = "";
							
							newInput5 = document.createElement('input');
							newInput5.type = 'hidden';
							newInput5.name = 'red2Team';
							newInput5.id = 'red2Team';
							newInput5.value = "";
							
							newInput6 = document.createElement('input');
							newInput6.type = 'hidden';
							newInput6.name = 'red3Team';
							newInput6.id = 'red3Team';
							newInput6.value = "";

							for(var i = 0;i < rows;i++) {
								newInput1.value += getSelectionValue(i, 0);
								newInput2.value += getSelectionValue(i, 1);
								newInput3.value += getSelectionValue(i, 2);
								newInput4.value += getSelectionValue(i, 3);
								newInput5.value += getSelectionValue(i, 4);
								newInput6.value += getSelectionValue(i, 5);
								if((i + 1) != rows) {
									newInput1.value += "|";
									newInput2.value += "|";
									newInput3.value += "|";
									newInput4.value += "|";
									newInput5.value += "|";
									newInput6.value += "|";
								}
							}

							var user = document.createElement('input');
							user.type = 'hidden';
							user.name = 'user';
							user.id = 'user';
							user.value = '<?php echo $user; ?>';

							var scouter = document.createElement('input');
							scouter.type = 'hidden';
							scouter.name = 'scouter';
							scouter.id = 'scouter';
							scouter.value = '<?php echo $scouter; ?>';

							// Now put everything together...
							theForm.appendChild(newInput1);
							theForm.appendChild(newInput2);
							theForm.appendChild(newInput3);
							theForm.appendChild(newInput4);
							theForm.appendChild(newInput5);
							theForm.appendChild(newInput6);
							theForm.appendChild(user);
							theForm.appendChild(scouter);
							// ...and it to the DOM...
							//document.body.appendChild(theForm);
							document.getElementById('hidden_form_container').appendChild(theForm);

							// ...and submit it
							theForm.submit();
							//location.reload();
						}
					</script>
				</div>
				<!-- <button type="button" onclick="alert(getSelectionValue(0, 1));">Do it.</button> -->
				<button type="button" onclick="postRefreshPage();">Submit</button>
				<?php
					if($numRows < 0) {
						echo "You are dumber than man.";
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