"use strict"

document.addEventListener("DOMContentLoaded", init);

function init() {
  document.querySelector("#bruker-info").addEventListener("click", visBrukerInfo);
  document.querySelector("#bruker-interesser").addEventListener("click", visBrukerInteresser);
  document.querySelector("#bruker-lagret").addEventListener("click", visBrukerLagret); 

  document.querySelector(".søk-input").addEventListener("mouseover", inputFokus);
  document.querySelector(".dropdown").addEventListener("mouseleave", inputFokusReset);
  document.querySelector("#myInput").addEventListener("keyup", filterListe);

}

function visBrukerInfo(e){
  e.preventDefault(); 
  settValgtStil(e.target); 
  document.querySelector(".personling-info").id = ""
  document.querySelector(".interesser").id = "hidden"; 
  document.querySelector(".lagret").id = "hidden"; 
}

function visBrukerInteresser(e){
  e.preventDefault(); 
  settValgtStil(e.target);
  document.querySelector(".personling-info").id = "hidden"
  document.querySelector(".interesser").id = "";
  document.querySelector(".lagret").id = "hidden"; 
}

function visBrukerLagret(e){
  e.preventDefault(); 
  settValgtStil(e.target);
  document.querySelector(".personling-info").id = "hidden"
  document.querySelector(".interesser").id = "hidden";
  document.querySelector(".lagret").id = ""; 
}

function settValgtStil(menyValg){
  const $minSideMeny = document.querySelectorAll("#admin-nav li"); 
  $minSideMeny.forEach((element)=>{
    element.classList.remove("side-nav-valgt"); 
  });
  menyValg.classList.add("side-nav-valgt"); 
}

function inputFokus(e){
  e.preventDefault();
  e.target.placeholder = ""; 
  console.log("hallo fra dropdown input"); 
  document.querySelector("#myDropdown").classList.add("show"); 
}

function inputFokusReset(e) {
  e.preventDefault();
  const $inputFelt = document.querySelector("#myInput"); 
  $inputFelt.placeholder == "" ? $inputFelt.placeholder = "Søk og finn interesser ..." : ""; 
  document.querySelector("#myDropdown").classList.remove("show");
} 

function filterListe(e) {
  e.preventDefault();

  console.log("hallo")
  
  const input = e.target.value.toUpperCase();
  const $alleValg = document.querySelectorAll("#myDropdown button");
  let valg;

  $alleValg.forEach((element)=>{
    valg = element.innerText.toUpperCase();
    valg.indexOf(input) > -1 ? element.style.display = "" : element.style.display = "none"; 
  });
}
