<?php
if(isset($_POST['update'])){
    $c_name=mysqli_real_escape_string($con,$_POST['c_name']);
    if(empty($c_name)){
        array_push($errors,"نام خود را وارد نکرده اید");
    }
    $c_lastname=mysqli_real_escape_string($con,$_POST['c_lastname']);
    if(empty($c_lastname)){
        array_push($errors,"نام خانوادگی را وارد نمایید");
    }
    $c_address=mysqli_real_escape_string($con,$_POST['c_address']);
    if(empty($c_address)){
        array_push($errors,"آدرس را وارد نمایید");
    }
    //phone update
    $c_phone_validate=mysqli_real_escape_string($con,$_POST['c_phone']);
    if(empty($c_phone_validate)){
        array_push($errors,"شماره موبایل خود را وارد نمایید");

    }else{
        if(preg_match("/^[0]{1}[9]{1}\d{9}$/",$c_phone_validate)){
            $c_phone=$c_phone_validate;

        }else{
            array_push($errors,"شماره وارد شده معتبر نیست");

        }
    }
    //gender update
    $c_gender=$_POST['c_gender'];
    //update image
    if(empty($_FILES["c_image"]["name"])){
        $new_address_image=$image;

    }else{
        $valid_extention=array("jpg","png","gif","jpeg");
        $file_extension=explode(".",$_FILES['c_image']['name']);
        $extension=end($file_extension);
        if(in_array($extension,$file_extension)){
            if($_FILES["c_image"]["error"]==0){
                $c_image = $_FILES['c_image']['name'];
                $c_image_tmp = $_FILES['c_image']['tmp_name'];
                $new_address_image="customer/customer_profile/".$c_image;
                move_uploaded_file($c_image_tmp,"customer_profile/".$c_image);

            }else{
                array_push($errors,"فایل به درستی اپلود نشده");
            }
        }else{
            array_push($errors,"پسوند فایل مورد قبول نیست");
        }


    }
    //end image
    $c_provice=$_POST['c_provice'];
    $c_city=$_POST['c_city'];
    //finally update
    if(count($errors)==0){

        $update_q="UPDATE customers SET customer_name='$c_name',customer_lastname='$c_lastname',
        customer_gender='$c_gender',customer_provice='$c_provice',customer_city='$c_city',
        customer_address='$c_address',customer_phone='$c_phone',customer_image='$new_address_image'

        WHERE customer_id=$id";
        $update_run=mysqli_query($con,$update_q);
        if($update_run){
            echo "<script>alert('$c_name عزیز ، اطلاعات شما به درستی به روز رسانی شد !')</script>";
            echo "<script>window.open('my_account.php?edit_account','_self')</script>";
        }


    }else{
        include("errors.php");
    }




}


?>