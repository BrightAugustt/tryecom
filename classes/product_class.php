<?php
//connect to database class
require("../settings/db_class.php");

/**
*General class to handle all functions 
*/
/**
 *@author David Sampah
 *
 */

class product_class extends db_connection
{
	//--INSERT into brand--//
	
	public function add_brand($brand_name){

		// Write query
		$sql = "INSERT INTO `brands`(`brand_name`) VALUES ('$brand_name')";
		// Return  
		return $this -> db_query($sql);
	}


    //--INSERT into category--//
	
	public function add_category($cat_name){

		// Write query
		$sql = "INSERT INTO `categories`(`cat_name`) VALUES ('$cat_name')";
		// Return  
		return $this -> db_query($sql);
	}

    //--INSERT into products--//
	
	public function add_product($product_cat, $product_brand,$product_title,$product_price,$product_desc,$product_image,$product_keywords){

		// Write query
		$sql = "INSERT INTO `products`( `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
		// Return  
		return $this -> db_query($sql);
	}
	//--Update brand--//
	
	public function update_brand($brand_id,$brand_name){

		// Write query
		$sql = "UPDATE `brands` SET `brand_name`='$brand_name' WHERE `brand_id` = '$brand_id'";
		// Return  
		return $this->db_query($sql);
	}

    //--INSERT into category--//
	
	public function update_category($cat_id,$cat_name){

		// Write query
		$sql = "UPDATE `categories` SET `cat_name`='$cat_name' WHERE `cat_id` = '$cat_id' ";
		// Return  
		return $this -> db_query($sql);
	}

    //--Update all  products--//
	
	public function update_product($product_id,$product_cat, $product_brand,$product_title,$product_price,$product_desc,$product_image,$product_keywords){

		// Write query
		$sql = "UPDATE `products` SET `product_cat`='$product_cat',`product_brand`='$product_brand',`product_title`='$product_title',`product_price`='$product_price',`product_desc`='$product_desc',`product_image`='$product_image',`product_keywords`='$product_keywords' WHERE `product_id` = '$product_id' ";
		// Return  
		return $this -> db_query($sql);
	}

	//--Select all brand--//
	
	public function selectall_brand(){

		// Write query
		$sql =  "SELECT * FROM `brands`";
		// Return  
		return $this -> db_fetch_all($sql);
	}

	public function selectall_category(){

		// Write query
		$sql =  "SELECT * FROM `categories`";
		// Return  
		return $this -> db_fetch_all($sql);
	}

	public function selectall_product(){

		// Write query
		$sql =  "SELECT * FROM `products`";
		// Return  
		return $this -> db_fetch_all($sql);
	}

	public function selectone_brand($brand_id){

		// Write query
		$sql =  "SELECT * FROM `brands` WHERE `brand_id` = '$brand_id'";
		// Return  
		return $this->db_fetch_all($sql);
	}

	public function selectone_category($cat_id){

		// Write query
		$sql =  "SELECT * FROM `categories` WHERE `cat_id` = '$cat_id'";
		// Return  
		return $this->db_fetch_all($sql);
	}

	public function selectone_product($product_id){

		// Write query
		$sql =  "SELECT * FROM `products` WHERE `product_id` = '$product_id'";
		// Return  
		return $this->db_fetch_one($sql);
	}

	public function searchone_product($product_brand){

		// Write query
		$sql =  "SELECT * FROM products WHERE product_title LIKE '%$product_brand%'";
		// Return  
		return $this->db_fetch_one($sql);
	}

	public function search_product($product_brand){

		// Write query
		$sql =  "SELECT * FROM products WHERE product_title LIKE '%$product_brand%'";
		// Return  
		return $this->db_fetch_all($sql);
	}



	public function delete_product($product_id){

		// Write query
		$sql =  "DELETE FROM `products` WHERE `product_id`= '$product_id'";
		// Return  
		return $this->db_query($sql);
	}

    public function delete_brand($brand_id){

		// Write query
		$sql =  "DELETE FROM `brands` WHERE `brand_id`= '$brand_id'";
		// Return  
		return $this->db_query($sql);
	}

    public function delete_category($cat_id){

		// Write query
		$sql =  "DELETE FROM `categories` WHERE `cat_id`= '$cat_id'";
		// Return  
		return $this->db_query($sql);
	}


// Cart section
	public function delete_cart($p_id,$c_id){

		// Write query
		$sql =  "DELETE FROM `cart` WHERE `p_id`='$p_id' AND `c_id`='$c_id'";
		// Return  
		return $this->db_query($sql);
	}

	public function add_cart($p_id,$ip_add,$c_id,$qty){

		// Write query
		$sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `c_id`, `qty`) VALUES ('$p_id','$ip_add','$c_id','$qty')";
		// Return  
		return $this -> db_query($sql);
	}

	public function increase_cart($p_id,$c_id){

		// Write query
		$sql = "UPDATE `cart` SET qty=(qty + 1 )  WHERE `p_id`='$p_id' AND `c_id`='$c_id'";
		// Return  
		return $this -> db_query($sql);
	}

	public function decrease_cart($p_id,$c_id){

		// Write query
		$sql = "UPDATE `cart` SET qty=(qty - 1 )  WHERE `p_id`='$p_id' AND `c_id`='$c_id'";
		// Return  
		return $this -> db_query($sql);
	}

	public function update_cart($p_id,$c_id){

		// Write query
		$sql = "UPDATE `cart` SET qty=qty+1   WHERE `p_id`='$p_id' AND `c_id`='$c_id'";
		// Return  
		return $this -> db_query($sql);
	}


	public function selectall_cart(){

		// Write query
		$sql =  "SELECT * FROM `cart`";
		// Return  
		return $this -> db_fetch_all($sql);
	}

	public function selectone_cart($c_id){

		// Write query
		$sql =  "SELECT * FROM `cart` WHERE `c_id` = '$c_id'";
		// Return  
		return $this->db_fetch_all($sql);
	}

	public function countcart_quantity($c_id){

		// Write query
		$sql =  "SELECT SUM(qty) FROM `cart` WHERE `c_id` = '$c_id'";
		// Return  
		return $this->db_fetch_all($sql);
	}

	public function updatecart_quantity($p_id,$c_id){

		$sql = "UPDATE `cart` SET qty=qty-1 WHERE p_id = '$p_id' AND `c_id`='$c_id'";
		// Return  
		return $this -> db_query($sql);
	}

	public function checkcart_quantity($qty,$p_id,$c_id){

		// Write query
		$sql =  "SELECT `qty` FROM `cart` WHERE `p_id` = '$p_id' AND `c_id`='$c_id'";
		// Return  
		return $this->db_fetch_all($sql);
	}

	public function getuser_cart($c_id){

		// Write query
		$sql =  "SELECT * FROM `cart` inner join `products` on  cart.p_id = products.product_id WHERE `c_id`= '$c_id'";
		// Return  
		return $this->db_fetch_all($sql);
	}

	public function getuser_details($c_id){

		// Write query
		$sql =  "SELECT * FROM customer WHERE customer_id= '$c_id' LIMIT 1";
		// Return  
		return $this->db_fetch_one($sql);
	}

	public function delteuser_from_cart($c_id){

		// Write query
		$sql =  "DELETE FROM `cart` WHERE `c_id`='$c_id'";
		// Return  
		return $this->db_query($sql);
	}

	public function select_already_existing_products($p_id,$c_id){

		// Write query
		$sql =  "SELECT `p_id`, `c_id` FROM `cart` WHERE `p_id`='$p_id' AND `c_id`='$c_id'";
		// Return  
		return $this->db_fetch_all($sql);
	}

	public function getfrom_cart($a){

		// Write query
		$sql =  "SELECT products.product_price*cart.qty ,cart.qty, products.product_id,products.product_title ,products.product_desc, products.product_image,products.product_price FROM cart  
		INNER JOIN products ON cart.p_id = products.product_id WHERE cart.c_id ='$a'";
		// Return  
		return $this->db_fetch_all($sql);
	}

	public function insert_orders($customer_id,$invoice_no, $order_date){

		// Write query
		$sql =  "INSERT INTO `orders`(`customer_id`, `invoice_no`, `order_date`, `order_status`) VALUES ('$customer_id','$invoice_no','$order_date','success')";
		// Return  
		return $this->db_query($sql);
	}

	public function insert_payment($amt,$customer_id,$order_id, $payment_date){

		// Write query
		$sql =  "INSERT INTO `payment`(`amt`, `customer_id`, `order_id`, `currency`, `payment_date`) 
        VALUES ('$amt','$customer_id','$order_id','GHS','$payment_date')";
		// Return  
		return $this->db_query($sql);
	}

	function get_order_id(){
		$sql="SELECT order_id from orders ORDER BY order_id DESC LIMIT 1";
		return $this->db_fetch_one($sql);
	
	}

	function get_order_date(){
		$sql="SELECT order_date from orders ORDER BY order_id DESC LIMIT 1";
		return $this->db_fetch_one($sql);
	}


	function insert_orderdetails($order_id,$product_id,$qty){

		$sql="INSERT INTO `orderdetails`(`order_id`,`product_id`, `qty`) 
		VALUES ('$order_id','$product_id','$qty')";
		
		return $this->db_query($sql);
	}

	function delete_after_pay_cart($cid){
		$sql = "DELETE FROM `cart` WHERE `c_id`='$cid'";
	
		return $this->db_query($sql);
	}


	function get_cart_details($c_id){

	$sql="SELECT `p_id`, `qty` FROM `cart` WHERE c_id='$c_id'";
		
	return $this->db_fetch_one($sql);
	}

	function total_cart_price($a){
        $sql = "SELECT SUM(cart.qty*products.product_price) FROM `cart` INNER JOIN `products` ON cart.p_id = products.product_id WHERE cart.c_id ='$a'";
    
        return $this->db_fetch_one($sql);
     
    }

}
?>