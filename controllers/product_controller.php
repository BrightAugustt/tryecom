<?php
//connect to the user account class
include("../classes/product_class.php");

//sanitize data




//--INSERT--//
function addBrand_ctr($brand_name){

    // Create an instance of the product class
    $add_brand = new product_class();

     return $add_brand->add_brand($brand_name);

}

function addCategory_ctr($cat_name){

    // Create an instance of the product class. 
    $add_category = new product_class();

     return $add_category->add_category($cat_name);

}

function addProducts_ctr($product_cat, $product_brand,$product_title,$product_price,$product_desc,$product_image,$product_keywords){

    // Create an instance of the class
    $add_product= new product_class();

     return $add_product->add_product($product_cat, $product_brand,$product_title,$product_price,$product_desc,$product_image,$product_keywords);

}

function updateBrand_ctr($brand_id,$brand_name){

    // Create an instance of the product class
    $update_brand = new product_class();

     return $update_brand->update_brand($brand_id,$brand_name);

}

function updateCategory_ctr($cat_id,$cat_name){

    // Create an instance of the product class. 
    $update_category = new product_class();

     return $update_category->update_category($cat_id,$cat_name);

}

function updateProducts_ctr($product_id,$product_cat, $product_brand,$product_title,$product_price,$product_desc,$product_image,$product_keywords){

    // Create an instance of the class
    $add_product= new product_class();

     return $add_product->add_product($product_id,$product_cat, $product_brand,$product_title,$product_price,$product_desc,$product_image,$product_keywords);

}

function selectall_brand_ctr(){

    // Create an instance of the product class. 
    $selectall_brand = new product_class();

     return $selectall_brand->selectall_brand();

}
function selectall_category_ctr(){

    // Create an instance of the product class. 
    $selectall_category = new product_class();

     return $selectall_category->selectall_category();

}

function selectall_product_ctr(){

    // Create an instance of the product class. 
    $selectall_product = new product_class();

     return $selectall_product->selectall_product();

}


function selectonecategory_ctr($cat_id){

    // Create an instance of the product class. 
    $selectone= new product_class();

     return $selectone->selectone_category($cat_id);

}

function selectonebrand_ctr($brand_id){

    // Create an instance of the product class. 
    $selectone= new product_class();

     return $selectone->selectone_brand($brand_id);

}

function selectoneproduct_ctr($product_id){

    // Create an instance of the product class. 
    $selectone= new product_class();

     return $selectone->selectone_product($product_id);

}

function deleteproduct_ctr($product_id){

    // Create an instance of the product class. 
    $selectone= new product_class();

     return $selectone->delete_product($product_id);

}

function deletebrand_ctr($brand_id){

    // Create an instance of the product class. 
    $selectone= new product_class();

     return $selectone->delete_brand($brand_id);

}

function deletecat_ctr($cat_id){

    // Create an instance of the product class. 
    $selectone= new product_class();

     return $selectone->delete_category($cat_id);

}

function searchproduct_ctr($product_brand){

    // Create an instance of the product class. 
    $selectone= new product_class();

     return $selectone->search_product($product_brand);

}

function addcart_ctr($p_id,$ip_add,$c_id,$qty){

    // Create an instance of the product class. 
    $addcart= new product_class();

     return $addcart->add_cart($p_id,$ip_add,$c_id,$qty);

}

function selectallcart_ctr(){

    // Create an instance of the product class. 
    $selectcart= new product_class();

     return $selectcart->selectall_cart();

}

function selectonecart_ctr($p_id){

    // Create an instance of the product class. 
    $selectone= new product_class();

     return $selectone->selectone_cart($p_id);

}

function deletecart_ctr($p_id,$c_id){

    // Create an instance of the product class. 
    $selectone= new product_class();

     return $selectone->delete_cart($p_id,$c_id);

}

function increasecart_ctr($p_id,$c_id){

    // Create an instance of the product class. 
    $increasecart= new product_class();

     return $increasecart->increase_cart($p_id,$c_id);

}

function decreasecart_ctr($p_id,$c_id){

    // Create an instance of the product class. 
    $increasecart= new product_class();

     return $increasecart->decrease_cart($p_id,$c_id);

}

function getuser_cart_ctr($c_id){

    // Create an instance of the product class. 
    $increasecart= new product_class();

     return $increasecart->getuser_cart($c_id);

}

function selectuser_ctr($c_id){

    // Create an instance of the product class. 
    $increasecart= new product_class();

     return $increasecart->getuser_details($c_id);

}

function deleteuser__from_cart_ctr($c_id){

    // Create an instance of the product class. 
    $increasecart= new product_class();

     return $increasecart->delteuser_from_cart($c_id);

}

function updatecart_qty_ctr($p_id,$c_id){

    // Create an instance of the product class. 
    $increasecart= new product_class();

     return $increasecart->updatecart_quantity($p_id,$c_id);

}

function count_cart_ctr($c_id){

    // Create an instance of the product class. 
    $increasecart= new product_class();

     return $increasecart->countcart_quantity($c_id);

}

function select_already_existing_products_ctr($p_id,$c_id){

    // Create an instance of the product class. 
    $increasecart= new product_class();

     return $increasecart->select_already_existing_products($p_id,$c_id);

}

function get_from_cart_ctr($a){

    // Create an instance of the product class. 
    $increasecart= new product_class();

     return $increasecart->getfrom_cart($a);

}

function insert_orders_ctr($customer_id,$invoice_no, $order_date){
    $add = new product_class();
    return $add->insert_orders($customer_id,$invoice_no, $order_date);
}

function insert_payment_ctr($amt,$customer_id,$order_id, $payment_date){
    $add = new product_class();
    return $add->insert_payment($amt,$customer_id,$order_id, $payment_date);
}

function get_order_id_ctr(){
    $add = new product_class();
    return $add->get_order_id();
}

function get_order_date_ctr(){
    $add = new product_class();
    return $add->get_order_date();
}

function insert_orderdetails_ctr($order_id,$product_id,$qty){
    $add = new product_class();
    return $add->insert_orderdetails($order_id,$product_id,$qty);
}

function delete_after_pay_ctr($cid){
    $add = new product_class();
    return $add->delete_after_pay_cart($cid);
}

function get_cart_details_ctr($c_id){
    $add = new product_class();
    return $add->get_cart_details($c_id);
}


function total_cart_price_ctr($a){
    $get_total = new product_class();
    return $get_total->total_cart_price($a);
}









?>