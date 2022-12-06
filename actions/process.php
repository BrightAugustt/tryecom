<?php
require('../controllers/product_controller.php');
session_start();
$cid = $_SESSION['customer_id'];
$email =$_POST['email'];
$amount =$_POST['amount5'];

$url = "https://api.paystack.co/transaction/verify/".$_GET['reference'];

$fields = [

    'email' => "$email",
    'amount' => $amount
];

$fields_string = http_build_query($fields);


// Open Connection
$ch = curl_init();
//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer sk_test_cd22aa0dd31f43894ea5f58a76a918f79d43dc4d",
    "Cache-Control: no-cache",
));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// execute post
$result = curl_exec($ch);

$invoice =  mt_rand();
$date = date("Y-m-d");


$order = insert_orders_ctr($cid,$invoice,$date);

if ($order == true){
    echo"order recordered";
}else{
    echo"order not recordered";
}

$order_id =get_order_id_ctr();
$order_date=get_order_date_ctr();

$or =$order_id['order_id'];
$od = $order_date['order_date'];

$payment = insert_payment_ctr($amount,$cid,$or,$od);
if($payment == true){
    echo "success";
}else{
    echo"failed";
}

$cartd = get_cart_details_ctr($cid);
$p_id = $cartd['p_id'];
$qty = $cartd['qty'];

$orderdetails = delete_after_pay_ctr($cid);

if ($orderdetails == true){
    echo "order details";
}else{
    echo "order not working";
}

$delcart = delete_after_pay_ctr($cid);
if($delcart == true){

}


?>