<?php
function createSession(){

    session_start();

    $_SESSION["connected"]=true;

    return true;
}

function isConnected(){
    if($_SESSION["connected"]){
            return true;
    }

    else{ 
        return false;
    }
}