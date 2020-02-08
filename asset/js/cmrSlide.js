"use strict";
var fig = document.querySelector(".slider");
var imgs = document.querySelectorAll(".slider img");
var sliding = 0;
var limit = window.innerWidth*imgs.length;
var activeSlide;
function slide()
{
    if(sliding>-limit)
    {
        sliding -= window.innerWidth;
        fig.style.left=sliding+"px";
    }
    if(sliding<=-limit)
    {
        sliding=0;
        fig.style.left="0px";
    }  
}
function startSlide(){
    activeSlide= window.setInterval(slide,3000);
}
document.addEventListener("DOMContentLoaded",()=>{
   startSlide();
});