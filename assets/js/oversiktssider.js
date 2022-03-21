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
    document.querySelector(`#${e.currentTarget.id} p`).style.fontWeight = "bold";  
    document.querySelector(`#${e.currentTarget.id} p`).style.fontWeight = "5%";  
    document.querySelector(`#${e.currentTarget.id} .bottom`).style.height = "60%";  
    document.querySelector(`#${e.currentTarget.id}`).style.width = "20%";
    document.querySelector(`#${e.currentTarget.id}`).parentElement.style.paddingBottom = "4rem";
    document.querySelector(`#${e.currentTarget.id}`).style.transition = "all 0.3s";
}

function kursLeave(e){
    e.preventDefault(); 
    document.querySelector(`#${e.currentTarget.id} p`).attributeStyleMap.delete("font-weight");
    document.querySelector(`#${e.currentTarget.id} p`).attributeStyleMap.delete("font-size");
    document.querySelector(`#${e.currentTarget.id} .bottom`).attributeStyleMap.delete("height");
    document.querySelector(`#${e.currentTarget.id}`).attributeStyleMap.delete("width");
    document.querySelector(`#${e.currentTarget.id}`).parentElement.attributeStyleMap.delete("padding-bottom"); 
}