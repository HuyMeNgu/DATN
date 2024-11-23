
<?php
    if($_GET['action']!='')
   { $page = $_GET['action'];}else {$page = '';}
        switch($page){
        case 'category':
            require_once('../category/category.php');
            break;
        case 'add_category':
            require_once('../category/add_category.php');
            break;
        case 'edit_category':
            require_once('../category/edit_category.php');
            break;
        case 'product':
            require_once('../product/product.php');
            break;
        case 'add_product':
            require_once('../product/add_product.php');
            break;
        case 'edit_product':
            require_once('../product/product.php');
            break;
        case 'inventory':
            require_once('../product/inventory.php');
            break;
        case 'color':
            require_once('../color/color.php');
            break;
        case 'brand':
            require_once('../brand/brand.php');
            break;  
        case 'add_brand':
            require_once('../brand/add_brand.php');
            break;
        case 'edit_brand':
            require_once('../brand/edit_brand.php');
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
        case 'edit_order':
            require_once('../order/edit_order.php');
            break;
        case 'supplier':
            require_once('../supplier/supplier.php');
            break;
        case 'add_supplier':
            require_once('../supplier/add_supplier.php');
            break;
        case 'edit_supplier':
            require_once('../supplier/edit_supplier.php');
            break;
        default: 
        require_once('body.php');
    }
    
    

?>


