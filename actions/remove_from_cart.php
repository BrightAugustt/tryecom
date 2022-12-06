<?php
include("../controllers/product_controller.php");
session_start();

if (isset($_POST['deleteCart'])){
    $p_id = $_POST['p_id'];

    deletecart_ctr($p_id,$_SESSION['customer_id']);
    
    header('Location: ../view/cart.php');
}
?>