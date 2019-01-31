var time = 150;
var teamNumber = 0;
var matchNumber = 0;
var color = 0; //0 is blue, 1 is red
//Rocket array (A is 0, B is 1)

//AUTONOMOUS / SANDSTORM
var autoHatchRocketsSuccess = [
    [0, 0, 0],
    [0, 0, 0]
];

function setAutoHatchShipSuccess(num, i, j) {
    autoHatchShipSuccess[i][j] = num;
}

var autoCargoRocketsSuccess = [0, 0, 0];

function setAutoCargoShipSuccess(num, i) {
    autoCargoShipSuccess[i] = num;
}

var autoHatchRocketsFail = [
    [0, 0, 0],
    [0, 0, 0]
];

function setAutoHatchRocketsFail(num, i, j) {
    autoHatchRocketsFail[i][j] = num;
}

var autoCargoRocketsFail = [0, 0, 0];

function setAutoCargoRocketsFail(num, i) {
    autoCargoRocketsFail[i] = num;
}

var autoHatchShipSuccess = [0, 0, 0, 0, 0, 0, 0, 0];

function setAutoHatchShipSuccess(num, i) {
    autoHatchShipSuccess[i] = num;
}

var autoCargoShipSuccess = [0, 0, 0, 0, 0, 0, 0, 0];

function setAutoCargoShipSuccess(num, i) {
    autoCargoShipSuccess[i] = num;
}

var autoHatchShipFail = [0, 0, 0, 0, 0, 0, 0, 0];

function setAutoHatchShipFail(num, i) {
    autoHatchShipFail[i] = num;
}

var autoCargoShipFail = [0, 0, 0, 0, 0, 0, 0, 0];

function setAutoCargoShipFail(num, i) {
    autoCargoShipFail[i] = num;
}

//TIMING
var autoHatchRocketsSuccessTime = [
    [0, 0, 0],
    [0, 0, 0]
];

function setAutoHatchRocketsSuccessTime(num, i, j) {
    autoHatchRocketsSuccessTime[i][j] = num;
}

var autoCargoRocketsSuccessTime = [
    [0, 0, 0],
    [0, 0, 0]
];

function setAutoCargoRocketsSuccessTime(num, i, j) {
    autoCargoRocketsSuccessTime[i][j] = num;
}

var autoHatchRocketsFailTime = [
    [0, 0, 0],
    [0, 0, 0]
];

function setAutoHatchRocketsFailTime(num, i, j) {
    autoHatchRocketsFailTime[i][j] = num;
}

var autoCargoRocketsFailTime = [
    [0, 0, 0],
    [0, 0, 0]
];

function setAutoCargoRocketsFailTime(num, i, j) {
    autoCargoRocketsFailTime[i][j] = num;
}

var autoHatchShipSuccessTime = [0, 0, 0, 0, 0, 0, 0, 0];

function setAutoHatchShipSuccessTime(num, i) {
    autoHatchShipSuccessTime[i] = num;
}

var autoCargoShipSuccessTime = [0, 0, 0, 0, 0, 0, 0, 0];

function setAutoCargoShipSuccessTime(num, i) {
    autoCargoShipSuccessTime[i] = num;
}

var autoHatchShipFailTime = [0, 0, 0, 0, 0, 0, 0, 0];

function setAutoHatchShipFailTime(num, i) {
    autoHatchShipFailTime[i] = num;
}

var autoCargoShipFailTime = [0, 0, 0, 0, 0, 0, 0, 0];

function setAutoCargoShipFailTime(num, i) {
    autoCargoShipFailTime[i] = num;
}

/*--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/
//TELEOP

var teleopHatchRocketsSuccess = [
    [0, 0, 0],
    [0, 0, 0]
];

function setTeleopHatchRocketsSuccess(num, i, j) {
    teleopHatchRocketsSuccess[i][j] = num;
}

var teleopCargoRocketsSuccess = [
    [0, 0, 0],
    [0, 0, 0]
];

function setTeleopCargoRocketsSuccess(num, i, j) {
    teleopCargoRocketsSuccess[i][j] = num;
}

var teleopHatchRocketsFail = [
    [0, 0, 0],
    [0, 0, 0]
];

function setTeleopHatchRocketsFail(num, i, j) {
    teleopHatchRocketsFail[i][j] = num;
}

var teleopCargoRocketsFail = [
    [0, 0, 0],
    [0, 0, 0]
];

function setTeleopCargoRocketsFail(num, i, j) {
    teleopCargoRocketsFail[i][j] = num;
}

var teleopHatchShipSuccess = [0, 0, 0, 0, 0, 0, 0, 0];

function setTeleopHatchShipSuccess(num, i) {
    teleopHatchShipSuccess[i] = num;
}

var teleopCargoShipSuccess = [0, 0, 0, 0, 0, 0, 0, 0];

function setTeleopCargoShipSuccess(num, i) {
    teleopCargoShipSuccess[i] = num;
}

var teleopHatchShipFail = [0, 0, 0, 0, 0, 0, 0, 0];

function setTeleopHatchShipFail(num, i) {
    teleopHatchShipFail[i] = num;
}

var teleopCargoShipFail = [0, 0, 0, 0, 0, 0, 0, 0];

function setTeleopCargoShipFail(num, i) {
    teleopCargoShipFail[i] = num;
}

//TELEOP TIMING
var teleopHatchRocketsSuccessTime = [
    [0, 0, 0],
    [0, 0, 0]
];

function setTeleopHatchRocketsSuccessTime(num, i, j) {
    teleopHatchRocketsSuccessTime[i][j] = num;
}

var teleopCargoRocketsSuccessTime = [
    [0, 0, 0],
    [0, 0, 0]
];

function setTeleopCargoRocketsSuccessTime(num, i, j) {
    teleopCargoRocketsSuccessTime[i][j] = num;
}

var teleopHatchRocketsFailTime = [
    [0, 0, 0],
    [0, 0, 0]
];

function setTeleopHatchRocketsFailTime(num, i, j) {
    teleopHatchRocketsFailTime[i][j] = num;
}

var teleopCargoRocketsFailTime = [
    [0, 0, 0],
    [0, 0, 0]
];

function setTeleopCargoRocketsFailTime(num, i, j) {
    teleopCargoRocketsFailTime[i][j] = num;
}

var teleopHatchShipSuccessTime = [0, 0, 0, 0, 0, 0, 0, 0];

function setTeleopHatchShipSuccessTime(num, i) {
    teleopHatchShipSuccessTime[i] = num;
}

var teleopCargoShipSuccessTime = [0, 0, 0, 0, 0, 0, 0, 0];

function setTeleopCargoShipSuccessTime(num, i) {
    teleopCargoShipSuccessTime[i] = num;
}

var teleopHatchShipFailTime = [0, 0, 0, 0, 0, 0, 0, 0];

function setTeleopHatchShipFailTime(num, i) {
    teleopHatchShipFailTime[i] = num;
}

var teleopCargoShipFailTime = [0, 0, 0, 0, 0, 0, 0, 0];

function setCargoShipFailTime(num, i) {
    teleopCargoShipFailTime[i] = num;
}


var climb = [
    [0, 0, 0],
    [0, 0, 0]
    ];

function setClimb(num, i, j) {
    climb[i][j] = num;
}
    
var climbTime = [
    [0, 0, 0],
    [0, 0, 0]
    ];
  
function setClimbTime(num, i, j) {
    climbTime[i][j] = num;
}

var climbFail = [
    [0, 0, 0],
    [0, 0, 0]
    ];

function setClimbFail(num, i, j) {
    climbFail[i][j] = num;
}
    
var climbFailTime = [
    [0, 0, 0],
    [0, 0, 0]
    ];
  
function setClimbFailTime(num, i, j) {
    climbFailTime[i][j] = num;
}


//Button Dimensions (width, height, x, y]
//Color (red, green, blue]
//Stroke (red, green, blue, stroke-width]

var attributes = ['width', 'height', 'x', 'y'];
var texts = ['width', 'height','x', 'y', 'font-family', 'font-size', 'value'];

var ids = ['matchNumber', 'teamNumber', 'start', 'lRC','lRH'];

var setsDimensions = [ //The first dimension indexes match the indexes for the array ids.
                    [150, 30, 1340, 10],
                    [150, 30, 10, 10],
                    [150, 30, 675, 10],
                    [50, 50, 575, 575],
                    [50, 50, 655, 575]
                    ];

var setsColors = [ //The first dimension indexes match the indexes for the array ids.
                [150, 150, 150],
                [150, 150, 150],
                [150, 150, 150],
                [0, 0, 255],
                [0, 0, 255]
                ];

var textAttributes = [[150, 30, setsDimensions[0][2], setsDimensions[0][3] + 20, 'Times New Roman', 20, "Select Match"],
                    [150, 30, setsDimensions[1][2], setsDimensions[1][3] + 20, 'Times New Roman', 20, "Select Team"],
                    [150, 30, setsDimensions[2][2], setsDimensions[2][3] + 20, 'Times New Roman', 20, "START"],
                    [setsDimensions[3][0], setsDimensions[3][1], setsDimensions[3][2] + 5, setsDimensions[3][3] + 40, 'Times New Roman', 50, "C"],
                    [setsDimensions[4][0], setsDimensions[4][1], setsDimensions[4][2] + 5, setsDimensions[4][3] + 40, 'Times New Roman', 50, "H"]
                    ];

var textColors = [
                [255, 255, 255],
                [255, 255, 255],
                [255, 255, 255],
                [255, 255, 255],
                [255, 255, 255]
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

var lrcValues = ['C1', 'C2', 'C3', 'C4', 'C5', 'C6'];

function hideSVG(id) {
    var style = document.getElementById(id).style.display;
    if(style === "none")
        document.getElementById(id).style.display = "block";
    else
        document.getElementById(id).style.display = "none";
    //or to hide the all svg
    //document.getElementById("mySvg").style.display = "none";
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

function setTempButtons(values, f1, f2, f3, f4, f5, f6, p1, i1, p2, i2, p3, i3, p4, i4, p5, i5, p6, i6) {
    for(var i = 0;i < 6;i++) {
        var tempId = tempIds[i] + "Button";
        var tempId2 = tempIds[i] + "Text";
        document.getElementById(tempId2).value = values[i];
        document.getElementById(tempId2).innerHTML = values[i];
        document.getElementById(tempId2).onclick = f1(p1, i1);
        document.getElementById(tempId2).onclick = f1(p1, i1);
        document.getElementById(tempId2).onclick = f2(p2, i2);
        document.getElementById(tempId2).onclick = f2(p2, i2);
        document.getElementById(tempId2).onclick = f3(p3, i3);
        document.getElementById(tempId2).onclick = f3(p3, i3);
        document.getElementById(tempId2).onclick = f4(p4, i4);
        document.getElementById(tempId2).onclick = f4(p4, i4);
        document.getElementById(tempId2).onclick = f5(p5, i5);
        document.getElementById(tempId2).onclick = f5(p5, i5);
        document.getElementById(tempId2).onclick = f6(p6, i6);
        document.getElementById(tempId2).onclick = f6(p6, i6);
    }
}
/*
function setsTempButtons(values, f1, f2, f3, f4, f5, f6, p1, p2, p3, p4, p5, p6) {
    for(var i = 0;i < 6;i++) {
        var tempId = tempIds[i] + "Button";
        var tempId2 = tempIds[i] + "Text";
        document.getElementById(tempId2).value = values[i];
        document.getElementById(tempId2).innerHTML = values[i];
    }

    document.getElementById(tempIds[0] + "Button").onclick = function() {
        p1(f1);
    };
    /*
    document.getElementById(tempIds[0] + "Text").onclick = f1(p1);
    document.getElementById(tempIds[1] + "Button").onclick = f2(p2);
    document.getElementById(tempIds[1] + "Text").onclick = f2(p2);
    document.getElementById(tempIds[2] + "Button").onclick = f3(p3);
    document.getElementById(tempIds[2] + "Text").onclick = f3(p3);
    document.getElementById(tempIds[3] + "Button").onclick = f4(p4);
    document.getElementById(tempIds[3] + "Text").onclick = f4(p4);
    document.getElementById(tempIds[4] + "Button").onclick = f5(p5);
    document.getElementById(tempIds[4] + "Text").onclick = f5(p5);
    document.getElementById(tempIds[5] + "Button").onclick = f6(p6);
    document.getElementById(tempIds[5] + "Text").onclick = f6(p6);
    *\/
}
*/

function setTempButtons(values, v1, i1, v2, i2, v3, i3, v4, i4, v5, i5, v6, i6) {
    for(var i = 0;i < 6;i++) {
        var tempId = tempIds[i] + "Button";
        var tempId2 = tempIds[i] + "Text";
        document.getElementById(tempId2).value = values[i];
        document.getElementById(tempId2).innerHTML = values[i];
    }

    document.getElementById(values[0] + "Button").onclick = function(v1, i1) {
        v1[i1] += 1;
        alert(v1[i1]);
    };
    document.getElementById(values[0] + "Text").onclick = function(v1, i1) {
        v1[i1] += 1;
        alert(v1[i1]);
    };
    document.getElementById(values[1] + "Button").onclick = function(v2, i2) {
        v2[i2] += 1;
        alert(v2[i2]);
    };
    document.getElementById(values[1] + "Text").onclick = function(v2, i2) {
        v2[i2] += 1;
        alert(v2[i2]);
    };
    document.getElementById(values[2] + "Button").onclick = function(v3, i3) {
        v3[i3] += 1;
        alert(v3[i3]);
    };
    document.getElementById(values[2] + "Text").onclick = function(v3, i3) {
        v3[i3] += 1;
        alert(v3[i3]);
    };
    document.getElementById(values[3] + "Button").onclick = function(v4, i4) {
        v4[i4] += 1;
        alert(v4[i4]);
    };
    document.getElementById(values[3] + "Text").onclick = function(v4, i4) {
        v4[i4] += 1;
        alert(v4[i4]);
    };
    document.getElementById(values[4] + "Button").onclick = function(v5, i5) {
        v5[i5] += 1;
        alert(v5[i5]);
    };
    document.getElementById(values[4] + "Text").onclick = function(v5, i5) {
        v5[i5] += 1;
        alert(v5[i5]);
    };
    document.getElementById(values[5] + "Button").onclick = function(v6, i6) {
        v6[i6] += 1;
        alert(v6[i6]);
    };
    document.getElementById(values[5] + "Text").onclick = function(v6, i6) {
        v6[i6] += 1;
        alert(v6[i6]);
    };
}

function setTempButtons2(values, f1, f2, f3, f4, f5, f6, p1, i1, j1, p2, i2, j2, p3, i3, j3, p4, i4, j4, p5, i5, j5, p6, i6, j6) {
    for(var i = 0;i < 6;i++) {
        var tempId = tempIds[i] + "Button";
        var tempId2 = tempIds[i] + "Text";
        document.getElementById(tempId2).value = values[i];
        document.getElementById(tempId2).innerHTML = values[i];
        document.getElementById(tempId2).onclick = f1(p1, i1, j1);
        document.getElementById(tempId2).onclick = f1(p1, i1, j1);
        document.getElementById(tempId2).onclick = f2(p2, i2, j2);
        document.getElementById(tempId2).onclick = f2(p2, i2, j2);
        document.getElementById(tempId2).onclick = f3(p3, i3, j3);
        document.getElementById(tempId2).onclick = f3(p3, i3, j3);
        document.getElementById(tempId2).onclick = f4(p4, i4, j4);
        document.getElementById(tempId2).onclick = f4(p4, i4, j4);
        document.getElementById(tempId2).onclick = f5(p5, i5, j5);
        document.getElementById(tempId2).onclick = f5(p5, i5, j5);
        document.getElementById(tempId2).onclick = f6(p6, i6, j6);
        document.getElementById(tempId2).onclick = f6(p6, i6, j6);
    }
}

function print(str) {
    alert(str);
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
        document.getElementById(id2).style.fill = "rgb(" + textColors[i][0] + ", " + textColors[i][1] + ", " + textColors[i][2] + ")";
        document.getElementById(id2).style.stroke = "rgb(" + textColors[i][0] + ", " + textColors[i][1] + ", " + textColors[i][2] + ")";
        document.getElementById(id2).value = textAttributes[i][6];
        document.getElementById(id2).innerHTML = textAttributes[i][6];
    }

    tempButtons();
}