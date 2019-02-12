function setScores(mainScoutInformation, autoRockets, autoShip, teleopRockets, teleopShip) {
    var allScores = [];

    for(var i = 0;i < mainScoutInformation.length;i++) {
        var scores = new Array();
        if(mainScoutInformation[i][1] === "L2") {
            scores.push(1);
        }
        else if(mainScoutInformation[i][1] === "L3") {
            scores.push(4);
        }
        else {
            scores.push(0);
        }
        switch(mainScoutInformation[i][3]) {
            case "L1":
                scores.push(1);
                break;
            case "L2":
                scores.push(5);
                break;
            case "L3":
                scores.push(10);
                break;
            default:
                scores.push(0);
        }
        if(mainScoutInformation[i][6] === "No Yellow Card.") {
            scores.push(0);
        }
        else {
            scores.push(-5);
        }
        if(mainScoutInformation[i][7] === "No Red Card.") {
            scores.push(0);
        }
        else {
            scores.push(-20);
        }
        if(mainScoutInformation[i][8] === "No other fouls.") {
            scores.push(0);
        }
        else {
            scores.push(-5);
        }
        switch(mainScoutInformation[i][9]) {
            case "Not Defensive":
                scores.push(0);
                break;
            case "Somewhat Defensive":
                scores.push(1);
                break;
            case "Very Defensive":
                scores.push(2);
                break;
            default:
                scores.push(0);
                break;
        }
        if(mainScoutInformation[i][10] === "Yes") {
            if(mainScoutInformation[i][11] === "Yes") {
                scores.push(1);
            }
            else {
                scores.push(-5);
            }
        }
        else {
            scores.push(0);
        }
        if(mainScoutInformation[i][12] === "Yes") {
            scores.push(5);
        }
        else {
            scores.push(0);
        }
        
        allScores.push(new Array());
        allScores[i].push(scores);
    }
    return allScores;
}