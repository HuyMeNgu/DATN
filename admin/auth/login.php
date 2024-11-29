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
    <link rel="stylesheet" href="../layout/css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="../layout/style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="../layout/css/responsive.css" />
    <!-- color css -->
    <link rel="stylesheet" href="../layout/css/colors.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="../layout/css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="../layout/css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="../layout/css/custom.css" />
    <!-- calendar file css -->
    <link rel="stylesheet" href="../layout/js/semantic.min.css" />
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
    $stmt = $mysqli->prepare("SELECT id, password FROM admin WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    // $passwordhash = password_hash('123456',PASSWORD_DEFAULT);
    // var_dump($passwordhash);
    // die();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Kiểm tra mật khẩu
        if (password_verify($password, $row['password'])) {
            // Lưu thông tin admin vào session
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $username;

            // Chuyển hướng đến trang admin
            header("Location: ../layout/index.php");
            exit;
        } else {
            echo "Sai mật khẩu.";
        }
    } else {
        echo "Tài khoản không tồn tại.";
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
            <?php
            // if (!empty($msg)) {
            //   getSmg($smg,$msg_type);
            // }
            ?>
            <div class="login_form" >
              <form method ='POST' action="">
                <fieldset>
                  <div class="field">
                    <label class="label_field">Tài khoản</label>
                    <input
                      type="email"
                      name="email"
                      placeholder="______________"
                    />
                  </div>
                  <div class="field">
                    <label class="label_field">Mật khẩu</label>
                    <input
                      type="password"
                      name="password"
                      placeholder="______________"
                    />
                  </div>
                  <div class="field">
                    <label class="label_field hidden">hidden label</label>
                    <label class="form-check-label"
                      ><input type="checkbox" class="form-check-input" />
                      Remember Me</label
                    >
                    <a class="forgot" href="">Forgotten Password?</a>
                  </div>
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
    <script src="../layout/js/jquery.min.js"></script>
    <script src="../layout/js/popper.min.js"></script>
    <script src="../layout/js/bootstrap.min.js"></script>
    <!-- wow animation -->
    <script src="../layout/js/animate.js"></script>
    <!-- select country -->
    <script src="../layout/js/bootstrap-select.js"></script>
    <!-- nice scrollbar -->
    <script src="../layout/js/perfect-scrollbar.min.js"></script>
    <script>
      var ps = new PerfectScrollbar("#sidebar");
    </script>
    <!-- custom js -->
    <script src="../layout/js/custom.js"></script>
  </body>
</html>
