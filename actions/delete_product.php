<?php
include("../controllers/product_controller.php");

if(isset($_POST["delete"])){
    $product_id = $_POST["product_id"];

    // controller
    $result=deleteproduct_ctr($product_id);
    
    if($result==true){
        header('Location:../Admin/view_product.php');
    }else{
        echo"Couldn't delete";
    }
}else{
    echo "Something went wrong";
}




?>