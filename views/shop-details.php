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
      $pro_color2=getRaw("SELECT * from productcolors INNER JOIN colors ON productcolors.color_id = colors.id WHERE productcolors.product_id = $pro_id");
      
      $pro_color= getRaw("SELECT * FROM productcolors WHERE product_id=$pro_id");

      $cate = $pro_list['category_id'];
     
      //lay san pham cung loai
      $querySameCate="SELECT * FROM products WHERE category_id = $cate";
      $sameCate=getRaw($querySameCate);
      
 

    ?>



    <script>
      $(document).ready(function () {

        $('input[name="color"]').on('change', function () {
            // Lấy đường dẫn ảnh từ thuộc tính data-image
            const selectedImage = $(this).data('image');

            // Cập nhật ảnh chính
            $('#product-main-image').attr('src', selectedImage);
        });
      
        $(".add_cart").click(function (e) { 
          e.preventDefault();
          var productName=$(".product__details__text").children("h3").text();
          var productPrice=$(".product__details__price").text();
          var productQtt=$(".pro-qty").children("input").val();
          var productImg=$(".product__details__pic__item").children("img").attr("src");
          var productId=$(".id").text();
          var productColor=$('input[name="color"]:checked').val();
          
          $.ajax({
              method: 'POST', // Đảm bảo dùng chữ hoa cho phương thức
              url:'../ajax/addtocart.php', // Thay bằng đường dẫn file xử lý
              data: {
                  productId: productId,
                  productQtt: productQtt,
                  productImg:productImg,
                  productColor:productColor
              },
              success: function(response) {
                  alert(response);
              },
              error: function(xhr, status, error) {
                  console.error("Lỗi xảy ra:", status, error);
                  alert('Có lỗi xảy ra, vui lòng thử lại.');
              }
});

          
        
        });

      });
    </script>




    <!-- Product Details Section Begin -->
    <section class="product-details spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="product__details__pic">
              <div class="product__details__pic__item">
                <img
                  id="product-main-image"
                  class="product__details__pic__item--large"
                  src="../admin/<?=$pro_list['img'] ?>"
                  alt="hinh anh san pham"
                />
              </div>
              <div class="product__details__pic__slider owl-carousel">
               <?php
               foreach($pro_image as $item){ ?>
                <img
                  data-imgbigurl="../admin/<?=$item['img_path']?>"
                  src="../admin/<?=$item['img_path']?>"
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
          
                <!-- <span>(18 reviews)</span> -->
              </div>
              <div class="product__details__price"><?= number_format($pro_list['price'],0,',','.' ).' VND';?></div>

                <div class="container ">
                <?php foreach($pro_color2 as $item):
                  $colorid=$item['color_id'];
                  $color_item=oneRaw("SELECT * FROM colors WHERE id = $colorid ");
                  $img_path="../admin/".$item['img_path'];

                  ?>
                 
                <div class="form-check select-color">
                <input class="form-check-input" type="radio" name="color" id="<?= $color_item['id'] ?>" value="<?= $color_item['id']?>" data-image="<?=$img_path?>" >
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
                    <span style="font-size: 25px;" class="decr p-cursor">-</span>
                    <input type="text" value=1 />
                    <span style="font-size: 25px;" class="incr p-cursor">+</span>
                  </div>
                </div>
              </div>
              <div class="d-none id"><?=$pro_list['id']?></div>
              <a href="" class="primary-btn add_cart">Thêm vào giỏ hàng</a>

              <ul>
                <li><b>Tình trạng: </b> <span> Còn hàng </span></li>
                <!-- <li>
                  <b>Shipping</b>
                  <span>01 day shipping. <samp>Free pickup today</samp></span>
                </li>
                <li><b>Weight</b> <span>0.5 kg</span></li>
                <li>
                  <b>Share on</b> -->
                  <!-- <div class="share">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                  </div> -->
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
                    >Thông tin sản phẩm</a
                  >
                </li>
               
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                  <div class="product__details__tab__desc">
                    <h6>Thông tin của <?=$pro_list['product_name'] ?></h6>
                    <p>
                      <?=  $pro_list['description'];  ?>
                    </p>
                    <p>
                 
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
                <img src="../admin/<?= $item['img']?>"alt="">
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
                <h6><a href="shop-details.php?id=<?= $item['id'] ?>"><?= $item['product_name'] ?></a></h6>
                <h5><?= number_format($item['price'],0,',','.' ).' VND';?></h5>
              </div>
              
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <!-- Related Product Section End -->



<!-- FOOTER -->
<?php 
  include('footer.php') 
?>
