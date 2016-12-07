<?php

function createSession(){

    session_start();

    $_SESSION["connected"]=true;

    return true;
}

function isConnected(){
    if(isset($_SESSION["connected"]) && $_SESSION["connected"]==true){
            return true;
    }

    else{ 
        return false;
    }
}