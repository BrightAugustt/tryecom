<?php
include("../controllers/product_controller.php");

if(isset($_POST["delete"])){
    $brand_id = $_POST["brand_id"];
    echo $brand_id;

    // controller
    $result=deletebrand_ctr($brand_id);
    
    if($result==true){
        header('Location:../Admin/view_brand.php');
    }else{
        echo"Couldn't delete";
    }
}else{
    echo "Something went wrong";
}




?>