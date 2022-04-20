"use strict"

document.addEventListener("DOMContentLoaded", init); 

function init(){
    document.querySelector("#rep-spm-info").addEventListener("click", visRepInfo);  
}

function visRepInfo(e){
    e.preventDefault(); 
    document.querySelector(".rep-spm-info-txt").classList.toggle("hidden"); 
}