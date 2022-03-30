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

    const $inputFelt = document.querySelector(`#${e.target.parentNode.id} form:last-of-type input:last-of-type`);
    const $inputFelt2 = document.querySelector(`#${e.target.parentNode.id} form:last-of-type input:last-of-type`);
    $inputFelt.value = e.target.innerHTML;
    $inputFelt2.value = e.target.innerHTML;

    const $alleSvar = document.querySelectorAll(`#${e.target.parentNode.id} div`);
    $alleSvar.forEach((element)=>{
        element.classList.remove("valgt-svar");
    })
    e.target.classList.add("valgt-svar");
}