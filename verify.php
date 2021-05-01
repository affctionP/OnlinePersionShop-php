<?php include ('includes/master.php');
include('includes/nav.php');
?>
<section class="main-content">	
    <?php
    include('admin_area/db.php');
    $order_id=$_GET['order_id'];
    if($_GET['Status']=='OK'){
        $MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX';
		$Amount = $_GET['Amount']; //Amount will be based on Toman
		$Authority = $_GET['Authority'];
        $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
		
		$result = $client->PaymentVerification(
		[
		'MerchantID' => $MerchantID,
		'Authority' => $Authority,
		'Amount' => $Amount,
		]
		);
        if ($result->Status == 100) {
			
			echo "<p style='background:green; padding: 27px;	font-size: 20px; border-radius: 15px;border: 5px dashed white;'>از خرید شما متشکریم کد RefID برای پیگیری های بعدی شما :".$result->RefID."می باشد.</p>";
			$RefID=$result->RefID;
			mysqli_query($con,"UPDATE `order` SET `order_is_verified`='true', `refid`=$RefID WHERE `order_id`=$order_id ");	
			if(isset($_COOKIE["ipUserEcommerce"])){
				$ip=$_COOKIE["ipUserEcommerce"];
			}else{
				$ip=getIp();
				setcookie("ipUserEcommerce",$ip,1206900);
			}
			mysqli_query($con,"INSERT INTO pay_cart(ip_add,p_id,qty)
			SELECT ip_add, p_id, qty FROM cart WHERE ip_add='$ip'");
			$run_time=mysqli_query($con,"SELECT * FROM pay_cart WHERE ip_add='$ip'
			ORDER BY cart_id DESC LIMIT 1");
			while($row=mysqli_fetch_array($run_time)){
				$time=$row['order_time'];

			}
			//set order_id
			mysqli_query($con,"UPDATE `pay_cart` SET `order_id`=$order_id WHERE `order_time`='$time'");
			unset($_SESSION["order_total_price"]);
			unset($_SESSION["order_id"]);
			//destroying sessions that hold the qty.
			$str_ip= str_replace(".", "", "$ip");
			$query_delete_session="SELECT * FROM `pay_cart` WHERE `order_id`=$order_id";
			$run_delete_session=mysqli_query($con,$query_delete_session);
			while ($row = mysqli_fetch_array($run_delete_session))
			{
				$product_id=$row["p_id"];
				unset($_SESSION["$str_ip"]["$product_id"]);
			}
			

			//Delete customer data from the cart data table
			mysqli_query($con,"DELETE FROM cart WHERE ip_add='$ip'");
			
			
			
			} else {
			
			echo "<p style='background:red; padding: 27px;	font-size: 20px; border-radius: 15px;border: 5px dashed white;'> تراکنش انجام نشد : 
		  :".$result->Status."</p>";
			
		}
    }else{
        "<p style='background:red; padding: 27px;	font-size: 20px; border-radius: 15px;border: 5px dashed white;'> تراکنش توسط کاربر انجام نشد </p>";
    }
    ?>
</section>