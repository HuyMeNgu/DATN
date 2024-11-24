<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <!-- Link CSS của Bootstrap 4 -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/style.css" rel="stylesheet">

</head>
<body>
 
<?php
 require_once('../models/connectdb.php');
 require_once('../models/function.php');
 require_once('../models/database.php');
 require_once('../models/session.php');

session_start();

//kiem tra tinh trang dang nhap
$checklogin=false;
if(getSession('logintoken')){
  $tokenlogin= getSession('logintoken');
  
  //kiem tra trong database
  $querytoken = oneRaw("SELECT customer_id FROM login_token WHERE token= '$tokenlogin' ");
  
  if(!empty($querytoken)){
    $checklogin=true;
  }else{
    removeSession('logintoken');
  }
}

if($checklogin){
  redirect();
}


 if(isPost()){
    $filterAll=filter();
    if(!empty(trim($filterAll['email'])) && !empty(trim($filterAll['password']))){
        //kiem tra dang nhap
        $email=$filterAll['email'];
        $password=$filterAll['password'];

        $userQuery = oneRaw("SELECT password,id FROM customers WHERE email = '$email' "); 
        if(!empty($userQuery)){
            $passwordHash=$userQuery['password'];
            $customerID=$userQuery['id'];
            if(password_verify($password,$passwordHash)){
             //tao token login
             $tokenLogin = sha1(uniqid().time());
             //insert vao db
             $insertToken=[
                'customer_id'=>$customerID,
                'token'=>$tokenLogin,
                'create_at'=>date('Y-m-d H:i:s')
             ];
             $insertStatus = insert('login_token',$insertToken);
             if($insertStatus){
                //insert thanh cong
                //luu vao session
                setSession('logintoken',$tokenLogin);
             }else{
                setFlashData('msg','Không thể đăng nhập,vui lòng thử lại trong giây lát');
                setFlashData('msg_type','danger');
             }

                redirect();
            }else{
                setFlashData('msg','Mật khẩu không chính xác');
                setFlashData('msg_type','danger');
                redirect('login.php');
            }
        }else{
            setFlashData('msg','Email chưa được đăng kí');
            setFlashData('msg_type','danger');
            redirect('login.php');
        }

    }else{
        setFlashData('msg','Vui lòng nhập email và mật khẩu');
        setFlashData('msg_type','danger');
        redirect('login.php');
    }
 }
 $msg = getFlashData('msg');
 $msg_type=getFlashData('msg_type');


?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card p-4 shadow" style="width: 400px;">
        <h3 class="text-center mb-4">Đăng Nhập</h3>
        <?php
        if(!empty($msg)){
            getSmg($msg,$msg_type);
        }
        ?>
        <form action="" method="POST">
            <!-- Tên Đăng Nhập -->
            <div class="form-group">
                <label for="username">Tên Đăng Nhập</label>
                <input name="email"type="email" class="form-control" id="email"  placeholder="Nhập  Email " >
            </div>

            <!-- Mật Khẩu -->
            <div class="form-group">
                <label for="password">Mật Khẩu</label>
                <input name="password" type="password" class="form-control" id="password"  placeholder="Nhập mật khẩu" >
            </div>

            <!-- Nút Đăng Nhập -->
            <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
        </form>
    </div>
</div>

<!-- Link JavaScript của Bootstrap 4 -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
