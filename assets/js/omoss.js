"use strict";

document.addEventListener("DOMContentLoaded", init);

function init() {
  document.querySelector(".about").addEventListener("mouseover", showAboutChoices);
  document.querySelector(".about").addEventListener("mouseleave", hideAboutChoices);
  document.querySelector(".one").addEventListener("click", showChoiceOne);
  document.querySelector(".two").addEventListener("click", showChoiceTwo);
  document.querySelector(".three").addEventListener("click", showChoiceThree);

  const $choices = document.querySelectorAll(".about-choice");
  $choices.forEach((element) => {
    element.addEventListener("mouseover", choiceHoverStyle);
  });
  $choices.forEach((element) => {
    element.addEventListener("mouseleave", choiceHoverStyleReset);
  });
}

function showAboutChoices(e) {
  e.preventDefault();
  const $listelem = document.querySelectorAll(".about-choice");
  $listelem.forEach((element) => {
    element.style.display = "block";
  });
  document.querySelector(".about").style.margin = "auto auto 0rem auto";
  document.querySelector(".start").style.margin = "2rem auto auto auto";
}

function hideAboutChoices(e) {
  e.preventDefault();
  const $listelem = document.querySelectorAll(".about-choice");
  $listelem.forEach((element) => {
    element.style.display = "none";
  });
  document.querySelector(".about").style.margin = "auto auto 5rem auto";
}

function choiceHoverStyle(e) {
  e.preventDefault();
  e.target.style.fontWeight = "bold";
  e.target.style.cursor = "pointer";
}

function choiceHoverStyleReset(e) {
  e.preventDefault();
  e.target.style.color = "#1F294D";
  e.target.style.fontWeight = "normal";
}

function showChoiceOne(e) {
  e.preventDefault();
  hideChoicesAndHeading();
  document.querySelector(".om-oss.trivselslaben").classList.remove("hidden");
  document.querySelector(".om-oss.trivselslaben").style.width = "100%"; 
}

function showChoiceTwo(e) {
  e.preventDefault();
  hideChoicesAndHeading();
  document.querySelector(".om-oss.plattformen").classList.remove("hidden");
}

function showChoiceThree(e) {
  e.preventDefault();
  hideChoicesAndHeading();
  document.querySelector(".om-oss.bakgrunn").classList.remove("hidden");
}

function hideChoicesAndHeading() {
  let $choices = document.querySelectorAll(".om-oss");
  $choices.forEach((element) => {
    element.classList.add("hidden");
  });
  document.querySelector(".colorsection h1").classList.add("hidden");
}
