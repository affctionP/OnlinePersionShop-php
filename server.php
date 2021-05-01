<?php
include ('admin_area/db.php');
require_once 'vendor/autoload.php';
$c_name="";
$c_lastname="";
$c_email="";
$c_phone="";
$c_address="";
$c_password1="";
$errors=array();
if(isset($_POST['register'])){
    $c_name=mysqli_escape_string($con,$_POST['c_name']);
    if(empty($c_name)){
        array_push($errors,"نام را وارد کنید");
    }
    $c_lastname=mysqli_escape_string($con,$_POST['c_lastname']);
    if(empty($c_lastname)){
        array_push($errors,"نام خانوادگی را وارد کنید");
    }

    $c_gender=mysqli_escape_string($con,$_POST['c_gender']);
    if(empty($c_gender)){
        array_push($errors,"جنسیت وارد نشده");
    }
    //photo validation
    if(isset($_COOKIE["CustomerImage"])){
        if(isset($_COOKIE["CustomerImageTmp"])){
            $c_image=$_COOKIE["CustomerImage"];
            $image_temp=$_COOKIE["CustomerImageTmp"];
            $save_address="customer/customer_profile/".$c_image;

        }
    }
    else{
    if(empty($_FILES["c_image"]["name"])){
        array_push($errors,"عکس اپلود نشده");
    }else{
        $allowed_format=array("jpeg","png","jpg");
        $fileExtension=explode(".",$_FILES["c_image"]["name"]);
        $file_format=end($fileExtension);
        
        if(in_array($file_format,$allowed_format)){
            if($_FILES["c_image"]["error"]==0){
               
                $image_temp=$_FILES['c_image']['tmp_name'];
                $c_image=$_FILES['c_image']['name'];
                setcookie('CustomerImage',$c_image,time()+600);
                setcookie('CustomerImageTmp',$image_temp,time()+600);
                $save_address="customer/customer_profile/".$c_image;
                move_uploaded_file($image_temp,$save_address);
            }else{
                array_push($errors,"فایل به درستی انتخاب نشده");
            }
        }else{
            array_push($errors,"فرمت فایل مجاز نیست");
        }

    }
  }
    //email validate
    $c_email_not_empty=mysqli_escape_string($con,$_POST['c_email']);
    if(empty($c_email_not_empty)){
        array_push($errors,"ایمیل را وارد کنید");
    }else{
        $mail_val=$c_email_not_empty;
        if(filter_var($mail_val,FILTER_VALIDATE_EMAIL)){
            $not_exist_email=$mail_val;
            $search_query="SELECT * FROM customers WHERE customer_email='$not_exist_email'";
            $run_query=mysqli_query($con,$search_query);
            $num=mysqli_num_rows($run_query);
            if($num==0){
                $c_email=$mail_val;
            }else{
                array_push($errors,"قبلا با این ایمیل ثبت نام انجام شده است");
            }

            
        }else{
            array_push($errors,"ایمیل معتبر نیست");
        }
    }
    //city and provice validate
    $c_city=mysqli_escape_string($con,$_POST['city']);
    if(empty($c_city)){
        array_push($errors,"شهرستان انتخاب نشده است");
    }
    $c_provice=mysqli_escape_string($con,$_POST['c_provice']);
    if(empty($c_provice)){
        array_push($errors,"شهر را وارد نمایید");
    }
    //address
    $c_address=mysqli_escape_string($con,$_POST['c_address']);
    if(empty($c_address)){
        array_push($errors,"ادرس خود را وارد نمایید");
    }

    //phone validate
    $phone=mysqli_escape_string($con,$_POST["c_phone"]);
    if(empty($phone)){
        array_push($errors,"شماره موبایل را وارد نمایید");
    }else{
        if(preg_match("/^[0]{1}[9]{1}[0-9]{9}$/",$phone)){
              $c_phone=$phone;
        }else{
            array_push($errors,"شماره معتبر نیست");
        }

    }
    //password
    $password_validate=mysqli_escape_string($con,$_POST['c_password1']);
    if(empty($password_validate)){
        array_push($errors,"پسورد را وارد کنید");
    }else{
        if(preg_match("/^(?=.*[A-z])(?=.*[0-9])\S{6,12}$/",$password_validate)){
            $c_password1=$password_validate;
        }else{
            array_push($errors,"پسورد استاندارد نیست");
        }
    }
    $password_validate2=mysqli_escape_string($con,$_POST['c_password2']);
    if(empty($password_validate2)){
        array_push($errors,"تکرار پسورد را وارد کنید");
    }else{
        if(!empty($password_validate)&&!empty($password_validate2)){
            if ($password_validate != $password_validate2){
                array_push($errors,"تکرار رمز مشابه نیست");
            }else{
                $c_password2=$password_validate2;
            }
        }
    }
    //creating or using cookie for ip customer
	if(isset($_COOKIE["ipUserEcommerce"]))
		{
			$ip	= $_COOKIE["ipUserEcommerce"];
		}else{
			$ip=getIp();
			setcookie('ipUserEcommerce',$ip,time()+1206900);
		}
    //final register
    
    if(count($errors)==0){
        
        $confirmedCode=rand();//integer 
        $conf=0;
        $register="INSERT INTO customers 
        (customer_ip,customer_name,customer_email,customer_pass,customer_city,customer_phone,customer_image,customer_gender,customer_provice,customer_lastname,customer_address,confirmed,confiremd_code)
        VALUES('$ip','$c_name','$c_email','$c_password1','$c_city','$c_phone','$save_address','$c_gender','$c_provice','$c_lastname','$c_address','$conf',$confirmedCode)";
        
        $run_register=mysqli_query($con,$register);
        if($run_register){
        echo "<script>alert('done')</script>";}
        if($run_register){
            
            $transport =( new  Swift_SmtpTransport('smtp.gmail.com',587,'tls'))
            ->setUsername('affctionhossiny97@gmail.com')
            ->setPassword('1272535347mygmail');

            // Create the message
            $email =new Swift_Message();
            $message="جهت تکمیل ثبت نام با کلیک بر لینک زیر ایمیل خود را تایید کنید
            https://daaa3908b173.ngrok.io/HosseiniShop/emailconfirm.php?customer_name=$c_name&customer_ip=$ip&code=$confirmedCode";
            $email->setBody($message);
            $email->setTo($c_email);
            $email->setFrom('affctionhossiny97@gmail.com');
            $email->setSubject('تایید ثبت نام فروشگاه حسینی');
            $mailer = new Swift_Mailer($transport);
            if($mailer->send($email)){
                				
				echo "<script>alert('با تشکر از ثبت نام شما. برای تکمیل فرآیند ثبت نام لطفا بر روی لینک فعال سازی که از طریق ایمیل برای شما ارسال شده است، کلیک کنید. ')</script>";
				echo "<script>window.open('emailconfirm.php','_self')</script>";
            }


        }
    }
    



}//register

?>