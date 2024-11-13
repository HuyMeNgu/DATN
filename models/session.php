<?php
function setSession($key,$value){
   return $_SESSION[$key]=$value;
}

function getSession($key =''){
    if(empty($key)){
        return $_SESSION;
    }else{
        if(isset($_SESSION[$key]))
        {return $_SESSION[$key];}
    }
}

function removeSession($key=''){
    if(empty($key)){
        session_destroy();
        return true;
    }else{
        if(isset($_SESSION[$key])){
            unset($_SESSION[$key]);
            return true;
        }
    }
}