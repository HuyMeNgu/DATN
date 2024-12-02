<!DOCTYPE html>
<html lang="en">

<head>
  <!-- basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="viewport" content="initial-scale=1, maximum-scale=1" />
  <!-- site metas -->
  <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <!-- site icon -->
  <link rel="icon" href="images/fevicon.png" type="image/png" />
  <!-- bootstrap css -->
  <link rel="stylesheet" href="../template/css/bootstrap.min.css" />
  <!-- site css -->
  <link rel="stylesheet" href="../style.css?v=<?= rand(10, 99) ?>" />
  <!-- responsive css -->
  <link rel="stylesheet" href="../template/css/responsive.css" />
  <!-- color css -->
  <link rel="stylesheet" href="../template/css/colors.css" />
  <!-- select bootstrap -->
  <link rel="stylesheet" href="../template/css/bootstrap-select.css" />
  <!-- scrollbar css -->
  <link rel="stylesheet" href="../template/css/perfect-scrollbar.css" />
  <!-- custom css -->
  <link rel="stylesheet" href="../template/css/custom.css" />
  <!-- calendar file css -->
  <link rel="stylesheet" href="../template/js/semantic.min.css" />
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<?php
require_once('../../config.php');
session_start();
// Xử lý khi form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  // Truy vấn kiểm tra thông tin admin
  $stmt = $mysqli->prepare("SELECT id, username, fullname, password FROM admin WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Kiểm tra mật khẩu
    if (password_verify($password, $row['password'])) {
      // Lưu thông tin admin vào session
      $_SESSION['admin_id'] = $row['id'];
      $_SESSION['user'] = $row['username'];
      $_SESSION['full'] = $row['fullname'];

      //Hash mật khẩu
      $newHashPassword = password_hash($password, PASSWORD_DEFAULT);

      // Cập nhật passwordhash vào database
      $updateStmt = $mysqli->prepare("UPDATE admin SET password = ? WHERE id = ?");
      $updateStmt->bind_param("si", $newHashPassword, $row['id']);
      $updateStmt->execute();
      $updateStmt->close();

      // Chuyển hướng đến trang admin
      header("Location: ../index.php");
      exit;
    } else {
      $smg = "Mật khẩu không đúng!";
    }
  } else {
    $smg = "Email không tồn tại!";
  }

  $stmt->close();
}
// $msg = getFlashData("msg");
// $msg_type = getFlashData("type");
?>

<body class="inner_page login">
  <div class="full_container">
    <div class="container">
      <div class="center verticle_center full_height">
        <div class="login_section">
          <div class="logo_login">
            <div class="center">
              <img width="210" src="../layout/images/logo/logo.png" alt="#" />
            </div>
          </div>
          <div class="login_form">
            <form method='POST' action="">
              <fieldset>
                <?php if (!empty($smg)) : ?>
                  <div class="alert alert-danger"> <?= htmlspecialchars($smg) ?></div>
                <?php endif; ?>
                <div class="field">
                  <label class="label_field">Tài khoản</label>
                  <input
                    type="email"
                    name="email"
                    placeholder="______________" />
                </div>
                <div class="field">
                  <label class="label_field">Mật khẩu</label>
                  <input
                    type="password"
                    name="password"
                    placeholder="______________"
                    require />
                </div>
                <!-- <div class="field">
                  <label class="label_field hidden">hidden label</label>
                  <label class="form-check-label"><input type="checkbox" class="form-check-input" />
                    Remember Me</label>
                  <a class="forgot" href="">Forgotten Password?</a>
                </div> -->
                <div class="field margin_0">
                  <label class="label_field hidden">hidden label</label>
                  <button type="submit" class="main_bt">Đăng nhập</button>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- jQuery -->
  <script src="../template/js/jquery.min.js"></script>
  <script src="../template/js/popper.min.js"></script>
  <script src="../template/js/bootstrap.min.js"></script>
  <!-- wow animation -->
  <script src="../template/js/animate.js"></script>
  <!-- select country -->
  <script src="../template/js/bootstrap-select.js"></script>
  <!-- nice scrollbar -->
  <script src="../template/js/perfect-scrollbar.min.js"></script>
  <script>
    var ps = new PerfectScrollbar("#sidebar");
  </script>
  <!-- custom js -->
  <script src="../template/js/custom.js"></script>
</body>

</html>