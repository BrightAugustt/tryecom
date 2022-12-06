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

class cart_class extends db_connection
{
	// Wedding Cart Section
	public function deletewedding_cart($p_id,$c_id){

		// Write query
		$sql =  "DELETE FROM `cart` WHERE `p_id`='$p_id' AND `c_id`='$c_id'";
		// Return  
		return $this->db_query($sql);
	}

	public function addwedding_cart($p_id,$ip_add,$c_id,$qty){

		// Write query
		$sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `c_id`, `qty`) VALUES ('$p_id','$ip_add','$c_id','$qty')";
		// Return  
		return $this -> db_query($sql);
	}

	public function increasewedding_cart($p_id,$c_id){

		// Write query
		$sql = "UPDATE `cart` SET qty=(qty + 1 )  WHERE `p_id`='$p_id' AND `c_id`='$c_id'";
		// Return  
		return $this -> db_query($sql);
	}

	public function decreasewedding_cart($p_id,$c_id){

		// Write query
		$sql = "UPDATE `cart` SET qty=(qty - 1 )  WHERE `p_id`='$p_id' AND `c_id`='$c_id'";
		// Return  
		return $this -> db_query($sql);
	}

	public function updatewedding_cart($p_id,$c_id){

		// Write query
		$sql = "UPDATE `cart` SET qty=qty+1   WHERE `p_id`='$p_id' AND `c_id`='$c_id'";
		// Return  
		return $this -> db_query($sql);
	}


	public function selectallwedding_cart(){

		// Write query
		$sql =  "SELECT * FROM `cart`";
		// Return  
		return $this -> db_fetch_all($sql);
	}

	public function selectonewedding_cart($c_id){

		// Write query
		$sql =  "SELECT * FROM `cart` WHERE `c_id` = '$c_id'";
		// Return  
		return $this->db_fetch_all($sql);
	}

	public function countcartwedding_quantity($c_id){

		// Write query
		$sql =  "SELECT SUM(qty) FROM `cart` WHERE `c_id` = '$c_id'";
		// Return  
		return $this->db_fetch_all($sql);
	}

	public function updatecartwedding_quantity($p_id,$c_id){

		$sql = "UPDATE `cart` SET qty=qty-1 WHERE p_id = '$p_id' AND `c_id`='$c_id'";
		// Return  
		return $this -> db_query($sql);
	}

	public function checkcartwedding_quantity($qty,$p_id,$c_id){

		// Write query
		$sql =  "SELECT `qty` FROM `cart` WHERE `p_id` = '$p_id' AND `c_id`='$c_id'";
		// Return  
		return $this->db_fetch_all($sql);
	}

	public function getuserwedding_cart($c_id){

		// Write query
		$sql =  "SELECT * FROM `cart` inner join `products` on  cart.p_id = wedding.wedding_id WHERE `c_id`= '$c_id'";
		// Return  
		return $this->db_fetch_all($sql);
	}

	public function getuserwedding_details($c_id){

		// Write query
		$sql =  "SELECT * FROM customer WHERE customer_id= '$c_id' LIMIT 1";
		// Return  
		return $this->db_fetch_one($sql);
	}

	public function delteuserwedding_from_cart($c_id){

		// Write query
		$sql =  "DELETE FROM `cart` WHERE `c_id`='$c_id'";
		// Return  
		return $this->db_query($sql);
	}

	public function select_already_existing_weddingproducts($p_id,$c_id){

		// Write query
		$sql =  "SELECT `p_id`, `c_id` FROM `cart` WHERE `p_id`='$p_id' AND `c_id`='$c_id'";
		// Return  
		return $this->db_fetch_all($sql);
	}

	public function getfrom_weddingcart($a){

		// Write query
		$sql =  "SELECT wedding.wedding_price*cart.qty ,cart.qty, wedding.wedding_id,wedding.wedding_name ,wedding.wedding_price, wedding.wedding_label,wedding.wedding_img, wedding.wedding_key  FROM cart  
		INNER JOIN wedding ON cart.p_id = wedding.wedding_id WHERE cart.c_id ='$a'";
		// Return  
		return $this->db_fetch_all($sql);
	}

	public function insert_weddingorders($customer_id,$invoice_no, $order_date){

		// Write query
		$sql =  "INSERT INTO `orders`(`customer_id`, `invoice_no`, `order_date`, `order_status`) VALUES ('$customer_id','$invoice_no','$order_date','success')";
		// Return  
		return $this->db_query($sql);
	}

	public function insert_weddingpayment($amt,$customer_id,$order_id, $payment_date){

		// Write query
		$sql =  "INSERT INTO `payment`(`amt`, `customer_id`, `order_id`, `currency`, `payment_date`) 
        VALUES ('$amt','$customer_id','$order_id','GHS','$payment_date')";
		// Return  
		return $this->db_query($sql);
	}

	function get_weddingorder_id(){
		$sql="SELECT order_id from orders ORDER BY order_id DESC LIMIT 1";
		return $this->db_fetch_one($sql);
	
	}

	function get_weddingorder_date(){
		$sql="SELECT order_date from orders ORDER BY order_id DESC LIMIT 1";
		return $this->db_fetch_one($sql);
	}


	function insert_weddingorderdetails($order_id,$wedding_id,$qty){

		$sql="INSERT INTO `orderdetails`(`order_id`, `wedding_id`, `qty`) VALUES ('$order_id','$wedding_id','$qty')";
		return $this->db_query($sql);
	}

	

	function delete_after_pay_weddingcart($cid){
		$sql = "DELETE FROM `cart` WHERE `c_id`='$cid'";
	
		return $this->db_query($sql);
	}


	function get_cart_weddingdetails($c_id){

	$sql="SELECT `p_id`, `qty` FROM `cart` WHERE c_id='$c_id'";
		
	return $this->db_fetch_one($sql);
	}

	function total_weddingcart_price($a){
        $sql = "SELECT SUM(cart.qty*wedding.wedding_price) FROM `cart` INNER JOIN `wedding` ON cart.p_id = wedding.wedding_id WHERE cart.c_id ='$a'";
    
        return $this->db_fetch_one($sql);

    }

	
// ===============================================================================================================================================================================================

	/* SHOOT CART  */
	// Wedding Cart Section
	public function deleteshoot_cart($p_id,$c_id){

		// Write query
		$sql =  "DELETE FROM `shootcart` WHERE `p_id`='$p_id' AND `c_id`='$c_id'";
		// Return  
		return $this->db_query($sql);
	}

	public function addshoot_cart($p_id,$ip_add,$c_id,$qty){

		// Write query
		$sql = "INSERT INTO `shootcart`(`p_id`, `ip_add`, `c_id`, `qty`) VALUES ('$p_id','$ip_add','$c_id','$qty')";
		// Return  
		return $this -> db_query($sql);
	}

	public function increaseshoot_cart($p_id,$c_id){

		// Write query
		$sql = "UPDATE `shootcart` SET qty=(qty + 1 )  WHERE `p_id`='$p_id' AND `c_id`='$c_id'";
		// Return  
		return $this -> db_query($sql);
	}

	public function decreaseshoot_cart($p_id,$c_id){

		// Write query
		$sql = "UPDATE `shootcart` SET qty=(qty - 1 )  WHERE `p_id`='$p_id' AND `c_id`='$c_id'";
		// Return  
		return $this -> db_query($sql);
	}

	public function updateshoot_cart($p_id,$c_id){

		// Write query
		$sql = "UPDATE `shootcart` SET qty=qty+1   WHERE `p_id`='$p_id' AND `c_id`='$c_id'";
		// Return  
		return $this -> db_query($sql);
	}


	public function selectallshoot_cart(){

		// Write query
		$sql =  "SELECT * FROM `shootcart`";
		// Return  
		return $this -> db_fetch_all($sql);
	}

	public function selectoneshoot_cart($c_id){

		// Write query
		$sql =  "SELECT * FROM `shootcart` WHERE `c_id` = '$c_id'";
		// Return  
		return $this->db_fetch_all($sql);
	}

	public function countcartshoot_quantity($c_id){

		// Write query
		$sql =  "SELECT SUM(qty) FROM `shootcart` WHERE `c_id` = '$c_id'";
		// Return  
		return $this->db_fetch_all($sql);
	}

	public function updatecartshoot_quantity($p_id,$c_id){

		$sql = "UPDATE `shootcart` SET qty=qty-1 WHERE p_id = '$p_id' AND `c_id`='$c_id'";
		// Return  
		return $this -> db_query($sql);
	}

	public function checkcartshoot_quantity($qty,$p_id,$c_id){

		// Write query
		$sql =  "SELECT `qty` FROM `shootcart` WHERE `p_id` = '$p_id' AND `c_id`='$c_id'";
		// Return  
		return $this->db_fetch_all($sql);
	}

	public function getusershoot_cart($c_id){

		// Write query
		$sql =  "SELECT * FROM `shootcart` inner join `shoots` on  cart.p_id = shoot.shoot_id WHERE `c_id`= '$c_id'";
		// Return  
		return $this->db_fetch_all($sql);
	}

	public function getusershoot_details($c_id){

		// Write query
		$sql =  "SELECT * FROM customer WHERE customer_id= '$c_id' LIMIT 1";
		// Return  
		return $this->db_fetch_one($sql);
	}

	public function delteusershoot_from_cart($c_id){

		// Write query
		$sql =  "DELETE FROM `shootcart` WHERE `c_id`='$c_id'";
		// Return  
		return $this->db_query($sql);
	}

	public function select_already_existing_shootproducts($p_id,$c_id){

		// Write query
		$sql =  "SELECT `p_id`, `c_id` FROM `cart` WHERE `p_id`='$p_id' AND `c_id`='$c_id'";
		// Return  
		return $this->db_fetch_all($sql);
	}

	public function getfrom_shootcart($a){

		// Write query
		$sql =  "SELECT shoots.shoot_price*shootcart.qty ,shootcart.qty, shoots.shoot_id,shoots.shoot_name ,shoots.shoot_price, shoots.shoot_label,shoots.shoot_img, shoots.shoot_key FROM shootcart INNER JOIN shoots ON shootcart.p_id = shoots.shoot_id WHERE shootcart.c_id ='$a'";
		// Return  
		return $this->db_fetch_all($sql);
	}

	public function insert_shootorders($customer_id,$invoice_no, $order_date){

		// Write query
		$sql =  "INSERT INTO `shootorders`(`customer_id`, `invoice_no`, `order_date`, `order_status`) VALUES ('$customer_id','$invoice_no','$order_date','success')";
		// Return  
		return $this->db_query($sql);
	}

	public function insert_shootpayment($amt,$customer_id,$order_id, $payment_date){

		// Write query
		$sql =  "INSERT INTO `shootpayment`(`amt`, `customer_id`, `order_id`, `currency`, `payment_date`) 
        VALUES ('$amt','$customer_id','$order_id','GHS','$payment_date')";
		// Return  
		return $this->db_query($sql);
	}

	function get_shootorder_id(){
		$sql="SELECT order_id from orders ORDER BY order_id DESC LIMIT 1";
		return $this->db_fetch_one($sql);
		
	
	}

	function get_shootorder_date(){
		$sql="SELECT order_date from shootorders ORDER BY order_id DESC LIMIT 1";
		return $this->db_fetch_one($sql);
	}


	function insert_shootorderdetails($order_id,$shoot_id,$qty){

		$sql="INSERT INTO `shootdetails`(`order_id`,`shoot_id`, `qty`) 
		VALUES ('$order_id','$shoot_id','$qty')";
		
		return $this->db_query($sql);
	}

	function delete_after_pay_shootcart($cid){
		$sql = "DELETE FROM `shootcart` WHERE `c_id`='$cid'";
	
		return $this->db_query($sql);
	}


	function get_cart_shootdetails($c_id){

	$sql="SELECT `p_id`, `qty` FROM `shootcart` WHERE c_id='$c_id'";
		
	return $this->db_fetch_one($sql);
	}

	function total_shootcart_price($a){
        $sql = "SELECT SUM(shootcart.qty*shoots.shoot_price) FROM `shootcart` INNER JOIN `shoots` ON shootcart.p_id = shoots.shoot_id WHERE shootcart.c_id ='$a'";
    
        return $this->db_fetch_one($sql);

    }





































}

?>