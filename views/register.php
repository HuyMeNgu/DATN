<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Ngay</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/style.css">

</head>

<?php
 require_once('../models/connectdb.php');
 require_once('../models/function.php');
 require_once('../models/database.php');
 require_once('../models/session.php');
global $filterAll;
 if(isPost()){
    $filterAll =filter();
    $errors=[];//mang chua cac loi
    //validate ho va ten nguoi dung
    if(empty($filterAll['fullname'])){
        $errors['fullname']['required']='Vui Lòng Điền Đầy Đủ Họ Tên.';
    }else{
        if(strlen($filterAll['fullname'])<5){
            $errors['fullname']['min']='Họ tên phải có ít nhất 5 kí tự';
        }
    }

    //validate Email nhap tu nguoi dung
if(empty($filterAll['email'])){
    $errors['email']['required']='Vui Lòng Điền Đầy Đủ Thông Tin Email.';
}else{
    $email=$filterAll['email'];
    $sql="SELECT id FROM customers WHERE email='$email'";
    if(countRows($sql) > 0 ){
        $errors['email']['unique']='Email đã tồn tại';
    }
}

//validate so dien thoai
if(empty($filterAll['phone'])){
    $errors['phone']['required']='Vui Lòng Nhập Số Điện Thoại.';
}else{
   if(!isPhone($filterAll['phone'])){
    $errors['phone']['isPhone']='Số điện thoại không hợp lệ.Vui lòng nhập lại';
   }
}

// validate mat khau
if(empty($filterAll['password'])){
    $errors['password']['required']='Vui Lòng Nhập Mật Khẩu.';
}else{
    if(strlen($filterAll['password'])<6){
        $errors['password']['min']='Mật khẩu phải ít nhất 6 kí tự';
    }
}

//validate nhap lai mat khau 
if(empty($filterAll['pass_confirm'])){
    $errors['pass_confirm']['required']='Bạn cần nhập lại mật khẩu.';
}else{
   if($filterAll['pass_confirm']!=$filterAll['password']){
    $errors['pass_confirm']['match']='Mật khẩu không khớp.Vui lòng nhập lại mật khẩu.';
   }
}
//xu ly insert data
if(empty($errors)){
    $insertData=[
        'name' => $filterAll['fullname'],
        'email'=> $filterAll['email'],
        'phone'=> $filterAll['phone'],
        'password'=> password_hash($filterAll['password'],PASSWORD_DEFAULT),
        'create_at'=>date('Y-m-d H:i:s'),
        'update_at'=>date('Y-m-d H:i:s')
    ];

    $insertStatus = insert('customers',$insertData);
  
   
    if($insertStatus){
        setFlashData('smg','Đăng ký tài khoản thành công!');
        setFlashData('smg_type','success');
    }
    redirect('login.php');
}else{
    setFlashData('smg','Vui Lòng kiểm tra lại thông tin');
    setFlashData('smg_type','danger');
    setFlashData('errors',$errors);
    setFlashData('old',$filterAll);
    //redirect('register.php');
}

}


 $smg=getFlashData('smg');
 $smg_type=getFlashData('smg_type');
 $errors=getFlashData('errors'); 
 $old=getFlashData('old');
?>  


<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Đăng Ký Tài Khoản</h2>
        <div class="row justify-content-center">
            
            <div class="col-md-6">
            <?php
                if(!empty($smg)){
                getSmg($smg,$smg_type);
             }
            ?>
                <form action="" method="post">
                    <!-- Họ và tên -->
                    <div class="form-group">
                        <label for="fullName">Họ và Tên</label>
                        <input name=fullname type="text" class="form-control" id="fullName" placeholder="Nhập họ và tên"
                         value="<?php echo (!empty($old['fullname']))?$old['fullname'] : null; ?>" >
                        <?php
                            echo (!empty($errors['fullname'])) ? '<span class="error">'.reset($errors['fullname']).'</span>': null ;
                        ?>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name=email type="email" class="form-control" id="email" placeholder="Nhập email"
                        value="<?php echo (!empty($old['email']))?  $old['email'] : null; ?>" > 
                        <?php
                        echo (!empty($errors['email'])) ? '<span class="error">'.reset($errors['email']).'</span>': null ;
                        ?>
                    </div>

                    <!-- Số điện thoại -->
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input name=phone type="tel" class="form-control" id="phone" placeholder="Nhập số điện thoại" 
                        value="<?php echo (!empty($old['phone']))?  $old['phone'] : null; ?>" >
                        <?php
                        echo (!empty($errors['phone'])) ? '<span class="error">'.reset($errors['phone']).'</span>': null ;
                        ?>
                    </div>

                    <!-- Mật khẩu -->
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input name=password type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" >
                        <?php
                        echo (!empty($errors['password'])) ? '<span class="error">'.reset($errors['password']).'</span>': null ;
                        ?>
                    </div>

                    <!-- Nhập lại mật khẩu -->
                    <div class="form-group">
                        <label for="confirmPassword">Nhập lại Mật khẩu</label>
                        <input name=pass_confirm type="password" class="form-control" id="confirmPassword" placeholder="Nhập lại mật khẩu" >
                        <?php
                        echo (!empty($errors['pass_confirm'])) ? '<span class="error">'.reset($errors['pass_confirm']).'</span>': null ;
                        ?>
                    </div>

                    <!-- Nút Đăng ký -->
                    <button type="submit"  class="btn btn-primary btn-block">Đăng Ký</button>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
