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
    input.innerHTML = "";
    var x = document.getElementById("num_pub");
    var input = document.getElementById("show_pub");
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
        input.innerHTML = input.innerHTML + "<input type='text' name='pub" + i + "'><br>";
    }
}

