<?php include('admin_area/db.php'); ?>
<h2>&nbsp&nbsp&nbspبازیابی رمز عبور &nbsp&nbsp&nbsp   </h2>
<form action="#" method="post">
<div class="control-group">
	<label class="control-label">ایمیل خود را وارد نمایید</label>
	<div class="controls">
	<input type="text"   name="email" class="input-xlarge">
	</div>
</div>
<div class="control-group">
	
	<div class="controls">
	<input type="submit" value="بازیابی رمز" name="submit">
	</div>
</div>

</form>
<?php
require_once 'vendor/autoload.php';
if(isset($_POST['email'])&& ($_POST['email']!="")){
    $email=trim($_POST['email']);
    $code=md5(uniqid(true));
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)==false){
        $search_email="SELECT customer_email FROM customers WHERE customer_email='$email'";
        $run=mysqli_query($con,$search_email);
        $num=mysqli_num_rows($run);
        if($num==1){
            $inserted=mysqli_query($con,"UPDATE customers SET lost='$code' WHERE customer_email='$email' ");
            $transport =( new  Swift_SmtpTransport('smtp.gmail.com',587,'tls'))
            ->setUsername('affctionhossiny97@gmail.com')
            ->setPassword('thisisatefeh');
            $body = "با سلام به شما ، در این ایمیل لینک بازیابی رمز عبور برای شما ارسال شده است.
            کافی است برای تغییر رمز عبور خودتان بر روی لینک زیر فشار داده و مراحل را به صورت کامل انجام دهید با تشکر از شما. 
            https://cda617c654a4.ngrok.io/HosseiniShop/updatepassword.php?email=$email&code=$code";
            
            // Create the message
            $message =new Swift_Message();
            $message->setTo(
            $email);
            $message->setSubject("بازیابی رمز ");
            $message->setBody($body);
            $message->setFrom("affctionhossiny97@gmail.com");

            // Send the email
            $mailer = new Swift_Mailer($transport);
            $mailer->send($message);
            if($inserted){
                echo "<script>alert('ایمیل خود را چک کنید . ما برای شما لینکی برای تغییر پسورد ارسال کرده ایم!')</script>";
            }

        }else{
            
			echo "<script>alert('متاسفم، با ایمیل $email هیچ اکانتی ثبت نشده است، شما می توانید در صفحه بعدی ثبت نام کنید!!!')</script>";
			echo "<script>window.open('cheekout.php','_self')</script>";
			
        }

    }else{
         echo "<script>alert(' $email یک آدرس ایمیل معتبر نمی باشد!!! لطفا یک آدرس ایمیل معتبر وارد کنید!!!')</script>";
    }
    

}
?>