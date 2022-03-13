"use strict";

document.addEventListener("DOMContentLoaded", init);

function init() {
    const $process = document.querySelectorAll(".valg");
    $process.forEach((element)=> {
        element.addEventListener("click", storeProcessChoice);
    });

    /*const $interessevalg = document.querySelectorAll(".intvalg"); 
    $interessevalg.forEach((element)=> {
        element.addEventListener("click", choiceEffect);
    });*/
    const $interessevalg = document.querySelectorAll(".intvalg p"); 
    $interessevalg.forEach(function($choice){
        $choice.addEventListener("click", choiceEffect); 
    })

    const $bedrifttype = document.querySelectorAll(".bedrifttype");
    $bedrifttype.forEach((element)=> {
        element.addEventListener("mouseover", showDescription); 
        element.addEventListener("mouseleave", hideDescription); 
    });
}

function storeProcessChoice(e){
    e.preventDefault();
    sessionStorage.setItem("prosessvalg", e.target.innerHTML); 

    document.querySelector(".spm-1").classList.add("hidden"); 
    document.querySelector("#spm-prosess").id = "hidden"; 
    const $valgProsess = document.querySelectorAll(".info-container"); 
    $valgProsess.forEach((element) => {
        element.classList.add("hidden"); 
    });

    if(e.target.innerHTML == document.querySelector(".valg1").innerHTML){
        document.querySelector(".spm-2").classList.remove("hidden"); 
        document.querySelector(".bedrift-div").id = "spm-bedrift"; 
    }
    else {
        document.querySelector(".spm-3").classList.remove("hidden");
        document.querySelector(".interesse-div").id = "spm-interesser"; 
    }
}



function choiceEffect(e){
    e.preventDefault(); 
    const clickedInterest = e.target.innerHTML; 
    const parentClass = e.target.parentElement.className;

    if(parentClass == "intvalg1"){
        e.target.classList.toggle("valgt");
        e.target.classList.toggle("valgt-en");
        e.target.classList.contains("valgt-en") ? sessionStorage.setItem("valg1", clickedInterest) : sessionStorage.removeItem("valg1");
    }
    if(parentClass == "intvalg2"){
        e.target.classList.toggle("valgt");
        e.target.classList.toggle("valgt-to");
        e.target.classList.contains("valgt-to") ? sessionStorage.setItem("valg2", clickedInterest) : sessionStorage.removeItem("valg2");
    }
    if(parentClass == "intvalg3"){
        e.target.classList.toggle("valgt");
        e.target.classList.toggle("valgt-tre");
        e.target.classList.contains("valgt-tre") ? sessionStorage.setItem("valg3", clickedInterest) : sessionStorage.removeItem("valg3");
    }
    if(parentClass == "intvalg4"){
        e.target.classList.toggle("valgt");
        e.target.classList.toggle("valgt-fire");
        e.target.classList.contains("valgt-fire") ? sessionStorage.setItem("valg4", clickedInterest) : sessionStorage.removeItem("valg4");
    }
    if(parentClass == "intvalg5"){
        e.target.classList.toggle("valgt");
        e.target.classList.toggle("valgt-fem");
        e.target.classList.contains("valgt-fem") ? sessionStorage.setItem("valg5", clickedInterest) : sessionStorage.removeItem("valg5");
    }
    if(parentClass == "intvalg6"){
        e.target.classList.toggle("valgt");
        e.target.classList.toggle("valgt-seks");
        e.target.classList.contains("valgt-seks") ? sessionStorage.setItem("valg6", clickedInterest) : sessionStorage.removeItem("valg6"); 
    }
}

//Vis bedriftinfo
function showDescription(e){
    e.preventDefault(); 
    if(e.target == e.currentTarget){
        e.target.lastElementChild.classList.remove("hidden"); 
    }
    document.querySelector(`#${e.currentTarget.id}`).style.maxHeight = "fit-content"; 
}

function hideDescription(e){
    e.preventDefault(); 
    if(e.target == e.currentTarget){
        e.target.lastElementChild.classList.add("hidden");
    }
    document.querySelector(`#${e.currentTarget.id}`).style.maxHeight = ""; 
}