"use strict"

document.addEventListener("DOMContentLoaded", init); 

function init(){
    document.querySelector("#registrer").addEventListener("click", sendInteresser); 
}

function sendInteresser(e){
    e.preventDefault();
    const alleValg = ["valg1", "valg2", "valg3", "valg4", "valg5", "valg6"];
    const $regform = document.querySelector("#regform");

    alleValg.forEach((valg) => {
        if(sessionStorage.getItem(valg) == null){
            $regform.insertAdjacentHTML("afterbegin", `<input type="hidden" id="${valg}" name="${valg}" value="null">`);
            //console.log(`${valg} er ikke blitt valgt:-)`)
        }
        else{
            $regform.insertAdjacentHTML("afterbegin", `<input type="hidden" id="${valg}" name="${valg}" value="${sessionStorage.getItem(valg)}">`);
            //console.log(`${valg} er blitt valgt med verdi: ${sessionStorage.getItem(valg)}`)
        }
    });

    //console.log(document.querySelector("#regform").innerHTML); 
}

