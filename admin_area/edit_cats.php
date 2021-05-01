<?php 
	//start (condition enter admin)
	if(isset($_SESSION['admin_email'])){
?>
<?php 
if(isset($_GET['edit_cat'])){
    $cat_id=$_GET['edit_cat'];
    $get_cat="SELECT * FROM categories WHERE cat_id='$cat_id'";
    $run_cat=mysqli_query($con,$get_cat);
    $row=mysqli_fetch_array($run_cat);
    $cat_title=$row['cat_title'];
}
?>
<form action="" method="post" >
<table>
        <caption> درج دسته بندی جدید</caption>
        <tr>
            <th><b>نام دسته</b></th>
            <td><input type="text" name="new_cat" value="<?php echo $cat_title ?>"></td>

        </tr>
        <tr>
            <td><input type="submit" name="update_cat" value="بروزرسانی"></td>
        </tr>
</table>
</form>
<?php
if(isset($_POST['update_cat'])){
    $cat_name=$_POST['new_cat'];
    if(!empty($cat_name)){
        $up_cat="UPDATE categories SET cat_title='$cat_name' WHERE cat_id=$cat_id";
        $run=mysqli_query($con,$up_cat);
        if($run){
            echo "<script>alert('دسته شما به درستی به روز رسانی شد.')</script>";
			echo "<script>window.open('index.php?view_cats','_self')</script>";
        }
    }
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