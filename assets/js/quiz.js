"use strict"

document.addEventListener("DOMContentLoaded", init);

function init() {
    const $merValg = document.querySelectorAll(".mer"); 
    $merValg.forEach((element)=>{
        element.addEventListener("click", flereValg); 
    })

    const $overlap = document.querySelectorAll(".overlap"); 
    $overlap.forEach((element)=> {
        element.addEventListener("mouseleave", fjernAlleVlag);
    })
}

function flereValg(e) {
    e.preventDefault(); 
    const $overlap = document.querySelector(`#${e.target.parentNode.id} .overlap`);
    $overlap.classList.toggle("hidden"); 
}

function fjernAlleVlag(e){
    const $alleValg = document.querySelectorAll(".overlap"); 
    $alleValg.forEach((element)=>{
        element.classList.contains("hidden") ? "" : element.classList.add("hidden"); 
    })
}