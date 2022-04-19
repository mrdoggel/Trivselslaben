"use strict"

document.addEventListener("DOMContentLoaded", init);

function init() { 
    const $valg = document.querySelectorAll("#top-nav li");
    $valg.forEach((element)=>{
        element.classList.remove("top-nav-active"); 
    })
    window.location.href.includes("forside") ? document.querySelector("#nav-forside").classList.add("top-nav-active") : ""; 
    window.location.href.includes("p%C3%A5begynt") ? document.querySelector("#nav-forside").classList.add("top-nav-active") : ""; 
    window.location.href.includes("fullf%C3%B8rt") ? document.querySelector("#nav-forside").classList.add("top-nav-active") : ""; 
    window.location.href.includes("urs") ? document.querySelector("#nav-kurs").classList.add("top-nav-active") : ""; 
    window.location.href.includes("odul") ? document.querySelector("#nav-moduler").classList.add("top-nav-active") : ""; 
    window.location.href.includes("minside") ? document.querySelector("#nav-min-side").classList.add("top-nav-active") : ""; 
    window.location.href.includes("Quizer") ? document.querySelector("#nav-quiz").classList.add("top-nav-active") : ""; 

}