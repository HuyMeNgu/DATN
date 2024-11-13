<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <!-- Link CSS của Bootstrap 4 -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
 
<?php
 include('../models/connectdb.php');
?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card p-4 shadow" style="width: 400px;">
        <h3 class="text-center mb-4">Đăng Nhập</h3>
        <form action="process_login.php" method="POST">
            <!-- Tên Đăng Nhập -->
            <div class="form-group">
                <label for="username">Tên Đăng Nhập</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
            </div>

            <!-- Mật Khẩu -->
            <div class="form-group">
                <label for="password">Mật Khẩu</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
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
