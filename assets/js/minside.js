"use strict"

document.addEventListener("DOMContentLoaded", init);

function init() {

  document.querySelector(".søk-input").addEventListener("mouseover", inputFokus);
  document.querySelector(".dropdown").addEventListener("mouseleave", inputFokusReset);
  document.querySelector("#myInput").addEventListener("keyup", filterListe);

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

  const input = e.target.value.toUpperCase();
  const $alleValg = document.querySelectorAll("#myDropdown button");
  let valg;

  $alleValg.forEach((element)=>{
    valg = element.innerText.toUpperCase();
    valg.indexOf(input) > -1 ? element.style.display = "" : element.style.display = "none";
  });
}
