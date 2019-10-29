function hide() {
    var x = document.getElementById("dude");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

function cancel() {
    window.location.href = "main.php#return";
}

function reset() {
    window.location.href = "newGame.php#return";
}

function numPub() {
    document.getElementById("show_pub").innerHTML = "";
    var x = document.getElementById("num_pub");
    var count = 0;
    if (x.value == 1) {
        count = 1;
    } else if (x.value == 2) {
        count = 2;
    } else if (x.value == 3) {
        count = 3; 
    } else if (x.value == 4) {
        count = 4;
    } else if (x.value == 5) {
        count = 5;
    } else if (x.value == 6) {
        count = 6;
    }
    for (var i=0; i < count; i++) {
        var newi = i + 1;
        var input = document.getElementById("show_pub");
        if (newi===1) {
        input.innerHTML = input.innerHTML + "Publisher "+newi+":<span class='red'>*</span><br><input type='text' name='pub" + i + "'><br>";
        } else {input.innerHTML = input.innerHTML + "Publisher "+newi+":<br><input type='text' name='pub" + i + "'><br>";}
    }
}

