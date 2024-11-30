<?php 
    $is_homepage = false;
    require_once('header.php');
    require_once('../models/connectdb.php');
    require_once('../models/function.php');
    require_once('../models/database.php');
    require_once('../models/session.php');


    $cart_on_order = $_SESSION['cart'];

    if(isset($_POST['create_order']) ){
        $randum=numberRandom(100000,999999);
        //lay thong tin tu form
        $orderData=[
            'code'=> $randum,
            'customer_name'=>$_POST['customer_name'],
            'address'=>$_POST['address'],
            'phone'=>$_POST['phone'],
           'email'=>$_POST['email'],
           'note'=>$_POST['note'],
            'payment'=>$_POST['payment'],
            'create_at'=>date('Y-m-d H:i:s')
        ];

    $orderInsert=insert('orders',$orderData);
        if($orderInsert){
            echo"tao don hang thanh cong ";
            $orderID=oneRaw("SELECT id FROM orders WHERE code=$randum")['id'];
            foreach($cart_on_order as $item){
                $orderDetail=[
                    'order_id'=>$orderID,
                    'product_id'=>$item['id'],
                    //'productcolor_id'=>$item['productcolor_id'],
                    'quantity'=>$item['quantity'],
                    'price'=>$item['price'],
                    //'review_id'=>''
                    
                ];
                insert('order_details',$orderDetail);
            }

           $_SESSION['cart']=[];
        }else{
            echo"dat hang that bai";
        }
        

        

  
    }
?>



<?php
    require_once("footer.php");
?>