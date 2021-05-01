<table  width="700" align="center">
	<caption ><b>مشاهده همه پرداختی ها</b></caption >
	<tr>
		<td align="center"><b>نام و نام خانوادگی</b></td >
		<td align="center"><b>راههای ارتباطی</b></td >
		<td align="center"><b>شماره و تاریخ فاکتور</b></td >
		<td align="center"><b>قیمت کل فاکتور</b></td >
	</tr>
	<tr>
		<?php
			
			$select_order="SELECT * FROM `order` where order_is_verified='true' ";
			$run_order=mysqli_query($con,$select_order);
			while($row_order = mysqli_fetch_array($run_order))
			{
                $id_order=$row_order['order_id'];
				$order_total_price=$row_order['order_total_price'];
				$order_email_customer=$row_order['order_email_customer'];

                $select_customer="select * from pay_cart where order_id=$id_order order by cart_id desc limit 1";
				$run_customer=mysqli_query($con,$select_customer);
				while ($row_customer=mysqli_fetch_array($run_customer))
				{
					/* Obtaining time pay order from a pay_cart data table and using it */
					$time_pay_order=$row_customer['order_time'];
				}
                //customer detail
                $select_user = "select * from customers where `customer_email`='$order_email_customer'";
				$run_custom = mysqli_query($con,"SET NAMES utf8");
				$run_custom = mysqli_query($con,"SET CHARACTER SET utf8");
				$run_custom = mysqli_query($con,$select_user);
				while($row_custom = mysqli_fetch_array($run_custom))
				{
					$customer_name=$row_custom["customer_name"];
					$customer_lastname=$row_custom["customer_lastname"];
					$customer_province=$row_custom["customer_provice"];
					$customer_city=$row_custom["customer_city"];
					$customer_address=$row_custom["customer_address"];
					$customer_phone=$row_custom["customer_phone"];
					
				?>
                <td align="center"><?php echo $customer_name." ".$customer_lastname; ?></td >
				<td><?php echo "<b style='color:#811044;font-size:21px;line-height:1.5;'>آدرس  : </b> $customer_province - $customer_city - $customer_address <br/><br/><b style='color:#811044;font-size:21px;line-height:1.5;'>شماره تلفن : </b>$customer_phone <br/><br/> <b style='color:#811044;font-size:21px;line-height:1.5;'>آدرس ایمیل:</b>$order_email_customer"; ?></td >
				<td><?php echo "<b style='color:#811044;font-size:21px;line-height:1.5;'>شماره فاکتور :</b> $id_order <br/> <b style='color:#811044;font-size:21px;line-height:1.5;'>زمان پرداخت :</b> $time_pay_order"; ?></td >
				<td align="center"><p><?php echo $order_total_price; ?></p></td >
				
			</tr>
            <?php }
            }
            ?>
</table>