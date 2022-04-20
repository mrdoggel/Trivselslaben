"use strict"

document.addEventListener("DOMContentLoaded", init); 

function init(){
    document.querySelector("#poeng-info").addEventListener("click", visPoengInfo);  
}

function visPoengInfo(e){
    e.preventDefault(); 
    document.querySelector(".poeng-info-txt").classList.toggle("hidden"); 
}