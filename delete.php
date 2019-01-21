<?php include('includes/database.php'); ?>
<?php
	if(isset($_GET['Team']) && $_GET){
	$id = $_GET['Team'];
		
		//Create customer query
		$query ="DELETE FROM team_info WHERE id=$id";
		//Run query
		$mysqli->query($query);
	}
?>
<?php 

$query = "SELECT MAX(id) FROM team_info; ALTER TABLE team_info AUTO_INCREMENT = 7";
$mysqli->query($query);
$msg='Team with id'.$id.'has been deleted';
header('Location: teamList.php?'.urlencode($msg).'');
exit;
?>