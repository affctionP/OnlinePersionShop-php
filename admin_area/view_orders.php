<table   align="center">
	<caption ><b>مشاهده همه سفارشات</b></caption >
	<tr>
		<th colspan="5">
			<b style="background-color:green;">&nbsp&nbspفاکتور های پرداخت شده سبز رنگ هستند.&nbsp&nbsp</b>
			
		<b style="background-color:red;">&nbsp&nbspفاکتور های پرداخت نشده قرمز رنگ هستند.&nbsp&nbsp</b></th>
	</tr>
	<tr>
		<td><b>ردیف</b></td >
		<td><b>ایمیل مشتری</b></td >
		<td><b>تاریخ فاکتور</b></td >
		<td><b>قیمت کل فاکتور</b></td >
		<td><b>مشاهده سفارش</b></td >
	</tr>
    <?php
    $i=0;
    $get_order="SELECT * FROM `order`";
    $run_order=mysqli_query($con,$get_order);
    while($row_order=mysqli_fetch_array($run_order)){
        $order_id=$row_order['order_id'];
        $order_total_price=$row_order['order_total_price'];
        $order_is_verified=$row_order['order_is_verified'];
        $time_pay_order;
        if($order_is_verified=='true'){
            $time_get=mysqli_query($con,"SELECT order_time FROM pay_cart WHERE `order_id`=$order_id");
            while($time_row=mysqli_fetch_array($time_get)){
                $time_pay_order=$time_row['order_time'];

            }
        }else{
            $time_pay_order=$row_order['order_time'];
        }
        $order_email_customer=$row_order['order_email_customer'];
        $i++;

    
    ?>
    <tr>
    <td style="background:<?php if($order_is_verified=="false"){echo "#e69090";}else{ echo "#90db90";} ?>"><?php echo $i; ?></td>
    <td style="background:<?php if($order_is_verified=="false"){echo "#e69090";}else{ echo "#90db90";} ?>"><?php echo $order_email_customer; ?></td>
    <td style="background:<?php if($order_is_verified=="false"){echo "#e69090";}else{ echo "#90db90";} ?>"><?php echo $time_pay_order; ?></td>
    <td style="background:<?php if($order_is_verified=="false"){echo "#e69090";}else{ echo "#90db90";} ?>"><?php echo $order_total_price;?></td>
    <td style="background:<?php if($order_is_verified=="false"){echo "#e69090";}else{ echo "#90db90";} ?>">
    <a href="index.php?pay=<?php if($order_is_verified=="true"){echo"yes";}else{echo"no";}?>&order_customer=<?php echo $order_email_customer; ?>&Total_Amount=<?php echo $order_total_price ?>&id_order=<?php echo $order_id; ?>">مشاهده</a></td>
    </tr>
    <?php }?>
</table>