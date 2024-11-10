<?php
    if($_GET['action']!='')
   { $page = $_GET['action'];}else {$page = '';}
        switch($page){
        case 'category':
            include('category.php');
            break;
        case 'product':
            include('product.php');
            break;
        case 'color':
            include('color.php');
            break;
        case 'brand':
            include('brand.php');
            break;  
        case 'import_inv':
            include('import_inv.php');
            break;
        case 'comment':
            include('comment.php');
            break;
        case 'invoice':
            include('invoice.php');
            break;
        default: 
            include('body.php');
    }
    
    

?>


