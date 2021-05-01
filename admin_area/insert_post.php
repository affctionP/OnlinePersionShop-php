
<form action="" method="post" enctype="multipart/form-data">
<table class="post_form">
<caption>فرم درج مقالات</caption>
<tr>
<td><label for="title">عنوان</label></td>
<td><input type="text" name="title" ></td>
</tr>
<tr>
<td><label for="body">متن</label></td>
<td><textarea name="body" class="body-post"></textarea></td>
<script>tinymce.init({ selector:'.body-post' });</script>
</tr>
<tr>
    <td><label for="p_image">تصویر مقاله</label></td>
    <td><input type="file" name="p_image" ></td>
</tr>
<tr>
<td><input type="submit" name="add_post" value="ثبت مقاله"></td>
</tr>
</table>
</form>
<?php
if(isset($_POST['add_post'])){
    $title=$_POST['title'];
    $body=$_POST['body'];
    
    if(empty($title)){
        echo "<script>alert('عنوان مقاله را وارد کنید')</script>";
    }elseif(empty($body)){
        echo "<script>alert('متن مقاله را وارد کنید')</script>";
    }elseif(empty($_FILES["p_image"])){
        echo "<script>alert('تصویر زا وارد کنید')</script>";

    } 
    
    else{
        $image_name=$_FILES['p_image']['name'];
        $image_tmp=$_FILES['p_image']['tmp_name'];
        $address_save="posts_image/".$image_name;
        move_uploaded_file($image_tmp,$address_save);
        
        $insert_post="INSERT INTO posts (post_title,post_body,post_image)
        VALUES ('$title','$body','$address_save')";
        $run_p=mysqli_query($con,$insert_post);
        if($run_p){
            echo "<script>alert('مقاله با موفقیت ثبت شد')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            
        }
    }
    
    

}
?>