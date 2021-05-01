<?php
$errors=array();
?>
<form method="post" action="my_account.php?pass_change" enctype="multipart/form-data"  dir="rtl"> 
    <table>
    <h3 style="text-align:center;">&nbsp&nbsp&nbsp&nbspتغییر رمز عبور</h3>
    <br>
        <tr>
        <td><label>رمز عبور فعلی</label></td>
        <td><input type="password" name="old_password" size=35 id="x"></td>
        <td>
        <input type="checkbox" onclick="showpass()">
		<b style="font-size:13px;"> نمایش پسورد ها</b></td>
        <script>
        function showpass(){
            var x=document.getElementById("x");
            var y=document.getElementById("y");
            var z=document.getElementById("z");
            if(x.type==="password"){
					x.type="text";
				}
				else{
						x.type="password";
					}
				if(y.type==="password"){
					y.type="text";
				}
				else{
						y.type="password";
					}
                    if(z.type==="password"){
					z.type="text";
				}
				else{
						z.type="password";
					}

        }
        </script>
        </tr>
        
        <tr>
        
			<td >
            <div class="roll">قوانین انتخاب رمز ایمن<br>
 
              <span class="tooltiptext">•	پسورد شما باید حداقل 6 کاراکتر و حداکثر 12 کاراکتر باشد.<br><br>
              •	در پسورد خود حتما باید از ارقام 0تا 9 استفاده کنید.<br><br>
              •	در پسورد خود از حروف بزرگ  یا کوچک انگلیسی استفاده کنید.<br><br>

          </span>

              </div>		

			</td>
		</tr>
        <tr>
        
        <td><label for="new_password">پسورد جدید</label></td>
        <td><input type="password" name="new_password" id="y"></td>
        </tr>
        <tr>
        
        <td><label for="new_password">تکرار پسورد جدید</label></td>
        <td><input type="password" name="repeat_new_password" id="z" ></td>
        </tr>
        <tr>
        
        
        <td><input type="submit" value="بروز رسانی" name="update_pass"></td>
        </tr>
        
    </table>
</form>
<?php
if(isset($_POST['update_pass'])){
    $old_pass=mysqli_real_escape_string($con,$_POST['old_password']);
    if(empty($old_pass)){
        array_push($errors,"پسورد فعلی را وارد کنید");
    }else{
        $new_pass_validate=mysqli_real_escape_string($con,$_POST['new_password']);
        if(empty($new_pass_validate)){
            array_push($errors,"پسورد جدید را وارد کنید");
        }else{
            if(preg_match("/^(?=.*[A-z])(?=.*[0-9])\S{6,12}$/",$new_pass_validate)){
                $new_pass=$new_pass_validate;
                $new_pass_rep=mysqli_real_escape_string($con,$_POST['repeat_new_password']);
                if(empty($new_pass_rep)){
                    array_push($errors,"تکرار پسورد را وارد کنید");
                }
                //compare
                if((!empty($new_pass_rep))&&(!empty($new_pass)))
                {
                    if ($new_pass_rep != $new_pass)
                    {
                        array_push($errors, "پسورد های وارد شده یکسان نیستند!");
                    }
                }


            }else{
                array_push($errors,"پسورد طبق الگو نیست");
            }
        }
    }
        
    //finalll cheek password
    if(count($errors)==0){
        $user=$_SESSION['customer_email'];
        $sel_c="SELECT * FROM customers WHERE customer_email='$user' AND customer_pass='$old_pass'";
        $run_c=mysqli_query($con,$sel_c);
        $num_c=mysqli_num_rows($run_c);
        if($num_c==0){
            array_push($errors,"پسورد قبلی خود را اشتباه وارد کرده اید ");
        }
        elseif($num_c>0){
            $update_pass="UPDATE customers SET customer_pass='$new_pass' WHERE customer_email='$user'";
            $run_update=mysqli_query($con,$update_pass);
            if($run_update){
                echo "<script>alert('رمز شما به درستی به روز رسانی شد. موفق باشید!')</script>";
				echo "<script>window.open('my_account.php?pass_change','_self')</script>";
            }
        }

    }else{
        include('errors.php');
    }



}
?>