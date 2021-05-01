<?php 
	//start (condition enter admin)
	if(isset($_SESSION['admin_email'])){
?>
<form action="" method="post" enctype="multipart/form-data">
<table>

<?php
if(isset($_GET['edit_post'])){
    $id=$_GET['edit_post'];
    $search="SELECT * FROM posts WHERE post_id=$id";
    $run=mysqli_query($con,$search);
    $row_post=mysqli_fetch_array($run);
    $post_title=$row_post['post_title'];
    $post_body=$row_post['post_body'];
    $post_image=$row_post['post_image'];
    global $post_image;
}

?>
<caption>فرم ویرایش مقاله</caption>
<tr>
<td><label for="title">عنوان</label></td>
<td><input type="text" name="title" value="<?php  echo $post_title; ?>" ></td>
</tr>
<tr>
<td><label for="body">متن</label></td>
<td><textarea name="body" class="body-post" ><?php echo "$post_body"; ?></textarea></td>
<script>tinymce.init({ selector:'.body-post' });</script>
</tr>
<tr>
    <td></td>
    <td><img src="<?php echo $post_image;?>" width="50px" height="50px"></td>
</tr>

<tr>
<td><label for="p_image">تصویر مقاله</label></td>
    <td><input type="file" name="p_image" ></td>
</tr>
<tr>
    <td>
    <input type="submit" name="update_post" value="بروز رسانی">
    </td>
</tr>
</table>
</form>
<?php
if (isset($_POST["update_post"])){
    $id=$_GET['edit_post'];
    $p_title=$_POST['title'];
    $p_body=$_POST['body'];
    if(is_uploaded_file($_FILES['p_image']['tmp_name'])){
        $tmp=$_FILES['p_image']['tmp_name'];
        $save_address="posts_image".$_FILES['p_image']['name'];
        move_uploaded_file($tmp,$save_address);
    }else{
        $save_address=$post_image;
    }
    $up_post="UPDATE posts SET post_title='$p_title', post_body='$p_body',
    post_image='$save_address' WHERE post_id=$id";
    $run=mysqli_query($con,$up_post);
    if($run){
        echo "<script>alert('بروز رسانی انجام شد')</script>";
        echo "<script>window.open('index.php','_self')</script>";

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