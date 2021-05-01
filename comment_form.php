<table>

<form action="" method="post">
<tr>
<td><label for="name">نام</label></td>
<td><input type="text" name="name"></td>
</tr>
<tr>
<td><label for="email">ایمیل</label></td>
<td><input type="text" name="email" ></td>
</tr>
<tr>
  <td><label for="body-com">نظر</label></td>
  <td><textarea name="body-com"></textarea></td>
</tr>

<tr>
<td><input type="submit" class="btn-primary" name="add_comment" value="ثبت نظر"></td>
</tr>
</form>

<?php


if(isset($_POST['add_comment'])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $body=$_POST["body-com"];
    $errors=array();
    if(empty($name)){
        array_push($errors,"نام را وارد کنید");     
    }
    if(empty($email)){
        array_push($errors,"ایمیل را وارد نمایید");      
      }
    if(empty($body)){
        array_push($errors,"بخش نظر نمی تواند خالی باشد ");  
    }
    elseif(!(filter_var($email,FILTER_VALIDATE_EMAIL))){
        array_push($errors,"ایمیل وارد شده معتبر نیست");

    }
   

    if(count($errors)==0){
        $add_com="INSERT INTO  comments (c_name,c_email,c_body,p_id)
        VALUES ('$name','$email','$body',$product_id)";
        $run=mysqli_query($con,$add_com);
        /*if($run){
        
            echo "<script>window.open('product_detail.php?product_id=$product_id')</script>";
        }*/
    }else{
        $string="";
        foreach($errors as $e){
            $string .="#".$e;
        }

    }
    
}?>

<?php
    //get all comments
    $get_coms="SELECT * FROM `comments` WHERE p_id=$product_id";
    $run_coms=mysqli_query($con,$get_coms);
    
    while($row=mysqli_fetch_array($run_coms)){
        $body_c=$row['c_body'];
        $name_c=$row['c_name'];
        
    

?>


<tr>

<div class="comment-place">
<div class="comment-name"><?php echo $name_c;?></div>
<?php echo $body_c ?>
<div>
</tr>
<br>
<?php }?>

</table>
</div>
<div class="span3">
<div class="error" id="com_error">
<?php if(isset($string)){
    echo $string;
    }?>
</div>

<script>
$("#com_error").delay(3000).fadeOut('slow');
</script>
</div>