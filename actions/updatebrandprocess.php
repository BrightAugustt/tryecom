
<?php
include("../controllers/product_controller.php");

// Collecting form data
// GET is used by default so define the type of method
// POST is used for secure information transmission.
if(isset($_POST["updatebrand"])){

    // Variable to capture the name value for each user input.
    $brand_id = $_POST['brand_id'];
    $brand_name = $_POST['brand_name'];

    echo $brand_id,$brand_name;

    $update = updateBrand_ctr($brand_id,$brand_name);
    

    if($update == true){
        header('Location:../Admin/view_brand.php');
    }
    

}else{
    echo "Something went wrong";
}


?>