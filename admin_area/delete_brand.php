<?php 
	//start (condition enter admin)
	if(isset($_SESSION['admin_email'])){
?>
<?php
$id_b=$_GET['delete_brand'];
$del_b="DELETE  FROM brands WHERE brand_id=$id_b";
$run_del=mysqli_query($con,$del_b);
if($run_del){
    echo"<script>alert('برند حذف شد.')</script>";
    echo"<script>window.open('index.php?view_brands','_self')</script>";
}
?>
	<?php 
		//end( condition enter admin )
		
		}else{
		echo "
		<html lang='fa'  dir='rtl'>
		<head>
		<meta http-equiv='Content-Type' content='text/html'; charset='utf-8' />
		</head>";
		
		echo "<script>window.open('login.php?not_admin=شما از مدیران سایت نیستید','_self')</script>";
	}
?>