    <!-- HEADER -->
    <?php 
    $is_homepage = false;
      include('header.php');
      require_once('../models/connectdb.php');
      require_once('../models/function.php');
      require_once('../models/database.php');
      require_once('../models/session.php');

      
      if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $pro_id =$_GET['id'];
      }


      // $sql= "SELECT * FROM products INNER JOIN productcolors ON products.id = productcolors.product_id WHERE products.id=$pro_id";
      // $getcolor="SELECT * FROM productcolors INNER JOIN colors ON productcolors.color_id = colors.id WHERE productcolors.product_id =$pro_id";
      // $pro_list=query($sql)->fetch_assoc();
      // $pro_color=query($getcolor)->fetch_assoc();
      // $sql=" SELECT * FROM products WHERE id = $pro_id";
      // $pro = query($sql)->fetch_assoc();
      $quantity=1;
      //chi tiet sp
      $test1="SELECT * from products where id= $pro_id";
      $pro_list=oneRaw($test1);
      //LAY hinh nhieu mau
      $test2="SELECT * from productcolors where product_id=$pro_id";
      $pro_image=getRaw($test2);
      //LAY  MAU theo san pham
      $colors =$pro_list['colors'];
      
      $pro_color=explode(",", $colors);

      $cate = $pro_list['category_id'];
     
      //lay san pham cung loai
      $querySameCate="SELECT * FROM products WHERE category_id = $cate";
      $sameCate=getRaw($querySameCate);
      

    ?>


<!-- Breadcrumb Section Begin -->
<section
      class="breadcrumb-section set-bg"
      data-setbg="../public/img/breadcrumb.jpg"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
              <h2>Vegetable’s Package</h2>
              <div class="breadcrumb__option">
                <a href="./index.php">Home</a>
                <a href="./index.php">Vegetables</a>
                <span>Vegetable’s Package</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="product__details__pic">
              <div class="product__details__pic__item">
                <img
                  class="product__details__pic__item--large"
                  src="../public/img/product/hinhanh/<?=$pro_list['img'] ?>"
                  alt="hinh anh san pham"
                />
              </div>
              <div class="product__details__pic__slider owl-carousel">
               <?php foreach($pro_image as $item){ ?>
                <img
                  data-imgbigurl="../public/img/product/chitiet/<?=$item['img_path'] ?>"
                  src="../public/img/product/chitiet/<?=$item['img_path'] ?>"
                  alt=""
                />
              <?php } ?>
                
                
                
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="product__details__text">
              <h3><?= $pro_list['product_name'] ?></h3>
              <div class="product__details__rating">
                <?php
                for($i =1 ;$i<=5;$i++){
                  if($i <= $pro_list['rating']){
                    echo'<i class="fa fa-star"></i>';
                  }else{
                    echo'<i class="fa fa-star-o"></i>';
                  }
                }
        
                
                ?>
          
                <span>(18 reviews)</span>
              </div>
              <div class="product__details__price"><?= number_format($pro_list['price'],0,',','.' ).' VND';?></div>

                <div class="container ">
                <?php foreach($pro_color as $item):
                  
                  $color_item=oneRaw("SELECT * FROM colors WHERE id = $item ");

                  ?>
                 

                <div class="form-check">
                <input class="form-check-input" type="radio" name="color" id="<?= $color_item['id'] ?>" value="<?= $color_item['id'] ?>" >
                <label class="form-check-label" for="<?= $color_item['id'] ?>">
                  <?=
                    $color_item['color_name'];
                  ?>
                </label>
                </div>
                <?php endforeach; ?>
                
                </div>
                
                </div>
              

              <div class="product__details__quantity">
                <div class="quantity">
                  <div class="pro-qty">
                    <input type="text" value=<?=$quantity?> />
                  </div>
                </div>
              </div>
              <a href="#" class="primary-btn">ADD TO CARD</a>
              <a href="#" class="heart-icon"
                ><span class="icon_heart_alt"></span
              ></a>
              <ul>
                <li><b>Availability</b> <span>In Stock</span></li>
                <li>
                  <b>Shipping</b>
                  <span>01 day shipping. <samp>Free pickup today</samp></span>
                </li>
                <li><b>Weight</b> <span>0.5 kg</span></li>
                <li>
                  <b>Share on</b>
                  <div class="share">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="product__details__tab">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    data-toggle="tab"
                    href="#tabs-1"
                    role="tab"
                    aria-selected="true"
                    >Description</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    data-toggle="tab"
                    href="#tabs-2"
                    role="tab"
                    aria-selected="false"
                    >Information</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    data-toggle="tab"
                    href="#tabs-3"
                    role="tab"
                    aria-selected="false"
                    >Reviews <span>(1)</span></a
                  >
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                  <div class="product__details__tab__desc">
                    <h6>Products Infomation</h6>
                    <p>
                      <?=  $pro_list['description'];  ?>
                    </p>
                    <p>
                 
                  </div>
                </div>
                <div class="tab-pane" id="tabs-2" role="tabpanel">
                  <div class="product__details__tab__desc">
                    <h6>Products Infomation</h6>
                    <p>
                      Vestibulum ac diam sit amet quam vehicula elementum sed
                      sit amet dui. Pellentesque in ipsum id orci porta dapibus.
                      Proin eget tortor risus. Vivamus suscipit tortor eget
                      felis porttitor volutpat. Vestibulum ac diam sit amet quam
                      vehicula elementum sed sit amet dui. Donec rutrum congue
                      leo eget malesuada. Vivamus suscipit tortor eget felis
                      porttitor volutpat. Curabitur arcu erat, accumsan id
                      imperdiet et, porttitor at sem. Praesent sapien massa,
                      convallis a pellentesque nec, egestas non nisi. Vestibulum
                      ac diam sit amet quam vehicula elementum sed sit amet dui.
                      Vestibulum ante ipsum primis in faucibus orci luctus et
                      ultrices posuere cubilia Curae; Donec velit neque, auctor
                      sit amet aliquam vel, ullamcorper sit amet ligula. Proin
                      eget tortor risus.
                    </p>
                    <p>
                      Praesent sapien massa, convallis a pellentesque nec,
                      egestas non nisi. Lorem ipsum dolor sit amet, consectetur
                      adipiscing elit. Mauris blandit aliquet elit, eget
                      tincidunt nibh pulvinar a. Cras ultricies ligula sed magna
                      dictum porta. Cras ultricies ligula sed magna dictum
                      porta. Sed porttitor lectus nibh. Mauris blandit aliquet
                      elit, eget tincidunt nibh pulvinar a.
                    </p>
                  </div>
                </div>
                <div class="tab-pane" id="tabs-3" role="tabpanel">
                  <div class="product__details__tab__desc">
                    <h6>Products Infomation</h6>
                    <p>
                      Vestibulum ac diam sit amet quam vehicula elementum sed
                      sit amet dui. Pellentesque in ipsum id orci porta dapibus.
                      Proin eget tortor risus. Vivamus suscipit tortor eget
                      felis porttitor volutpat. Vestibulum ac diam sit amet quam
                      vehicula elementum sed sit amet dui. Donec rutrum congue
                      leo eget malesuada. Vivamus suscipit tortor eget felis
                      porttitor volutpat. Curabitur arcu erat, accumsan id
                      imperdiet et, porttitor at sem. Praesent sapien massa,
                      convallis a pellentesque nec, egestas non nisi. Vestibulum
                      ac diam sit amet quam vehicula elementum sed sit amet dui.
                      Vestibulum ante ipsum primis in faucibus orci luctus et
                      ultrices posuere cubilia Curae; Donec velit neque, auctor
                      sit amet aliquam vel, ullamcorper sit amet ligula. Proin
                      eget tortor risus.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title related__product__title">
              <h2>Sản phẩm tương tự</h2>
            </div>
          </div>
        </div>
        <div class="row">

          <?php foreach($sameCate as $item): ?>
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="product__item">
              <div
                class="product__item__pic set-bg "
              >
                <img src="../public/img/product/hinhanh/<?= $item['img']?>"alt="">
                <ul class="product__item__pic__hover">
                  <li>
                    <a href="#"><i class="fa fa-heart"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-retweet"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                  </li>
                </ul>
              </div>
              <div class="product__item__text">
                <h6><a href="#"><?= $item['product_name'] ?></a></h6>
                <h5><?= number_format($item['price'],0,',','.' ).' VND';?></h5>
              </div>
              
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <!-- Related Product Section End -->
<link rel="stylesheet" href="../public/css/mycss.css" type="text/css"  />
<!-- FOOTER -->
<?php 
  include('footer.php') 
?>
