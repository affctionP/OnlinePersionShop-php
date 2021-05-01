<table  width="700" align="center">
	<caption ><b>فاکتور فروش</b></caption >
	<tr>
		<td align="center"><b>نام محصول خریداری شده</b></td >
		<td align="center"><b>تصویر محصول خریداری شده</b></td >
		<td align="center"><b>تعداد خریداری شده</b></td >
		<td align="center"><b>قیمت ضربدر تعداد </b></td >
	</tr >

    
    <?php
    $customer_email=$_GET['order_customer'];
    //get customer ip
    $get="SELECT * FROM customers WHERE customer_email='$customer_email'";
    $run=mysqli_query($con,$get);
    $row_customer=mysqli_fetch_array($run);
    $customer_ip=$row_customer['customer_ip'];
    $pay=$_GET['pay'];
    $id_order_paied=$_GET['id_order'];
    if($pay=="no"){
        $select="SELECT * FROM cart WHERE ip_add='$customer_ip'";
    }else{
        $select="SELECT * FROM pay_cart WHERE `order_id`=$id_order_paied";
    }
    $total=0;
    $run_sel=mysqli_query($con,$select);
    while($row_sel=mysqli_fetch_array($run_sel)){
        $pro_qty=$row_sel['qty'];
        $pro_id=$row_sel['p_id'];
        //get product detail
        $sel_pro="SELECT * FROM products WHERE product_id=$pro_id";
        $run_sel_pro=mysqli_query($con,$sel_pro);
        while($row_pro=mysqli_fetch_array($run_sel_pro)){
            $product_title	=	$row_pro['product_title'];
            $product_image	=	$row_pro['product_image'];
            $single_price	=	$row_pro['product_price'];
            ?>
            <tr>
            <td align="center">
						<?php echo $product_title ?>
					</td>
					
					<td align="center">
						<img src="<?php echo $product_image ?>" width="60" height="45" >
					</td>
					
					<td align="center">
						<?php echo $pro_qty; ?>  
					</td>
					
					<td align="center">
						<?php 
							$total=($single_price*$pro_qty);
							echo $total;
						?>  
					</td>
                    <?php } ?>
            </tr>
        <?php } ?>
        <tr>
			<td></td><td></td>
			<td align="center"><b style="font-size:30px;">مبلغ کل</b></td>
			<td align="center"><b><?php echo $_GET['Total_Amount']; ?></b></td >
		</tr>
    
    


</table>