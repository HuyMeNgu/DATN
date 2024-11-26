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

    <!-- xu ly gio hang bang js -->
 
    

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="shoping__cart__table">
              <table>
                <thead>
                  <tr>
                    <th class="shoping__product">Products</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody class="cart-list" >
                  <?php foreach($cart as $item): ?>
                  <tr>
                    <td class="shoping__cart__item">
                      <img style="width: 101px; height=100px;" src="<?=$item['image']?>" alt="" />
                      <h5><?= $item['name']?></h5>
                    </td>
                    <td class="shoping__cart__price"><?=$item['price']?></td>
                    <td class="shoping__cart__quantity">
                      <div class="quantity">
                        <div class="pro-qty">
                          <input class="wantity" type="text" value="<?=$item['quantity']?>" />
                        </div>
                      </div>
                    </td>
                    <td class="shoping__cart__total"><?=$item['price']*$item['quantity']?></td>
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
              <ul >
                <li>Tổng sản phẩm <span class="product_cost">30000</span></li>
                <li>Phí vận chuyển <span class="deli_cost">30000</span></li>
                <li>Tổng tiền <span class="checkout_total">454.98</span></li>
              </ul>
              <a href="checkout.php" class="primary-btn">Thanh toán</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Shoping Cart Section End -->


     <!-- //FOOTER -->
     <?php
    require_once("footer.php")
     ?>

