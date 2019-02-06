var time = 135;
var teamNumber = 0;
var matchNumber = 0;
var color = 0; //0 is blue, 1 is red
var started = false;
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

var climb = 0;
var climbLevel = 0;
var climbTime = 0;
var climbFail = 0;
var climbFailLevel = 0;
var climbFailTime = 0;

//Button Dimensions (width, height, x, y]
//Color (red, green, blue]
//Stroke (red, green, blue, stroke-width]

var attributes = ['width', 'height', 'x', 'y'];
var texts = ['width', 'height','x', 'y', 'font-family', 'font-size', 'value'];

var ids = ['start','lRC','lRH','rRC','rRH','sC', 'sH','lRC2','lRH2','rRC2','rRH2','sC2', 'sH2'];

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
                    [45, 45, 778, 352]
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
                [235, 184, 0]
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
                    [setsDimensions[12][0], setsDimensions[12][1], setsDimensions[12][2] + 5, setsDimensions[12][3] + 38, 'Times New Roman', 45, "H"]
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
var tempDefaultValues = ['', '', '', '', '', ''];
var tempDisplay = false;

var tempColor = [[0, 255, 0],
    [0, 255, 0],
    [0, 255, 0],
    [255, 0, 0],
    [255, 0, 0],
    [255, 0, 0],
    ];

var cValues = ['C1', 'C2', 'C3', 'C4', 'C5', 'C6'];
var hValues = ['H1', 'H2', 'H3', 'H4', 'H5', 'H6'];

function hideSVG(id) {
    var style = document.getElementById(id).style.display;
    if(style === "none")
        document.getElementById(id).style.display = "block";
    else
        document.getElementById(id).style.display = "none";
    //or to hide the all svg
    //document.getElementById("mySvg").style.display = "none";
}

function incrementTime() {
    if(time != 0) {
        time -= 1;
        document.getElementById('startText').value = time;
        document.getElementById('startText').innerHTML = time;
        setTimeout(incrementTime, 1000);
    }
    else {
        document.getElementById('startText').value = "C'est fini!";
        document.getElementById('startText').innerHTML = "C'est fini!";
    }
}

function startMatch() {
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
        document.getElementById(id2).style.fill = "rgb(" + 255 + ", " + 255 + ", " + 255 + ")";
        document.getElementById(id2).style.stroke = "rgb(" + 255 + ", " + 255 + ", " + 255 + ")";
        document.getElementById(id2).value = textAttributes[i][6];
        document.getElementById(id2).innerHTML = textAttributes[i][6];
    }

    tempButtons();
}