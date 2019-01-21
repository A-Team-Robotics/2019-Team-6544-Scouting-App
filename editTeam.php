<?php include('includes/database.php'); ?>
<?php
	//Assign get variable
	$id = $_GET['id'];
	
	//Create customer select query
	$query ="SELECT * FROM team_info
			 WHERE team_info.id = $id";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	if($result = $mysqli->query($query)){
		//Fetch object array
		while($row = $result->fetch_assoc()) {
			$teamName = $row['teamName'];
			$teamNumber = $row['teamNumber'];
			$teamSchoolName = $row['teamSchoolName'];
			$teamEmail = $row['teamEmail'];
			$teamAge = $row['teamAge'];
			$teamLocation = $row['teamLocation'];
		}
		//Free Result set
		$result->close();
	}
?>
<?php
	if($_POST){
		//Assign GET Variable
		$id = $_GET['id'];
	
		//Assign Variables
		$teamName = ($_POST['teamName']);
		$teamNumber = ($_POST['teamNumber']);
		$teamSchoolName = ($_POST['teamSchoolName']);
		$teamEmail = ($_POST['teamEmail']);
		$teamAge = ($_POST['teamAge']);
		$teamLocation = ($_POST['teamLocation']);
		
		//Create customer update
		$query = "UPDATE team_info
				  SET
				  teamName='$teamName',
				  teamNumber='$teamNumber',
					teamSchoolName='$teamSchoolName',
				  teamEmail='$teamEmail',
					teamLocation='$teamLocation',
				  teamAge='$teamAge'
				  WHERE id=$id
				  ";
		$mysqli->query($query) or die();
		$msg="Team Updated";
		header('Location:teamList.php?msg='.urlencode($msg).'');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>A-Team Robotics Scouting Page</title>
    <!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="css/main.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li ><a href="homepage.php">Team List</a></li>
          <li class="active"><a href="editTeam.php">editTeam</a></li>
        </ul>
        <h3 style="color:purple; font:bold;">A-Team Scouting Page</h3>
      </div>

      <div class="row marketing">
			<div class="col-lg-12">
			 <h2>Edit Team</h2>
	 <form role="form" method="post" action="editTeam.php?id=<?php echo $id; ?>">
		<div class="form-group">
			<label>Team Name</label>
			<input name="teamName" type="text" class="form-control" value="<?php echo $teamName; ?>"placeholder="Enter Team Name">
		</div>
		<div class="form-group">
			<label>Team Number</label>
			<input name="teamNumber" type="text" class="form-control" value="<?php echo $teamNumber; ?>"placeholder="Enter Last Name">
		</div>
		<div class="form-group">
			<label>Team School Name</label>
			<input name="teamSchoolName" type="text" class="form-control" value="<?php echo $teamSchoolName ?>"placeholder="Enter School Name">
		</div>
		<div class="form-group">
			<label>Team Email</label>
			<input name="teamEmail" type="email" class="form-control" value="<?php echo $teamEmail ?>"placeholder="Enter Email">
		</div>
		<div class="form-group">
			<label>Team Age</label>
			<input name="teamAge" type="text" class="form-control" value="<?php echo $teamAge ?>"placeholder="Enter Age">
		</div>
		<div class="form-group"> 
		<label>Team Location</label> 
		<input name="teamLocation" type="text" class="form-control" value="<?php echo $teamLocation ?>"placeholder="Enter Team Location">
		</div>
		<br><input type="submit" class="btn btn-default" value="Submit Changes" /></br>
	</form>
			</div>
		</div>
     <div>
		 <form action="delete.php" method="get">
     	<p><input type="checkbox" name="Team" value="<?php echo $id ?>">Delete: <?php echo $teamName ?></p>
     	<input type="submit" value="Delete">
     </form>
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