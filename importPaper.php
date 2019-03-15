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
    $rowSQL2 = mysqli_query($mysqli, "SELECT COUNT(matchNumber) AS num FROM match_scout");
    $largestUID = 0;
    $row2 = mysqli_fetch_array($rowSQL2);
    $num = $row2['num'];
    if(mysqli_num_rows($rowSQL) == 0) {
        $largestUID = 0;
    }
    else {
        $row = mysqli_fetch_assoc($rowSQL);
        $largestUID = $row['matchNum'];
    }
?>
<?php
    if($_POST) {
        //$user = $_POST['user'];
        //$scouter = $_POST['scouter'];
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

        str_replace('_', ' ', $user);
        str_replace('_', ' ', $scouter);

        $query = "INSERT INTO match_scout (teamNumber, matchNumber, startLocation, climb, climbLevel, climbFail, climbFailLevel, yellowCard, redCard, foul, defense, fallover, falloverSave, win, extraInformation, score, user, scouter)
                            VALUES ('$teamNumber','$matchNumber','$startLocation','$climb','$climbLevel','$climbFail','$climbFailLevel','$yellowCard','$redCard','$foul','$defense','$fallover','$falloverSave','$win','$extraInformation','$score','$user','$scouter')
                            ";
        $mysqli->query($query) or die($mysqli->error.__LINE__);
        $query2 = "INSERT INTO match_scout_1 (teamNumber, matchNumber, autoHatchRocketsSuccess1, autoHatchRocketsSuccess2, autoHatchRocketsSuccess3, autoCargoRocketsSuccess1, autoCargoRocketsSuccess2,
                                            autoCargoRocketsSuccess3, autoHatchRocketsFail1, autoHatchRocketsFail2, autoHatchRocketsFail3, autoCargoRocketsFail1, autoCargoRocketsFail2,
                                            autoCargoRocketsFail3, score, user, scouter)
                            VALUES ('$teamNumber','$matchNumber','$autoHatchRocketsSuccess[0]','$autoHatchRocketsSuccess[1]','$autoHatchRocketsSuccess[2]','$autoCargoRocketsSuccess[0]','$autoCargoRocketsSuccess[1]',
                                    '$autoCargoRocketsSuccess[2]','$autoHatchRocketsFail[0]','$autoHatchRocketsFail[1]','$autoHatchRocketsFail[2]','$autoCargoRocketsFail[0]','$autoCargoRocketsFail[1]',
                                    '$autoCargoRocketsFail[2]','$score','$user','$scouter')
                                    ";
        $mysqli->query($query2) or die($mysqli->error.__LINE__);
        $query3 = "INSERT INTO match_scout_2 (teamNumber, matchNumber, autoHatchShipSuccess1, autoHatchShipSuccess2, autoHatchShipSuccess3, autoCargoShipSuccess1, autoCargoShipSuccess2,
                                            autoCargoShipSuccess3, autoHatchShipFail1, autoHatchShipFail2, autoHatchShipFail3, autoCargoShipFail1, autoCargoShipFail2,
                                            autoCargoShipFail3, score, user, scouter)
                            VALUES ('$teamNumber','$matchNumber','$autoHatchShipSuccess[0]','$autoHatchShipSuccess[1]','$autoHatchShipSuccess[2]','$autoCargoShipSuccess[0]','$autoCargoShipSuccess[1]',
                                    '$autoCargoShipSuccess[2]','$autoHatchShipFail[0]','$autoHatchShipFail[1]','$autoHatchShipFail[2]','$autoCargoShipFail[0]','$autoCargoShipFail[1]',
                                    '$autoCargoShipFail[2]','$score','$user','$scouter')
                                    ";
        $mysqli->query($query3) or die($mysqli->error.__LINE__);
        $query4 = "INSERT INTO match_scout_3 (teamNumber, matchNumber, teleopHatchRocketsSuccess1, teleopHatchRocketsSuccess2, teleopHatchRocketsSuccess3, teleopCargoRocketsSuccess1, teleopCargoRocketsSuccess2,
                                            teleopCargoRocketsSuccess3, teleopHatchRocketsFail1, teleopHatchRocketsFail2, teleopHatchRocketsFail3, teleopCargoRocketsFail1, teleopCargoRocketsFail2,
                                            teleopCargoRocketsFail3, score, user, scouter)
                            VALUES ('$teamNumber','$matchNumber','$teleopHatchRocketsSuccess[0]','$teleopHatchRocketsSuccess[1]','$teleopHatchRocketsSuccess[2]','$teleopCargoRocketsSuccess[0]','$teleopCargoRocketsSuccess[1]',
                                    '$teleopCargoRocketsSuccess[2]','$teleopHatchRocketsFail[0]','$teleopHatchRocketsFail[1]','$teleopHatchRocketsFail[2]','$teleopCargoRocketsFail[0]','$teleopCargoRocketsFail[1]',
                                    '$teleopCargoRocketsFail[2]','$score','$user','$scouter')
                                    ";
        $mysqli->query($query4) or die($mysqli->error.__LINE__);
        $query5 = "INSERT INTO match_scout_4 (teamNumber, matchNumber, teleopHatchShipSuccess1, teleopHatchShipSuccess2, teleopHatchShipSuccess3, teleopCargoShipSuccess1, teleopCargoShipSuccess2,
                                            teleopCargoShipSuccess3, teleopHatchShipFail1, teleopHatchShipFail2, teleopHatchShipFail3, teleopCargoShipFail1, teleopCargoShipFail2,
                                            teleopCargoShipFail3, score, user, scouter)
                            VALUES ('$teamNumber','$matchNumber','$teleopHatchShipSuccess[0]','$teleopHatchShipSuccess[1]','$teleopHatchShipSuccess[2]','$teleopCargoShipSuccess[0]','$teleopCargoShipSuccess[1]',
                                    '$teleopCargoShipSuccess[2]','$teleopHatchShipFail[0]','$teleopHatchShipFail[1]','$teleopHatchShipFail[2]','$teleopCargoShipFail[0]','$teleopCargoShipFail[1]',
                                    '$teleopCargoShipFail[2]','$score','$user','$scouter')
                                    ";
        $mysqli->query($query5) or die($mysqli->error.__LINE__);

        str_replace(' ', '_', $user);
        str_replace(' ', '_', $scouter);

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
        <!--<script src="scoutTeam.js" type="text/javascript"></script>-->
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
            textarea {
                resize: none;
                font-size: 6px;
                width: 100%;
            }
            label.success {
                color: rgb(0, 175, 0);
                font-weight: 700;
                letter-spacing: 1px;
                position: relative;
                bottom: 12px;
            }
            label.failure {
                color: rgb(175, 0, 0);
                font-weight: 700;
                letter-spacing: 1px;
                position: relative;
                bottom: 14px;
            }
            textarea.success {
                background-color: rgb(188, 255, 188);
                color: rgb(0, 150, 0);
                font-weight: 600;
                margin: 10px 0px 0px 0px;
            }
            textarea.failure {
                background-color: rgb(255, 198, 198);
                color: rgb(150, 0, 0);
                font-weight: 600;
                margin: 10px 0px 0px 0px;
            }
            button {
                width: 100%;
                /*
                position: relative;
                bottom: 14px;
                */
            }
            button.success {
                background-image: radial-gradient(circle, #e8ffe8, #c9ffc9, #7fff7f);
                color: rgb(150, 0, 0);
            }
            button.failure {
                background-color: rgb(255, 198, 198);
                background-image: radial-gradient(circle, #ffdbdb, #ffb7b7, #ff7f7f);
                color: rgb(150, 0, 0);
            }
            button.default {
                background-color: rgb(255, 198, 198);
                background-image: radial-gradient(circle, #fff9c4, #fff6a0, #fff377);
                color: rgb(109, 98, 0);
            }
            table {
                border: 2px solid black;
                border-collapse: collapse;
            }
            th {
                border: 2px solid black;
                text-align: center;
                padding: 10px;
            }
            td {
                border: 1px solid black;
                text-align: center;
                padding: 10px;
            }
            td.success {
                background-color: rgb(188, 255, 188);
                background-image: radial-gradient(circle, #e8ffe8, #c9ffc9, #7fff7f);
                color: rgb(0, 150, 0);
            }
            td.failure {
                background-color: rgb(255, 198, 198);
                background-image: radial-gradient(circle, #ffd3d3, #ffa0a0, #ff7777);
                color: rgb(150, 0, 0);
            }
            td.default {
                background-color: rgb(255, 198, 198);
                background-image: radial-gradient(circle, #fff9c4, #fff6a0, #fff377);
                color: rgb(109, 98, 0);
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
                    <li><a href="scoutTeam.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Scout Team</a></li>
                    <li class="active"><a href="importPaper.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Paper Scout</a></li>
                    <li><a href="addMatchCount.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">Add Match</a></li>
                    <li><a href="viewMatchSetNumber.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">View Match</a></li>
                    <li><a href="viewTeamSetNumber.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>">View Team</a></li>
                </ul>
            </div>
        </div>
        <br />
        <div class="row marketing">
            <div class="col-lg-12">
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
                        //POST DATA TO FORM

                        var user = '<?php echo $user; ?>';
                        var scouter = '<?php echo $scouter; ?>';

                        var startLocation = 'Unknown';
                        var autoHatchRocketsSuccess = [0, 0, 0];
                        var autoCargoRocketsSuccess = [0, 0, 0];
                        var autoHatchRocketsFail = [0, 0, 0];
                        var autoCargoRocketsFail = [0, 0, 0];
                        var autoHatchShipSuccess = [0, 0, 0];
                        var autoCargoShipSuccess = [0, 0, 0];
                        var autoHatchShipFail = [0, 0, 0];
                        var autoCargoShipFail = [0, 0, 0];

                        var teleopHatchRocketsSuccess = [0, 0, 0];
                        var teleopCargoRocketsSuccess = [0, 0, 0];
                        var teleopHatchRocketsFail = [0, 0, 0];
                        var teleopCargoRocketsFail = [0, 0, 0];
                        var teleopHatchShipSuccess = [0, 0, 0];
                        var teleopCargoShipSuccess = [0, 0, 0];
                        var teleopHatchShipFail = [0, 0, 0];
                        var teleopCargoShipFail = [0, 0, 0];

                        var climb = 'No';
                        var climbLevel = 'No';
                        var climbFail = 'No';
                        var climbFailLevel = 'No';

                        var yellowCard = "No Yellow Card.";
                        var redCard = "No Red Card.";
                        var foul = "No other fouls.";
                        var defense = "Not Defensive";
                        var fallover = "No";
                        var falloverSave = "No";
                        var win = "No";
                        var extraInformation = "No extra information.";
                        var score = 0;

                        function setScore() {
                            score += autoCargoRocketsSuccess[0] * 3;
                            score += autoCargoRocketsSuccess[1] * 6;
                            score += autoCargoRocketsSuccess[2] * 10;
                            score += autoCargoShipSuccess[0] * 3;
                            score += autoCargoShipSuccess[1] * 3;
                            score += autoCargoShipSuccess[2] * 3;
                            score += autoHatchRocketsSuccess[0] * 2;
                            score += autoHatchRocketsSuccess[1] * 6;
                            score += autoHatchRocketsSuccess[2] * 10;
                            score += autoHatchShipSuccess[0] * 2;
                            score += autoHatchShipSuccess[1] * 2;
                            score += autoHatchShipSuccess[2] * 2;

                            score += teleopCargoRocketsSuccess[0] * 2;
                            score += teleopCargoRocketsSuccess[1] * 4;
                            score += teleopCargoRocketsSuccess[2] * 6;
                            score += teleopCargoShipSuccess[0] * 2;
                            score += teleopCargoShipSuccess[1] * 2;
                            score += teleopCargoShipSuccess[2] * 2;
                            score += teleopHatchRocketsSuccess[0] * 2;
                            score += teleopHatchRocketsSuccess[1] * 3;
                            score += teleopHatchRocketsSuccess[2] * 5;
                            score += teleopHatchShipSuccess[0] * 2;
                            score += teleopHatchShipSuccess[1] * 2;
                            score += teleopHatchShipSuccess[2] * 2;

                            if(startLocation === "L2") {
                                score += 1;
                            }
                            else if(startLocation === "L3") {
                                score += 4;
                            }
                            switch(climbLevel) {
                                case "L1":
                                    score += 1;
                                    break;
                                case "L2":
                                    score += 5;
                                    break;
                                case "L3":
                                    score += 10;
                                    break;
                            }
                            if(yellowCard !== "No Yellow Card.") {
                                score -= 5;
                            }
                            if(redCard !== "No Red Card.") {
                                score -= 20;
                            }
                            if(foul !== "No other fouls.") {
                                score -= 5;
                            }
                            switch(defense) {
                                case "Somewhat Defensive":
                                    score += 1;
                                    break;
                                case "Very Defensive":
                                    score += 2;
                                    break;
                            }
                            if(fallover === "Yes") {
                                if(falloverSave === "Yes") {
                                    score += 1;
                                }
                                else {
                                    score += -5;
                                }
                            }
                            if(win === "Yes") {
                                score += 5;
                            }

                            if(score < 0) {
                                score = 0;
                            }
                        }

                        function setVars() {
                            for(var i = 0;i < 3;i++) {
                                if(autoHatchRocketsSuccess[i] < 0) {
                                    autoHatchRocketsSuccess[i] = 0;
                                }

                                if(autoCargoRocketsSuccess[i] < 0) {
                                    autoCargoRocketsSuccess[i] = 0;
                                }

                                if(autoHatchRocketsFail[i] < 0) {
                                    autoHatchRocketsFail[i] = 0;
                                }

                                if(autoCargoRocketsFail[i] < 0) {
                                    autoCargoRocketsFail[i] = 0;
                                }

                                if(autoHatchShipSuccess[i] < 0) {
                                    autoHatchShipSuccess[i] = 0;
                                }

                                if(autoCargoShipSuccess[i] < 0) {
                                    autoCargoShipSuccess[i] = 0;
                                }
                                
                                if(autoHatchShipFail[i] < 0) {
                                    autoHatchShipFail[i] = 0;
                                }

                                if(autoCargoShipFail[i] < 0) {
                                    autoCargoShipFail[i] = 0;
                                }

                                if(teleopHatchRocketsSuccess[i] < 0) {
                                    teleopHatchRocketsSuccess[i] = 0;
                                }

                                if(teleopCargoRocketsSuccess[i] < 0) {
                                    teleopCargoRocketsSuccess[i] = 0;
                                }

                                if(teleopHatchRocketsFail[i] < 0) {
                                    teleopHatchRocketsFail[i] = 0;
                                }

                                if(teleopCargoRocketsFail[i] < 0) {
                                    teleopCargoRocketsFail[i] = 0;
                                }

                                if(teleopHatchShipSuccess[i] < 0) {
                                    teleopHatchShipSuccess[i] = 0;
                                }

                                if(teleopCargoShipSuccess[i] < 0) {
                                    teleopCargoShipSuccess[i] = 0;
                                }

                                if(teleopHatchShipFail[i] < 0) {
                                    teleopHatchShipFail[i] = 0;
                                }

                                if(teleopCargoShipFail[i] < 0) {
                                    teleopCargoShipFail[i] = 0;
                                }
                            }
                            
                            if(climbLevel != 'No') {
                                climb = 'Yes';
                            }
                            else {
                                climb = 'No';
                            }

                            if(climbFailLevel != 'No') {
                                climbFail = 'Yes';
                            }
                            else {
                                climbFail = 'No';
                            }



                            yellowCard = document.getElementById("yellowCard").value;
                            redCard = document.getElementById("redCard").value;
                            foul = document.getElementById("foul").value;
                            defense = document.getElementById('defense').elements["defense"].value;
                            fallover = document.getElementById('fallover').elements["fallover"].value;
                            falloverSave = document.getElementById('falloverSave').elements["falloverSave"].value;
                            win = document.getElementById('win').elements["win"].value;
                            extraInformation = document.getElementById("extraInformation").value;
                        }

                        function postData() {
                            if(startLocation === 'Unknown') {
                                alert("Set a starting location before posting.");
                                return;
                            }
                            setScore();
                            setVars();
                            var form, fteamNumber, fmatchNumber, fstartLocation, fautoHatchRocketsSuccess, fautoCargoRocketsSuccess, fautoHatchRocketsFail, fautoCargoRocketsFail, fautoHatchShipSuccess,
                                fautoCargoShipSuccess, fautoHatchShipFail, fautoCargoShipFail, fteleopHatchRocketsSuccess, fteleopCargoRocketsSuccess, fteleopHatchRocketsFail, fteleopCargoRocketsFail,
                                fteleopHatchShipSuccess, fteleopCargoShipSuccess, fteleopHatchShipFail, fteleopCargoShipFail, fclimb, fclimbLevel, fclimbFail, fclimbFailLevel,
                                ffoul, fdefense, fyellowCard, fredCard, ffallover, ffalloverSave, fwin, fextraInformation, fscore;
                            form = document.createElement('form');
                            form.action = 'scoutTeam.php?u=<?php echo $user; ?>&s=<?php echo $scouter; ?>';
                            form.method = 'post';

                            {
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

                                var fuser = document.createElement('input');
                                fuser.type = 'hidden';
                                fuser.name = 'user';
                                fuser.id = 'user';
                                fuser.value = user;

                                var fscouter = document.createElement('input');
                                fscouter.type = 'hidden';
                                fscouter.name = 'scouter';
                                fscouter.id = 'scouter';
                                fscouter.value = scouter;
                            }

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
                            form.appendChild(fuser);
                            form.appendChild(fscouter);

                            document.getElementById('theForm').appendChild(form);
                            form.submit();
                        }

                        function isNumber(evt) {
                            evt = (evt) ? evt : window.event;
                            var charCode = (evt.which) ? evt.which : evt.keyCode;
                            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                                return false;
                            }
                            return true;
                        }

                        function increment(taId) {
                            //document.getElementById(taId).value++;
                            document.getElementById(taId).innerHTML++;
                        }

                        function decrement(taId) {
                            //document.getElementById(taId).value--;
                            document.getElementById(taId).innerHTML--;
                        }
                    </script>
                    <div id="theForm">
                    </div>
                    <h2 style="color: rgb(0, 175, 0)"><b>Green Text Refers to Success.</b><br /><a style="color: rgb(175, 0, 0)"><b>Red Text Refers to Failure.</b></a>
                        <br /><a style="color: rgb(109, 98, 0);">Yellow Text Refers to General Information.</a></h2>
                    <p style="font-size: 6px;">Don't mean to be racist.</p>
                    <h1>Starting Information</h1>
                    <table>
                        <tr>
                            <th>Field</th>
                            <th>Value</th>
                            <th>Level 1</th>
                            <th>Level 2</th>
                            <th>Level 3</th>
                        </tr>
                        <tr>
                            <td class="default">Hatch Rocket Level 1</td>
                            <td class="default" id="startLocation">L1</td>
                            <!-- onkeypress="return isNumber(event)" -->
                            <td class="default"><button id="startLocationL1" class="default" onclick="startLocation = 'L1'; document.getElementById('startLocation').innerHTML = startLocation;">Level 1</button></td>
                            <td class="default"><button id="startLocationL2" class="default" onclick="startLocation = 'L2'; document.getElementById('startLocation').innerHTML = startLocation;">Level 2</button></td>
                            <td class="default"><button id="startLocationL3" class="default" onclick="startLocation = 'L3'; document.getElementById('startLocation').innerHTML = startLocation;">Level 3</button></td>
                        </tr>
                    </table><br />
                    <h1>Autonomous</h1>
                    <table>
                        <tr>
                            <th>Field</th>
                            <th>Value</th>
                            <th>Decrement</th>
                            <th>Increment</th>
                        </tr>
                        <tr>
                            <td class="success">Hatch Rocket Level 1</td>
                            <td class="success" id="autoHatchRocketsSuccess1">0</td>
                            <!-- onkeypress="return isNumber(event)" -->
                            <td class="success"><button id="autoHatchRocketsSuccess1Decrease" class="success" onclick="autoHatchRocketsSuccess[0] -= 1; decrement('autoHatchRocketsSuccess1');">-</button></td>
                            <td class="success"><button id="autoHatchRocketsSuccess1Increase" class="success" onclick="autoHatchRocketsSuccess[0] += 1; increment('autoHatchRocketsSuccess1');">+</button></td>
                        </tr>
                        <tr>
                            <td class="success">Hatch Rocket Level 2</td>
                            <td class="success" id="autoHatchRocketsSuccess2">0</td>
                            <td class="success"><button id="autoHatchRocketsSuccess2Decrease" class="success" onclick="autoHatchRocketsSuccess[1] -= 1; decrement('autoHatchRocketsSuccess2');">-</button></td>
                            <td class="success"><button id="autoHatchRocketsSuccess2Increase" class="success" onclick="autoHatchRocketsSuccess[1] += 1; increment('autoHatchRocketsSuccess2');">+</button></td>
                        </tr>
                        <tr>
                            <td class="success">Hatch Rocket Level 3</td>
                            <td class="success" id="autoHatchRocketsSuccess3">0</td>
                            <td class="success"><button id="autoHatchRocketsSuccess3Decrease" class="success" onclick="autoHatchRocketsSuccess[2] -= 1; decrement('autoHatchRocketsSuccess3');">-</button></td>
                            <td class="success"><button id="autoHatchRocketsSuccess3Increase" class="success" onclick="autoHatchRocketsSuccess[2] += 1; increment('autoHatchRocketsSuccess3');">+</button></td>
                        </tr>
                        <tr>
                            <td class="success">Cargo Rocket Level 1</td>
                            <td class="success" id="autoCargoRocketsSuccess1">0</td>
                            <td class="success"><button id="autoCargoRocketsSuccess1Decrease" class="success" onclick="autoCargoRocketsSuccess[0] -= 1; decrement('autoCargoRocketsSuccess1');">-</button></td>
                            <td class="success"><button id="autoCargoRocketsSuccess1Increase" class="success" onclick="autoCargoRocketsSuccess[0] += 1; increment('autoCargoRocketsSuccess1');">+</button></td>
                        </tr>
                        <tr>
                            <td class="success">Cargo Rocket Level 2</td>
                            <td class="success" id="autoCargoRocketsSuccess2">0</td>
                            <td class="success"><button id="autoCargoRocketsSuccess2Decrease" class="success" onclick="autoCargoRocketsSuccess[1] -= 1; decrement('autoCargoRocketsSuccess2');">-</button></td>
                            <td class="success"><button id="autoCargoRocketsSuccess2Increase" class="success" onclick="autoCargoRocketsSuccess[1] += 1; increment('autoCargoRocketsSuccess2');">+</button></td>
                        </tr>
                        <tr>
                            <td class="success">Cargo Rocket Level 3</td>
                            <td class="success" id="autoCargoRocketsSuccess3">0</td>
                            <td class="success"><button id="autoCargoRocketsSuccess3Decrease" class="success" onclick="autoCargoRocketsSuccess[2] -= 1; decrement('autoCargoRocketsSuccess3');">-</button></td>
                            <td class="success"><button id="autoCargoRocketsSuccess3Increase" class="success" onclick="autoCargoRocketsSuccess[2] += 1; increment('autoCargoRocketsSuccess3');">+</button></td>
                        </tr>

                        <tr>
                            <td class="failure">Hatch Rocket Level 1</td>
                            <td class="failure" id="autoHatchRocketsFail1">0</td>
                            <td class="failure"><button id="autoHatchRocketsFail1Decrease" class="failure" onclick="autoHatchRocketsFail[0] -= 1; decrement('autoHatchRocketsFail1');">-</button></td>
                            <td class="failure"><button id="autoHatchRocketsFail1Increase" class="failure" onclick="autoHatchRocketsFail[0] += 1; increment('autoHatchRocketsFail1');">+</button></td>
                        </tr>
                        <tr>
                            <td class="failure">Hatch Rocket Level 2</td>
                            <td class="failure" id="autoHatchRocketsFail2">0</td>
                            <td class="failure"><button id="autoHatchRocketsFail2Decrease" class="failure" onclick="autoHatchRocketsFail[1] -= 1; decrement('autoHatchRocketsFail2');">-</button></td>
                            <td class="failure"><button id="autoHatchRocketsFail2Increase" class="failure" onclick="autoHatchRocketsFail[1] += 1; increment('autoHatchRocketsFail2');">+</button></td>
                        </tr>
                        <tr>
                            <td class="failure">Hatch Rocket Level 3</td>
                            <td class="failure" id="autoHatchRocketsFail3">0</td>
                            <td class="failure"><button id="autoHatchRocketsFail3Decrease" class="failure" onclick="autoHatchRocketsFail[2] -= 1; decrement('autoHatchRocketsFail3');">-</button></td>
                            <td class="failure"><button id="autoHatchRocketsFail3Increase" class="failure" onclick="autoHatchRocketsFail[2] += 1; increment('autoHatchRocketsFail3');">+</button></td>
                        </tr>
                        <tr>
                            <td class="failure">Cargo Rocket Level 1</td>
                            <td class="failure" id="autoCargoRocketsFail1">0</td>
                            <td class="failure"><button id="autoCargoRocketsFail1Decrease" class="failure" onclick="autoCargoRocketsFail[0] -= 1; decrement('autoCargoRocketsFail1');">-</button></td>
                            <td class="failure"><button id="autoCargoRocketsFail1Increase" class="failure" onclick="autoCargoRocketsFail[0] += 1; increment('autoCargoRocketsFail1');">+</button></td>
                        </tr>
                        <tr>
                            <td class="failure">Cargo Rocket Level 2</td>
                            <td class="failure" id="autoCargoRocketsFail2">0</td>
                            <td class="failure"><button id="autoCargoRocketsFail2Decrease" class="failure" onclick="autoCargoRocketsFail[1] -= 1; decrement('autoCargoRocketsFail2');">-</button></td>
                            <td class="failure"><button id="autoCargoRocketsFail2Increase" class="failure" onclick="autoCargoRocketsFail[1] += 1; increment('autoCargoRocketsFail2');">+</button></td>
                        </tr>
                        <tr>
                            <td class="failure">Cargo Rocket Level 3</td>
                            <td class="failure" id="autoCargoRocketsFail3">0</td>
                            <td class="failure"><button id="autoCargoRocketsFail3Decrease" class="failure" onclick="autoCargoRocketsFail[2] -= 1; decrement('autoCargoRocketsFail3');">-</button></td>
                            <td class="failure"><button id="autoCargoRocketsFail3Increase" class="failure" onclick="autoCargoRocketsFail[2] += 1; increment('autoCargoRocketsFail3');">+</button></td>
                        </tr>

                        <tr>
                            <td colspan="4">For Ship, Use The Following Diagram to Find the Location:</td>
                        </tr>
                        <tr>
                            <td colspan="4"><img src="Ship Drawing.png" /></td>
                        </tr>

                        <tr>
                            <td class="success">Hatch Ship Location 1</td>
                            <td class="success" id="autoHatchShipSuccess1">0</td>
                            <!-- onkeypress="return isNumber(event)" -->
                            <td class="success"><button id="autoHatchShipSuccess1Decrease" class="success" onclick="autoHatchShipSuccess[0] -= 1; decrement('autoHatchShipSuccess1');">-</button></td>
                            <td class="success"><button id="autoHatchShipSuccess1Increase" class="success" onclick="autoHatchShipSuccess[0] += 1; increment('autoHatchShipSuccess1');">+</button></td>
                        </tr>
                        </tr>
                        <tr>
                            <td class="success">Hatch Ship Location 2</td>
                            <td class="success" id="autoHatchShipSuccess2">0</td>
                            <td class="success"><button id="autoHatchShipSuccess2Decrease" class="success" onclick="autoHatchShipSuccess[1] -= 1; decrement('autoHatchShipSuccess2');">-</button></td>
                            <td class="success"><button id="autoHatchShipSuccess2Increase" class="success" onclick="autoHatchShipSuccess[1] += 1; increment('autoHatchShipSuccess2');">+</button></td>
                        </tr>
                        <tr>
                            <td class="success">Hatch Ship Location 3</td>
                            <td class="success" id="autoHatchShipSuccess3">0</td>
                            <td class="success"><button id="autoHatchShipSuccess3Decrease" class="success" onclick="autoHatchShipSuccess[2] -= 1; decrement('autoHatchShipSuccess3');">-</button></td>
                            <td class="success"><button id="autoHatchShipSuccess3Increase" class="success" onclick="autoHatchShipSuccess[2] += 1; increment('autoHatchShipSuccess3');">+</button></td>
                        </tr>
                        <tr>
                            <td class="success">Cargo Ship Location 1</td>
                            <td class="success" id="autoCargoShipSuccess1">0</td>
                            <td class="success"><button id="autoCargoShipSuccess1Decrease" class="success" onclick="autoCargoShipSuccess[0] -= 1; decrement('autoCargoShipSuccess1');">-</button></td>
                            <td class="success"><button id="autoCargoShipSuccess1Increase" class="success" onclick="autoCargoShipSuccess[0] += 1; increment('autoCargoShipSuccess1');">+</button></td>
                        </tr>
                        <tr>
                            <td class="success">Cargo Ship Location 2</td>
                            <td class="success" id="autoCargoShipSuccess2">0</td>
                            <td class="success"><button id="autoCargoShipSuccess2Decrease" class="success" onclick="autoCargoShipSuccess[1] -= 1; decrement('autoCargoShipSuccess2');">-</button></td>
                            <td class="success"><button id="autoCargoShipSuccess2Increase" class="success" onclick="autoCargoShipSuccess[1] += 1; increment('autoCargoShipSuccess2');">+</button></td>
                        </tr>
                        <tr>
                            <td class="success">Cargo Ship Location 3</td>
                            <td class="success" id="autoCargoShipSuccess3">0</td>
                            <td class="success"><button id="autoCargoShipSuccess3Decrease" class="success" onclick="autoCargoShipSuccess[2] -= 1; decrement('autoCargoShipSuccess3');">-</button></td>
                            <td class="success"><button id="autoCargoShipSuccess3Increase" class="success" onclick="autoCargoShipSuccess[2] += 1; increment('autoCargoShipSuccess3');">+</button></td>
                        </tr>

                        <tr>
                            <td class="failure">Hatch Ship Location 1</td>
                            <td class="failure" id="autoHatchShipFail1">0</td>
                            <td class="failure"><button id="autoHatchShipFail1Decrease" class="failure" onclick="autoHatchShipFail[0] -= 1; decrement('autoHatchShipFail1');">-</button></td>
                            <td class="failure"><button id="autoHatchShipFail1Increase" class="failure" onclick="autoHatchShipFail[0] += 1; increment('autoHatchShipFail1');">+</button></td>
                        </tr>
                        <tr>
                            <td class="failure">Hatch Ship Location 2</td>
                            <td class="failure" id="autoHatchShipFail2">0</td>
                            <td class="failure"><button id="autoHatchShipFail2Decrease" class="failure" onclick="autoHatchShipFail[1] -= 1; decrement('autoHatchShipFail2');">-</button></td>
                            <td class="failure"><button id="autoHatchShipFail2Increase" class="failure" onclick="autoHatchShipFail[1] += 1; increment('autoHatchShipFail2');">+</button></td>
                        </tr>
                        <tr>
                            <td class="failure">Hatch Ship Location 3</td>
                            <td class="failure" id="autoHatchShipFail3">0</td>
                            <td class="failure"><button id="autoHatchShipFail3Decrease" class="failure" onclick="autoHatchShipFail[2] -= 1; decrement('autoHatchShipFail3');">-</button></td>
                            <td class="failure"><button id="autoHatchShipFail3Increase" class="failure" onclick="autoHatchShipFail[2] += 1; increment('autoHatchShipFail3');">+</button></td>
                        </tr>
                        <tr>
                            <td class="failure">Cargo Ship Location 1</td>
                            <td class="failure" id="autoCargoShipFail1">0</td>
                            <td class="failure"><button id="autoCargoShipFail1Decrease" class="failure" onclick="autoCargoShipFail[0] -= 1; decrement('autoCargoShipFail1');">-</button></td>
                            <td class="failure"><button id="autoCargoShipFail1Increase" class="failure" onclick="autoCargoShipFail[0] += 1; increment('autoCargoShipFail1');">+</button></td>
                        </tr>
                        <tr>
                            <td class="failure">Cargo Ship Location 2</td>
                            <td class="failure" id="autoCargoShipFail2">0</td>
                            <td class="failure"><button id="autoCargoShipFail2Decrease" class="failure" onclick="autoCargoShipFail[1] -= 1; decrement('autoCargoShipFail2');">-</button></td>
                            <td class="failure"><button id="autoCargoShipFail2Increase" class="failure" onclick="autoCargoShipFail[1] += 1; increment('autoCargoShipFail2');">+</button></td>
                        </tr>
                        <tr>
                            <td class="failure">Cargo Ship Location 3</td>
                            <td class="failure" id="autoCargoShipFail3">0</td>
                            <td class="failure"><button id="autoCargoShipFail3Decrease" class="failure" onclick="autoCargoShipFail[2] -= 1; decrement('autoCargoShipFail3');">-</button></td>
                            <td class="failure"><button id="autoCargoShipFail3Increase" class="failure" onclick="autoCargoShipFail[2] += 1; increment('autoCargoShipFail3');">+</button></td>
                        </tr>
                    </table><br />
                    <h1>Teleop</h1>
                    <table>
                        <tr>
                            <th>Field</th>
                            <th>Value</th>
                            <th>Decrement</th>
                            <th>Increment</th>
                        </tr>
                        <tr>
                            <td class="success">Hatch Rocket Level 1</td>
                            <td class="success" id="teleopHatchRocketsSuccess1">0</td>
                            <!-- onkeypress="return isNumber(event)" -->
                            <td class="success"><button id="teleopHatchRocketsSuccess1Decrease" class="success" onclick="teleopHatchRocketsSuccess[0] -= 1; decrement('teleopHatchRocketsSuccess1');">-</button></td>
                            <td class="success"><button id="teleopHatchRocketsSuccess1Increase" class="success" onclick="teleopHatchRocketsSuccess[0] += 1; increment('teleopHatchRocketsSuccess1');">+</button></td>
                        </tr>
                        <tr>
                            <td class="success">Hatch Rocket Level 2</td>
                            <td class="success" id="teleopHatchRocketsSuccess2">0</td>
                            <!-- onkeypress="return isNumber(event)" -->
                            <td class="success"><button id="teleopHatchRocketsSuccess2Decrease" class="success" onclick="teleopHatchRocketsSuccess[1] -= 1; decrement('teleopHatchRocketsSuccess2');">-</button></td>
                            <td class="success"><button id="teleopHatchRocketsSuccess2Increase" class="success" onclick="teleopHatchRocketsSuccess[1] += 1; increment('teleopHatchRocketsSuccess2');">+</button></td>
                        </tr>
                        <tr>
                            <td class="success">Hatch Rocket Level 3</td>
                            <td class="success" id="teleopHatchRocketsSuccess3">0</td>
                            <!-- onkeypress="return isNumber(event)" -->
                            <td class="success"><button id="teleopHatchRocketsSuccess3Decrease" class="success" onclick="teleopHatchRocketsSuccess[2] -= 1; decrement('teleopHatchRocketsSuccess3');">-</button></td>
                            <td class="success"><button id="teleopHatchRocketsSuccess3Increase" class="success" onclick="teleopHatchRocketsSuccess[2] += 1; increment('teleopHatchRocketsSuccess3');">+</button></td>
                        </tr>
                        <tr>
                            <td class="success">Cargo Rocket Level 1</td>
                            <td class="success" id="teleopCargoRocketsSuccess1">0</td>
                            <td class="success"><button id="teleopCargoRocketsSuccess1Decrease" class="success" onclick="teleopCargoRocketsSuccess[0] -= 1; decrement('teleopCargoRocketsSuccess1');">-</button></td>
                            <td class="success"><button id="teleopCargoRocketsSuccess1Increase" class="success" onclick="teleopCargoRocketsSuccess[0] += 1; increment('teleopCargoRocketsSuccess1');">+</button></td>
                        </tr>
                        <tr>
                            <td class="success">Cargo Rocket Level 2</td>
                            <td class="success" id="teleopCargoRocketsSuccess2">0</td>
                            <td class="success"><button id="teleopCargoRocketsSuccess2Decrease" class="success" onclick="teleopCargoRocketsSuccess[1] -= 1; decrement('teleopCargoRocketsSuccess2');">-</button></td>
                            <td class="success"><button id="teleopCargoRocketsSuccess2Increase" class="success" onclick="teleopCargoRocketsSuccess[1] += 1; increment('teleopCargoRocketsSuccess2');">+</button></td>
                        </tr>
                        <tr>
                            <td class="success">Cargo Rocket Level 3</td>
                            <td class="success" id="teleopCargoRocketsSuccess3">0</td>
                            <td class="success"><button id="teleopCargoRocketsSuccess3Decrease" class="success" onclick="teleopCargoRocketsSuccess[2] -= 1; decrement('teleopCargoRocketsSuccess3');">-</button></td>
                            <td class="success"><button id="teleopCargoRocketsSuccess3Increase" class="success" onclick="teleopCargoRocketsSuccess[2] += 1; increment('teleopCargoRocketsSuccess3');">+</button></td>
                        </tr>

                        <tr>
                            <td class="failure">Hatch Rocket Level 1</td>
                            <td class="failure" id="teleopHatchRocketsFail1">0</td>
                            <td class="failure"><button id="teleopHatchRocketsFail1Decrease" class="failure" onclick="teleopHatchRocketsFail[0] -= 1; decrement('teleopHatchRocketsFail1');">-</button></td>
                            <td class="failure"><button id="teleopHatchRocketsFail1Increase" class="failure" onclick="teleopHatchRocketsFail[0] += 1; increment('teleopHatchRocketsFail1');">+</button></td>
                        </tr>
                        <tr>
                            <td class="failure">Hatch Rocket Level 2</td>
                            <td class="failure" id="teleopHatchRocketsFail2">0</td>
                            <td class="failure"><button id="teleopHatchRocketsFail2Decrease" class="failure" onclick="teleopHatchRocketsFail[1] -= 1; decrement('teleopHatchRocketsFail2');">-</button></td>
                            <td class="failure"><button id="teleopHatchRocketsFail2Increase" class="failure" onclick="teleopHatchRocketsFail[1] += 1; increment('teleopHatchRocketsFail2');">+</button></td>
                        </tr>
                        <tr>
                            <td class="failure">Hatch Rocket Level 3</td>
                            <td class="failure" id="teleopHatchRocketsFail3">0</td>
                            <td class="failure"><button id="teleopHatchRocketsFail3Decrease" class="failure" onclick="teleopHatchRocketsFail[2] -= 1; decrement('teleopHatchRocketsFail3');">-</button></td>
                            <td class="failure"><button id="teleopHatchRocketsFail3Increase" class="failure" onclick="teleopHatchRocketsFail[2] += 1; increment('teleopHatchRocketsFail3');">+</button></td>
                        </tr>
                        <tr>
                            <td class="failure">Cargo Rocket Level 1</td>
                            <td class="failure" id="teleopCargoRocketsFail1">0</td>
                            <td class="failure"><button id="teleopCargoRocketsFail1Decrease" class="failure" onclick="teleopCargoRocketsFail[0] -= 1; decrement('teleopCargoRocketsFail1');">-</button></td>
                            <td class="failure"><button id="teleopCargoRocketsFail1Increase" class="failure" onclick="teleopCargoRocketsFail[0] += 1; increment('teleopCargoRocketsFail1');">+</button></td>
                        </tr>
                        <tr>
                            <td class="failure">Cargo Rocket Level 2</td>
                            <td class="failure" id="teleopCargoRocketsFail2">0</td>
                            <td class="failure"><button id="teleopCargoRocketsFail2Decrease" class="failure" onclick="teleopCargoRocketsFail[1] -= 1; decrement('teleopCargoRocketsFail2');">-</button></td>
                            <td class="failure"><button id="teleopCargoRocketsFail2Increase" class="failure" onclick="teleopCargoRocketsFail[1] += 1; increment('teleopCargoRocketsFail2');">+</button></td>
                        </tr>
                        <tr>
                            <td class="failure">Cargo Rocket Level 3</td>
                            <td class="failure" id="teleopCargoRocketsFail3">0</td>
                            <td class="failure"><button id="teleopCargoRocketsFail3Decrease" class="failure" onclick="teleopCargoRocketsFail[2] -= 1; decrement('teleopCargoRocketsFail3');">-</button></td>
                            <td class="failure"><button id="teleopCargoRocketsFail3Increase" class="failure" onclick="teleopCargoRocketsFail[2] += 1; increment('teleopCargoRocketsFail3');">+</button></td>
                        </tr>

                        <tr>
                            <td colspan="4">For Ship, Use The Following Diagram to Find the Location:</td>
                        </tr>
                        <tr>
                            <td colspan="4"><img src="Ship Drawing.png" /></td>
                        </tr>
                        
                        <tr>
                            <td class="success">Hatch Ship Location 1</td>
                            <td class="success" id="teleopHatchShipSuccess1">0</td>
                            <!-- onkeypress="return isNumber(event)" -->
                            <td class="success"><button id="teleopHatchShipSuccess1Decrease" class="success" onclick="teleopHatchShipSuccess[0] -= 1; decrement('teleopHatchShipSuccess1');">-</button></td>
                            <td class="success"><button id="teleopHatchShipSuccess1Increase" class="success" onclick="teleopHatchShipSuccess[0] += 1; increment('teleopHatchShipSuccess1');">+</button></td>
                        </tr>
                        </tr>
                        <tr>
                            <td class="success">Hatch Ship Location 2</td>
                            <td class="success" id="teleopHatchShipSuccess2">0</td>
                            <td class="success"><button id="teleopHatchShipSuccess2Decrease" class="success" onclick="teleopHatchShipSuccess[1] -= 1; decrement('teleopHatchShipSuccess2');">-</button></td>
                            <td class="success"><button id="teleopHatchShipSuccess2Increase" class="success" onclick="teleopHatchShipSuccess[1] += 1; increment('teleopHatchShipSuccess2');">+</button></td>
                        </tr>
                        <tr>
                            <td class="success">Hatch Ship Location 3</td>
                            <td class="success" id="teleopHatchShipSuccess3">0</td>
                            <td class="success"><button id="teleopHatchShipSuccess3Decrease" class="success" onclick="teleopHatchShipSuccess[2] -= 1; decrement('teleopHatchShipSuccess3');">-</button></td>
                            <td class="success"><button id="teleopHatchShipSuccess3Increase" class="success" onclick="teleopHatchShipSuccess[2] += 1; increment('teleopHatchShipSuccess3');">+</button></td>
                        </tr>
                        <tr>
                            <td class="success">Cargo Ship Location 1</td>
                            <td class="success" id="teleopCargoShipSuccess1">0</td>
                            <td class="success"><button id="teleopCargoShipSuccess1Decrease" class="success" onclick="teleopCargoShipSuccess[0] -= 1; decrement('teleopCargoShipSuccess1');">-</button></td>
                            <td class="success"><button id="teleopCargoShipSuccess1Increase" class="success" onclick="teleopCargoShipSuccess[0] += 1; increment('teleopCargoShipSuccess1');">+</button></td>
                        </tr>
                        <tr>
                            <td class="success">Cargo Ship Location 2</td>
                            <td class="success" id="teleopCargoShipSuccess2">0</td>
                            <td class="success"><button id="teleopCargoShipSuccess2Decrease" class="success" onclick="teleopCargoShipSuccess[1] -= 1; decrement('teleopCargoShipSuccess2');">-</button></td>
                            <td class="success"><button id="teleopCargoShipSuccess2Increase" class="success" onclick="teleopCargoShipSuccess[1] += 1; increment('teleopCargoShipSuccess2');">+</button></td>
                        </tr>
                        <tr>
                            <td class="success">Cargo Ship Location 3</td>
                            <td class="success" id="teleopCargoShipSuccess3">0</td>
                            <td class="success"><button id="teleopCargoShipSuccess3Decrease" class="success" onclick="teleopCargoShipSuccess[2] -= 1; decrement('teleopCargoShipSuccess3');">-</button></td>
                            <td class="success"><button id="teleopCargoShipSuccess3Increase" class="success" onclick="teleopCargoShipSuccess[2] += 1; increment('teleopCargoShipSuccess3');">+</button></td>
                        </tr>

                        <tr>
                            <td class="failure">Hatch Ship Location 1</td>
                            <td class="failure" id="teleopHatchShipFail1">0</td>
                            <td class="failure"><button id="teleopHatchShipFail1Decrease" class="failure" onclick="teleopHatchShipFail[0] -= 1; decrement('teleopHatchShipFail1');">-</button></td>
                            <td class="failure"><button id="teleopHatchShipFail1Increase" class="failure" onclick="teleopHatchShipFail[0] += 1; increment('teleopHatchShipFail1');">+</button></td>
                        </tr>
                        <tr>
                            <td class="failure">Hatch Ship Location 2</td>
                            <td class="failure" id="teleopHatchShipFail2">0</td>
                            <td class="failure"><button id="teleopHatchShipFail2Decrease" class="failure" onclick="teleopHatchShipFail[1] -= 1; decrement('teleopHatchShipFail2');">-</button></td>
                            <td class="failure"><button id="teleopHatchShipFail2Increase" class="failure" onclick="teleopHatchShipFail[1] += 1; increment('teleopHatchShipFail2');">+</button></td>
                        </tr>
                        <tr>
                            <td class="failure">Hatch Ship Location 3</td>
                            <td class="failure" id="teleopHatchShipFail3">0</td>
                            <td class="failure"><button id="teleopHatchShipFail3Decrease" class="failure" onclick="teleopHatchShipFail[2] -= 1; decrement('teleopHatchShipFail3');">-</button></td>
                            <td class="failure"><button id="teleopHatchShipFail3Increase" class="failure" onclick="teleopHatchShipFail[2] += 1; increment('teleopHatchShipFail3');">+</button></td>
                        </tr>
                        <tr>
                            <td class="failure">Cargo Ship Location 1</td>
                            <td class="failure" id="teleopCargoShipFail1">0</td>
                            <td class="failure"><button id="teleopCargoShipFail1Decrease" class="failure" onclick="teleopCargoShipFail[0] -= 1; decrement('teleopCargoShipFail1');">-</button></td>
                            <td class="failure"><button id="teleopCargoShipFail1Increase" class="failure" onclick="teleopCargoShipFail[0] += 1; increment('teleopCargoShipFail1');">+</button></td>
                        </tr>
                        <tr>
                            <td class="failure">Cargo Ship Location 2</td>
                            <td class="failure" id="teleopCargoShipFail2">0</td>
                            <td class="failure"><button id="teleopCargoShipFail2Decrease" class="failure" onclick="teleopCargoShipFail[1] -= 1; decrement('teleopCargoShipFail2');">-</button></td>
                            <td class="failure"><button id="teleopCargoShipFail2Increase" class="failure" onclick="teleopCargoShipFail[1] += 1; increment('teleopCargoShipFail2');">+</button></td>
                        </tr>
                        <tr>
                            <td class="failure">Cargo Ship Location 3</td>
                            <td class="failure" id="teleopCargoShipFail3">0</td>
                            <td class="failure"><button id="teleopCargoShipFail3Decrease" class="failure" onclick="teleopCargoShipFail[2] -= 1; decrement('teleopCargoShipFail3');">-</button></td>
                            <td class="failure"><button id="teleopCargoShipFail3Increase" class="failure" onclick="teleopCargoShipFail[2] += 1; increment('teleopCargoShipFail3');">+</button></td>
                        </tr>
                    </table>
                    <h1>Climb</h1>
                    <table>
                        <tr>
                            <th>Field</th>
                            <th>Value</th>
                            <th>No Climb</th>
                            <th>Level 1</th>
                            <th>Level 2</th>
                            <th>Level 3</th>
                        </tr>
                        <tr>
                            <td class="default">Climb</td>
                            <td class="default" id="climb">Fudgikuh</td>
                            <!-- onkeypress="return isNumber(event)" -->
                            <td class="default"><button id="noClimb" class="default" onclick="climb = 'No'; climbLevel = 'No'; document.getElementById('climb').innerHTML = climbLevel + ' Climb';;">No Climb</button></td>
                            <td class="default"><button id="climbL1" class="default" onclick="climb = 'L1'; climbLevel = 'L1'; document.getElementById('climb').innerHTML = climbLevel;">Level 1</button></td>
                            <td class="default"><button id="climbL2" class="default" onclick="climb = 'L2'; climbLevel = 'L2'; document.getElementById('climb').innerHTML = climbLevel;">Level 2</button></td>
                            <td class="default"><button id="climbL3" class="default" onclick="climb = 'L3'; climbLevel = 'L3'; document.getElementById('climb').innerHTML = climbLevel;">Level 3</button></td>
                        </tr>
                        <tr>
                            <td class="default">Climb Fail</td>
                            <td class="default" id="climbFail">No Climb</td>
                            <!-- onkeypress="return isNumber(event)" -->
                            <td class="default"><button id="noClimbFail" class="default" onclick="climbFail = 'No'; climbFailLevel = 'No'; document.getElementById('climbFail').innerHTML = climbFailLevel + ' Fail Climb';">No Climb</button></td>
                            <td class="default"><button id="climbFailL1" class="default" onclick="climbFail = 'L1'; climbFailLevel = 'L1'; document.getElementById('climbFail').innerHTML = climbFailLevel;">Level 1</button></td>
                            <td class="default"><button id="climbFailL2" class="default" onclick="climbFail = 'L2'; climbFailLevel = 'L2'; document.getElementById('climbFail').innerHTML = climbFailLevel;">Level 2</button></td>
                            <td class="default"><button id="climbFailL3" class="default" onclick="climbFail = 'L3'; climbFailLevel = 'L3'; document.getElementById('climbFail').innerHTML = climbFailLevel;">Level 3</button></td>
                        </tr>
                    </table><br />
                    <h1 style="font-size: 50px;">Other Information</h1>
                    <label>Did The Team Get A Yellow Card? If So, Put Answer In TextBox Below, Or Leave Blank For No Yellow Card.</label><br />
                    <textarea id="yellowCard" rows="1">No Yellow Card.</textarea><br /><br />

                    <label>Did The Team Get A Red Card? If So, Put Answer In TextBox Below, Or Leave Blank For No Red Card.</label><br />
                    <textarea id="redCard" rows="1">No Red Card.</textarea><br /><br />

                    <label>Did The Team Get Any Other Fouls? If So, Put Answer In TextBox Below, Or Leave Blank For No Other Fouls.</label><br />
                    <textarea id="foul" rows="1">No other fouls.</textarea><br /><br />

                    <label>Select Their Level of Defense</label><br />
                    <form id="defense">
                        <input type="radio" name="defense" id="defense" value="Not Defensive" required checked>Not Defensive<br />
                        <input type="radio" name="defense" id="defense" value="Somewhat Defensive">Somewhat Defensive<br />
                        <input type="radio" name="defense" id="defense" value="Very Defensive">Very Defensive<br /><br />
                    </form>

                    <label>Did The Robot Fall Over?</label><br />
                    <form id="fallover">
                        <input type="radio" name="fallover" id="fallover" value="Yes" required>Yes<br />
                        <input type="radio" name="fallover" id="fallover" value="No" checked>No<br /><br />
                    </form>

                    <label>Was The Robot Saved And Able To Play Again (If The Robot Did Not Fall Over, Select No)?</label><br />
                    <form id="falloverSave">
                        <input type="radio" name="falloverSave" id="falloverSave" value="Yes" required>Yes<br />
                        <input type="radio" name="falloverSave" id="falloverSave" value="No" checked>No<br /><br />
                    </form>

                    <label>Did The Alliance Win?</label><br />
                    <form id="win">
                        <input type="radio" name="win" id="win" value="Yes" required>Yes<br />
                        <input type="radio" name="win" id="win" value="No" checked>No<br /><br />
                    </form>

                    <label>Any Other Information?</label>
                    <textarea id="extraInformation" rows="5">No extra information.</textarea><br /><br />

                    <button id="submit" onclick="postData();">Submit Scout</button>

                    <script type="text/javascript">
                        document.getElementById('matchNum').options[<?php if($num == 0) { echo "0"; } else { echo $largestUID; } ?>].selected = true;
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
                        document.getElementById('startLocation').innerHTML = startLocation;
                        document.getElementById('climb').innerHTML = climbLevel + " Climb";
                        document.getElementById('climbFail').innerHTML = climbFailLevel + " Climb";
                    </script>
                </div>
            </div>
            <div class="footer">
				<p style="color:purple;">&copy; A-Team Robotics 2018</p>
            </div>
        </div>
    </body>
</html>