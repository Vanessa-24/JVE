// for color picker
var colours = document.getElementsByClassName("colour-circle");
for(var i =0; i <colours.length; i++){
    colours[i].addEventListener("click", changeColour);
}
// toggle the selected style on the colour
function changeColour(){
    document.getElementsByClassName("colour-circle selected")[0].classList.remove("selected");
    this.classList.add("selected");
}