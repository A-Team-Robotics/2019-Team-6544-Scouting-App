<?php include('includes/database.php'); ?>
<?php
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
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <li class="active"><a></a>Auto Info</li>
		    <li><a href="homePage.php">Home Page</a></li>
        <li><a href="teamList.php">Team List</a></li>
        <li><a href="addTeam.php">Add Team</a></li>
        <li><a href="autonomous.php">Autonomous</a></li>
        <li><a href="scoutTeam.php">Scout Team</a></li>
      </ul>
      <h3 style="color:purple; font:bold;">A-Team Scouting Page</h3>
    </div>
    <div class="row marketing">
      <div class="col-lg-12">

		<?php if(isset($_GET['msg'])){
			echo '<div class="msg">'.$_GET['msg'].'</div>';
		}
		?>
         <h2>Team Auto Info</h2>
		 <ul class="list-group">
         <li class="list-group-item justify-content-between">
           Cras justo odio
           <span class="badge badge-default badge-pill">14</span>
         </li>
         <li class="list-group-item justify-content-between">
           Dapibus ac facilisis in
           <span class="badge badge-default badge-pill">Left</span>
         </li>
         <li class="list-group-item justify-content-between">
           Morbi leo risus
           <span class="badge badge-default badge-pill">1</span>
         </li>
       </ul>
			<?php 
				//Check if at least one row is found
				if($result->num_rows > 0) {
				//Loop through results
				while($row = $result->fetch_assoc()){
					//Display customer info
					$output ='<tr>';
					
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
