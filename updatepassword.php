<?php include('admin_area/db.php');
  include('includes/master.php');?>

<h2>&nbsp&nbsp&nbsp پسورد جدید خودتان را ایجاد نمایید.</h2>

<?php
if(isset($_GET['email'])&& ($_GET['code'] !="")){
    $code=$_GET['code'];
    $email=$_GET['email'];
    $check_email=mysqli_query($con,"SELECT customer_email FROM customers WHERE customer_email='$email' AND lost='$code' AND lost !=''");
    $count=mysqli_num_rows($check_email);
    if($count){
        if(isset($_POST['password'])){
            $password_validate=mysqli_escape_string($con,$_POST['password']);
            if(empty($password_validate)){
                echo "<script>alert('پسورد را وارد کنید');</script>";
            }else{
                $match_pass=preg_match("/^(?=.*[A-z])(?=.*[0-9])\S{6,12}$/",$password_validate);
                if($match_pass){
                    $password=$password_validate;
                    $rep_password=$_POST['rep_password'];
                    if($rep_password==$password){
                        $insert=mysqli_query($con,"UPDATE customers SET lost='', customer_pass='$password_validate' WHERE customer_email='$email'");
                        if($insert){
                            echo "<script>alert('پسورد با موفقیت تغییر کرد');</script>";
                        }

                    }else{
                        echo "<script>alert('پسورد ها مشابه نیستند')</script>";
                    }

                }else{
                    echo "<script>alert('پسورد طبق الگوی ایمنی نیست')</script>";
                }
            }

        }//endiff st 
    
        echo "
        <form action='' method='post'>
        <div class='span6' dir='rtl'>
        <div class='control-group'> 
         <div class='roll'>قوانین انتخاب رمز ایمن
				<span class='tooltiptext'>•	پسورد شما باید حداقل 6 کاراکتر و حداکثر 12 کاراکتر باشد.<br><br>
        •	در پسورد خود حتما باید از ارقام 0تا 9 استفاده کنید.<br><br>
        •	در پسورد خود از حروف بزرگ  یا کوچک انگلیسی استفاده کنید.<br><br>
							</span>
         </div>					
         </div>
        <div class='control-group'>
	    <label class='control-label'>پسورد</label>
		<div class='controls'>
		   <input type='password' id='mypass1' placeholder='پسورد را وارد کنید' class='input-xlarge' name='password'>
		   <input type='checkbox' onclick='showpass()'>
		   <b style='font-size:13px;'> نمایش پسورد</b>
		   <script>
			function showpass(){
				var x=document.getElementById('mypass1');
				var y=document.getElementById('mypass2');
				if(x.type==='password'){
					x.type='text';
				}
				else{
						x.type='password';
					}
				if(y.type==='password'){
					y.type='text';
				}
				else{
						y.type='password';
					}
				
			}
		</script>
	    </div>
     </div>
    <div class='control-group'>
	<label class='control-label'> پسورد را تکرار کنید</label>
		<div class='controls'>
		<input type='password' id='mypass2' class='input-xlarge' name='rep_password'>
	    </div>
    </div>
<div class='control-group'>
	
		<div class='controls'>
		<input type='submit' name='create' value='عوضش کن'/>
	    </div>
</div>
</div>
</form>";
    }/*end count*/
}

?>
