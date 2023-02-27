<?php
ob_start();
require('phpFiles/connection.php');
require('phpFiles/productFunc.php');
require('phpFiles/cartFunc.php');
$DB=new DBcontroller();

$product=new product($DB);

$cart=new cart($DB);
print_r($cart->getCartId($product->getProductData("cart")));
$cartItems=$cart->getCartId($product->getProductData("cart"));
// $arr=array(
//     "user_id"=>5,
//     "item_id"=>8
// ); 
// $cart->insertIntoCart($arr,"cart");
?>