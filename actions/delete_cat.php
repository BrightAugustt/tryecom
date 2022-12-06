<?php
include("../controllers/product_controller.php");

if(isset($_POST["delete"])){
    $cat_id = $_POST["cat_id"];

    // controller
    $result=deletecat_ctr($cat_id);
    
    if($result==true){
        header('Location:../Admin/view_cat.php');
    }else{
        echo"Couldn't delete";
    }
}else{
    echo "Something went wrong";
}




?>