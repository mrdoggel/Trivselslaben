"use strict"

document.addEventListener("DOMContentLoaded", init);

function init() {
    const $kurs = document.querySelectorAll("section .kurs");
    $kurs.forEach((element)=> {
        element.addEventListener("mouseover", kursHover);
        element.addEventListener("mouseleave", kursLeave);
    });
}

function kursHover(e){
    e.preventDefault(); 
    document.querySelector(`#${e.currentTarget.id} p`).style.fontSize = "larger";
    document.querySelector(`#${e.currentTarget.id} p`).style.fontWeight = "normal";    
}

function kursLeave(e){
    e.preventDefault(); 
    document.querySelector(`#${e.currentTarget.id} p`).attributeStyleMap.delete("font-weight");
    document.querySelector(`#${e.currentTarget.id} p`).attributeStyleMap.delete("font-size");
}