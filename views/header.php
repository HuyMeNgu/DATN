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
    <link rel="stylesheet" href="../public/css/style.css" type="text/css" />
  </head>

  <?php
   require_once('../models/connectdb.php');
   require_once('../models/function.php');
   require_once('../models/database.php');
   require_once('../models/session.php');


   
  session_start();

//kiem tra tinh trang dang nhap
  //  $checklogin=false;
  // if(getSession('logintoken')){
  //   $tokenlogin= getSession('logintoken');
    
  //   //kiem tra trong database
  //   $querytoken = oneRaw("SELECT customer_id FROM login_token WHERE token= '$tokenlogin' ");
    
  //   if(!empty($querytoken)){
  //     $checklogin=true;
  //   }else{
  //     removeSession('logintoken');
  //   }
  // }

  // if(!$checklogin){
  //   redirect('login.php');
  // }

  // if(getSession('logintoken')){
  //   $customertoken=getSession('logintoken');
  //   $sql="SELECT * FROM login_token INNER JOIN customers ON login_token.customer_id = customers.id WHERE token LIKE '$customertoken' ";
  //   $customerData=query($sql)->fetch_assoc();
  // }

  // ?>

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
        <div class="header__cart__price">item: <span>$150.00</span></div>
      </div>
      <div class="humberger__menu__widget">
        <div class="header__top__right__language">
          <img src="img/language.png" alt="" />
          <div>English</div>
          <span class="arrow_carrot-down"></span>
          <ul>
            <li><a href="#">Spanis</a></li>
            <li><a href="#">English</a></li>
          </ul>
        </div>
        <div class="header__top__right__auth">
          <a href="#"><i class="fa fa-user"></i> Login</a>
        </div>
      </div>
      <nav class="humberger__menu__nav mobile-menu">
        <ul>
          <li class="active"><a href="./index.php">Trang chủ</a></li>
          <li><a href="./shop-grid.php">Shop</a></li>
          <li>
            <a href="#">Pages</a>
            <ul class="header__menu__dropdown">
              <li><a href="./shop-details.php">Shop Details</a></li>
              <li><a href="./shoping-cart.php">Shoping Cart</a></li>
              <li><a href="./checkout.php">Check Out</a></li>
              <li><a href="./blog-details.php">Blog Details</a></li>
            </ul>
          </li>
          <li><a href="./blog.php">Blog</a></li>
          <li><a href="./contact.php">Contact</a></li>
        </ul>
      </nav>
      <div id="mobile-menu-wrap"></div>
      <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
      </div>
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
                  <li>Free Shipping for all Order of $99</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="header__top__right">
                <div class="header__top__right__social">
                  <a href="#"><i class="fa fa-facebook"></i></a>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-linkedin"></i></a>
                  <a href="#"><i class="fa fa-pinterest-p"></i></a>
                </div>
                <div class="header__top__right__auth">
                  <a href="#"><i class="fa fa-user"></i><?=$customerData['name'] ?></a>
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
                <li><a href="./shop-grid.php">Balo</a></li>
                <li>
                  <a href="#">Pages</a>
                  <ul class="header__menu__dropdown">
                    <li><a href="shop-details.php">Shop Details</a></li>
                    <li><a href="shoping-cart.php">Shoping Cart</a></li>
                    <li><a href="checkout.php">Check Out</a></li>
                    <li><a href="blog-details.php">Blog Details</a></li>
                  </ul>
                </li>
                <li><a href="./blog.php">Blog</a></li>
                <li><a href="./contact.php">Contact</a></li>
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
                  <a href="#"
                    ><i class="fa fa-shopping-bag"></i> <span>3</span></a
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
                <li><a href="#">Fresh Meat</a></li>
                <li><a href="#">Vegetables</a></li>
                <li><a href="#">Fruit & Nut Gifts</a></li>
                <li><a href="#">Fresh Berries</a></li>
                <li><a href="#">Ocean Foods</a></li>
                <li><a href="#">Butter & Eggs</a></li>
                <li><a href="#">Fastfood</a></li>
                <li><a href="#">Fresh Onion</a></li>
                <li><a href="#">Papayaya & Crisps</a></li>
                <li><a href="#">Oatmeal</a></li>
                <li><a href="#">Fresh Bananas</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="hero__search">
              <div class="hero__search__form">
                <form action="#">
                  <input type="text" placeholder="Nhập từ khóa tìm kiếm?" />
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
              <div class="hero__text">
                <span>FRUIT FRESH</span>
                <h2>Vegetable <br />100% Organic</h2>
                <p>Free Pickup and Delivery Available</p>
                <a href="#" class="primary-btn">SHOP NOW</a>
              </div>
            </div>

<?php
     }
     ?>
            
          </div>
        </div>
      </div>
    </section>
    <!-- Hero Section End -->

