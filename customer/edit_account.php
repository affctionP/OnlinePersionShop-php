<script src="../js/city/city.js"></script>
<?php include('includes/db.php');
$user=$_SESSION['customer_email'];
$select_user="SELECT * FROM customers WHERE customer_email='$user'";
$run=mysqli_query($con,$select_user);
$row_custom = mysqli_fetch_array($run);
	
$id = $row_custom['customer_id'];
$name = $row_custom['customer_name'];
$lastname = $row_custom['customer_lastname'];
$gender = $row_custom['customer_gender'];
$image = $row_custom['customer_image'];
$email = $row_custom['customer_email'];
$provice = $row_custom['customer_provice'];
$city = $row_custom['customer_city'];
$address = $row_custom['customer_address'];
$phone = $row_custom['customer_phone'];

$errors = array();
?>

<form action="my_account.php?edit_account" method="POST" enctype="multipart/form-data" dir="rtl" style="padding-right:40%;">

										
 <div class="control-group">											
    <label class="control-label">نام</label>									
    <div class="controls">												
      <input type="text" placeholder="" class="input-xlarge" name="c_name" value="<?php echo $name;?>">										
    </div>
 </div>
 <div class="control-group">
	<label class="control-label">نام خانوادگی</label>
    <div class="controls">
	   <input type="text" placeholder="" class="input-xlarge" name="c_lastname" value="<?php echo $lastname;?>">
    </div>
 </div>					  

 <div class="control-group">
	<label class="control-label">شماره موبایل</label>
	<div class="controls">
		<input type="text"  class="input-xlarge" name="c_phone" value="<?php echo $phone;?>">
	</div>
 </div>
<!--d-->


<div class="control-group">
	<label class="control-label">جنسیت</label>
	<div class="controls">
      <select name="c_gender" >

		<option ><?php echo "$gender";?></option>
		<option value="مرد" >مرد</option>
		<option value="زن" >زن</option>
	  </select>
														
	</div>
</div>

<!--span1-->


 <div class="control-group">											
    <label class="control-label">تصویر کاربر</label>									
    <div class="controls">
	   
		<?php 
		 if(!isset($image)){
			echo'<input type="file"  class="input-xlarge" name="c_image">';
		 }else{
			 
			 echo $image;
             echo"<br>";
            echo"<input type='file' name='c_image' />";
			 
		 }
		?>	
		

      										
    </div>
 </div>
 <div class="control-group">											
    <label class="control-label">استان</label>									
    <div class="controls">												
    <select name="c_provice" onChange="iranwebsv(this.value);" >

		 <?php
		 
			 echo ('<option>'.$provice.'</option>"');
		?>
	
		<option value="0">لطفا استان را انتخاب نمایید</option>
		<option value="تهران">تهران</option>
		<option value="گیلان">گیلان</option>
		<option value="آذربایجان شرقی">آذربایجان شرقی</option>
		<option value="خوزستان">خوزستان</option>
		<option value="فارس">فارس</option>
		<option value="اصفهان">اصفهان</option>
		<option value="خراسان رضوی">خراسان رضوی</option>
		<option value="قزوین">قزوین</option>
		<option value="سمنان">سمنان</option>
		<option value="قم">قم</option>
		<option value="مرکزی">مرکزی</option>
		<option value="زنجان">زنجان</option>
		<option value="مازندران">مازندران</option>
		<option value="گلستان">گلستان</option>
		<option value="اردبیل">اردبیل</option>
		<option value="آذربایجان غربی">آذربایجان غربی</option>
        <option value="کردستان">کردستان</option>
        <option value="همدان">همدان</option>
		<option value="کرمانشاه">کرمانشاه</option>
		<option value="لرستان">لرستان</option>
		<option value="بوشهر">بوشهر</option>
		<option value="کرمان">کرمان</option>
		<option value="هرمزگان">هرمزگان</option>
		<option value="چهارمحال و بختیاری">چهارمحال و بختیاری</option>
		<option value="یزد">یزد</option>
		<option value="سیستان و بلوچستان">سیستان و بلوچستان</option>
		<option value="ایلام">ایلام</option>
		<option value="کهگلویه و بویراحمد">کهگلویه و بویراحمد</option>
		<option value="خراسان شمالی">خراسان شمالی</option>
		<option value="خراسان جنوبی">خراسان جنوبی</option>
		<option value="البرز">البرز</option>
	</select>										
    </div>
 </div>
 <div class="control-group">											
    <label class="control-label">شهرستان</label>									
    <div class="controls">												
    <select name="c_city" id="city">
		<?php
		
			echo ('<option >'.$city.'</option>"');
	
		?>
	    
	</select>
    </div>
 </div>
 <div class="control-group">											
    <label class="control-label">آدرس</label>									
    <div class="controls">												
    <input type="text"   size="45" name="c_address" placeholder="آدرس خود را وارد نمایید." value="<?php echo $address; ?>" />
    </div>
 </div>
 <div class="control-group">
	<label class="control-label">&nbsp;</label>
		<div class="controls">
		<input type="submit" value="بروز رسانی" name="update">
	    </div>

</div>

											
<!--spAN2-->
</form>
<?php
include('server.php');
?>