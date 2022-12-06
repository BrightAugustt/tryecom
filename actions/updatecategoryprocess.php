
<?php
include("../controllers/product_controller.php");

// Collecting form data
// GET is used by default so define the type of method
// POST is used for secure information transmission.
if(isset($_POST["updatecat"])){

    // Variable to capture the name value for each user input.
    $cat_id = $_POST["cat_id"];
    $cat_name = $_POST["cat_name"];
    echo $cat_id,$cat_name;

    $catupdate=  updateCategory_ctr($cat_id,$cat_name);

    if($catupdate == true){

        header('Location:../Admin/view_cat.php');
    }

}else{
    echo "Something went wrong";
}


?>