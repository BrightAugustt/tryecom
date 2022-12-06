
<?php
include("../controllers/product_controller.php");

// Collecting form data
// GET is used by default so define the type of method
// POST is used for secure information transmission.
if(isset($_POST["addproduct"])){
    $allowTypes = array('jpg','png','jpeg','gif');

    // Variable to capture the name value for each user input.
    $product_cat = $_POST["product_cat"];
    $product_brand = $_POST["product_brand"];
    $product_title = $_POST["product_title"];
    $product_price = $_POST["product_price"];
    $product_desc = $_POST["product_desc"];
    $product_keywords = $_POST["product_keywords"];
  
    // image upload 
    $output_dir = "../images/images/products/";
    $RandomNum = time();
    $ImageName = str_replace(' ','-',strtolower($_FILES['product_image']['name'][0]));
    $ImageType = $_FILES['product_image']['type'][0];
    $ImageExt = substr($ImageName,strrpos($ImageName,'.'));
    $ImageExt = str_replace('.','',$ImageExt);
    $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
    $ret[$NewImageName]= $output_dir.$NewImageName;

    move_uploaded_file($_FILES["product_image"]["tmp_name"][0],$output_dir."/".$NewImageName);
        if(addProducts_ctr($product_cat, $product_brand,$product_title,$product_price,$product_desc,$NewImageName,$product_keywords)==TRUE){
            echo"<script>alert('product submitted successfully')</script>";
            header('Location:../Admin/view_product.php');
        }else{
            echo "<script>alert('shoot not submitted successfully')</script>";
        }

}else{
    echo "Something went wrong";
}


?>