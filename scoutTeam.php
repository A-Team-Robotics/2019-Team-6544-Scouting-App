<?php include('includes/database.php'); ?>
<?php
    $user = null;
	$scouter = null;

	if(isset($_GET['u'])) {
		$user = $_GET['u'];
		$scouter = $_GET['s'];
    }
    
    $query = "SELECT *
                FROM matches
                ORDER BY matchNumber ASC";
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

    $rowSQL = mysqli_query($mysqli, "SELECT MAX(matchNumber) AS matchNum FROM match_scout"); 
    $row = mysqli_fetch_assoc($rowSQL);
    $largestUID = $row['matchNum'];
?>
<?php
    if($_POST) {
        $user = $_POST['user'];
        $scouter = $_POST['scouter'];

        $teamNumber = $_POST['teamNumber'];
        $matchNumber = $_POST['matchNumber'];
        $startLocation = $_POST['startLocation'];

        $autoHatchRocketsSuccess = explode("|", $_POST['autoHatchRocketsSuccess']);
        $autoCargoRocketsSuccess = explode("|", $_POST['autoCargoRocketsSuccess']);
        $autoHatchRocketsFail = explode("|", $_POST['autoHatchRocketsFail']);
        $autoCargoRocketsFail = explode("|", $_POST['autoCargoRocketsFail']);
        $autoHatchShipSuccess = explode("|", $_POST['autoHatchShipSuccess']);
        $autoCargoShipSuccess = explode("|", $_POST['autoCargoShipSuccess']);
        $autoHatchShipFail = explode("|", $_POST['autoHatchShipFail']);
        $autoCargoShipFail = explode("|", $_POST['autoCargoShipFail']);

        $teleopHatchRocketsSuccess = explode("|", $_POST['teleopHatchRocketsSuccess']);
        $teleopCargoRocketsSuccess = explode("|", $_POST['teleopCargoRocketsSuccess']);
        $teleopHatchRocketsFail = explode("|", $_POST['teleopHatchRocketsFail']);
        $teleopCargoRocketsFail = explode("|", $_POST['teleopCargoRocketsFail']);
        $teleopHatchShipSuccess = explode("|", $_POST['teleopHatchShipSuccess']);
        $teleopCargoShipSuccess = explode("|", $_POST['teleopCargoShipSuccess']);
        $teleopHatchShipFail = explode("|", $_POST['teleopHatchShipFail']);
        $teleopCargoShipFail = explode("|", $_POST['teleopCargoShipFail']);

        $climb = $_POST['climb'];
        $climbLevel = $_POST['climbLevel'];
        $climbFail = $_POST['climbFail'];
        $climbFailLevel = $_POST['climbFailLevel'];

        $foul = $_POST['foul'];
        $foul = addslashes($foul);
        $defense = $_POST['defense'];
        $yellowCard = $_POST['yellowCard'];
        $yellowCard = addslashes($yellowCard);
        $redCard = $_POST['redCard'];
        $redCard = addslashes($redCard);
        $fallover = $_POST['fallover'];
        $falloverSave = $_POST['falloverSave'];
        $win = $_POST['win'];
        $extraInformation = $_POST['extraInformation'];
        $extraInformation = addslashes($extraInformation);
        $score = $_POST['score'];

        $query = "INSERT INTO match_scout (teamNumber, matchNumber, startLocation, climb, climbLevel, climbFail, climbFailLevel, yellowCard, redCard, foul, defense, fallover, falloverSave, win, extraInformation, score)
                            VALUES ('$teamNumber','$matchNumber','$startLocation','$climb','$climbLevel','$climbFail','$climbFailLevel','$yellowCard','$redCard','$foul','$defense','$fallover','$falloverSave','$win','$extraInformation','$score')
                            ";
        $mysqli->query($query) or die($mysqli->error.__LINE__);
        $query2 = "INSERT INTO match_scout_1 (teamNumber, matchNumber, autoHatchRocketsSuccess1, autoHatchRocketsSuccess2, autoHatchRocketsSuccess3, autoCargoRocketsSuccess1, autoCargoRocketsSuccess2,
                                            autoCargoRocketsSuccess3, autoHatchRocketsFail1, autoHatchRocketsFail2, autoHatchRocketsFail3, autoCargoRocketsFail1, autoCargoRocketsFail2,
                                            autoCargoRocketsFail3, score)
                            VALUES ('$teamNumber','$matchNumber','$autoHatchRocketsSuccess[0]','$autoHatchRocketsSuccess[1]','$autoHatchRocketsSuccess[2]','$autoCargoRocketsSuccess[0]','$autoCargoRocketsSuccess[1]',
                                    '$autoCargoRocketsSuccess[2]','$autoHatchRocketsFail[0]','$autoHatchRocketsFail[1]','$autoHatchRocketsFail[2]','$autoCargoRocketsFail[0]','$autoCargoRocketsFail[1]',
                                    '$autoCargoRocketsFail[2]','$score')
                                    ";
        $mysqli->query($query2) or die($mysqli->error.__LINE__);
        $query3 = "INSERT INTO match_scout_2 (teamNumber, matchNumber, autoHatchShipSuccess1, autoHatchShipSuccess2, autoHatchShipSuccess3, autoCargoShipSuccess1, autoCargoShipSuccess2,
                                            autoCargoShipSuccess3, autoHatchShipFail1, autoHatchShipFail2, autoHatchShipFail3, autoCargoShipFail1, autoCargoShipFail2,
                                            autoCargoShipFail3, score)
                            VALUES ('$teamNumber','$matchNumber','$autoHatchShipSuccess[0]','$autoHatchShipSuccess[1]','$autoHatchShipSuccess[2]','$autoCargoShipSuccess[0]','$autoCargoShipSuccess[1]',
                                    '$autoCargoShipSuccess[2]','$autoHatchShipFail[0]','$autoHatchShipFail[1]','$autoHatchShipFail[2]','$autoCargoShipFail[0]','$autoCargoShipFail[1]',
                                    '$autoCargoShipFail[2]','$score')
                                    ";
        $mysqli->query($query3) or die($mysqli->error.__LINE__);
        $query4 = "INSERT INTO match_scout_3 (teamNumber, matchNumber, teleopHatchRocketsSuccess1, teleopHatchRocketsSuccess2, teleopHatchRocketsSuccess3, teleopCargoRocketsSuccess1, teleopCargoRocketsSuccess2,
                                            teleopCargoRocketsSuccess3, teleopHatchRocketsFail1, teleopHatchRocketsFail2, teleopHatchRocketsFail3, teleopCargoRocketsFail1, teleopCargoRocketsFail2,
                                            teleopCargoRocketsFail3, score)
                            VALUES ('$teamNumber','$matchNumber','$teleopHatchRocketsSuccess[0]','$teleopHatchRocketsSuccess[1]','$teleopHatchRocketsSuccess[2]','$teleopCargoRocketsSuccess[0]','$teleopCargoRocketsSuccess[1]',
                                    '$teleopCargoRocketsSuccess[2]','$teleopHatchRocketsFail[0]','$teleopHatchRocketsFail[1]','$teleopHatchRocketsFail[2]','$teleopCargoRocketsFail[0]','$teleopCargoRocketsFail[1]',
                                    '$teleopCargoRocketsFail[2]','$score')
                                    ";
        $mysqli->query($query4) or die($mysqli->error.__LINE__);
        $query5 = "INSERT INTO match_scout_4 (teamNumber, matchNumber, teleopHatchShipSuccess1, teleopHatchShipSuccess2, teleopHatchShipSuccess3, teleopCargoShipSuccess1, teleopCargoShipSuccess2,
                                            teleopCargoShipSuccess3, teleopHatchShipFail1, teleopHatchShipFail2, teleopHatchShipFail3, teleopCargoShipFail1, teleopCargoShipFail2,
                                            teleopCargoShipFail3, score)
                            VALUES ('$teamNumber','$matchNumber','$teleopHatchShipSuccess[0]','$teleopHatchShipSuccess[1]','$teleopHatchShipSuccess[2]','$teleopCargoShipSuccess[0]','$teleopCargoShipSuccess[1]',
                                    '$teleopCargoShipSuccess[2]','$teleopHatchShipFail[0]','$teleopHatchShipFail[1]','$teleopHatchShipFail[2]','$teleopCargoShipFail[0]','$teleopCargoShipFail[1]',
                                    '$teleopCargoShipFail[2]','$score')
                                    ";
        $mysqli->query($query5) or die($mysqli->error.__LINE__);
        //$msg='Team Scouted';
        //header('Location: teamList.php?'.urlencode($msg).'');
        header('Location: teamList.php?u='.$user.'&s='.$scouter);
		exit;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Scout Team</title>
        <link rel="icon" href="FIRSTicon_RGB_withTM.jpg">
        <script src="scoutTeam.js" type="text/javascript"></script>
        <style>
            /* Dropdown Button */
            .dropbtn {
                background-color: #4CAF50;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
            }
            
            /* The container <div> - needed to position the dropdown content */
            .dropdown {
                position: relative;
                display: inline-block;
            }

            /* Dropdown Content (Hidden by Default) */
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f1f1f1;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }

            /* Links inside the dropdown */
            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            /* Change color of dropdown links on hover */
            .dropdown-content a:hover {background-color: #ddd;}

            /* Show the dropdown menu on hover */
            .dropdown:hover .dropdown-content {display: block;}

            /* Change the background color of the dropdown button when the dropdown content is shown */
            .dropdown:hover .dropbtn {background-color: #3e8e41;}

            #selections {
                font-size: 200%;
            }

            #upper {
                font-size: 125%;
            }
        </style>
        <script type="text/javascript">
            var data = [
                <?php
                    $output = "";
                    $numResults = mysqli_num_rows($result);
                    $counter = 0;
                    while($row = $result->fetch_assoc()) {
                        $counter++;
                        $output .= '['.$row['blueTeam1'].',';
                        $output .= $row['blueTeam2'].',';
                        $output .= $row['blueTeam3'].',';
                        $output .= $row['redTeam1'].',';
                        $output .= $row['redTeam2'].',';
                        if($counter == $numResults) {
                            $output .= $row['redTeam3'].']';
                        }
                        else {
                            $output .= $row['redTeam3'].'],';
                        }
                    }
                    echo $output;
                    mysqli_data_seek($result, 0);
                ?>
            ];
        </script>
    </head>
	<body>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>A-Team Robotics Scouting Page</title>
        <link href="css/main.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/custom.css" rel="stylesheet">
        <div class="container">
            <div class="header">
                <h3 style="color:purple; font:bold;">A-Team Scouting Page</h3>
                <ul class="nav nav-pills pull-right" id="upper">
                    <li><a href="homePage.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Home Page</a></li>
                    <li><a href="teamList.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Team List</a></li>
                    <li><a href="addTeam.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Add Team</a></li>
                    <li><a href="robot.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Robot Information</a></li>
                    <li class="active"><a href="scoutTeam.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Scout Team</a></li>
                    <li><a href="importPaper.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Paper Scout</a></li>
                    <li><a href="addMatchCount.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Add Match</a></li>
                    <li><a href="viewMatchSetNumber.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">View Match</a></li>
                    <li><a href="viewTeamSetNumber.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">View Team</a></li>
                </ul>
            </div>
        </div>
        <br />
        <div id="theForm"></div>
        <script type="text/javascript">
            function postData() {
                var form, fteamNumber, fmatchNumber, fstartLocation, fautoHatchRocketsSuccess, fautoCargoRocketsSuccess, fautoHatchRocketsFail, fautoCargoRocketsFail, fautoHatchShipSuccess,
                    fautoCargoShipSuccess, fautoHatchShipFail, fautoCargoShipFail, fteleopHatchRocketsSuccess, fteleopCargoRocketsSuccess, fteleopHatchRocketsFail, fteleopCargoRocketsFail,
                    fteleopHatchShipSuccess, fteleopCargoShipSuccess, fteleopHatchShipFail, fteleopCargoShipFail, fclimb, fclimbLevel, fclimbFail, fclimbFailLevel,
                    ffoul, fdefense, fyellowCard, fredCard, ffallover, ffalloverSave, fwin, fextraInformation, fscore;
                form = document.createElement('form');
                form.action = 'scoutTeam.php';
                form.method = 'post';

                fteamNumber = document.createElement('input');
                fteamNumber.type = 'hidden';
                fteamNumber.name = 'teamNumber';
                fteamNumber.id = 'teamNumber'; //new concept
                fteamNumber.value = document.getElementById('teamNum').options[document.getElementById('teamNum').selectedIndex].value;

                fmatchNumber = document.createElement('input');
                fmatchNumber.type = 'hidden';
                fmatchNumber.name = 'matchNumber';
                fmatchNumber.id = 'matchNumber'; //new concept
                fmatchNumber.value = document.getElementById('matchNum').options[document.getElementById('matchNum').selectedIndex].value;

                fstartLocation = document.createElement('input');
                fstartLocation.type = 'hidden';
                fstartLocation.name = 'startLocation';
                fstartLocation.id = 'startLocation';
                fstartLocation.value = startLocation;

                fautoHatchRocketsSuccess = document.createElement('input');
                fautoHatchRocketsSuccess.type = 'hidden';
                fautoHatchRocketsSuccess.name = 'autoHatchRocketsSuccess';
                fautoHatchRocketsSuccess.id = 'autoHatchRocketsSuccess';
                fautoHatchRocketsSuccess.value = autoHatchRocketsSuccess[0] + "|" + autoHatchRocketsSuccess[1] + "|" + autoHatchRocketsSuccess[2];

                fautoCargoRocketsSuccess = document.createElement('input');
                fautoCargoRocketsSuccess.type = 'hidden';
                fautoCargoRocketsSuccess.name = 'autoCargoRocketsSuccess';
                fautoCargoRocketsSuccess.id = 'autoCargoRocketsSuccess';
                fautoCargoRocketsSuccess.value = autoCargoRocketsSuccess[0] + "|" + autoCargoRocketsSuccess[1] + "|" + autoCargoRocketsSuccess[2];

                fautoHatchRocketsFail = document.createElement('input');
                fautoHatchRocketsFail.type = 'hidden';
                fautoHatchRocketsFail.name = 'autoHatchRocketsFail';
                fautoHatchRocketsFail.id = 'autoHatchRocketsFail';
                fautoHatchRocketsFail.value = autoHatchRocketsFail[0] + "|" + autoHatchRocketsFail[1] + "|" + autoHatchRocketsFail[2];

                fautoCargoRocketsFail = document.createElement('input');
                fautoCargoRocketsFail.type = 'hidden';
                fautoCargoRocketsFail.name = 'autoCargoRocketsFail';
                fautoCargoRocketsFail.id = 'autoCargoRocketsFail';
                fautoCargoRocketsFail.value = autoCargoRocketsFail[0] + "|" + autoCargoRocketsFail[1] + "|" + autoCargoRocketsFail[2];

                fautoHatchShipSuccess = document.createElement('input');
                fautoHatchShipSuccess.type = 'hidden';
                fautoHatchShipSuccess.name = 'autoHatchShipSuccess';
                fautoHatchShipSuccess.id = 'autoHatchShipSuccess';
                fautoHatchShipSuccess.value = autoHatchShipSuccess[0] + "|" + autoHatchShipSuccess[1] + "|" + autoHatchShipSuccess[2];

                fautoCargoShipSuccess = document.createElement('input');
                fautoCargoShipSuccess.type = 'hidden';
                fautoCargoShipSuccess.name = 'autoCargoShipSuccess';
                fautoCargoShipSuccess.id = 'autoCargoShipSuccess';
                fautoCargoShipSuccess.value = autoCargoShipSuccess[0] + "|" + autoCargoShipSuccess[1] + "|" + autoCargoShipSuccess[2];

                fautoHatchShipFail = document.createElement('input');
                fautoHatchShipFail.type = 'hidden';
                fautoHatchShipFail.name = 'autoHatchShipFail';
                fautoHatchShipFail.id = 'autoHatchShipFail';
                fautoHatchShipFail.value = autoHatchShipFail[0] + "|" + autoHatchShipFail[1] + "|" + autoHatchShipFail[2];

                fautoCargoShipFail = document.createElement('input');
                fautoCargoShipFail.type = 'hidden';
                fautoCargoShipFail.name = 'autoCargoShipFail';
                fautoCargoShipFail.id = 'autoCargoShipFail';
                fautoCargoShipFail.value = autoCargoShipFail[0] + "|" + autoCargoShipFail[1] + "|" + autoCargoShipFail[2];

                fteleopHatchRocketsSuccess = document.createElement('input');
                fteleopHatchRocketsSuccess.type = 'hidden';
                fteleopHatchRocketsSuccess.name = 'teleopHatchRocketsSuccess';
                fteleopHatchRocketsSuccess.id = 'teleopHatchRocketsSuccess';
                fteleopHatchRocketsSuccess.value = teleopHatchRocketsSuccess[0] + "|" + teleopHatchRocketsSuccess[1] + "|" + teleopHatchRocketsSuccess[2];

                fteleopCargoRocketsSuccess = document.createElement('input');
                fteleopCargoRocketsSuccess.type = 'hidden';
                fteleopCargoRocketsSuccess.name = 'teleopCargoRocketsSuccess';
                fteleopCargoRocketsSuccess.id = 'teleopCargoRocketsSuccess';
                fteleopCargoRocketsSuccess.value = teleopCargoRocketsSuccess[0] + "|" + teleopCargoRocketsSuccess[1] + "|" + teleopCargoRocketsSuccess[2];

                fteleopHatchRocketsFail = document.createElement('input');
                fteleopHatchRocketsFail.type = 'hidden';
                fteleopHatchRocketsFail.name = 'teleopHatchRocketsFail';
                fteleopHatchRocketsFail.id = 'teleopHatchRocketsFail';
                fteleopHatchRocketsFail.value = teleopHatchRocketsFail[0] + "|" + teleopHatchRocketsFail[1] + "|" + teleopHatchRocketsFail[2];

                fteleopCargoRocketsFail = document.createElement('input');
                fteleopCargoRocketsFail.type = 'hidden';
                fteleopCargoRocketsFail.name = 'teleopCargoRocketsFail';
                fteleopCargoRocketsFail.id = 'teleopCargoRocketsFail';
                fteleopCargoRocketsFail.value = teleopCargoRocketsFail[0] + "|" + teleopCargoRocketsFail[1] + "|" + teleopCargoRocketsFail[2];

                fteleopHatchShipSuccess = document.createElement('input');
                fteleopHatchShipSuccess.type = 'hidden';
                fteleopHatchShipSuccess.name = 'teleopHatchShipSuccess';
                fteleopHatchShipSuccess.id = 'teleopHatchShipSuccess';
                fteleopHatchShipSuccess.value = teleopHatchShipSuccess[0] + "|" + teleopHatchShipSuccess[1] + "|" + teleopHatchShipSuccess[2];

                fteleopCargoShipSuccess = document.createElement('input');
                fteleopCargoShipSuccess.type = 'hidden';
                fteleopCargoShipSuccess.name = 'teleopCargoShipSuccess';
                fteleopCargoShipSuccess.id = 'teleopCargoShipSuccess';
                fteleopCargoShipSuccess.value = teleopCargoShipSuccess[0] + "|" + teleopCargoShipSuccess[1] + "|" + teleopCargoShipSuccess[2];

                fteleopHatchShipFail = document.createElement('input');
                fteleopHatchShipFail.type = 'hidden';
                fteleopHatchShipFail.name = 'teleopHatchShipFail';
                fteleopHatchShipFail.id = 'teleopHatchShipFail';
                fteleopHatchShipFail.value = teleopHatchShipFail[0] + "|" + teleopHatchShipFail[1] + "|" + teleopHatchShipFail[2];

                fteleopCargoShipFail = document.createElement('input');
                fteleopCargoShipFail.type = 'hidden';
                fteleopCargoShipFail.name = 'teleopCargoShipFail';
                fteleopCargoShipFail.id = 'teleopCargoShipFail';
                fteleopCargoShipFail.value = teleopCargoShipFail[0] + "|" + teleopCargoShipFail[1] + "|" + teleopCargoShipFail[2];

                fclimb = document.createElement('input');
                fclimb.type = 'hidden';
                fclimb.name = 'climb';
                fclimb.id = 'climb';
                fclimb.value = climb;

                fclimbLevel = document.createElement('input');
                fclimbLevel.type = 'hidden';
                fclimbLevel.name = 'climbLevel';
                fclimbLevel.id = 'climbLevel';
                fclimbLevel.value = climbLevel;

                fclimbFail = document.createElement('input');
                fclimbFail.type = 'hidden';
                fclimbFail.name = 'climbFail';
                fclimbFail.id = 'climbFail';
                fclimbFail.value = climbFail;

                /*
                    fclimbLevelFail = document.createElement('input');
                    fclimbLevelFail.type = 'hidden';
                    fclimbLevelFail.name = 'climbLevelFail';
                    fclimbLevelFail.id = 'climbLevelFail';
                    fclimbLevelFail.value = climbLevelFail;
                */

                fclimbFailLevel = document.createElement('input');
                fclimbFailLevel.type = 'hidden';
                fclimbFailLevel.name = 'climbFailLevel';
                fclimbFailLevel.id = 'climbFailLevel';
                fclimbFailLevel.value = climbFailLevel;

                ffoul = document.createElement('input');
                ffoul.type = 'hidden';
                ffoul.name = 'foul';
                ffoul.id = 'foul';
                ffoul.value = foul;

                fdefense = document.createElement('input');
                fdefense.type = 'hidden';
                fdefense.name = 'defense';
                fdefense.id = 'defense';
                fdefense.value = defense;

                fyellowCard = document.createElement('input');
                fyellowCard.type = 'hidden';
                fyellowCard.name = 'yellowCard';
                fyellowCard.id = 'yellowCard';
                fyellowCard.value = yellowCard;

                fredCard = document.createElement('input');
                fredCard.type = 'hidden';
                fredCard.name = 'redCard';
                fredCard.id = 'redCard';
                fredCard.value = redCard;

                ffallover = document.createElement('input');
                ffallover.type = 'hidden';
                ffallover.name = 'fallover';
                ffallover.id = 'fallover';
                ffallover.value = fallover;

                ffalloverSave = document.createElement('input');
                ffalloverSave.type = 'hidden';
                ffalloverSave.name = 'falloverSave';
                ffalloverSave.id = 'falloverSave';
                ffalloverSave.value = falloverSave;

                fwin = document.createElement('input');
                fwin.type = 'hidden';
                fwin.name = 'win';
                fwin.id = 'win';
                fwin.value = win;

                fextraInformation = document.createElement('input');
                fextraInformation.type = 'hidden';
                fextraInformation.name = 'extraInformation';
                fextraInformation.id = 'extraInformation';
                fextraInformation.value = extraInformation;

                fscore = document.createElement('input');
                fscore.type = 'hidden';
                fscore.name = 'score';
                fscore.id = 'score';
                fscore.value = score;

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

                form.appendChild(fteamNumber);
                form.appendChild(fmatchNumber);
                form.appendChild(fstartLocation);
                form.appendChild(fautoHatchRocketsSuccess);
                form.appendChild(fautoCargoRocketsSuccess);
                form.appendChild(fautoHatchRocketsFail);
                form.appendChild(fautoCargoRocketsFail);
                form.appendChild(fautoHatchShipSuccess);
                form.appendChild(fautoCargoShipSuccess);
                form.appendChild(fautoHatchShipFail);
                form.appendChild(fautoCargoShipFail);
                form.appendChild(fteleopHatchRocketsSuccess);
                form.appendChild(fteleopCargoRocketsSuccess);
                form.appendChild(fteleopHatchRocketsFail);
                form.appendChild(fteleopCargoRocketsFail);
                form.appendChild(fteleopHatchShipSuccess);
                form.appendChild(fteleopCargoShipSuccess);
                form.appendChild(fteleopHatchShipFail);
                form.appendChild(fteleopCargoShipFail);
                form.appendChild(fclimb);
                form.appendChild(fclimbLevel);
                form.appendChild(fclimbFail);
                form.appendChild(fclimbFailLevel);
                form.appendChild(ffoul);
                form.appendChild(fdefense);
                form.appendChild(fyellowCard);
                form.appendChild(fredCard);
                form.appendChild(ffallover);
                form.appendChild(ffalloverSave);
                form.appendChild(fwin);
                form.appendChild(fextraInformation);
                form.appendChild(fscore);
                form.appendChild(user);
                form.appendChild(scouter);

                document.getElementById('theForm').appendChild(form);
                form.submit();
            }
        </script>
        <div id="selections">
            Select Match: <select id="matchNum" onchange="refreshSelections();">
                <?php
                    $output = "";
                    while($row = $result->fetch_assoc()) {
                        $output .='<option value="'.$row['matchNumber'].'">' . $row['matchNumber'] . '</option>';
                    }
                    mysqli_data_seek($result, 0);
                    echo $output;
                ?>
            </select><br />
            Select Team: <select id="teamNum" onchange="teamNumber = document.getElementById('teamNum').value;">
                    <option id="blue1"></option>
                    <option id="blue2"></option>
                    <option id="blue3"></option>
                    <option id="red1"></option>
                    <option id="red2"></option>
                    <option id="red3"></option>
                <?php
                /*
                    $doc = new DomDocument;
                    $matchNumber = $doc->getElementById('matchNum')->value;
                    $row = $result->fetch_assoc();
                    $output .= '<option value="'.$row['blueTeam1'].'">' . $row['blueTeam1'] . '</option>';
                    $output .= '<option value="'.$row['blueTeam2'].'">' . $row['blueTeam2'] . '</option>';
                    $output .= '<option value="'.$row['blueTeam3'].'">' . $row['blueTeam3'] . '</option>';
                    $output .= '<option value="'.$row['redTeam1'].'">' . $row['redTeam1'] . '</option>';
                    $output .= '<option value="'.$row['redTeam2'].'">' . $row['redTeam2'] . '</option>';
                    $output .= '<option value="'.$row['redTeam3'].'">' . $row['redTeam3'] . '</option>';
                    echo $output;
                    echo $matchNumber;
                    */
                ?>
            </select>
            <script type="text/javascript">
                function refreshSelections() {
                    var matchNum = document.getElementById('matchNum').value;
                    document.getElementById('blue1').value = data[matchNum - 1][0];
                    document.getElementById('blue1').innerHTML = data[matchNum - 1][0];
                    document.getElementById('blue2').value = data[matchNum - 1][1];
                    document.getElementById('blue2').innerHTML = data[matchNum - 1][1];
                    document.getElementById('blue3').value = data[matchNum - 1][2];
                    document.getElementById('blue3').innerHTML = data[matchNum - 1][2];
                    document.getElementById('red1').value = data[matchNum - 1][3];
                    document.getElementById('red1').innerHTML = data[matchNum - 1][3];
                    document.getElementById('red2').value = data[matchNum - 1][4];
                    document.getElementById('red2').innerHTML = data[matchNum - 1][4];
                    document.getElementById('red3').value = data[matchNum - 1][5];
                    document.getElementById('red3').innerHTML = data[matchNum - 1][5];
                }
            </script>
        </div>
        <div>
            <svg width="1500" height="850">
                <rect width="1500" height="850" x="0" y="0" fill="transparent" stroke="#000000" style="stroke-width:5px" />
                <!-- draws the field background -->
                <rect width="1490" height="650" x="5" y="50" style="fill: rgb(122, 122, 122);stroke:#3a3a3a;stroke-width:3px" />
                <rect width="20" height="125" x="180" y="180" style="fill: rgb(86, 119, 211);stroke: rgb(30, 30, 30)" />
                <rect width="20" height="125" x="180" y="312" style="fill: rgb(86, 119, 211);stroke: rgb(30, 30, 30)" />
                <rect width="20" height="125" x="180" y="445" style="fill: rgb(86, 119, 211);stroke: rgb(30, 30, 30)" />
                <rect width="20" height="125" x="1300" y="180" style="fill: rgb(86, 119, 211);stroke: rgb(30, 30, 30)" />
                <rect width="20" height="125" x="1300" y="312" style="fill: rgb(86, 119, 211);stroke: rgb(30, 30, 30)" />
                <rect width="20" height="125" x="1300" y="445" style="fill: rgb(86, 119, 211);stroke: rgb(30, 30, 30)" />
                <rect width="40" height="15" x="328" y="55" style="fill: rgb(255, 208, 0);stroke: rgb(0, 0, 0)" />
                <rect width="40" height="15" x="443" y="55" style="fill: rgb(255, 208, 0);stroke: rgb(0, 0, 0)" />
                <rect width="40" height="15" x="558" y="55" style="fill: rgb(255, 208, 0);stroke: rgb(0, 0, 0)" />
                <rect width="40" height="15" x="673" y="55" style="fill: rgb(255, 208, 0);stroke: rgb(0, 0, 0)" />
                <rect width="40" height="15" x="788" y="55" style="fill: rgb(255, 208, 0);stroke: rgb(0, 0, 0)" onclick="consoleLog('This is enough.', 10);" />
                <rect width="40" height="15" x="903" y="55" style="fill: rgb(255, 208, 0);stroke: rgb(0, 0, 0)" onclick="consoleLog('Start taking this seriously.', 10);" />
                <rect width="40" height="15" x="1018" y="55" style="fill: rgb(255, 208, 0);stroke: rgb(0, 0, 0)" onclick="console.log('Your using me for scouting is repellent.');" />
                <rect width="40" height="15" x="1133" y="55" style="fill: rgb(255, 208, 0);stroke: rgb(0, 0, 0)" onclick="consoleLog('Your scouting skills are lacking.', 10);" />
                <rect width="40" height="15" x="328" y="680" style="fill: rgb(255, 208, 0);stroke: rgb(0, 0, 0)" />
                <rect width="40" height="15" x="443" y="680" style="fill: rgb(255, 208, 0);stroke: rgb(0, 0, 0)" />
                <rect width="40" height="15" x="558" y="680" style="fill: rgb(255, 208, 0);stroke: rgb(0, 0, 0)" />
                <rect width="40" height="15" x="673" y="680" style="fill: rgb(255, 208, 0);stroke: rgb(0, 0, 0)" />
                <rect width="40" height="15" x="788" y="680" style="fill: rgb(255, 208, 0);stroke: rgb(0, 0, 0)" />
                <rect width="40" height="15" x="903" y="680" style="fill: rgb(255, 208, 0);stroke: rgb(0, 0, 0)" />
                <rect width="40" height="15" x="1018" y="680" style="fill: rgb(255, 208, 0);stroke: rgb(0, 0, 0)" />
                <rect width="40" height="15" x="1133" y="680" style="fill: rgb(255, 208, 0);stroke: rgb(0, 0, 0)" />
                <rect width="30" height="30" x="170" y="595" style="fill: rgb(255, 255, 255);stroke: rgb(0, 0, 0);" />
                <rect width="30" height="30" x="1300" y="595" style="fill: rgb(255, 255, 255);stroke: rgb(0, 0, 0);" />
                <rect width="30" height="30" x="170" y="112" style="fill: rgb(255, 255, 255);stroke: rgb(0, 0, 0);" />
                <rect width="30" height="30" x="1300" y="112" style="fill: rgb(255, 255, 255);stroke: rgb(0, 0, 0);" />
                <!-- draws main lines -->
                <line x1="730" y1="75" x2="730" y2="675" style="stroke:rgb(0, 0, 255);stroke-width:2" />
                <line x1="770" y1="75" x2="770" y2="675" style="stroke:rgb(255, 0, 0);stroke-width:2" />
                <line x1="400" y1="75" x2="400" y2="675" style="stroke:rgb(0, 0, 255);stroke-width:2" />
                <line x1="1100" y1="75" x2="1100" y2="675" style="stroke:rgb(255, 0, 0);stroke-width:2" />
                <line x1="200" y1="75" x2="1300" y2="75" style="stroke:rgb(240, 240, 240);stroke-width:2" />
                <line x1="200" y1="675" x2="1300" y2="675" style="stroke:rgb(240, 240, 240);stroke-width:2" />
                <line x1="5" y1="375" x2="1495" y2="375" style="stroke:rgb(36, 36, 36);stroke-width:1" />
                <line x1="200" y1="50" x2="200" y2="700" style="stroke:rgb(0, 0, 255);stroke-width:3" />
                <line x1="1300" y1="50" x2="1300" y2="700" style="stroke:rgb(255, 0, 0);stroke-width:3" />
                <line x1="200" y1="74" x2="200" y2="180" style="stroke:rgb(255, 255, 255);stroke-width:3" />
                <line x1="1300" y1="74" x2="1300" y2="180" style="stroke:rgb(255, 255, 255);stroke-width:3" />
                <line x1="200" y1="676" x2="200" y2="545" style="stroke:rgb(255, 255, 255);stroke-width:3" />
                <line x1="1300" y1="676" x2="1300" y2="545" style="stroke:rgb(255, 255, 255);stroke-width:3" />
                <line x1="200" y1="127" x2="230" y2="127" style="stroke:rgb(255, 255, 255);stroke-width:1" />
                <line x1="1300" y1="127" x2="1270" y2="127" style="stroke:rgb(255, 255, 255);stroke-width:1" />
                <line x1="200" y1="610" x2="230" y2="610" style="stroke:rgb(255, 255, 255);stroke-width:1" />
                <line x1="1300" y1="610" x2="1270" y2="610" style="stroke:rgb(255, 255, 255);stroke-width:1" />
                <line x1="200" y1="180" x2="200" y2="545" style="stroke:rgb(0, 0, 0);stroke-width:3" />
                <line x1="1300" y1="180" x2="1300" y2="545" style="stroke:rgb(0, 0, 0);stroke-width:3" />
                <!-- draws main field shapes -->
                <rect width="200" height="300" x="200" y="225" style="fill: rgb(0, 0, 255);stroke: rgb(30, 30, 30)" />
                    <rect id="climbB2Button" onclick="climbSet(1);" />
                    <text id="climbB2Text" onclick="climbSet(1);"></text>
                    <text id="climbB2Text2" onclick="climbSet(1);"></text>

                    <line x1="200" y1="250" x2="375" y2="250" style="stroke: rgb(30, 30, 30);stroke-width:1" />
                    <line x1="375" y1="250" x2="400" y2="225" style="stroke: rgb(30, 30, 30);stroke-width:1" />
                    <line x1="200" y1="500" x2="375" y2="500" style="stroke: rgb(30, 30, 30);stroke-width:1" />
                    <line x1="375" y1="500" x2="400" y2="525" style="stroke: rgb(30, 30, 30);stroke-width:1" />
                    <line x1="200" y1="330" x2="310" y2="330" style="stroke: rgb(30, 30, 30);stroke-width:1" />
                    <line x1="200" y1="420" x2="310" y2="420" style="stroke: rgb(30, 30, 30);stroke-width:1" />
                    <line x1="310" y1="250" x2="310" y2="500" style="stroke: rgb(30, 30, 30);stroke-width:1" />
                    <line x1="310" y1="375" x2="375" y2="375" style="stroke: rgb(30, 30, 30);stroke-width:1" />
                    <line x1="375" y1="250" x2="375" y2="500" style="stroke: rgb(30, 30, 30);stroke-width:1" />
                <rect width="110" height="50" x="200" y="200" style="fill: rgb(75, 75, 75);stroke: rgb(30, 30, 30);stroke-width:1" />
                <ellipse cx="255" cy="225" rx="55" ry="25" style="fill:rgb(255, 94, 0);stroke:rgb(30, 30, 30);stroke-width:1" />
                <rect width="110" height="50" x="200" y="500" style="fill: rgb(75, 75, 75);stroke: rgb(30, 30, 30);stroke-width:1" />
                <ellipse cx="255" cy="525" rx="55" ry="25" style="fill:rgb(255, 94, 0);stroke:rgb(30, 30, 30);stroke-width:1" />

                <rect width="200" height="300" x="1100" y="225" style="fill: rgb(255, 0, 0);stroke: rgb(30, 30, 30)" />
                    <rect id="climbR2Button" onclick="climbSet(1);" />
                    <text id="climbR2Text" onclick="climbSet(1);"></text>
                    <text id="climbR2Text2" onclick="climbSet(1);"></text>

                    <line x1="1300" y1="250" x2="1125" y2="250" style="stroke: rgb(30, 30, 30);stroke-width:1" />
                    <line x1="1125" y1="250" x2="1100" y2="225" style="stroke: rgb(30, 30, 30);stroke-width:1" />
                    <line x1="1300" y1="500" x2="1125" y2="500" style="stroke: rgb(30, 30, 30);stroke-width:1" />
                    <line x1="1125" y1="500" x2="1100" y2="525" style="stroke: rgb(30, 30, 30);stroke-width:1" />
                    <line x1="1300" y1="330" x2="1190" y2="330" style="stroke: rgb(30, 30, 30);stroke-width:1" />
                    <line x1="1300" y1="420" x2="1190" y2="420" style="stroke: rgb(30, 30, 30);stroke-width:1" />
                    <line x1="1190" y1="250" x2="1190" y2="500" style="stroke: rgb(30, 30, 30);stroke-width:1" />
                    <line x1="1190" y1="375" x2="1125" y2="375" style="stroke: rgb(30, 30, 30);stroke-width:1" />
                    <line x1="1125" y1="250" x2="1125" y2="500" style="stroke: rgb(30, 30, 30);stroke-width:1" />
                <rect width="110" height="50" x="1190" y="200" style="fill: rgb(75, 75, 75);stroke: rgb(30, 30, 30);stroke-width:1" />
                <ellipse cx="1245" cy="225" rx="55" ry="25" style="fill:rgb(255, 94, 0);stroke:rgb(30, 30, 30);stroke-width:1" />
                <rect width="110" height="50" x="1190" y="500" style="fill: rgb(75, 75, 75);stroke: rgb(30, 30, 30);stroke-width:1" />
                <ellipse cx="1245" cy="525" rx="55" ry="25" style="fill:rgb(255, 94, 0);stroke:rgb(30, 30, 30);stroke-width:1" />

                <rect width="50" height="50" x="575" y="325" style="fill:rgb(90, 90, 90);stroke:rgb(30, 30, 30);stroke-width:1" />
                <rect width="50" height="50" x="575" y="375" style="fill:rgb(90, 90, 90);stroke:rgb(30, 30, 30);stroke-width:1" />
                <rect width="50" height="50" x="875" y="325" style="fill:rgb(90, 90, 90);stroke:rgb(30, 30, 30);stroke-width:1" />
                <rect width="50" height="50" x="875" y="375" style="fill:rgb(90, 90, 90);stroke:rgb(30, 30, 30);stroke-width:1" />
                <rect width="250" height="80" x="625" y="335" style="fill:rgb(150, 150, 150);stroke:rgb(30, 30, 30);stroke-width:1" />
                <rect width="140" height="50" x="755" y="350" rx="15" ry="15" style="fill:rgb(255, 0, 0);stroke:rgb(30, 30, 30);stroke-width:1" />
                <rect width="150" height="50" x="605" y="350" rx="15" ry="15" style="fill:rgb(0, 0, 255);stroke:rgb(30, 30, 30);stroke-width:1" />
                <rect width="50" height="50" x="725" y="350" style="fill:rgb(255, 255, 255);stroke:rgb(30, 30, 30);stroke-width:1" />
                    <line x1="640" y1="415" x2="640" y2="465" style="stroke: rgb(255, 255, 255);stroke-width:1" />
                    <line x1="675" y1="415" x2="675" y2="465" style="stroke: rgb(255, 255, 255);stroke-width:1" />
                    <line x1="710" y1="415" x2="710" y2="465" style="stroke: rgb(255, 255, 255);stroke-width:1" />
                    <line x1="657" y1="400" x2="657" y2="450" style="stroke: rgb(60, 60, 60);stroke-width:2" />
                    <line x1="692" y1="400" x2="692" y2="450" style="stroke: rgb(60, 60, 60);stroke-width:2" />

                    <line x1="640" y1="335" x2="640" y2="285" style="stroke: rgb(255, 255, 255);stroke-width:1" />
                    <line x1="675" y1="335" x2="675" y2="285" style="stroke: rgb(255, 255, 255);stroke-width:1" />
                    <line x1="710" y1="335" x2="710" y2="285" style="stroke: rgb(255, 255, 255);stroke-width:1" />
                    <line x1="657" y1="350" x2="657" y2="300" style="stroke: rgb(60, 60, 60);stroke-width:2" />
                    <line x1="692" y1="350" x2="692" y2="300" style="stroke: rgb(60, 60, 60);stroke-width:2" />

                    <line x1="860" y1="415" x2="860" y2="465" style="stroke: rgb(255, 255, 255);stroke-width:1" />
                    <line x1="825" y1="415" x2="825" y2="465" style="stroke: rgb(255, 255, 255);stroke-width:1" />
                    <line x1="790" y1="415" x2="790" y2="465" style="stroke: rgb(255, 255, 255);stroke-width:1" />
                    <line x1="843" y1="400" x2="843" y2="450" style="stroke: rgb(60, 60, 60);stroke-width:2" />
                    <line x1="808" y1="400" x2="808" y2="450" style="stroke: rgb(60, 60, 60);stroke-width:2" />

                    <line x1="860" y1="335" x2="860" y2="285" style="stroke: rgb(255, 255, 255);stroke-width:1" />
                    <line x1="825" y1="335" x2="825" y2="285" style="stroke: rgb(255, 255, 255);stroke-width:1" />
                    <line x1="790" y1="335" x2="790" y2="285" style="stroke: rgb(255, 255, 255);stroke-width:1" />
                    <line x1="843" y1="350" x2="843" y2="300" style="stroke: rgb(60, 60, 60);stroke-width:2" />
                    <line x1="808" y1="350" x2="808" y2="300" style="stroke: rgb(60, 60, 60);stroke-width:2" />
                    <circle cx="590" cy="400" r="15" style="fill:rgb(255, 94, 0);" />
                    <circle cx="590" cy="350" r="15" style="fill:rgb(255, 94, 0);" />
                    <circle cx="910" cy="400" r="15" style="fill:rgb(255, 94, 0);" />
                    <circle cx="910" cy="350" r="15" style="fill:rgb(255, 94, 0);" />
                        <line x1="575" y1="400" x2="545" y2="400" style="stroke: rgb(255, 255, 255);stroke-width:1" />
                        <line x1="575" y1="350" x2="545" y2="350" style="stroke: rgb(255, 255, 255);stroke-width:1" />
                        <line x1="925" y1="400" x2="955" y2="400" style="stroke: rgb(255, 255, 255);stroke-width:1" />
                        <line x1="925" y1="350" x2="955" y2="350" style="stroke: rgb(255, 255, 255);stroke-width:1" />
                
                <polygon points="595 76, 685 76, 685 90, 665 135, 615 135, 595 90" style="fill:rgb(30, 30, 30);" />
                <polygon points="610 90, 670 90, 655 125, 625 125" style="fill:rgb(255, 255, 255);stroke:rgb(30, 30, 30);stroke-width:1;" />
                    <line x1="640" y1="125" x2="640" y2="165" style="stroke: rgb(255, 255, 255);stroke-width:1;" />
                    <line x1="617" y1="108" x2="585" y2="120" style="stroke: rgb(255, 255, 255);stroke-width:1;" />
                    <line x1="663" y1="108" x2="695" y2="120" style="stroke: rgb(255, 255, 255);stroke-width:1;" />
                <polygon points="905 76, 815 76, 815 90, 835 135, 885 135, 905 90" style="fill:rgb(30, 30, 30);" />
                <polygon points="890 90, 830 90, 845 125, 875 125" style="fill:rgb(255, 255, 255);stroke:rgb(30, 30, 30);stroke-width:1;" />
                    <line x1="860" y1="125" x2="860" y2="165" style="stroke: rgb(255, 255, 255);stroke-width:1;" />
                    <line x1="883" y1="108" x2="915" y2="120" style="stroke: rgb(255, 255, 255);stroke-width:1;" />
                    <line x1="837" y1="108" x2="800" y2="120" style="stroke: rgb(255, 255, 255);stroke-width:1;" />
                <polygon points="595 674, 685 674, 685 660, 665 615, 615 615, 595 660" style="fill:rgb(30, 30, 30);" />
                <polygon points="610 660, 670 660, 655 625, 625 625" style="fill:rgb(255, 255, 255);stroke:rgb(30, 30, 30);stroke-width:1;" />
                    <line x1="640" y1="625" x2="640" y2="585" style="stroke: rgb(255, 255, 255);stroke-width:1;" />
                    <line x1="617" y1="642" x2="585" y2="630" style="stroke: rgb(255, 255, 255);stroke-width:1;" />
                    <line x1="663" y1="642" x2="695" y2="630" style="stroke: rgb(255, 255, 255);stroke-width:1;" />
                <polygon points="905 674, 815 674, 815 660, 835 615, 885 615, 905 660" style="fill:rgb(30, 30, 30);" />
                <polygon points="890 660, 830 660, 845 625, 875 625" style="fill:rgb(255, 255, 255);stroke:rgb(30, 30, 30);stroke-width:1;" />
                    <line x1="860" y1="625" x2="860" y2="585" style="stroke: rgb(255, 255, 255);stroke-width:1;" />
                    <line x1="883" y1="642" x2="915" y2="630" style="stroke: rgb(255, 255, 255);stroke-width:1;" />
                    <line x1="837" y1="642" x2="800" y2="630" style="stroke: rgb(255, 255, 255);stroke-width:1;" />
                
                <!-- Make Buttons -->
                <rect id="startButton" onclick="startMatch();" />
                <text id="startText" onclick="startMatch();"></text>

                <rect id="lRCButton" onclick="setTempButtons(cValues, autoCargoRocketsSuccess, autoCargoRocketsFail, teleopCargoRocketsSuccess, teleopCargoRocketsFail);" />
                <text id="lRCText" onclick="setTempButtons(cValues, autoCargoRocketsSuccess, autoCargoRocketsFail, teleopCargoRocketsSuccess, teleopCargoRocketsFail);"></text>

                <rect id="lRHButton" onclick="setTempButtons(hValues, autoHatchRocketsSuccess, autoHatchRocketsFail, teleopHatchRocketsSuccess, teleopHatchRocketsFail);" />
                <text id="lRHText" onclick="setTempButtons(hValues, autoHatchRocketsSuccess, autoHatchRocketsFail, teleopHatchRocketsSuccess, teleopHatchRocketsFail);"></text>

                <rect id="rRCButton" onclick="setTempButtons(cValues, autoCargoRocketsSuccess, autoCargoRocketsFail, teleopCargoRocketsSuccess, teleopCargoRocketsFail);" />
                <text id="rRCText" onclick="setTempButtons(cValues, autoCargoRocketsSuccess, autoCargoRocketsFail, teleopCargoRocketsSuccess, teleopCargoRocketsFail);"></text>

                <rect id="rRHButton" onclick="setTempButtons(hValues, autoHatchRocketsSuccess, autoHatchRocketsFail, teleopHatchRocketsSuccess, teleopHatchRocketsFail);" />
                <text id="rRHText" onclick="setTempButtons(hValues, autoHatchRocketsSuccess, autoHatchRocketsFail, teleopHatchRocketsSuccess, teleopHatchRocketsFail);"></text>
                
                <rect id="sCButton" onclick="setTempButtons(cValues, autoCargoShipSuccess, autoCargoShipFail, teleopCargoShipSuccess, teleopCargoShipFail);" />
                <text id="sCText" onclick="setTempButtons(cValues, autoCargoShipSuccess, autoCargoShipFail, teleopCargoShipSuccess, teleopCargoShipFail);"></text>

                <rect id="sHButton" onclick="setTempButtons(hValues, autoHatchShipSuccess, autoHatchShipFail, teleopHatchShipSuccess, teleopHatchShipFail);" />
                <text id="sHText" onclick="setTempButtons(hValues, autoHatchShipSuccess, autoHatchShipFail, teleopHatchShipSuccess, teleopHatchShipFail);"></text>

                <rect id="lRC2Button" onclick="setTempButtons(cValues, autoCargoRocketsSuccess, autoCargoRocketsFail, teleopCargoRocketsSuccess, teleopCargoRocketsFail);" />
                <text id="lRC2Text" onclick="setTempButtons(cValues, autoCargoRocketsSuccess, autoCargoRocketsFail, teleopCargoRocketsSuccess, teleopCargoRocketsFail);"></text>

                <rect id="lRH2Button" onclick="setTempButtons(hValues, autoHatchRocketsSuccess, autoHatchRocketsFail, teleopHatchRocketsSuccess, teleopHatchRocketsFail);" />
                <text id="lRH2Text" onclick="setTempButtons(hValues, autoHatchRocketsSuccess, autoHatchRocketsFail, teleopHatchRocketsSuccess, teleopHatchRocketsFail);"></text>

                <rect id="rRC2Button" onclick="setTempButtons(cValues, autoCargoRocketsSuccess, autoCargoRocketsFail, teleopCargoRocketsSuccess, teleopCargoRocketsFail);" />
                <text id="rRC2Text" onclick="setTempButtons(cValues, autoCargoRocketsSuccess, autoCargoRocketsFail, teleopCargoRocketsSuccess, teleopCargoRocketsFail);"></text>

                <rect id="rRH2Button" onclick="setTempButtons(hValues, autoHatchRocketsSuccess, autoHatchRocketsFail, teleopHatchRocketsSuccess, teleopHatchRocketsFail);" />
                <text id="rRH2Text" onclick="setTempButtons(hValues, autoHatchRocketsSuccess, autoHatchRocketsFail, teleopHatchRocketsSuccess, teleopHatchRocketsFail);"></text>
                
                <rect id="sC2Button" onclick="setTempButtons(cValues, autoCargoShipSuccess, autoCargoShipFail, teleopCargoShipSuccess, teleopCargoShipFail);" />
                <text id="sC2Text" onclick="setTempButtons(cValues, autoCargoShipSuccess, autoCargoShipFail, teleopCargoShipSuccess, teleopCargoShipFail);"></text>

                <rect id="sH2Button" onclick="setTempButtons(hValues, autoHatchShipSuccess, autoHatchShipFail, teleopHatchShipSuccess, teleopHatchShipFail);" />
                <text id="sH2Text" onclick="setTempButtons(hValues, autoHatchShipSuccess, autoHatchShipFail, teleopHatchShipSuccess, teleopHatchShipFail);"></text>

                <rect id="temp1Button" /> <!--BIND-->
                <text id="temp1Text"></text>

                <rect id="temp2Button" />
                <text id="temp2Text"></text>

                <rect id="temp3Button" />
                <text id="temp3Text"></text>

                <rect id="temp4Button" />
                <text id="temp4Text"></text>

                <rect id="temp5Button" />
                <text id="temp5Text"></text>

                <rect id="temp6Button" />
                <text id="temp6Text"></text>

                <rect id="climbB1Button" onclick="climbSet(0);" />
                <text id="climbB1Text" onclick="climbSet(0);"></text>

                <rect id="climbB3Button" onclick="climbSet(2);" />
                <text id="climbB3Text" onclick="climbSet(2);"></text>

                <rect id="climbR1Button" onclick="climbSet(0);" />
                <text id="climbR1Text" onclick="climbSet(0);"></text>

                <rect id="climbR3Button" onclick="climbSet(2);" />
                <text id="climbR3Text" onclick="climbSet(2);"></text>

                <rect id="climbYesButton" style="display: none;" />
                <text id="climbYesText" style="display: none;"></text>

                <rect id="climbNoButton" style="display: none;" />
                <text id="climbNoText" style="display: none;"></text>

                <rect id="climbYes2Button" style="display: none;" />
                <text id="climbYes2Text" style="display: none;"></text>

                <rect id="climbNo2Button" style="display: none;" />
                <text id="climbNo2Text" style="display: none;"></text>

                <!-- Set Number Indicators for Ship -->

                <text width="30" height="30" x="660" y="280" value="1" style="font-family:'Times New Roman';fill:rgb(0, 255, 203);font-size:50px;">1</text>
                <text width="30" height="30" x="500" y="390" value="2" style="font-family:'Times New Roman';fill:rgb(0, 255, 203);font-size:50px;">2</text>
                <text width="30" height="30" x="660" y="495" value="3" style="font-family:'Times New Roman';fill:rgb(0, 255, 203);font-size:50px;">3</text>
                <text width="30" height="30" x="815" y="280" value="3" style="font-family:'Times New Roman';fill:rgb(0, 255, 203);font-size:50px;">3</text>
                <text width="30" height="30" x="975" y="390" value="2" style="font-family:'Times New Roman';fill:rgb(0, 255, 203);font-size:50px;">2</text>
                <text width="30" height="30" x="815" y="495" value="1" style="font-family:'Times New Roman';fill:rgb(0, 255, 203);font-size:50px;">1</text>
                
                <text id="warning" width="200" height="50" x="10" y="42" style="font-family:'Times New Roman';fill:rgb(255, 69, 0);font-size:50px;font-weight:bold;">SET STARTING LOCATION BY CLICKING ON L1, L2, OR L3.</text>
            </svg>
            <script type="text/javascript">
                setButtons();
                document.getElementById('matchNum').options[<?php echo $largestUID; ?>].selected = true;
                refreshSelections();
                document.getElementById('teamNum').options[1].selected = true;
                document.getElementById('teamNum').options[0].selected = true;
                document.getElementById('teamNum').options[<?php
                                                                switch($scouter) {
                                                                    case "Scouter_1":
                                                                        echo 0;
                                                                        break;
                                                                    case "Scouter_2":
                                                                        echo 1;
                                                                        break;
                                                                    case "Scouter_3":
                                                                        echo 2;
                                                                        break;
                                                                    case "Scouter_4":
                                                                        echo 3;
                                                                        break;
                                                                    case "Scouter_5":
                                                                        echo 4;
                                                                        break;
                                                                    case "Scouter_6":
                                                                        echo 5;
                                                                        break;
                                                                    default:
                                                                        echo 0;
                                                                        break;
                                                                }
                                                            ?>].selected = true;
            </script>
        </div>
        <div class="footer">
			<p style="color:purple;">&copy; A-Team Robotics 2018</p>
        </div>
	</body>
</html>