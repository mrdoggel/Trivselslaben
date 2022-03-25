"use strict"

document.addEventListener("DOMContentLoaded", init);

function init() {
  //#TODO Legg inn noe style på navigasjonen så man ser hvilken side man er på 
  document.querySelector("#bruker-info").addEventListener("click", visBrukerInfo)
  document.querySelector("#bruker-interesser").addEventListener("click", visBrukerInteresser)
  document.querySelector("#myInput").addEventListener("click", inputFokus); 
  document.querySelector("#myInput").addEventListener("blur", inputFokusReset);
  document.querySelector("#myInput").addEventListener("keyup", filterListe);
}

function visBrukerInfo(e){
  e.preventDefault(); 
  document.querySelector(".personling-info").id = ""
  document.querySelector(".interesser").id = "hidden"; 
}

function visBrukerInteresser(e){
  e.preventDefault(); 
  document.querySelector(".personling-info").id = "hidden"
  document.querySelector(".interesser").id = "";
}

function inputFokus(e){
  e.preventDefault(); 
  e.target.placeholder = ""; 
  document.querySelector("#myDropdown").classList.add("show"); 
}

function inputFokusReset(e) {
  e.preventDefault();
  e.target.placeholder == "" ? e.target.placeholder = "Legg til interesser..." : ""; 
  document.querySelector("#myDropdown").classList.remove("show");
} 

function filterListe(e) {
  e.preventDefault();
  
  const input = e.target.value.toUpperCase();
  const $alleValg = document.querySelectorAll("#myDropdown button");
  let valg;

  $alleValg.forEach((element)=>{
    valg = element.innerText.toUpperCase();
    valg.indexOf(input) > -1 ? element.style.display = "" : element.style.display = "none"; 
  });
}