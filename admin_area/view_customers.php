<table>

    <tr>
        <th><b>ردیف</b></th>
        <th><b>نام</b></th>
        <th><b>ایمیل</b></th>
        <th><b>تصویر</b></th>
        
        <th><b>حذف</b></th>     

    </tr>
    <?php
    //include('includes/db.php');
    $get_cu="SELECT * FROM customers WHERE confirmed=1";
    $run_cu=mysqli_query($con,$get_cu);
    $i=0;
    while($row_cu=mysqli_fetch_array($run_cu)){
        $customer_id=$row_cu['customer_id'];
        $customer_name=$row_cu['customer_name'];
        $customer_lastname=$row_cu['customer_lastname'];
        $customer_email=$row_cu['customer_email'];
        $customer_provice=$row_cu['customer_provice'];
        $customer_city=$row_cu['customer_city'];
        $customer_image=$row_cu['customer_image'];
        $customer_address=$row_cu['customer_address'];
        $i++;

    ?>
    <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $customer_name;?></td>
        <td><?php echo $customer_email; ?></td>
        <td><img src="../<?php echo $customer_image; ?>" width="50px " height="50px"></td>

        <td ><a style="color:red;" href="index.php?delete_customer=<?php echo $customer_id?>">حذف</a></td>

    </tr>
    <tr>
        <td></td>
        <td >
        
    <div class="accordion" id="accordion2">
							<div class="accordion-group">
								<div class="accordion-heading" dir="rtl">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">جزییات کاربر </a>
								</div>
                                <div id="collapseTwo" class="accordion-body collapse">
									<div class="accordion-inner">
										<div class="row-fluid">
                                        <?php
            echo $customer_provice."-".$customer_city."<br>"
            .$customer_address;
            ?>
                                        </div>
                                    </div>
                            </div>
						</div></td>	
    </tr>
    <?php } ?>

</table>