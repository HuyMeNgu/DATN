<?php
    if($_GET['action']!='')
   { $page = $_GET['action'];}else {$page = '';}
        switch($page){
        case 'category':
            require_once('../category/category.php');
            break;
        case 'product':
            require_once('../product/products.php');
            break;
        case 'color':
            require_once('../color/color.php');
            break;
        case 'brand':
            require_once('../brand/brand.php');
            break;  
        case 'import_inv':
            require_once('../import_inv/import_inv.php');
            break;
        case 'comment':
            require_once('../comment/comment.php');
            break;
        case 'order':
            require_once('../order/order.php');
            break;
        case 'supplier':
            require_once('../supplier/supplier.php');
            break;
        default: 
        require_once('body.php');
    }
    
    

?>


