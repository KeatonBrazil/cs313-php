function changePic () {
    doc = document.getElementById("us").src;
    picUs = document.getElementById("us").src = "us.jpg";
    picBaby = document.getElementById("us").src = "ultrasound.jpg";
    
    if (doc == "us.jpg") {
        doc = "ultrasound.jpg"
    } else {
        doc = "us.jpg"
    }

}