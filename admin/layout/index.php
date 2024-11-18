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
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- color css -->
    <link rel="stylesheet" href="css/colors.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="dashboard dashboard_1">
    <?php
      require_once('../../config.php')
    ?>
    <div class="full_container">
      <div class="inner_container">
        <!-- Sidebar  -->
        <nav id="sidebar">
          <div class="sidebar_blog_1">
            <div class="sidebar-header">
              <div class="logo_section">
                <a href="index.php"
                  ><img
                    class="logo_icon img-responsive"
                    src="images/logo/logo_icon.png"
                    alt="#"
                /></a>
              </div>
            </div>
            <div class="sidebar_user_info">
              <div class="icon_setting"></div>
              <div class="user_profle_side">
                <div class="user_img">
                  <img
                    class="img-responsive"
                    src="images/layout_img/user_img.jpg"
                    alt="#"
                  />
                </div>
                <div class="user_info">
                  <h6>John David</h6>
                  <p><span class="online_animation"></span> Online</p>
                </div>
              </div>
            </div>
          </div>
          <div class="sidebar_blog_2">
            <h4>DANH MỤC</h4>
            <ul class="list-unstyled components">
            <li>
                <a href="?action=body"
                  ><i class="fa fa-home yellow_color"></i>
                  <span>Trang chủ</span></a>
              </li>
              </li>
              <li>
                <a href="?action=import_inv"
                  ><i class="fa fa-cube orange_color"></i>
                  <span>Nhập hàng</span></a>
              </li>
              <li>
                <a
                  href="#element"
                  data-toggle="collapse"
                  aria-expanded="false"
                  class="dropdown-toggle"
                  ><i class="fa fa-table purple_color"></i> <span>Quản lý</span></a
                >
                <ul class="collapse list-unstyled" id="element">
                  <li>
                    <a href="?action=product">> <span>Sản phẩm</span></a>
                  </li>
                  <li>
                    <a href="?action=category">> <span>Loại</span></a>
                  </li>
                  <li>
                    <a href="?action=color">> <span>Màu sắc</span></a>
                  </li>
                  <li>
                    <a href="?action=brand">> <span>Thương hiệu</span></a>
                  </li>
                  <li>
                    <a href="?action=supplier">> <span>Nhà cung cấp</span></a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="tables.php"
                  ><i class="fa fa-inbox purple_color2"></i>
                  <span>Kho hàng</span></a
                >
              </li>
              <li>
                <a href="?action=comment"
                  ><i class="fa fa-briefcase blue1_color"></i>
                  <span>Bình luận </span></a
                >
              </li>
              <li>
                <a href="?action=order">
                  <i class="fa fa-file red_color"></i>
                  <span>Đơn hàng</span></a
                >
              </li>
              <li>
                <a href="charts.html"
                  ><i class="fa fa-bar-chart-o green_color"></i>
                  <span>Charts</span></a
                >
              </li>
            </ul>
          </div>
        </nav>
        <!-- end sidebar -->
        <!-- right content -->
        <div id="content">
          <!-- topbar -->
          <div class="topbar">
            <nav class="navbar navbar-expand-lg navbar-light">
              <div class="full">
                <button
                  type="button"
                  id="sidebarCollapse"
                  class="sidebar_toggle"
                >
                  <i class="fa fa-bars"></i>
                </button>
                <div class="logo_section">
                  <a href="index.php"
                    ><img
                      class="img-responsive"
                      src="images/logo/logo.png"
                      alt="#"
                  /></a>
                </div>
                <div class="right_topbar">
                  <div class="icon_info">
                    <ul class="user_profile_dd">
                      <li>
                        <a class="dropdown-toggle" data-toggle="dropdown"
                          ><img
                            class="img-responsive rounded-circle"
                            src="images/layout_img/user_img.jpg"
                            alt="#"
                          /><span class="name_user">John David</span></a
                        >
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="profile.html"
                            >Hồ sơ</a
                          >
                          <a class="dropdown-item" href="#"
                            ><span>Đang xuất</span> <i class="fa fa-sign-out"></i
                          ></a>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </nav>
          </div>
          <!-- end topbar -->
          <!-- dashboard inner -->
          <?php
          include('main.php');
          ?>
          <!-- end dashboard inner -->
        </div>
      </div>
    </div>
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- wow animation -->
    <script src="js/animate.js"></script>
    <!-- select country -->
    <script src="js/bootstrap-select.js"></script>
    <!-- owl carousel -->
    <script src="js/owl.carousel.js"></script>
    <!-- chart js -->
    <script src="js/Chart.min.js"></script>
    <script src="js/Chart.bundle.min.js"></script>
    <script src="js/utils.js"></script>
    <script src="js/analyser.js"></script>
    <!-- nice scrollbar -->
    <script src="js/perfect-scrollbar.min.js"></script>
    <script>
      var ps = new PerfectScrollbar("#sidebar");
    </script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <script src="js/chart_custom_style1.js"></script>
  </body>
</html>
