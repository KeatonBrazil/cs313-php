function changePic () {    
    if (document.getElementById("us").src = "us.jpg") {
    document.getElementById("us").src = "her.JPG";
    console.log(document.getElementById("us").src);
    } else if  (document.getElementById("us").src = "her.JPG") {
        document.getElementById("us").src = "us.jpg";
    } console.log(document.getElementById("us").src);
}