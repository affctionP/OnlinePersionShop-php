<?php 
	//start (condition enter admin)
	if(isset($_SESSION['admin_email'])){
?>
<form action="" method="post">
<table>
        <caption> درج دسته بندی جدید</caption>
        <tr>
            <th><b>نام دسته</b></th>
            <td><input type="text" name="new_cat"></td>

        </tr>
        <tr>
            <td><input type="submit" name="add_cat" value="اضافه کن"></td>
        </tr>
</table>
</form>
<?php
if(isset($_POST['add_cat'])){
    
    $cat_title=$_POST['new_cat'];
    if(empty($cat_title)){
        echo "<script>alert('عنوان دسته بندی را وارد نمایید');</script>";
    }else{
        $insert_cat="INSERT INTO categories (cat_title) VALUES ('$cat_title')";
        $run_in=mysqli_query($con,$insert_cat);
        if($run_in)
		{
		
			echo "<script>alert('دسته $new_cat به دسته های موجود اضافه شد.')</script>";
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