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
            data-setbg="../public/img/categories/cat-1.jpg">
            <h5><a href="#">Fresh Fruit</a></h5>
          </div>
        </div>
        <div class="col-lg-3">
          <div
            class="categories__item set-bg"
            data-setbg="../public/img/categories/cat-2.jpg">
            <h5><a href="#">Dried Fruit</a></h5>
          </div>
        </div>
        <div class="col-lg-3">
          <div
            class="categories__item set-bg"
            data-setbg="../public/img/categories/cat-3.jpg">
            <h5><a href="#">Vegetables</a></h5>
          </div>
        </div>
        <div class="col-lg-3">
          <div
            class="categories__item set-bg"
            data-setbg="../public/img/categories/cat-4.jpg">
            <h5><a href="#">drink fruits</a></h5>
          </div>
        </div>
        <div class="col-lg-3">
          <div
            class="categories__item set-bg"
            data-setbg="../public/img/categories/cat-5.jpg">
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
    <script>
      $(document).ready(function() {
        $('[data-setbg]').each(function() {
          var bg = $(this).data('setbg');
          $(this).css('background-image', 'url(' + bg + ')');
        });
      });
    </script>
    <div class="row featured__filter">
      <?php
      foreach ($listpro as $item) {
      ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
          <div class="featured__item">
            <div
              class="featured__item__pic set-bg">

              <img id="product_img_<?= $item['id'] ?>" class="product_img" src="../public/img/product/hinhanh/<?= $item['img'] ?>" alt="">

              <ul class="featured__item__pic__hover">
                <li>
                  <a href="#"><i class="fa fa-shopping-cart"></i></a>
                </li>
              </ul>
            </div>

            <div style="justify-content: space-evenly;" class="d-flex align-items-center my-3 ">
              <?php
              //$colorArray = explode(",", $item['colors']);
              $proid=$item['id'];
              $colorArray= getRaw("SELECT * FROM productcolors WHERE product_id=$proid");
              foreach ($colorArray as $color):
                $colorid=$color['color_id'];
                $color = oneRaw("SELECT * FROM colors WHERE id=$colorid");
              ?>
                <div data-product-id="<?= $item['id'] ?>" data-id="<?= $color['id'] ?>" style="background-color:<?= $color['code'] ?>;" class="box-color">
                  <i class="fa fa-check check-icon"></i>
                </div>
              <?php endforeach; ?>
            </div>


            <div class="featured__item__text">
              <h6><a href="shop-details.php?id=<?= $item['id'] ?>"><?= $item['product_name'] ?></a></h6>
              <h5><?= $item['price'] ?></h5>
            </div>
            <?php
            // Hiển thị lượt đánh giá bằng sao
            echo "<div  style='text-align:center;' class='product-rating'>";
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





<script>
  $(document).ready(function() {
    // Khi hover vào thẻ màu
    $('.box-color').hover(function() {
      var colorId = $(this).data('id'); // Lấy id màu
      var productId = $(this).data('product-id'); // Lấy id sản phẩm

      // Thêm class hovered khi hover vào màu (chỉ hiển thị dấu check và viền)
      $(this).addClass('hovered');

      // Gửi yêu cầu AJAX để lấy hình ảnh sản phẩm theo màu
      $.ajax({
        url: '../ajax/productcolor.php', // Tệp PHP xử lý AJAX
        method: 'POST',
        data: {
          color_id: colorId,
          product_id: productId
        },
        success: function(response) {
          // Cập nhật hình ảnh sản phẩm với màu mới
          $('#product_img_' + productId).attr('src', response);
        },
        error: function() {
          alert("Có lỗi xảy ra khi tải hình ảnh.");
        }
      });
    }, function() {
      // Khi bỏ hover ra ngoài, không xóa class hovered nếu màu đã được chọn
      if (!$(this).hasClass('selected')) {
        $(this).removeClass('hovered');
      }
    });

    // Khi click vào màu, màu đó sẽ được "chọn" và class selected sẽ được thêm vào
    $('.box-color').click(function() {
      // Loại bỏ class selected từ các thẻ màu khác
      $('.box-color').removeClass('selected');
      $('.box-color').removeClass('hovered'); // Đảm bảo không còn dấu check trên các màu khác

      // Thêm class selected vào màu được chọn
      $(this).addClass('selected');
      $(this).find('.check-icon').show(); // Hiển thị dấu check khi chọn màu
      $(this).addClass('box-border'); // Hiển thị viền bao quanh khi chọn màu
    });
  });
</script>

<!-- //FOOTER -->
<?php
require_once("footer.php")
?>