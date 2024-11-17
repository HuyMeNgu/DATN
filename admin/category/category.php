<?php
   $sql = "SELECT * FROM categories";
   $listCate = $mysqli->query($sql);
?>

<div class="midde_cont">
   <div class="container-fluid">
      <div class="row column_title">
         <div class="col-md-12">
            <div class="page_title">
               <h2>LOẠI SẢN PHẨM</h2>
            </div>
         </div>
      </div>
   <!-- row -->
   <div class="row column1">
      <div class="col-md-12">
         <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
               <div class="heading1 margin_0">
                  <a href="" class="btn btn-success">Thêm mới</a>
               </div>
            </div>
         <div class="full price_table padding_infor_info">
            <div class="row">
               <div class="col-lg-12">
                  <div class="table-responsive-sm">
                     <table class="table table-striped projects">
                        <thead class="thead-dark">
                           <tr>
                              <th style="width: 10%">STT</th>
                              <th style="width: 30%">Tên loại</th>
                              <th>Trạng thái</th>
                              <th>Sửa</th>
                              <th>Xóa</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              foreach($listCate as $item){
                           ?>
                              <tr>
                                 <td><?= $item['id'] ?></td>
                                 <td>
                                    <a><?= $item['cate_name']?></a>
                                 </td>
                                 <td>
                                    <button type="button" class="btn btn-success btn-xs">Success</button>
                                 </td>
                                 <td>
                                    <a href="" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                 </td>
                                 <td>
                                    <a href="" onclick=" return confirm('Bạn chắc chắn muốn xóa?')" class="btn btn-danger  btn-sm"><i class="fa fa-trash"></i></a>
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