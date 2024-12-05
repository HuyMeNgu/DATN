<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="Ogani Template" />
    <meta name="keywords" content="Ogani, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Balo Store</title>

    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap"
      rel="stylesheet"
    />
    <!-- JQuery -->
    <script src="../public/js/jquery-3.3.1.min.js"></script>
    <script src="../public/js/main.js" ></script>
   
    

    <!-- Css Styles -->

    <link
      rel="stylesheet"
      href="../public/css/bootstrap.min.css"
      type="text/css"
    />
    <link
      rel="stylesheet"
      href="../public/css/font-awesome.min.css"
      type="text/css"
    />
    <link
      rel="stylesheet"
      href="../public/css/elegant-icons.css"
      type="text/css"
    />
    <link
      rel="stylesheet"
      href="../public/css/nice-select.css"
      type="text/css"
    />
    <link
      rel="stylesheet"
      href="../public/css/jquery-ui.min.css"
      type="text/css"
    />
    <link
      rel="stylesheet"
      href="../public/css/owl.carousel.min.css"
      type="text/css"
    />
    <link
      rel="stylesheet"
      href="../public/css/slicknav.min.css"
      type="text/css"
    />
    <link rel="stylesheet" href="../public/css/style.css?v=<?=rand(10,99)?>" type="text/css" />
  </head>

  <?php
   require_once('../models/connectdb.php');
   require_once('../models/function.php');
   require_once('../models/database.php');
   require_once('../models/session.php');
    

   
  session_start();

 //xu ly gio hang
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = []; // Nếu chưa có giỏ hàng, khởi tạo giỏ hàng
 }
 
  //$_SESSION['cart'] = [];

  
  

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

  // if(!$checklogin){
  //   redirect('login.php');
  // }

  if(getSession('logintoken')){
    $customertoken=getSession('logintoken');
    $sql="SELECT * FROM login_token INNER JOIN customers ON login_token.customer_id = customers.id WHERE token LIKE '$customertoken' ";
    $customerData=query($sql)->fetch_assoc();
  }

  $cartCount=0;
  // ?>

<!-- xu ly gio hang bang js -->
    <script>
    
    
      //tinh so luong sp trong gio hang
      $(document).ready(function () {
        qttCart();
       // cartTotal();
      //remove khoi gio hang
      $(".icon_close").click(function (e) { 
      e.preventDefault();
      var tr=$(this).parent().parent();
      var trName = tr.children().eq(0).children(1);
      var productId=tr.data("id");
      $.ajax({
        url:'../ajax/deletecart.php',
        method:'POST',
        data:{
          id:productId
        },
        dataType:'json',
        success:function(response){
          if(response.success){
            alert('Thực hiện xoá '+trName.text());
            tr.remove();
          }else{
             alert("Không thể xóa sản phẩm.");
            
          }
        },
        error:function(){
          alert("Có lỗi xảy ra. Vui lòng thử lại.");
        }
      })
      // cap nhat lai so luong
      qttCart();
      //cap nhat tong tien
      cartTotal();
      });

      $(".wantity").change(function (e) { 
        e.preventDefault();
        var qtt = $(this).val();
        var tr = $(this).parent().parent().parent().parent();
        var price = tr.children().eq(1).text();
        tr.children("td").eq(3).text(price);
        var ttal = qtt * price;
        tr.children("td").eq(3).text(ttal);
        cartTotal();
      });

      var checklogin = <?php echo json_encode($checklogin); ?>;
    
      if(checklogin){
        $('.usname').attr('href','profile.php');
      }else{
        $('.usname').attr('href','login.php');
      }
 
  })(jQuery);
  function qttCart () {
    var cart= $(".cart-list").children("tr");
      var cartCount = cart.length;
      var cartqty = $(".cart-count").eq(0);
      cartqty.text(<?=sizeof($_SESSION['cart'])?>);
    }
    </script>



  <body>
    <!-- Page Preloder -->
    <div id="preloder">
      <div class="loader"></div>
    </div>
    <!-- Header Begin -->
    <div class="humberger__menu__overlay"></div>
     <div class="humberger__menu__wrapper">
      <div class="humberger__menu__logo">
        <a href="#"><img src="img/logo.png" alt="" /></a>
      </div>
      <div class="humberger__menu__cart">
        <ul>
          <li>
            <a href="#"><i class="fa fa-heart"></i> <span>1</span></a>
          </li>
          <li>
            <a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a>
          </li>
        </ul>
        
      </div>
      <div class="humberger__menu__widget">
        <div class="header__top__right__language">
          <img src="img/language.png" alt="" />
          
          <span class="arrow_carrot-down"></span>

        </div>
        <div class="header__top__right__auth">
          <a href="#"><i class="fa fa-user"></i> Login</a>
        </div>
      </div>
      <nav class="humberger__menu__nav mobile-menu">
        <ul>
          <li class="active"><a href="./index.php">Trang chủ</a></li>
        </ul>
      </nav>
      <div id="mobile-menu-wrap"></div>

      <div class="humberger__menu__contact">
        <ul>
          <li><i class="fa fa-envelope"></i> ktcaothang@caothang.edu.vn</li>
          <li>Free Shipping for all Order of $99</li>
        </ul>
        </div>
    </div>
    <!-- Header End -->

    <!-- Header Section Begin -->
    <header class="header">
      <div class="header__top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="header__top__left">
                <ul>
                  <li><i class="fa fa-envelope"></i> ktcaothang@caothang.edu.vn</li>
                  <li>Chào mừng đến với trang web của chúng tôi!</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="header__top__right">

                <div class="header__top__right__auth">
                  <a href="" class="usname ">
                  <i class="fa fa-user"></i><?php if($checklogin){echo $customerData['name'];}else{echo'Đăng nhập/Đăng ký';} ?></a>

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="header__logo">
              <a href="index.php"
                ><img src="../public/img/logo.png" alt=""
              /></a>
            </div>
          </div>
          <div class="col-lg-6">
            <nav class="header__menu">
              <ul>
                <li class="active"><a href="index.php">Trang chủ</a></li>
                <!-- <li><a href="./shop-grid.php">Balo</a></li> -->
                <li>
                  <a href="#">Thương hiệu</a>
                  <ul class="header__menu__dropdown">
                  <?php $brand=getRaw("SELECT * FROM brands");
                  foreach($brand as $item):
                  ?>
                    <li><a href="search.php?search=<?=urldecode($item['brand_name'])?>"><?=$item['brand_name']?></a></li>
                    <?php endforeach; ?>
                </li>
                <!-- <li><a href="./blog.php">Blog</a></li>
                <li><a href="./contact.php">Contact</a></li> -->
              </ul>
            </nav>
          </div>
          <div class="col-lg-3">
            <div class="header__cart">
              <ul>
                <li>
                  <h5>Giỏ hàng</h5>
                </li>
                <li>
                  <a href="../views/shoping-cart.php" 
                    ><i class="fa fa-shopping-bag"></i> <span class="cart-count"><?=sizeof($_SESSION['cart'])?></span></a
                  >
                  

                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="humberger__open">
          <i class="fa fa-bars"></i>
        </div>
      </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
     <?php 
     if($is_homepage){
        echo ' <section class="hero">';
     }else{
        echo ' <section class="hero hero-normal">';
     }
     ?>
    <!-- <section class="hero"> -->
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="hero__categories">
              <div class="hero__categories__all">
                <i class="fa fa-bars"></i>
                <span>Danh mục</span>
              </div>
              <ul>
                <li><a href="searchorder.php">Tra cứu sản phẩm đã mua</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="hero__search">
              <div class="hero__search__form">
                <form action="search.php?">
                  <input name="search" type="text" placeholder="Nhập từ khóa tìm kiếm?" />
                  <button type="submit" class="site-btn">Tìm</button>
                </form>
              </div>
              <div class="hero__search__phone">
                <div class="hero__search__phone__icon">
                  <i class="fa fa-phone"></i>
                </div>
                <div class="hero__search__phone__text">
                  <h5>028 38 212 868</h5>
                  <span>Hỗ trợ 24/7</span>
                </div>
              </div>
            </div>
            <?php 
     if($is_homepage){
        ?>
<div
              class="hero__item set-bg"
              data-setbg="../public/img/hero/banner.jpg"
            >
              <!-- <div class="hero__text">
                <span>FRUIT FRESH</span>
                <h2>Vegetable <br />100% Organic</h2>
                <p>Free Pickup and Delivery Available</p>
                <a href="#" class="primary-btn">SHOP NOW</a>
              </div> -->
            </div>

<?php
     }
     ?>
            
          </div>
        </div>
      </div>
    </section>
    <!-- Hero Section End -->

