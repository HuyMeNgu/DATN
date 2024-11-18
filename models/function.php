<?php
//kiem tra email
function isEmail($email){
$checkEmail=filter_var($email,FILTER_VALIDATE_EMAIL);
return $checkEmail;
}
//kiem tra so nguyen 
function isNumberInt($number){
    $checkNumber=filter_var($number,FILTER_VALIDATE_INT);
    return $checkNumber;
    }
//kiem tra so dien thoai
function isPhone($phone){
    $checkZero=false;
    if($phone[0] == '0'){
        $checkZero=true;
        $phone=substr($phone,1);
    }
    $checkNumber=false;
    if(isNumberInt($phone) && (strlen($phone)  == 9)){
        $checkNumber=true;
    }

    if($checkNumber == true && $checkZero==true){
        return true;
    }else{
        return false;
    }
    
}
//thong bao loi
function getSmg($smg,$type='success'){
        echo '<div class="alert alert-'.$type.'">'; 
        echo $smg;
        echo '</div>';
}

 function formError($filename, $beforeHtml = '', $afterHtml = '', $errors)
{
    return (!empty($errors[$filename])) ? '<span class="error">' . reset($errors[$filename]) . '</span>' : null;
}
//ham chuyen huong

function redirect($path='index.php'){
    header("Location: $path");
    exit;
}
//ham chuyen trang co tham so
function paramRedirect($path,$param=[]){
    if(!empty($param) && is_array($param)){
        $query_string=http_build_query($param);
        $path.='?'.$query_string;
    }
    header("location: $path");
    exit;
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