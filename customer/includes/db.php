<?php
$con=mysqli_connect("localhost","root","","hosseini");

if(mysqli_connect_errno())
{
    echo "ارتباط با پایگاه داده برقرار نیست . شماره خطا :".mysqli_connect_errno();
}


?>