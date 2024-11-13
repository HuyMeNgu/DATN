<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Tài Khoản</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<?php
 require_once('../models/connectdb.php');
 require_once('../models/function.php');

 if(isPost()){
    echo '<prev>';
    print_r($_POST);
    echo '</preve';
 }
?>  


<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Đăng Ký Tài Khoản</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="" method="post">
                    <!-- Họ và tên -->
                    <div class="form-group">
                        <label for="fullName">Họ và Tên</label>
                        <input name=fullname type="text" class="form-control" id="fullName" placeholder="Nhập họ và tên" required>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name=email type="email" class="form-control" id="email" placeholder="Nhập email" required>
                    </div>

                    <!-- Số điện thoại -->
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input name=phone type="tel" class="form-control" id="phone" placeholder="Nhập số điện thoại" required>
                    </div>

                    <!-- Mật khẩu -->
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input name=password type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" required>
                    </div>

                    <!-- Nhập lại mật khẩu -->
                    <div class="form-group">
                        <label for="confirmPassword">Nhập lại Mật khẩu</label>
                        <input name=pass_confirm type="password" class="form-control" id="confirmPassword" placeholder="Nhập lại mật khẩu" required>
                    </div>

                    <!-- Nút Đăng ký -->
                    <button type="submit" class="btn btn-primary btn-block">Đăng Ký</button>
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
