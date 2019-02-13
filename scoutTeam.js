var time = 136;
var teamNumber = 0;
var matchNumber = 0;
var color = 0; //0 is blue, 1 is red
var started = false;
var startLocation = null;
var foul = null;
var yellowCard = null;
var redCard = null;
var fallover = null;
var falloverSave = null;
var win = null;
var extraInformation = null;
var defense = null;
var score = null;
//Rocket array (A is 0, B is 1)

//AUTONOMOUS / SANDSTORM
var autoHatchRocketsSuccess = [0, 0, 0];
var autoCargoRocketsSuccess = [0, 0, 0];
var autoHatchRocketsFail = [0, 0, 0];
var autoCargoRocketsFail = [0, 0, 0];
var autoHatchShipSuccess = [0, 0, 0];
var autoCargoShipSuccess = [0, 0, 0];
var autoHatchShipFail = [0, 0, 0];
var autoCargoShipFail = [0, 0, 0];

//TELEOP

var teleopHatchRocketsSuccess = [0, 0, 0];
var teleopCargoRocketsSuccess = [0, 0, 0];
var teleopHatchRocketsFail = [0, 0, 0];
var teleopCargoRocketsFail = [0, 0, 0];
var teleopHatchShipSuccess = [0, 0, 0];
var teleopCargoShipSuccess = [0, 0, 0];
var teleopHatchShipFail = [0, 0, 0];
var teleopCargoShipFail = [0, 0, 0];

//OTHER

var climb = null;
var climbLevel = null;
var climbFail = null;
var climbFailLevel = null;

//Button Dimensions (width, height, x, y]
//Color (red, green, blue]
//Stroke (red, green, blue, stroke-width]

var attributes = ['width', 'height', 'x', 'y'];
var texts = ['width', 'height','x', 'y', 'font-family', 'font-size', 'value'];

var ids = ['start','lRC','lRH','rRC','rRH','sC', 'sH','lRC2','lRH2','rRC2','rRH2','sC2', 'sH2', 'climbYes', 'climbNo'];
var setsDimensions = [ //The first dimension indexes match the indexes for the array ids.
                    [150, 30, 675, 10],
                    [50, 50, 575, 575],
                    [50, 50, 655, 575],
                    [50, 50, 575, 125],
                    [50, 50, 655, 125],
                    [45, 45, 627, 352],
                    [45, 45, 674, 352],
                    
                    [50, 50, 875, 575],
                    [50, 50, 795, 575],
                    [50, 50, 875, 125],
                    [50, 50, 795, 125],
                    [45, 45, 825, 352],
                    [45, 45, 778, 352],
                    [100, 50, 375, 324],
                    [100, 50, 375, 376]
                    ];
var setsColors = [ //The first dimension indexes match the indexes for the array ids.
                [150, 150, 150],
                [0, 0, 255],
                [0, 0, 255],
                [0, 0, 255],
                [0, 0, 255],
                [235, 184, 0],
                [235, 184, 0],
                [255, 0, 0],
                [255, 0, 0],
                [255, 0, 0],
                [255, 0, 0],
                [235, 184, 0],
                [235, 184, 0],
                [0, 255, 0],
                [255, 0, 0]
                ];
var textColor = [
                [255, 255, 255],
                [255, 255, 255],
                [255, 255, 255],
                [255, 255, 255],
                [255, 255, 255],
                [255, 255, 255],
                [255, 255, 255],
                [255, 255, 255],
                [255, 255, 255],
                [255, 255, 255],
                [255, 255, 255],
                [255, 255, 255],
                [255, 255, 255],
                [255, 255, 255],
                [255, 255, 255]
                ];
var textAttributes = [[150, 30, setsDimensions[0][2], setsDimensions[0][3] + 20, 'Times New Roman', 20, "START"],
                    [setsDimensions[1][0], setsDimensions[1][1], setsDimensions[1][2] + 5, setsDimensions[1][3] + 40, 'Times New Roman', 50, "C"],
                    [setsDimensions[2][0], setsDimensions[2][1], setsDimensions[2][2] + 5, setsDimensions[2][3] + 40, 'Times New Roman', 50, "H"],
                    [setsDimensions[3][0], setsDimensions[3][1], setsDimensions[3][2] + 5, setsDimensions[3][3] + 40, 'Times New Roman', 50, "C"],
                    [setsDimensions[4][0], setsDimensions[4][1], setsDimensions[4][2] + 5, setsDimensions[4][3] + 40, 'Times New Roman', 50, "H"],
                    [setsDimensions[5][0], setsDimensions[5][1], setsDimensions[5][2] + 5, setsDimensions[5][3] + 38, 'Times New Roman', 45, "C"],
                    [setsDimensions[6][0], setsDimensions[6][1], setsDimensions[6][2] + 5, setsDimensions[6][3] + 38, 'Times New Roman', 45, "H"],
                    [setsDimensions[7][0], setsDimensions[7][1], setsDimensions[7][2] + 5, setsDimensions[7][3] + 40, 'Times New Roman', 50, "C"],
                    [setsDimensions[8][0], setsDimensions[8][1], setsDimensions[8][2] + 5, setsDimensions[8][3] + 40, 'Times New Roman', 50, "H"],
                    [setsDimensions[9][0], setsDimensions[9][1], setsDimensions[9][2] + 5, setsDimensions[9][3] + 40, 'Times New Roman', 50, "C"],
                    [setsDimensions[10][0], setsDimensions[10][1], setsDimensions[10][2] + 5, setsDimensions[10][3] + 40, 'Times New Roman', 50, "H"],
                    [setsDimensions[11][0], setsDimensions[11][1], setsDimensions[11][2] + 5, setsDimensions[11][3] + 38, 'Times New Roman', 45, "C"],
                    [setsDimensions[12][0], setsDimensions[12][1], setsDimensions[12][2] + 5, setsDimensions[12][3] + 38, 'Times New Roman', 45, "H"],
                    [setsDimensions[13][0], setsDimensions[13][1], setsDimensions[13][2] + 5, setsDimensions[13][3] + 38, 'Times New Roman', 30, "Success"],
                    [setsDimensions[14][0], setsDimensions[14][1], setsDimensions[14][2] + 5, setsDimensions[14][3] + 38, 'Times New Roman', 30, "Failure"]
                    ];

var tempDimensions = [
    [100, 100, 200, 720],
    [100, 100, 310, 720],
    [100, 100, 420, 720],
    [100, 100, 530, 720],
    [100, 100, 640, 720],
    [100, 100, 750, 720]
    ];
var tempText = [[150, 30, tempDimensions[0][2], tempDimensions[0][3] + 80, 'Times New Roman', 80],
    [100, 100, tempDimensions[1][2], tempDimensions[1][3] + 80, 'Times New Roman', 80],
    [100, 100, tempDimensions[2][2], tempDimensions[2][3] + 80, 'Times New Roman', 80],
    [100, 100, tempDimensions[3][2], tempDimensions[3][3] + 80, 'Times New Roman', 80],
    [100, 100, tempDimensions[4][2], tempDimensions[4][3] + 80, 'Times New Roman', 80],
    [100, 100, tempDimensions[5][2], tempDimensions[5][3] + 80, 'Times New Roman', 80]
    ];
var tempIds = ['temp1', 'temp2', 'temp3', 'temp4', 'temp5', 'temp6'];
var tempColor = [[0, 255, 0],
    [0, 255, 0],
    [0, 255, 0],
    [255, 0, 0],
    [255, 0, 0],
    [255, 0, 0],
    ];

var cValues = ['C1', 'C2', 'C3', 'C1', 'C2', 'C3'];
var hValues = ['H1', 'H2', 'H3', 'H1', 'H2', 'H3'];

var climbIds = ['climbB1', 'climbB2', 'climbB3', 'climbR1', 'climbR2', 'climbR3'];
var climbDimensions = [
    [63, 248, 311, 251],
    [108, 248, 201, 251],
    [108, 88, 201, 331],
    [63, 248, 1126, 251],
    [108, 248, 1191, 251],
    [108, 88, 1191, 331]
];
var climbText = [
    [50, 50, climbDimensions[0][2], climbDimensions[0][3] + 40, 'Times New Roman', 45, 'L1'],
    [50, 50, climbDimensions[1][2], climbDimensions[1][3] + 40, 'Times New Roman', 45, 'L2'],
    [50, 50, climbDimensions[2][2], climbDimensions[2][3] + 40, 'Times New Roman', 45, 'L3'],
    [50, 50, climbDimensions[3][2], climbDimensions[3][3] + 40, 'Times New Roman', 45, 'L1'],
    [50, 50, climbDimensions[4][2], climbDimensions[4][3] + 40, 'Times New Roman', 45, 'L2'],
    [50, 50, climbDimensions[5][2], climbDimensions[5][3] + 40, 'Times New Roman', 45, 'L3']
];
var climbText2 = [50, 50, climbDimensions[1][2], 475, 'Times New Roman', 45, 'L2'];
var climbText3 = [50, 50, climbDimensions[4][2], 475, 'Times New Roman', 45, 'L2'];
var climbColor = [
    [0, 0, 255],
    [0, 0, 255],
    [0, 0, 255],
    [255, 0, 0],
    [255, 0, 0],
    [255, 0, 0]
];



function finalDetails() {
    if(confirm("Did the team get a yellow card?")) {
        yellowCard = prompt("Why? Could it be from holding more than one game piece at a time, damaging the field, stepping over guard rails, etc.", "Enter Reason Here");
    }
    else {
        yellowCard = "No Yellow Card.";
    }

    if(confirm("Did the team get a red card?")) {
        redCard = prompt("Why? Could it be from throwing HATCH panels, threatening other team members, repeatedly stepping over guard rails, etc.", "Enter Reason Here");
    }
    else {
        redCard = "No Red Card.";
    }

    if(confirm("Did the team get any other fouls?")) {
        foul = prompt("Why?", "Enter Reason Here");
    }
    else {
        foul = "No other fouls.";
    }
    
    if(confirm("Did the team play defensively?")) {
        if(confirm("Press 'Okay' if they played defense A LOT, or 'Cancel' if they played defense partially.")) {
            defense = "Very Defensive";
        }
        else {
            defense = "Somewhat Defensive";
        }
    }
    else {
        defense = "Not Defensive";
    }

    if(confirm("Did the team's robot fall over at all during the match?")) {
        fallover = "Yes";

        if(confirm("Was the robot saved and able to play again?")) {
            falloverSave = "Yes";
        }
        else {
            falloverSave = "No";
        }
    }
    else {
        fallover = "No";
        falloverSave = "No";
    }

    if(confirm("Did the team's alliance win?")) {
        win = "Yes";
    }
    else {
        win = "No";
    }

    if(confirm("Any other information?")) {
        extraInformation = prompt("Please enter anything else that happened.", "Enter Here");
    }
    else {
        extraInformation = "No extra information.";
    }

    if(startLocation == null) {
        startLocation = "Unknown";
    }

    if(climb == null) {
        climb = "No";
    }

    if(climbLevel == null) {
        climbLevel = "No";
    }

    if(climbFail == null) {
        climbFail = "No";
    }

    if(climbFailLevel == null) {
        climbFailLevel = "No";
    }
}

function hideSVG(id) {
    var style = document.getElementById(id).style.display;
    if(style === "none")
        document.getElementById(id).style.display = "block";
    else
        document.getElementById(id).style.display = "none";
    //or to hide the all svg
    //document.getElementById("mySvg").style.display = "none";
}

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
}

function incrementTime() {
    if(time != 0) {
        time -= 1;
        document.getElementById('startText').value = time;
        document.getElementById('startText').innerHTML = time;
        setTimeout(incrementTime, 50);
    }
    else {
        document.getElementById('startText').value = "C'est fini!";
        document.getElementById('startText').innerHTML = "C'est fini!";
        finalDetails();
        setScore();
        postData();
    }
}

function startMatch() {
    matchNumber = document.getElementById('matchNum').options[document.getElementById('matchNum').selectedIndex].value;
    teamNumber = document.getElementById('teamNum').options[document.getElementById('teamNum').selectedIndex].value;
    if(!started) {
        started = true;
        incrementTime();
    }
}

//Resets the Temporary Buttons so the user doesn't mistake them.
function unsetTempButtons() {
    for(var i = 0;i < 6;i++) {
        var tempId = tempIds[i] + "Button";
        var tempId2 = tempIds[i] + "Text";
        document.getElementById(tempId2).value = null;
        document.getElementById(tempId2).innerHTML = null;
        document.getElementById(tempId).onclick = null;
        document.getElementById(tempId2).onclick = null;
    }
}

function tempButtons() {
    for(var i = 0;i < 6;i++) {
        var tempId = tempIds[i] + "Button";
        var tempId2 = tempIds[i] + "Text";
        for(var j = 0;j < 4;j++) {
            document.getElementById(tempId).setAttribute(attributes[j], tempDimensions[i][j]);
            document.getElementById(tempId2).setAttribute(texts[j], tempText[i][j]);
        }
        document.getElementById(tempId).style.fill = "rgb(" + tempColor[i][0] + ", " + tempColor[i][1] + ", " + tempColor[i][2] + ")";

        document.getElementById(tempId2).style.fontFamily = tempText[i][4];
        document.getElementById(tempId2).style.font = tempText[i][4];
        document.getElementById(tempId2).style.fontSize = tempText[i][5];
        document.getElementById(tempId2).style.textAlign = 'center';
        document.getElementById(tempId2).style.fill = "rgb(" + 255 + ", " + 255 + ", " + 255 + ")";
        document.getElementById(tempId2).style.stroke = "rgb(" + 255 + ", " + 255 + ", " + 255 + ")";
    }
}

function climbButtons() {
    for(var i = 0;i < 6;i++) {
        var climbId = climbIds[i] + "Button";
        var climbId2 = climbIds[i] + "Text";
        for(var j = 0;j < 4;j++) {
            document.getElementById(climbId).setAttribute(attributes[j], climbDimensions[i][j]);
            document.getElementById(climbId2).setAttribute(texts[j], climbText[i][j]);
        }
        document.getElementById(climbId).style.fill = "rgb(" + climbColor[i][0] + ", " + climbColor[i][1] + ", " + climbColor[i][2] + ")";
        
        document.getElementById(climbId2).style.fontFamily = climbText[i][4];
        document.getElementById(climbId2).style.font = climbText[i][4];
        document.getElementById(climbId2).style.fontSize = climbText[i][5];
        document.getElementById(climbId2).style.textAlign = 'center';
        document.getElementById(climbId2).style.fill = "rgb(" + 255 + ", " + 255 + ", " + 255 + ")";
        document.getElementById(climbId2).style.stroke = "rgb(" + 255 + ", " + 255 + ", " + 255 + ")";
        document.getElementById(climbId2).value = climbText[i][6];
        document.getElementById(climbId2).innerHTML = climbText[i][6];
    }

    climbId2 = climbIds[1] + "Text2";

    for(var j = 0;j < 4;j++) {
        document.getElementById(climbId2).setAttribute(texts[j], climbText2[j]);
        document.getElementById(climbIds[4] + "Text2").setAttribute(texts[j], climbText3[j]);
    }

    document.getElementById(climbId2).style.fontFamily = climbText2[4];
    document.getElementById(climbId2).style.font = climbText2[4];
    document.getElementById(climbId2).style.fontSize = climbText2[5];
    document.getElementById(climbId2).style.textAlign = 'center';
    document.getElementById(climbId2).style.fill = "rgb(" + 255 + ", " + 255 + ", " + 255 + ")";
    document.getElementById(climbId2).style.stroke = "rgb(" + 255 + ", " + 255 + ", " + 255 + ")";
    document.getElementById(climbId2).value = climbText2[6];
    document.getElementById(climbId2).innerHTML = climbText2[6];

    climbId2 = climbIds[4] + "Text2";

    document.getElementById(climbId2).style.fontFamily = climbText3[4];
    document.getElementById(climbId2).style.font = climbText3[4];
    document.getElementById(climbId2).style.fontSize = climbText3[5];
    document.getElementById(climbId2).style.textAlign = 'center';
    document.getElementById(climbId2).style.fill = "rgb(" + 255 + ", " + 255 + ", " + 255 + ")";
    document.getElementById(climbId2).style.stroke = "rgb(" + 255 + ", " + 255 + ", " + 255 + ")";
    document.getElementById(climbId2).value = climbText3[6];
    document.getElementById(climbId2).innerHTML = climbText3[6];
}

function setTempButtons(values, a1, a2, t1, t2) {
    if(started) {
        for(var i = 0;i < 6;i++) {
            var tempId = tempIds[i] + "Button";
            var tempId2 = tempIds[i] + "Text";
            document.getElementById(tempId2).value = values[i];
            document.getElementById(tempId2).innerHTML = values[i];
        }
        
        document.getElementById(tempIds[0] + "Button").onclick = function() {
            if(time >= 120) {
                a1[0] += 1;
            }
            else {
                t1[0] += 1;
            }
            unsetTempButtons();
        };
        document.getElementById(tempIds[0] + "Text").onclick = function() {
            if(time >= 120) {
                a1[0] += 1;
            }
            else {
                t1[0] += 1;
            }
            unsetTempButtons();
        };
        document.getElementById(tempIds[1] + "Button").onclick = function() {
            if(time >= 120) {
                a1[1] += 1;
            }
            else {
                t1[1] += 1;
            }
            unsetTempButtons();
        };
        document.getElementById(tempIds[1] + "Text").onclick = function() {
            if(time >= 120) {
                a1[1] += 1;
            }
            else {
                t1[1] += 1;
            }
            unsetTempButtons();
        };
        document.getElementById(tempIds[2] + "Button").onclick = function() {
            if(time >= 120) {
                a1[2] += 1;
            }
            else {
                t1[2] += 1;
            }
            unsetTempButtons();
        };
        document.getElementById(tempIds[2] + "Text").onclick = function() {
            if(time >= 120) {
                a1[2] += 1;
            }
            else {
                t1[2] += 1;
            }
            unsetTempButtons();
        };
        document.getElementById(tempIds[3] + "Button").onclick = function() {
            if(time >= 120) {
                a2[0] += 1;
            }
            else {
                t2[0] += 1;
            }
            unsetTempButtons();
        };
        document.getElementById(tempIds[3] + "Text").onclick = function() {
            if(time >= 120) {
                a2[0] += 1;
            }
            else {
                t2[0] += 1;
            }
            unsetTempButtons();
        };
        document.getElementById(tempIds[4] + "Button").onclick = function() {
            if(time >= 120) {
                a2[1] += 1;
            }
            else {
                t2[1] += 1;
            }
            unsetTempButtons();
        };
        document.getElementById(tempIds[4] + "Text").onclick = function() {
            if(time >= 120) {
                a2[1] += 1;
            }
            else {
                t2[1] += 1;
            }
            unsetTempButtons();
        };
        document.getElementById(tempIds[5] + "Button").onclick = function() {
            if(time >= 120) {
                a2[2] += 1;
            }
            else {
                t2[2] += 1;
            }
            unsetTempButtons();
        };
        document.getElementById(tempIds[5] + "Text").onclick = function() {
            if(time >= 120) {
                a2[2] += 1;
            }
            else {
                t2[2] += 1;
            }
            unsetTempButtons();
        };
    }
}

function click(id, i) {
    id1 = id + "Button";
    id2 = id + "Text";
    document.getElementById(id1).setAttribute(attributes[0], setsDimensions[i][0] - 1);
    document.getElementById(id1).setAttribute(attributes[1], setsDimensions[i][1] - 1);
    document.getElementById(id2).setAttribute(attributes[0], setsDimensions[i][0] - 1);
    document.getElementById(id2).setAttribute(attributes[0], setsDimensions[i][1] - 1);
    document.getElementById(id2).setAttribute(attributes[0], setsDimensions[i][5] - 1);
    setTimeout(unclick(id, i), 100);
}

function unclick(id, i) {
    id1 = id + "Button";
    id2 = id + "Text";
    document.getElementById(id1).setAttribute(attributes[0], setsDimensions[i][0] + 1);
    document.getElementById(id1).setAttribute(attributes[1], setsDimensions[i][1] + 1);
    document.getElementById(id2).setAttribute(attributes[0], setsDimensions[i][0] + 1);
    document.getElementById(id2).setAttribute(attributes[0], setsDimensions[i][1] + 1);
    document.getElementById(id2).setAttribute(attributes[0], setsDimensions[i][5] + 1);
}

function climbSet(i) {
    if(time == 136) {
        startLocation = document.getElementById(climbIds[i] + "Text").value;
        alert("Start Location Set");
    }
    else {
        //climbLevel = document.getElementById(climbIds[i] + "Text").value;
        document.getElementById('climbYesButton').style.display = 'block';
        document.getElementById('climbYesText').style.display = 'block';
        document.getElementById('climbNoButton').style.display = 'block';
        document.getElementById('climbNoText').style.display = 'block';

        document.getElementById('climbYesButton').onclick = function() {
            climb = "Yes";
            if(i == 0) {
                climbLevel = 'L1';
            }
            else if(i == 1) {
                climbLevel = 'L2';
            }
            else if(i == 2) {
                climbLevel = 'L3';
            }
            
            document.getElementById('climbYesButton').style.display = 'none';
            document.getElementById('climbYesText').style.display = 'none';
            document.getElementById('climbNoButton').style.display = 'none';
            document.getElementById('climbNoText').style.display = 'none';
        }

        document.getElementById('climbYesText').onclick = function() {
            climb = "Yes";
            if(i == 0) {
                climbLevel = 'L1';
            }
            else if(i == 1) {
                climbLevel = 'L2';
            }
            else if(i == 2) {
                climbLevel = 'L3';
            }
            
            document.getElementById('climbYesButton').style.display = 'none';
            document.getElementById('climbYesText').style.display = 'none';
            document.getElementById('climbNoButton').style.display = 'none';
            document.getElementById('climbNoText').style.display = 'none';
        }

        document.getElementById('climbNoButton').onclick = function() {
            climbFail = "Yes";
            if(i == 0) {
                climbFailLevel = 'L1';
            }
            else if(i == 1) {
                climbFailLevel = 'L2';
            }
            else if(i == 2) {
                climbFailLevel = 'L3';
            }
            
            document.getElementById('climbYesButton').style.display = 'none';
            document.getElementById('climbYesText').style.display = 'none';
            document.getElementById('climbNoButton').style.display = 'none';
            document.getElementById('climbNoText').style.display = 'none';
        }

        document.getElementById('climbNoText').onclick = function() {
            climbFail = "Yes";
            if(i == 0) {
                climbFailLevel = 'L1';
            }
            else if(i == 1) {
                climbFailLevel = 'L2';
            }
            else if(i == 2) {
                climbFailLevel = 'L3';
            }
            
            document.getElementById('climbYesButton').style.display = 'none';
            document.getElementById('climbYesText').style.display = 'none';
            document.getElementById('climbNoButton').style.display = 'none';
            document.getElementById('climbNoText').style.display = 'none';
        }
    }
    //alert(document.getElementById(climbIds[i] + "Text").value);
}

function setButtons() {
    for(var i = 0;i < ids.length;i++) {
        var id = ids[i] + 'Button';
        var id2 = ids[i] + 'Text';
        
        for(var j = 0;j < 4;j++) {
            document.getElementById(id).setAttribute(attributes[j], setsDimensions[i][j]);
            document.getElementById(id2).setAttribute(texts[j], textAttributes[i][j]);
        }

        document.getElementById(id).style.fill = "rgb(" + setsColors[i][0] + ", " + setsColors[i][1] + ", " + setsColors[i][2] + ")";

        document.getElementById(id2).style.fontFamily = textAttributes[i][4];
        document.getElementById(id2).style.font = textAttributes[i][4];
        document.getElementById(id2).style.fontSize = textAttributes[i][5];
        document.getElementById(id2).style.textAlign = 'center';
        document.getElementById(id2).style.fill = "rgb(" + textColor[i][0] + ", " + textColor[i][1] + ", " + textColor[i][2] + ")";
        document.getElementById(id2).style.stroke = "rgb(" + textColor[i][0] + ", " + textColor[i][1] + ", " + textColor[i][2] + ")";
        document.getElementById(id2).value = textAttributes[i][6];
        document.getElementById(id2).innerHTML = textAttributes[i][6];
    }

    tempButtons();
    climbButtons();
}