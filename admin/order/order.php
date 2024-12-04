<?php
$sql = "SELECT * FROM orders";
$listOrder = $mysqli->query($sql);
?>

<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>ĐƠN HÀNG</h2>
            </div>
         </div>
      </div>
      <!-- row -->
      <div class="row column1">
         <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
               <div class="full graph_head">
                  <div class="heading1 margin_0">
                     <h2>DANH SÁCH ĐƠN HÀNG</h2>
                  </div>
               </div>
               <div class="full price_table padding_infor_info">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="table-responsive-sm">
                           <table class="table table-striped projects">
                              <thead class="thead-dark">
                                 <tr>
                                    <th style="width: 1%">Mã</th>
                                    <th>Họ tên</th>
                                    <th>Ngày đặt</th>
                                    <th>Thanh toán</th>
                                    <th>Tổng tiền</th>
                                    <th>Tình trạng</th>
                                    <th>Sửa</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 foreach ($listOrder as $item) {
                                 ?>
                                    <tr>
                                       <td><?= $item['code'] ?></td>
                                       <td>
                                          <?= $item['customer_name'] ?>
                                       </td>
                                       <td>
                                          <?= $item['create_at'] ?>
                                       </td>
                                       <td>
                                          <?= $item['payment'] ?>
                                       </td>
                                       <td>
                                          <?= $item['total_price'] ?>
                                       </td>
                                       <td>
                                          xac nhan
                                       </td>
                                       <td>
                                          <a href="?action=edit_order" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                       </td>
                                    </tr>
                                 <?php
                                 }
                                 ?>
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