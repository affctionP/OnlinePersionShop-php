<?php

include('includes/master.php');
?>
<body>
<?php
if(isset($_GET["customer_id"])){
    $con=mysqli_connect("localhost","root","","hosseini");
    if(mysqli_connect_errno()){
        echo "اتصال با پایگاه داده برقرار نیست مشکل :".mysqli_connect_errno();

    }
    $ip=$_GET['customer_ip'];
    $code=$_GET['code'];
    $get_cus="SELECT * FROM customers WHERE customer_ip  LIKE '%{$ip}%'";
    $run_cus=mysqli_query($con,$get_cus);
    while($row=mysqli_fetch_array($run_cus)){
        $confirmed_code=$row['confirmed_code'];
        $c_name = $row['customer_name'];
        $c_lastname = $row['customer_lastname'];
        $c_email = $row['customer_email'];

    }
    //validate link
    if($code==$confirmed_code){
        mysqli_query($con,"UPDATE customers SET confirmed='1'");
        mysqli_query($con,"UPDATE customers SET confirmed_code='0'");
        echo "<script> alert('ایمیل شما تایید و ثبت نام تکمیل شد')</script>";
        $get_cart="SELECT * FROM cart WHERE ip_add='$ip'";
        $run_cart=mysqli_query($con,$get_cart);
        $cheek_cart=mysqli_num_rows($run_cart);
        if($cheek_cart==0){
            $_SESSION['customer_name'] = $c_name;
			$_SESSION['customer_lastname'] = $c_lastname;
			$_SESSION['customer_email'] = $c_email;
			echo "<script>window.open('customer/my_account.php','_self')</script>";
						
        }else{
            $_SESSION['customer_name'] = $c_name;
			$_SESSION['customer_lastname'] = $c_lastname;
			$_SESSION['customer_email'] = $c_email;
            echo "<script>window.open('cheekout.php','_self')</script>";
            
        }

    }else{
        					
		echo "<script>alert('ایمیل با کد تایید مطابقت ندارد.')</script>";
		echo "<script>window.open('register.php','_self')</script>";
    }

}else{
    echo "<p style='background: red; padding: 27px;	font-size: 20px; border-radius: 15px;border: 5px dashed white;'>  باید به ایمیلتان مراجعه کرده و لینک فرستاده شده را تایید نمایید!!!</p>";
}
?>
</body>