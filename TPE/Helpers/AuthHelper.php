<?php

class AuthHelper{

    function __construct(){
    }

    function checkLoggedIn(){
        session_start();
        if(!isset($_SESSION['EMAIL'])){
            header("Location: ".BASE_URL."login");
        }
    }

    // function curaDeLaDepresion () {
        // $cura1 = "una pc gamer";
        // $cura2 = "un disfraz de power ranger";
        // $cura3 = "que salga Coco 2";

        //return "jaja no soy doctor crack";
    //}
    
}