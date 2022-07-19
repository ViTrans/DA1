<?php
include 'connection.php';
session_start();
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($con,$sql);
$product_cart = array();
foreach ($result as $value) {
    $product_cart[$value['id']] = $value;
}
if(isset($_POST["add-to-cart"])){
  if(!isset($_SESSION['cart']) || $_SESSION['cart'] == null){
    $product_cart[$id]["quantity"] = 1;
    $_SESSION['cart'][$id] = $product_cart[$id];
  }else{
    if(array_key_exists($id,$_SESSION['cart'])){
      $_SESSION['cart'][$id]["quantity"] += 1;
    }
    else{
      $product_cart[$id]["quantity"] = 1;
    $_SESSION['cart'][$id] = $product_cart[$id];
    }
  }
header('Location: cart.php');
}
?>