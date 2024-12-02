<!-- HEADER -->
<?php 

    $is_homepage = false;
    require_once('header.php');
    require_once('../models/connectdb.php');
    require_once('../models/function.php');
    require_once('../models/database.php');
    require_once('../models/session.php');

    //xu ly gio hang
// echo"<pre>";
// print_r($_SESSION['cart']);
// echo"</pre>";

$cart =$_SESSION['cart'];

    ?>
    


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="../public/img/breadcrumb.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
              <h2>Shopping Cart</h2>
              <div class="breadcrumb__option">
                <a href="./index.php">Home</a>
                <span>Shopping Cart</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- xu ly thanh toan js -->
     <script>
      // $(document).ready(function () {
      //   $($(".btn-chkout")).click(function (e) { 
      //     e.preventDefault();
          
      //   });
      // });
     </script>
 
    

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="shoping__cart__table">
              <table>
                <thead>
                  <tr>
                    <th class="shoping__product">Sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody class="cart-list" >
                  <?php foreach($cart as $item): ?>
                    <tr data-id="<?= $item['id'] ?>">
                    <td class="shoping__cart__item">
                      <img style="width: 101px; height=100px;" src="<?=$item['image']?>" alt="" />
                      <h5><?= $item['name']?></h5>
                    </td>
                    <td class="shoping__cart__price cart-item-price"><?=$item['price']?></td>
                    <td class="shoping__cart__quantity">
                      <div class="quantity">
                        <div class="pro-qty">
                          <span class="btn-decrease qtybtn">-</span>
                          <input class="wantity quantity-input" type="text" value="<?=$item['quantity']?>" />
                          <span class="btn-increase qtybtn">+</span>
                        </div>
                      </div>
                    </td>
                    <td class="shoping__cart__total cart-item-total"><?=$item['price']*$item['quantity']?></td>
                    <td class="shoping__cart__item__close">
                      <span class="icon_close"></span>
                    </td>
                  </tr>
                  <?php endforeach; ?>
           
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="shoping__cart__btns">
              <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
              <a href="#" class="primary-btn cart-btn cart-btn-right"
                ><span class="icon_loading"></span> Upadate Cart</a
              >
            </div>
          </div>
          <div class="col-lg-6">
            <div class="shoping__continue">
              <div class="shoping__discount">
                <h5>Discount Codes</h5>
                <form action="#">
                  <input type="text" placeholder="Enter your coupon code" />
                  <button type="submit" class="site-btn">APPLY COUPON</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="shoping__checkout">
              <h5>Thành tiền:</h5>
              <?php
                      $totalPrice = 0;
                      foreach ($_SESSION['cart'] as $item) {
                          $totalPrice += $item['price'] * $item['quantity'];
                      }?>
              <ul >
                <li>Tổng sản phẩm <span id="total-price" class="product_cost"><?=$totalPrice?></span></li>
                <li>Phí vận chuyển <span class="deli_cost">30000</span></li>
                <li>Tổng tiền <span  class="checkout_total " id="total_price_final"><?=$totalPrice+30000?></span></li>
              </ul>
              <a href="checkout.php" class="primary-btn btn-chkout">Thanh toán</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Shoping Cart Section End -->
     <script>
      $(document).ready(function () {
  // Hàm tính tổng giá trị giỏ hàng
  // function calculateTotalPrice() {
  //   let total = 0;
  //   $(".cart-item-total").each(function () {
  //     total += parseFloat($(this).text()); // Cộng giá trị của từng sản phẩm
  //   });
  //   $("#total-price").text(total.toFixed(2)); // Hiển thị tổng giá
  // }

  //Hàm cập nhật giỏ hàng
  function updateCart(id, quantity) {
    $.ajax({
      url: "../ajax/update_cart.php", // Tệp PHP xử lý update
      method: "POST",
      data: {
        product_id: id,
        quantity: quantity,
      },
      dataType:'json',
      success: function (response) {
        console.log(response.total_price); // Kiểm tra phản hồi từ server
        $("#total-price").text(response.total_price);
        $("#total_price_final").text(response.total_price+30000);
      },
      error: function (xhr, status, error) {
        console.error("Lỗi:", status, error);
      },
    });
  }

  // Xử lý khi bấm nút tăng
  $(".btn-increase").click(function () {
    let row = $(this).closest("tr");
    let id = row.data("id");
    let quantityInput = row.find(".quantity-input");
    let quantity = parseInt(quantityInput.val()) + 1;

    quantityInput.val(quantity); // Cập nhật số lượng
    let price = parseFloat(row.find(".cart-item-price").text());
    row.find(".cart-item-total").text((price * quantity)); // Tính lại giá thành phần

    //calculateTotalPrice(); // Tính lại tổng giá
    updateCart(id, quantity); // Gọi AJAX để cập nhật giỏ hàng
  //  alert(quantity + ','+ id);
  });

  // Xử lý khi bấm nút giảm
  $(".btn-decrease").click(function () {
    let row = $(this).closest("tr");
    let id = row.data("id");
    let quantityInput = row.find(".quantity-input");
    let quantity = Math.max(1, parseInt(quantityInput.val()) - 1); // Không giảm dưới 1

    quantityInput.val(quantity); // Cập nhật số lượng
    let price = parseFloat(row.find(".cart-item-price").text());
    row.find(".cart-item-total").text((price * quantity)); // Tính lại giá thành phần

    //calculateTotalPrice(); // Tính lại tổng giá
    updateCart(id, quantity); // Gọi AJAX để cập nhật giỏ hàng
  });

  // Gọi hàm tính tổng giá ban đầu
  //calculateTotalPrice();
});



     
     
     </script>

     <!-- //FOOTER -->
     <?php
    require_once("footer.php")
     ?>

