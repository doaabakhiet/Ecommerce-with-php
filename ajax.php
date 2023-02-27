<?php
require('phpFiles/connection.php');
require('phpFiles/productFunc.php');
$DB=new DBcontroller();
$product=new product($DB);
$productData=$product->getProductData();
if(isset($_POST['item_id'])){
    $result=$product->getProduct($_POST['item_id']);
    echo json_encode($result);
}

?>