"use strict"

document.addEventListener("DOMContentLoaded", init);

function init() { 
    const $valg = document.querySelectorAll("#top-nav li");
    $valg.forEach((element)=>{
        element.classList.remove("top-nav-active"); 
    })
    window.location.href.includes("forside") ? document.querySelector("#nav-forside").classList.add("top-nav-active") : ""; 
    window.location.href.includes("minside") ? document.querySelector("#nav-min-side").classList.add("top-nav-active") : ""; 
    window.location.href.includes("quiz") ? document.querySelector("#nav-quiz").classList.add("top-nav-active") : ""; 
}