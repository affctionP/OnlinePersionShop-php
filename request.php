<?php

include('admin_area/db.php');
session_start();
//variable
$order_id_for_zarinpal=$_SESSION['order_id'];
$Amount=$_SESSION['order_total_price'];
$MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX'; //Required
$Description = " تست درگاه زرین پال "; // Required
$Email = "affctionhossiny@yahoo.com"; // Optional
$Mobile = '09123456789'; // Optional
$callBack="http://localhost:8000/HosseiniShop/verify.php?Amount=$Amount&order_id=$order_id_for_zarinpal";
$client=new SoapClient('http://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
$result=$client->PaymentRequest(
    [
    'MerchantID' => $MerchantID,
    'Amount' => $Amount,
    'Description' => $Description,
    'Email' => $Email,
    'Mobile' => $Mobile,
    'CallbackURL' => $callBack,
    ]
    );
//Enter the Authority field value in the order table
$au=$result->Authority;	
$sql="UPDATE `order` SET `authority`='$au' WHERE `order_id`=$order_id_for_zarinpal";
mysqli_query($con,$sql);

//Redirect to URL You can do it also by creating a form
if ($result->Status == 100) {
Header('Location: https://sandbox.zarinpal.com/pg/StartPay/'.$result->Authority);
} else {
echo'ERR: '.$result->Status;
}
?>