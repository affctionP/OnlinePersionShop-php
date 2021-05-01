<form action="my_account.php?delete_account" method="post" style="padding-left: 40%;">
<table >
<th style="padding-bottom: 10%; text-align:center;"> <br>##میخام اکانتم رو حذف کنم##</th>
<tr>
  <td><input type="submit" value="میخام حذف کنم" name="yes"></td>
  <td><input type="submit" value="منصرف شدم " name="no"></td>
</tr>
</table>
</form>
<?php
if(isset($_POST['yes'])){
    $user=$_SESSION['customer_email'];
    $sel_del="DELETE FROM customers WHERE customer_email='$user'";
    $run_del=mysqli_query($con,$sel_del);
    echo "<script>alert('خیلی متاسفم ، امیدوارم بازم بیای جون دل')</script>";
    echo "<script>window.open('../logout.php','_self')</script>";

}
if(isset($_POST['no'])){
    echo "<script>alert('مرسی که موندی جیگر')</script>";
    echo "<script>window.open('my_account.php','_self')</script>";
}
?>