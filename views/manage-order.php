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
           ' email'=>$_POST['email'],
           ' note'=>$_POST['note'],
            'payment'=>$_POST['payment']
        ];

        $code=$randum;
        $customer_name=$_POST['customer_name'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $note=$_POST['note'];
        $payment=$_POST['payment'];

       //print_r($orderData) ;
       $sql="INSERT INTO `orders` ( `code`,`customer_name`,`address`,`phone`,`email`,`payment`,`note`) 
             VALUES ($code,'$customer_name','$address','$phone','$email','$payment','$note')";
        $orderInsert=query($sql);
        if($orderInsert){
            echo"tao don hang thanh cong ";
        }
        

        

        //lay thong tin gio hang tu session + id don hang vua tao
        //insert vao database
        //remove session gio hang hien tai
        
    }

?>

<?php
    require_once("footer.php");
?>