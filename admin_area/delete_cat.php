<?php
$cat_id=$_GET['delete_cat'];
$del_q="DELETE FROM categories WHERE cat_id='$cat_id'";
$run=mysqli_query($con,$del_q);
if($run){
    echo "<script>alert('این دسته با موفقیت از میان دسته های شما حذف شد.')</script>";
    echo "<script>window.open('index.php?view_cats','_self')</script>";
}
?>