<?php
//kiem tra email
function isEmail($email){
$checkEmail=filter_var($email,FILTER_VALIDATE_EMAIL);
return $checkEmail;
}
//kiem tra so nguyen 
function isNumberInt($number){
    $checkNumber=filter_var($number,FILTER_VALIDATE_EMAIL);
    return $checkNumber;
    }


function isGet(){
    if($_SERVER['REQUEST_METHOD']=='GET'){
        return true;
    }return false;
}
function isPost(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        return true;
    }return false;
}


function filter(){
    $filterArr=[];
    if(isPost())
    {
        //xu ly du lieu truoc khi hien ra
        if(!empty($_POST))
        {
            foreach($_POST as $key => $value)
            {
                $key=strip_tags($key);
                if(is_array($value)){
                    $filterArr[$key]=filter_input(INPUT_POST,$key,FILTER_SANITIZE_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);
                }else{
                    $filterArr[$key]=filter_input(INPUT_POST,$key,FILTER_SANITIZE_SPECIAL_CHARS);
                }   
                
            }
        }
    }

    if(isGet())
    {
        //xu ly du lieu truoc khi hien ra
        if(!empty($_GET))
        {
            foreach($_GET as $key => $value)
            {
                $key=strip_tags($key);
                if(is_array($value)){
                    $filterArr[$key]=filter_input(INPUT_GET,$key,FILTER_SANITIZE_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);
                }else{
                    $filterArr[$key]=filter_input(INPUT_GET,$key,FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
    }

    return $filterArr;
}
?>