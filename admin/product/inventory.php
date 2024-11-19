<?php
   $sql = "SELECT DISTINCT products.*, categories.cate_name, colors.color_name, productcolors.quantity FROM products
   INNER JOIN categories ON products.category_id = categories.id
   INNER JOIN productcolors ON products.id = productcolors.product_id
   INNER JOIN colors ON productcolors.color_id = colors.id";
   $listPro = $mysqli->query($sql);
   $products = [];
   while ($row = mysqli_fetch_assoc($listPro)){
      $productId = $row['id'];
      if(!isset($products[$productId])){
         $products[$productId] = [
            'id' => $row['id'],
            'product_name' => $row['product_name'],
            'quantity' => $row['quantity'],
            'cate_name' => $row['cate_name'],
            'colors' => [],
         ];
      }
      $products[$productId]['colors'][] = $row['color_name'];
   }
?>

<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>KHO</h2>
            </div>
         </div>
      </div>
   <!-- row -->
   <div class="row column1">
      <div class="col-md-12">
         <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
               <div class="heading1 margin_0">
                  <a href="" class="btn btn-success">Cập nhật</a>
               </div>
            </div>
         <div class="full price_table padding_infor_info">
            <div class="row">
               <div class="col-lg-12">
                  <div class="table-responsive-sm">
                     <table class="table table-striped projects">
                        <thead class="thead-dark">
                           <tr>
                              <th style="width: 2%">STT</th>
                              <th style="width: 10%">Hình ảnh</th>
                              <th style="width: 30%">Tên sản phẩm</th>
                              <th style="width: 20%">Loại</th>
                              <th>Màu sắc & số lượng</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              foreach ($products as $item){
                           ?>
                           <tr>
                              <td><?= $item['id'] ?></td>
                              <td>
                                 <img width="40" src="images/layout_img/msg2.png" class="rounded-circle" alt="#">
                              </td>
                              <td>
                                <?= $item['product_name'] ?>
                              </td>
                              <td class="project_progress">
                                <?= $item['cate_name']?>
                              </td>
                              <td>
                                <?php
                                    $colorquanti =[];
                                    foreach ($item['colors'] as $index => $color){
                                        $quantity = $item['quantity'][$index];
                                        $colorquanti[] = "$color ($quantity)";
                                    }
                                ?>
                                <?= implode(", ",$colorquanti)?>
                              </td>                                 
                           </tr>
                           <?php
                              }?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end row -->
   </div>
   <!-- footer -->
   <div class="container-fluid">
      <div class="row">
         <div class="footer">
            <p>Copyright © 2018 Designed by html.design. All rights reserved.</p>
         </div>
      </div>
   </div>
</div>