
<?php
include("../controllers/product_controller.php");

// Collecting form data
// GET is used by default so define the type of method
// POST is used for secure information transmission.
if(isset($_POST["addbrand"])){

    // Variable to capture the name value for each user input.
    $brand_name = $_POST["brand_name"];

    echo $brand_name;

    // Call a controller
    $result = addBrand_ctr($brand_name);

    if($result == true){

         // redirect to login
    header('Location:../Admin/view_brand.php');
    }

   
}else{
    echo "Something went wrong";
}


?>