<?php 
	//start (condition enter admin)
	if(isset($_SESSION['admin_email'])){
?>
<?php
$id_p=$_GET['delete_post'];
$del_p="DELETE  FROM posts WHERE post_id=$id_p";
$run_del=mysqli_query($con,$del_p);
if($run_del){
    echo"<script>alert('مقاله حذف شد با موفقیت.')</script>";
    echo"<script>window.open('index.php?view_posts','_self')</script>";
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