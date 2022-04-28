"use strict"

document.addEventListener("DOMContentLoaded", init); 

function init(){
    document.querySelector("#start-modul").addEventListener("click", visModul);  
}

function visModul(e){
    e.preventDefault(); 
    document.querySelector(".modul-info-container").id = "hidden"; 
    document.querySelector(".modul-innhold-container").classList.remove("hidden");
}