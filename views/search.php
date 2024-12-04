<?php 
    $is_homepage = false;
    require_once('header.php');
    require_once('../config.php');
    require_once('../models/connectdb.php');
    require_once('../models/function.php');
    require_once('../models/database.php');
    require_once('../models/session.php');
    $keyword=$_GET['search'];
    $sql="SELECT * FROM products WHERE product_name LIKE '%$keyword%'";

    $pro_list=getRaw($sql);

?>
<section class="featured squad">
    <div class="container">
    <div class="row featured__filter">
          <?php
            foreach($pro_list as $item){
          ?>
          <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
            <div class="featured__item">
              <div
                class="featured__item__pic set-bg"
              >
              
              <img  src="../admin/<?= $item['img']?>" alt="">

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
              echo "<div style='text-align:center;' class='product-rating'>";
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
<?php
require_once('footer.php');
?>