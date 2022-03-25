"use strict"

document.addEventListener("DOMContentLoaded", init);

function init() {
  $oppdaterInfo = document.querySelector(".personlig-info"); 
  if($oppdaterInfo.id != "hidden"){
    document.querySelector("ul li:nth-child(2)").classList.add("aktiv")
  }
}

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.add("show");
}

function myFunction2() {
  document.getElementById("myDropdown").classList.remove("show");
}

function openFileSelection() {
  $('#bilde').focus().trigger('click');
}

function submitBilde(){
  document.getElementById("bildeUpload").submit();// Form submission
}

function bildeMouseover() {
    document.getElementById("bilde-i-bilde").style.display="block";
    document.getElementById("outer-image").classList.toggle("linkStyle");
}

function bildeMouseoverRemove() {
    document.getElementById("bilde-i-bilde").style.display="none";
    document.getElementById("outer-image").classList.toggle("linkStyle");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("button");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}