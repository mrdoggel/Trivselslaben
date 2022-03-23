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
    });

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
    let id; 

    if(parentClass == "intvalg1"){
        id = "valg1"; 
        e.target.classList.toggle("valgt");
        e.target.classList.toggle("valgt-en");
        e.target.classList.contains("valgt-en") ? settInnInteresse(clickedInterest, id) : fjernInteresse(id); 
    }
    if(parentClass == "intvalg2"){
        id = "valg2"; 
        e.target.classList.toggle("valgt");
        e.target.classList.toggle("valgt-to");
        e.target.classList.contains("valgt-to") ? settInnInteresse(clickedInterest, id) : fjernInteresse(id);
    }
    if(parentClass == "intvalg3"){
        id = "valg3"; 
        e.target.classList.toggle("valgt");
        e.target.classList.toggle("valgt-tre");
        e.target.classList.contains("valgt-tre") ? settInnInteresse(clickedInterest, id) : fjernInteresse(id);
    }
    if(parentClass == "intvalg4"){
        id = "valg4"; 
        e.target.classList.toggle("valgt");
        e.target.classList.toggle("valgt-fire");
        e.target.classList.contains("valgt-fire") ? settInnInteresse(clickedInterest, id) : fjernInteresse(id);
    }
    if(parentClass == "intvalg5"){
        id = "valg5"; 
        e.target.classList.toggle("valgt");
        e.target.classList.toggle("valgt-fem");
        e.target.classList.contains("valgt-fem") ? settInnInteresse(clickedInterest, id) : fjernInteresse(id);
    }
    if(parentClass == "intvalg6"){
        id = "valg6";
        e.target.classList.toggle("valgt");
        e.target.classList.toggle("valgt-seks");
        e.target.classList.contains("valgt-seks") ? settInnInteresse(clickedInterest, id) : fjernInteresse(id);
        //e.target.classList.contains("valgt-seks") ? sessionStorage.setItem("valg6", clickedInterest) : sessionStorage.removeItem("valg6"); 
    }
}

function settInnInteresse(interesse, id){ 
    //document.querySelector("#send-interesser").insertAdjacentHTML("afterbegin", `<input type="hidden" id="${id}" name="${id}" value="${interesse}">`); 
    var numb = id.match(/\d/g);
        numb = numb.join("");
    document.querySelector(`#${id}`).value = numb;
    console.log(document.querySelector("#send-interesser").innerHTML);
}

function fjernInteresse(id){
    //document.querySelector(`#${id}`).remove(); 
    document.querySelector(`#${id}`).value = ""; 
    console.log(document.querySelector("#send-interesser").innerHTML);
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