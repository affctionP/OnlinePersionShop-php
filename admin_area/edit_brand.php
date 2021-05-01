<?php 
	//start (condition enter admin)
	if(isset($_SESSION['admin_email'])){
?>

<?php
$id=$_GET['edit_brand'];
$sel_b="SELECT * FROM brands WHERE brand_id=$id";
$run_b=mysqli_query($con,$sel_b);
$row_b=mysqli_fetch_array($run_b);
$title=$row_b['brand_title'];


?>
<form method="post">
    <caption>ویرایش برند</caption>
    <table>
    
        <tr>
            <td><label for="name_b">عنوان برند</label></td>
            <td><input type="text" name="name_b" value="<?php echo $title; ?>" ></td>
        </tr>
        <tr>
            <td><input type="submit" name="update_brand" value="بروز رسانی"></td>

        </tr>
    </table>
</form>
<?php
if(isset($_POST['update_brand'])){
    $title=$_POST["name_b"];
    $id=$_GET['edit_brand'];
    $in="UPDATE brands SET brand_title='$title' WHERE brand_id=$id";
    $run=mysqli_query($con,$in);
    if($run){
        echo "<script>alert('برند بروز رسانی شد ')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";
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