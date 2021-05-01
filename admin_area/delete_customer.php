<?php
$cu_id=$_GET['customer_id'];
$del_cu="DELETE customers WHERE customer_id=$cu_id";
$run_del=mysqli_query($con,$del_cu);
if($run_del){
    echo "<script>alert('این کابر حذف شد .')</script>";
    echo "<script>window.open('index.php?view_cats','_self')</script>";
}
?>