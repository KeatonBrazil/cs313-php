var image = "first"; 

function changePic () {  
    var pic = document.getElementById("us");  
    if (image == "first") {
        pic.src = "her.JPG";
        image = "second";
    } else if (image == "second") {
        pic.src = "us.jpg";
        image = "first";
    }
}