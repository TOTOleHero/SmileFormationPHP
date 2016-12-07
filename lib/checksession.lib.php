<?php

function createSession(){

    session_start();

    $_SESSION["connected"]=true;

    return true;
}

function destroySession(){

    $_SESSION = array();
    
    session_destroy();
    
    $_SESSION["connected"]=false;

    return false;
}

function isConnected(){
    
    session_start();

    if(isset($_SESSION["connected"]) && $_SESSION["connected"]==true){
            return true;
    }

   
}