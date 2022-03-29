"use strict"

document.addEventListener("DOMContentLoaded", init);

function init() {
    const $alleSvar = document.querySelectorAll(".svr"); 
    $alleSvar.forEach((element)=>{
        element.addEventListener("click", velg);
    })
}

function velg(e){
    e.preventDefault(); 
    console.log(e.target);
}