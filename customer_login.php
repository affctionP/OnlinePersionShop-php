<div class="span6" dir="rtl">
												<h4>ورود</h4>
												<p>ابتدا لاگین شوید سپس  خرید را نهایی کنید</p>
												<form action="#" method="post">
													<fieldset>
														<div class="control-group">
															<label class="control-label">ایمیل</label>
															<div class="controls">
																<input type="text" placeholder="Enter your email" id="username" class="input-xlarge" name="email">
															</div>
														</div>
														<div class="control-group">
															<label class="control-label">گذرواژه</label>
															<div class="controls">
															<input type="password" placeholder="Enter your password" id="password" name="pass" class="input-xlarge">
															</div>
														</div>
														<div class="control-group">
															<div class="controls">
															 <a href="cheekout.php?forget_pass">فراموشی رمز عبور</a>
															</div>
														</div>
														<input type="submit" value="وارد میشوم" name="send_U_P" class ="btn btn-info" />
													</fieldset>
												</form>
											</div>

<?php
 
if(isset($_POST['send_U_P'])){
	// receive email value from the form 
	$c_email_no_empty = mysqli_real_escape_string($con ,$_POST['email']);
	// receive password value from the form
	$c_password_1_validate=mysqli_real_escape_string($con ,$_POST['pass']);
				
	if(empty($c_email_no_empty)){
        echo "<script>alert('ایمیل را وارد کنید')</script>";
	}elseif(empty($c_password_1_validate)){
		echo "<script>alert('پسورد را وارد کنید')</script>";
	}else{
		$c_email_validate=$c_email_no_empty;
		if(filter_var($c_email_validate,FILTER_VALIDATE_EMAIL) == true){
		if(preg_match("/^(?=.*[A-z])(?=.*[0-9])\S{6,12}$/", $c_password_1_validate))
			{
				// email is valid
				$c_email=$c_email_validate;
				// password is valid
				$c_pass = $c_password_1_validate;
							
				}else{
				echo "<script>alert('پسورد شما طبق الگو نمی باشد!!! پسورد صحیحی وارد نمایید.')</script>";
				}
		}else{
				echo "<script>alert('ایمیل شما صحیح نیست !!! یک ایمیل صحیح وارد کنید!')</script>";
						
					}
		}
		//if set both of them
		if((isset($c_pass))	 and (isset($c_email))	){
		$sel_login="SELECT * FROM customers WHERE customer_email='$c_email' AND customer_pass='$c_pass'";
		$run_login=mysqli_query($con,$sel_login);
		$num=mysqli_num_rows($run_login);
		if($num==0){
			echo "<script>alert('ایمیل یاپسورد اشتباه است ')</script>";
		}else{
			while($row=mysqli_fetch_array($run_login)){
				$customer_login_name =	$row['customer_name'];	
				$customer_login_lastname =	$row['customer_lastname'];
				$customer_confirmed	=	$row['confirmed'];
			}
		////////////
		if($customer_confirmed==1){
			//creating or using cookie 
			if(isset($_COOKIE["ipUserEcommerce"])){
			
				$ip	= $_COOKIE["ipUserEcommerce"];
				}else{
				$ip=getIp();
				setcookie('ipUserEcommerce',$ip,time()+1206900);
			}
				
	        $sel_cart = "select * from cart  where	ip_add='$ip'";
	        $run_cart = mysqli_query($con,$sel_cart);
	        $check_cart = mysqli_num_rows($run_cart);
	        $_SESSION['customer_email'] = $c_email;
	        $_SESSION['name']=$customer_login_name;
			$_SESSION['lastname']=$customer_login_lastname;
	        if($check_cart==0){
				
				echo "<script>alert('$customer_login_name  $customer_login_lastname خوش آمدید، لاگین شما با موفقیت انجام شد. اکنون به صفحه پروفایل خود خواهید رفت!!!')</script>";
				echo "<script>window.open('/customer/my_account.php','_self')</script>";
				}else{
				
				echo "<script>alert('$customer_login_name  $customer_login_lastname خوش آمدید، لاگین شما با موفقیت انجام شد. اکنون برای پرداخت صورت حساب خود به درگاه زرین پال متصل خواهید شد!!!')</script>";
				echo "<script>window.open('cheekout.php','_self')</script>";
				}

		}else{
			
			echo "<script>alert('ثبت نام خود را از طریق ایمیل تکمیل کنید')</script>";
			
		}
	}
	}

}
?>