
<?php
include("../controllers/product_controller.php");

// Collecting form data
// GET is used by default so define the type of method
// POST is used for secure information transmission.
if(isset($_POST["addcategory"])){

    // Variable to capture the name value for each user input.
    $cat_name = $_POST["cat_name"];

    // Call a controller
    addCategory_ctr($cat_name);

    // Call a controller
    $result = addCategory_ctr($cat_name);

    if($result == true){

         // redirect to login
    header('Location:../Admin/view_cat.php');
    }

}else{
    echo "Something went wrong";
}


?>