<?php
session_start();
 include("../controllers/product_controller.php");

//  Collect search input from user
if(isset($_POST['addToCart'])){

   $p_id = $_POST['p_id'];
   $c_id = $_SESSION['customer_id'];
   $ip_add = $_SERVER['REMOTE_ADDR'];
   $qty = $_POST['qty'];
    
   $add=addcart_ctr($p_id,$ip_add,$c_id,$qty);
   if($add == true){
      header('Location: ../view/cart.php');
   }else{
      echo "couldn't add to cart.";
   }
   // echo $_SESSION['customer_id'];
  
}

?>