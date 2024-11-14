<?php
    if($_GET['action']!='')
   { $page = $_GET['action'];}else {$page = '';}
        switch($page){
        case 'category':
            include('../category/category.php');
            break;
        case 'product':
            include('../product/product.php');
            break;
        case 'color':
            include('../color/color.php');
            break;
        case 'brand':
            include('../brand/brand.php');
            break;  
        case 'import_inv':
            include('../import_inv/import_inv.php');
            break;
        case 'comment':
            include('../comment/comment.php');
            break;
        case 'invoice':
            include('../invoice/invoice.php');
            break;
        case 'supplier':
            include('../supplier/supplier.php');
            break;
        default: 
            include('body.php');
    }
    
    

?>


