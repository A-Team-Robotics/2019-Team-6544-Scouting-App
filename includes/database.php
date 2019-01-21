<?php
//Connect to Database
$db_host = 'localhost';
$db_name = 'robot_scouting_2019';
$db_user = 'ateam1';
$db_pass = 'ZblQn5EZsr7uawOH';

//Create mysqli Object
$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);

//Error Handler
if(mysqli_connect_errno()){
	echo 'This Connection Failed'. mysqli1_connect_error();
	die();
}