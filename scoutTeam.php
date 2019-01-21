<?php include('includes/database.php'); ?>
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
        </style>
    </head>
	<body>
        <?php
            /*     How to use javascript in PHP
            $fight = "HI!";
            echo '<script type="text/javascript">
                        var text = "'. $fight. '";
                        alert(text);
                </script>';
            */
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>A-Team Robotics Scouting Page</title>
        <link href="css/main.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/custom.css" rel="stylesheet">
        <div class="container">
            <div class="header">
                <ul class="nav nav-pills pull-right">
                    <li><a href="homePage.php">Home Page</a></li>
                    <li><a href="teamList.php">Team List</a></li>
                    <li><a href="addTeam.php">Add Team</a></li>
                    <li><a href="robot.php">Robot Information</a></li>
                    <li class="active"><a href="scoutTeam.php">Scout Team</a></li>
                    <li><a href="addMatchCount.php">Match Information</a></li>
                </ul>
            </div>
        </div>
        <br />
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
            <rect width="40" height="15" x="788" y="55" style="fill: rgb(255, 208, 0);stroke: rgb(0, 0, 0)" />
            <rect width="40" height="15" x="903" y="55" style="fill: rgb(255, 208, 0);stroke: rgb(0, 0, 0)" />
            <rect width="40" height="15" x="1018" y="55" style="fill: rgb(255, 208, 0);stroke: rgb(0, 0, 0)" onclick="print('Your using me for scouting is repellent.');" />
            <rect width="40" height="15" x="1133" y="55" style="fill: rgb(255, 208, 0);stroke: rgb(0, 0, 0)" />
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
            <rect id="teamNumberButton" onclick="print('This is really annoying.');" />
            <text id="teamNumberText" onclick="print('This is really annoying.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="startButton" onclick="print('It works.');" />
            <text id="startText" onclick="print('It works.');"></text>

            <rect id="lRCSButton" onclick="click('lRCS1', 3);print('Hi.');" />
            <text id="lRCSText" onclick="click('lRCS1', 3);print('Hi.');"></text>

            <rect id="lRCFButton" onclick="print('Hi.');" />
            <text id="lRCFText" onclick="print('Hi.');"></text>

            <rect id="lRHSButton" onclick="print('Hi.');" />
            <text id="lRHSText" onclick="print('Hi.');"></text>

            <rect id="lRHFButton" onclick="print('Hi.');" />
            <text id="lRHFText" onclick="print('Hi.');"></text>

            <rect id="lRCF2Button" onclick="print('Hi.');" />
            <text id="lRCF2Text" onclick="print('Hi.');"></text>

            <rect id="lRCF3Button" onclick="print('Hi.');" />
            <text id="lRCF3Text" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <rect id="matchNumberButton" onclick="print('Hi.');" />
            <text id="matchNumberText" onclick="print('Hi.');"></text>

            <script type="text/javascript">
                setButtons();
            </script>
        </svg>
	</body>
</html>