<div class="span3 col">
						<div class="block">	
							<ul class="nav nav-list">
								
                                
								<?php
								

								$name=$_SESSION['name'];
								//$last=$_SESSION['lastname'];
								echo "<li class='nav-header' style='font-size:12px;'><h3 align='center'>$name</h3></li>";
								
                                $email=$_SESSION['customer_email'];
                                $get_image="SELECT * FROM customers WHERE customer_email='$email'";
                                $run=mysqli_query($con,$get_image);
                                $row=mysqli_fetch_array($run);
                                $image=$row['customer_image'];
                                echo "<li><img class='profile' src='../$image'></li>";
								
								
                                ?>
								
								<li><a href="my_account.php?edit_account">ویرایش اطلاعات</a></li>
								<li><a href="my_account.php?pass_change">تغییر رمز عبور</a></li>
								<li><a href="my_account.php?delete_account">حذف اکانت</a></li>
								<li><a href="../logout.php">خروج از حساب</a></li>
								
							</ul>
							<br/>

						</div>
	

					</div>