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

    const $alleSvar = document.querySelectorAll(`#${e.target.parentNode.id} div`);
    $alleSvar.forEach((element)=>{
        element.classList.remove("valgt-svar");
    })
  
    document.querySelector(`#${e.target.parentNode.id} input`).value = e.target.innerHTML;
    e.target.classList.add("valgt-svar");
}