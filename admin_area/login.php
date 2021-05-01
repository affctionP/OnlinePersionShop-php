<!DOCTYPE html>
<html lang="fa">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width , initial-scale=1.0">
<link rel="stylesheet" href="style/login.css">
<title>ورود مدیر سایت</title>
</head>
<body>
    <main>
    <div class="wrapper"></div>
 
    <form  method="post">
    <h2>
				<?php 
					if(isset($_GET['not_admin']))
					{echo $_GET['not_admin'];}
				?>
			</h2>
    <input type="text" name="loginEmail" required="required" placeholder="ایمیل را وارد کنید"><br>
    <input type="password" name="loginPass" placeholder="رمز عبور را وارد کنید" ><br>
    <input type="submit"  name="login" value="ورود"><br>

    </form>
    </main>
</body>
</html>
<?php

session_start();
require('includes/db.php');
if(isset($_POST['login'])){
    
		
    $emali=mysqli_real_escape_string($con,$_POST['loginEmail']);
    $pass=mysqli_real_escape_string($con,$_POST['loginPass']);
    $check="SELECT * FROM `admin` WHERE admin_email='$emali' AND admin_pass='$pass'";
    $run_cheek=mysqli_query($con,$check);
    $num=mysqli_num_rows($run_cheek);
    if($num==0){
        echo "<script>alert('نام کاربری و رمز عبور خود را اشتباه وارد کرده اید ، لطفا دوباره امتحان کنید.')</script>";
    }else{
        
        
        $_SESSION['admin_email']=$emali;
        if(isset($_SESSION['admin_email'])){
            echo"<script>alert('jnnj')</script>";
        }
        echo "<script>window.open('index.php?MessageToAdmin=سلام مدیر محترم ، مقدمتان گلباران. موفق باشید.','_self')</script>";
		}
    


}
?>