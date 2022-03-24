"use strict"

let $inputFelter; 
let $bilde; 

document.addEventListener("DOMContentLoaded", init); 

function init(){
    $inputFelter = document.querySelectorAll("input"); 
    $inputFelter.forEach((element)=>{
        element.addEventListener("blur", settStyle); 
    });

    document.querySelector("#last-opp-btn").addEventListener("mouseover", sjekkOpplastning); 
    document.querySelector("#last-opp-btn").addEventListener("mouseleave", sjekkOpplastning); 
}

function settStyle(e){
    e.preventDefault();
    const $containerID = e.target.parentElement.parentElement.id; 
    if(e.target.value != ""){
        $containerID == "navn" ? e.target.style = "background-color: rgb(252	156	127 / 15%); border: none; font-size: 1.5rem; font-weight:lighter; box-shadow: 1px 10px 15px 1px rgb(0 0 0 / 5%);" : "";
        $containerID == "e-post" ? e.target.style = "background-color: rgb(182	243	171 / 15%); border: none; font-size: 1.5rem; font-weight:lighter; box-shadow: 1px 10px 15px 1px rgb(0 0 0 / 5%);" : "";
        $containerID == "passord" ? e.target.style = "background-color: rgb(149	227	236 / 15%); border: none; font-size: 1.5rem; font-weight:lighter; box-shadow: 1px 10px 15px 1px rgb(0 0 0 / 5%);" : ""; 
    }
    else{
        e.target.style.backgroundColor = ""; 
        e.target.style.border = "";
        e.target.style.fontSize = "";
        e.target.style.fontWeight = ""; 
    }
}

function sjekkOpplastning(e){
    e.preventDefault(); 
    $bilde = document.querySelector("input[type=file]")
    if ($bilde.value != ""){
        document.querySelector("#last-opp-btn").innerHTML = `${$bilde.value.split('\\').pop()}`;
        document.querySelector("#last-opp-btn").style = "background-color: rgb(171	187	243 / 15%); border: none; box-shadow: 1px 10px 15px 1px rgb(0 0 0 / 5%);"
        console.log($bilde.value)
    }
}