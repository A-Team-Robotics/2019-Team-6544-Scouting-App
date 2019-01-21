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

var ids = ['matchNumber', 'teamNumber', 'start', 'lRCS', 'lRCF','lRHS','lRHF'];

var setsDimensions = [ //The first dimension indexes match the indexes for the array ids.
                    [150, 30, 1340, 10],
                    [150, 30, 10, 10],
                    [150, 30, 675, 10],
                    [50, 50, 605, 605],
                    [25, 25, 605, 579],
                    [25, 25, 605, 553],
                    [25, 25, 645, 605]
                    ];

var setsColors = [ //The first dimension indexes match the indexes for the array ids.
                [150, 150, 150],
                [150, 150, 150],
                [150, 150, 150],
                [0, 255, 0],
                [0, 255, 0],
                [0, 255, 0],
                [255, 0, 0]
                ];

var textAttributes = [[150, 30, setsDimensions[0][2], setsDimensions[0][3] + 20, 'Times New Roman', 20, "Select Match"],
                    [150, 30, setsDimensions[1][2], setsDimensions[1][3] + 20, 'Times New Roman', 20, "Select Team"],
                    [150, 30, setsDimensions[2][2], setsDimensions[2][3] + 20, 'Times New Roman', 20, "START"],
                    [setsDimensions[3][0], setsDimensions[3][1], setsDimensions[3][2] + 3, setsDimensions[3][3] + 17, 'Times New Roman', 17, "C1"],
                    [setsDimensions[4][0], setsDimensions[4][1], setsDimensions[4][2] + 3, setsDimensions[4][3] + 17, 'Times New Roman', 17, "C2"],
                    [setsDimensions[5][0], setsDimensions[5][1], setsDimensions[5][2] + 3, setsDimensions[5][3] + 17, 'Times New Roman', 17, "C3"],
                    [setsDimensions[6][0], setsDimensions[6][1], setsDimensions[6][2] + 3, setsDimensions[6][3] + 17, 'Times New Roman', 17, "C1"]
                    ];

var textColors = [
                [255, 255, 255],
                [255, 255, 255],
                [255, 255, 255],
                [255, 255, 255],
                [255, 255, 255],
                [255, 255, 255],
                [255, 255, 255]
                ];

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
}