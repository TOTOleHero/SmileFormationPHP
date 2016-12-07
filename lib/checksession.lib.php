<?php

function createSession(){

    session_start();

    $_SESSION["connected"]=true;

    return true;
}

function destroySession(){
    session_start();
    $_SESSION = array();
    
    session_destroy();
   
    return true;
}

function isConnected(){
    
    session_start();

    if(isset($_SESSION["connected"]) && $_SESSION["connected"]==true){
            return true;
    }

   
}