<?php 
    $mysqli= new mysqli("localhost", "root", "", "balos");
    
    if ($mysqli -> connect_errno){
        echo "Connect Mysql Fail".$mysqli -> connect_errno;
        exit();
    }
?>