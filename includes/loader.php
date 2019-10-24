<!DOCTYPE html>

<head>
<?php
//Učitava se css preko php fajla head
include_once 'head.php';
?>
</head>

<div id="prekrivac">
<!-- Elementi za animaciju stranice za učitavanje. Keyframes su definisani u css fajlu-->
    <div id="ucitavanje">
    <div class="krug mr-2"></div>
        <div class="slovo" id="slovo_L">L</div>
        <div class="slovo" id="slovo_A">A</div>
        <div class="slovo" id="slovo_P">P</div>
        <div class="slovo" id="slovo_T">T</div>
        <div class="slovo" id="slovo_O">O</div>
        <div class="slovo" id="slovo_P2">P</div>
        <div class="slovo" id="slovo_D">D</div>
        <div class="slovo" id="slovo_R">R</div>
        <div class="slovo" id="slovo_O2">O</div>
        <div class="slovo" id="slovo_M">M</div>
        <div class="krug ml-2"></div>
    </div>
   
</div>

<script>
    let prekrivac = document.getElementById("prekrivac");
//Animacija traje 1.7 sekundi što je određeno funkcijom setTimeout. Ceo element nakon toga dobija svojstvo display: none
function load_page(){
    setTimeout(function(){window.onload = prekrivac.style.display = "none";},1700)
}
load_page();
</script>