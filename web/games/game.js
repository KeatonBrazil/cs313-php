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
    var x = document;
    x.getElementById("tit").value = "";
    x.getElementById("tlmin").value = "";
    x.getElementById("cmplx").value = "";
    x.getElementById("nplayers").value = "";
    x.getElementById("num_pub").value = 1;
    x.getElementById("show_pub").innerHTML = "Publisher 1:<span class='red'>*</span><br><input type='text' id='pub1' name='pub0'><br>";
    x.getElementById("text").value = "";
}

function numPub() {
    document.getElementById("show_pub").innerHTML = "Publisher 1:<span class='red'>*</span><br><input type='text' id='pub1' name='pub0'><br>";
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
    for (var i=1; i < count; i++) {
        var newi = i + 1;
        var input = document.getElementById("show_pub");
        input.innerHTML = input.innerHTML + "Publisher "+newi+":<span class='red'>*</span><br><input type='text' id='pub"+newi+"' name='pub" + i + "'><br>";
    }
}

function validate() {
    var title = document.getElementById("tit");
    var time_length = document.getElementById("tlmin");
    var comp = document.getElementById("cmplx");
    var nplayers = document.getElementById("nplayers");
    var pub1 = document.getElementById("pub1");
    var pub2 = document.getElementById("pub2");
    var pub2 = document.getElementById("pub3");
    var pub2 = document.getElementById("pub4");
    var pub2 = document.getElementById("pub5");
    var pub2 = document.getElementById("pub6");

    if (title.value === "" || title.value === null) {
        document.getElementById("noTitle").innerHTML = "You must include a title";
        console.log(title.value);
        console.log("bad");
        return false;
    } 
    console.log(title.value);
    console.log("good");
    return true;

}