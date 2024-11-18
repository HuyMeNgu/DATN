<?php
//khoi tao session
function setSession($key,$value){
   return $_SESSION[$key]=$value;
}
//doc session
function getSession($key){
    if(empty($key)){
        return $_SESSION;
    }else{
        if(isset($_SESSION[$key]))
        {
            return $_SESSION[$key];
        }
    }
}
//xoa session
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
// ham tao flash data
function setFlashData($key,$value){
    $key='flash_' . $key;
    return setSession($key,$value);
}
//lay du lieu tu flash data
function getFlashData($key){
    $key='flash_' . $key;
    $data=getSession($key);
    removeSession($key);
    return $data;
}