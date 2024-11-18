<!-- HEADER -->
<?php 
    $is_homepage = true;
    require_once('header.php');
    require_once('../config.php');
    require_once('../models/connectdb.php');
    require_once('../models/function.php');
    require_once('../models/database.php');
    require_once('../models/session.php');
    $sql = "SELECT * FROM products";
    $listpro = $mysqli->query($sql);
?>
    

    <!-- Categories Section Begin -->
    <section class="categories">
      <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
              <h2>SẢN PHẨM MỚI NHẤT</h2>
            </div>
          </div>
          <div class="categories__slider owl-carousel">
            <div class="col-lg-3">
              <div
                class="categories__item set-bg"
                data-setbg="../public/img/categories/cat-1.jpg"
              >
                <h5><a href="#">Fresh Fruit</a></h5>
              </div>
            </div>
            <div class="col-lg-3">
              <div
                class="categories__item set-bg"
                data-setbg="../public/img/categories/cat-2.jpg"
              >
                <h5><a href="#">Dried Fruit</a></h5>
              </div>
            </div>
            <div class="col-lg-3">
              <div
                class="categories__item set-bg"
                data-setbg="../public/img/categories/cat-3.jpg"
              >
                <h5><a href="#">Vegetables</a></h5>
              </div>
            </div>
            <div class="col-lg-3">
              <div
                class="categories__item set-bg"
                data-setbg="../public/img/categories/cat-4.jpg"
              >
                <h5><a href="#">drink fruits</a></h5>
              </div>
            </div>
            <div class="col-lg-3">
              <div
                class="categories__item set-bg"
                data-setbg="../public/img/categories/cat-5.jpg"
              >
                <h5><a href="#">drink fruits</a></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title">
              <h2>Balo & Túi xách</h2>
            </div>
            <div class="featured__controls">
              <ul>
                <li class="active" data-filter="*">Tất cả</li>
                <li data-filter=".oranges">Balo</li>
                <li data-filter=".fresh-meat">Túi xách</li>
                <li data-filter=".vegetables">Vegetables</li>
                <li data-filter=".fastfood">Fastfood</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row featured__filter">
          <?php
            foreach($listpro as $item){
          ?>
          <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
            <div class="featured__item">
              <div
                class="featured__item__pic set-bg"
                data-setbg="../public/img/product/hinhanh/<?= $item['img']?>"
              >
                <ul class="featured__item__pic__hover">
                  <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                  </li>
                </ul>
              </div>
              <div class="featured__item__text">
                <h6><a href="shop-details.php?id=<?= $item['id'] ?>"><?=$item['product_name']?></a></h6>
                <h5><?=$item['price']?></h5>
              </div>
              <?php
              // Hiển thị lượt đánh giá bằng sao
              echo "<div class='product-rating'>";
              for ($i = 1; $i <= 5; $i++) { 
                  if ($i <= $item['rating']) {
                      echo "<span class='text-warning'>&#9733;</span>"; // Sao đã đánh giá
                  } else {
                      echo "<span class='text-muted'>&#9733;</span>"; // Sao trống
                  }
              }
              echo "</div>"; // Đóng thẻ đánh giá
              ?>
            </div>
          </div>
          <?php
            }
          ?>
          
       
         
        
          
         
      
        </div>
      </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="banner__pic">
              <img src="../public/img/banner/banner-1.jpg" alt="" />
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="banner__pic">
              <img src="../public/img/banner/banner-2.jpg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Bgin -->
    <section class="latest-producet spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="latest-product__text">
              <h4>Latest Products</h4>
              <div class="latest-product__slider owl-carousel">
                <div class="latest-prdouct__slider__item">
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src=../public/img/latest-product/lp-1.jpg" alt="" />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="../public/img/latest-product/lp-2.jpg" alt="" />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="../public/img/latest-product/lp-3.jpg" alt="" />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                </div>
                <div class="latest-prdouct__slider__item">
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="../public/img/latest-product/lp-1.jpg" alt="" />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="../public/img/latest-product/lp-2.jpg" alt="" />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="../public/img/latest-product/lp-3.jpg" alt="" />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="latest-product__text">
              <h4>Top Rated Products</h4>
              <div class="latest-product__slider owl-carousel">
                <div class="latest-prdouct__slider__item">
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="../public/img/latest-product/lp-1.jpg" alt="" />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="../public/img/latest-product/lp-2.jpg" alt="" />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="../public/img/latest-product/lp-3.jpg" alt="" />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                </div>
                <div class="latest-prdouct__slider__item">
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="../public/img/latest-product/lp-1.jpg" alt="" />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="../public/img/latest-product/lp-2.jpg" alt="" />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="../public/img/latest-product/lp-3.jpg" alt="" />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="latest-product__text">
              <h4>Review Products</h4>
              <div class="latest-product__slider owl-carousel">
                <div class="latest-prdouct__slider__item">
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="../public/img/latest-product/lp-1.jpg" alt="" />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="../public/img/latest-product/lp-2.jpg" alt="" />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="../public/img/latest-product/lp-3.jpg" alt="" />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                </div>
                <div class="latest-prdouct__slider__item">
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="../public/img/latest-product/lp-1.jpg" alt="" />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="../public/img/latest-product/lp-2.jpg" alt="" />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                  <a href="#" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="../public/img/latest-product/lp-3.jpg" alt="" />
                    </div>
                    <div class="latest-product__item__text">
                      <h6>Crab Pool Security</h6>
                      <span>$30.00</span>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title from-blog__title">
              <h2>From The Blog</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog__item">
              <div class="blog__item__pic">
                <img src="../public/img/blog/blog-1.jpg" alt="" />
              </div>
              <div class="blog__item__text">
                <ul>
                  <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                  <li><i class="fa fa-comment-o"></i> 5</li>
                </ul>
                <h5><a href="#">Cooking tips make cooking simple</a></h5>
                <p>
                  Sed quia non numquam modi tempora indunt ut labore et dolore
                  magnam aliquam quaerat
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog__item">
              <div class="blog__item__pic">
                <img src="../public/img/blog/blog-2.jpg" alt="" />
              </div>
              <div class="blog__item__text">
                <ul>
                  <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                  <li><i class="fa fa-comment-o"></i> 5</li>
                </ul>
                <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                <p>
                  Sed quia non numquam modi tempora indunt ut labore et dolore
                  magnam aliquam quaerat
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog__item">
              <div class="blog__item__pic">
                <img src="../public/img/blog/blog-3.jpg" alt="" />
              </div>
              <div class="blog__item__text">
                <ul>
                  <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                  <li><i class="fa fa-comment-o"></i> 5</li>
                </ul>
                <h5><a href="#">Visit the clean farm in the US</a></h5>
                <p>
                  Sed quia non numquam modi tempora indunt ut labore et dolore
                  magnam aliquam quaerat
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
<!-- Blog Section End -->

<!-- //FOOTER -->
<?php
  require_once("footer.php")
?>

 
