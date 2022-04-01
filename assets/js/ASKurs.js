"use strict";

let slideIndex = 1;

document.addEventListener("DOMContentLoaded", init);

function init() {
    const $choices = document.querySelectorAll(".under-overskrift");
    $choices.forEach((element) => {
        element.addEventListener("click", visInnhold);
    });

    const $dotter = document.querySelectorAll(".dot"); 
    $dotter.forEach((element) => {
      element.addEventListener("click", gåTilSlide); 
    })

    document.querySelector(".forrige").addEventListener("click", endreSlide);
    document.querySelector(".neste").addEventListener("click", endreSlide);
}

function visInnhold(e){
    e.preventDefault();
    document.querySelector(`#${e.target.parentNode.id} div`).classList.toggle("hidden");
    e.target.classList.toggle("åpen");
    document.querySelector(`#${e.target.parentNode.id} div`).id = "hidden" ? document.querySelector(`#${e.target.parentNode.id} div`).id = "" : ""; 
    showSlides(1); 
}

function endreSlide(e) {
  e.preventDefault();
  e.target.classList.contains("forrige") ? showSlides(slideIndex += -1) : showSlides(slideIndex += 1); 
}

function gåTilSlide(e){
  e.preventDefault(); 
  const dotID = e.target.id.split("-").pop(); 
  dotID == "en" ? showSlides(slideIndex = 1) : ""; 
  dotID == "to" ? showSlides(slideIndex = 2) : ""; 
  dotID == "tre" ? showSlides(slideIndex = 3) : ""; 
  dotID == "fire" ? showSlides(slideIndex = 4) : "";
  dotID == "fem" ? showSlides(slideIndex = 5) : "";
}

function showSlides(n) {
  
  const slides = document.querySelectorAll(".steg"); 
  const dotter = document.querySelectorAll(".dot");

  n > slides.length ? slideIndex = 1 : ""; 
  n < 1 ? slideIndex = slides.length : ""; 

  slides.forEach((element)=>{
    element.style.display = "none"; 
  })
  slides[slideIndex-1].style.display = "block";  
  
  dotter.forEach((element)=>{
    element.classList.remove("active");
  });
  dotter[slideIndex-1].classList.add("active");  
}