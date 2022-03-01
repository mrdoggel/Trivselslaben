"use strict"

let $listelem; 
let $choice; 

document.addEventListener("DOMContentLoaded", waitOnLoad);

function waitOnLoad(){
    document.querySelector(".about").addEventListener("mouseover", showOmOssCoices);
    document.querySelector(".about").addEventListener("mouseleave", removeItems); 
    $choice = document.querySelectorAll(".about-choice");
    $choice.forEach((element)=> {
        element.addEventListener("mouseover", choiceStyle); 
    });
    $choice.forEach((element)=> {
        element.addEventListener("mouseleave", choiceStyleReset); 
    });
}

function showOmOssCoices(e){
    e.preventDefault(); 
    $listelem = document.querySelectorAll(".about-choice");
    $listelem.forEach((element)=>{
        element.style.display = "block";
    });
    document.querySelector(".about").style.margin = "auto auto 0rem auto";
    document.querySelector(".start").style.margin = "2rem auto auto auto"
}
function removeItems(e){
    e.preventDefault(); 
    $listelem = document.querySelectorAll(".about-choice");
    $listelem.forEach((element)=>{
        element.style.display = "none";
    });
    document.querySelector(".about").style.margin = "auto auto 5rem auto";
}

function choiceStyle(e){
    e.preventDefault();
    e.target.style.fontWeight = "bold";
}

function choiceStyleReset(e){
    e.preventDefault(); 
    e.target.style.color = "#1F294D";
    e.target.style.fontWeight = "normal";
}