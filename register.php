<script src="js/city/city.js"></script>
<?php include('server.php') ?>
<form action="cheekout.php" method="POST" enctype="multipart/form-data">


<div class="span6" dir="rtl">

 <div class="control-group">											
    <label class="control-label">تصویر کاربر</label>									
    <div class="controls">
	   
		<?php 
		 if(!isset($c_image)){
			echo'<input type="file"  class="input-xlarge" name="c_image">';
		 }else{
			 
			 echo $c_image;
			 
		 }
		?>	
		

      										
    </div>
 </div>
 <div class="control-group">											
    <label class="control-label">استان</label>									
    <div class="controls">												
    <select name="c_provice" onChange="iranwebsv(this.value);" >

		 <?php
		 if(isset($c_provice)){
			 echo ('<option value="'.$c_provice.'" >'.$c_provice.'</option>"');
		 }?>
	
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
    <select name="city" id="city">
		<?php
		if (isset($c_city)){
			echo ('<option value="'.$c_city.'" >'.$c_city.'</option>"');
		}
		?>
	    <option value="0" name="c_city">لطفا استان را انتخاب نمایید</option>
	</select>
    </div>
 </div>
 <div class="control-group">											
    <label class="control-label">آدرس</label>									
    <div class="controls">												
    <input type="text"   size="45" name="c_address" placeholder="آدرس خود را وارد نمایید." value="<?php echo $c_address; ?>" />
    </div>
 </div>
 <div class="control-group">
	<label class="control-label">&nbsp;</label>
		<div class="controls">
		<input type="submit" value="ثبت نام" name="register" class="btn btn-info">
	    </div>

</div>

<?php include('errors.php')?>											
</div><!--spAN2-->
<div class="span6" dir="rtl">


												
 <div class="control-group">											
    <label class="control-label">نام</label>									
    <div class="controls">												
      <input type="text" placeholder="" class="input-xlarge" name="c_name" value="<?php echo $c_name;?>">										
    </div>
 </div>
 <div class="control-group">
	<label class="control-label">نام خانوادگی</label>
    <div class="controls">
	   <input type="text" placeholder="" class="input-xlarge" name="c_lastname" value="<?php echo $c_lastname;?>">
    </div>
 </div>					  
 <div class="control-group">
	<label class="control-label">ایمیل</label>
	<div class="controls">
		<input type="text" class="input-xlarge" name="c_email" value="<?php echo $c_email; ?>">
	</div>
 </div>
 <div class="control-group">
	<label class="control-label">شماره موبایل</label>
	<div class="controls">
		<input type="text"  class="input-xlarge" name="c_phone" value="<?php echo $c_phone;?>">
	</div>
 </div>
<!--d-->
 <div class="control-group"> 
 <div class="roll">قوانین انتخاب رمز ایمن
 
							<span class="tooltiptext">•	پسورد شما باید حداقل 6 کاراکتر و حداکثر 12 کاراکتر باشد.<br><br>
•	در پسورد خود حتما باید از ارقام 0تا 9 استفاده کنید.<br><br>
•	در پسورد خود از حروف بزرگ  یا کوچک انگلیسی استفاده کنید.<br><br>

							</span>
	 
 </div>					
 </div>


<div class="control-group">
	<label class="control-label">پسورد</label>
		<div class="controls">
		<input type="password" id="mypass1" placeholder="پسورد را وارد کنید" class="input-xlarge" name="c_password1">
		<input type="checkbox" onclick="showpass()">
		<b style="font-size:13px;"> نمایش پسورد</b>
		<script>
			function showpass(){
				var x=document.getElementById("mypass1");
				var y=document.getElementById("mypass2");
				if(x.type==="password"){
					x.type="text";
				}
				else{
						x.type="password";
					}
				if(y.type==="password"){
					y.type="text";
				}
				else{
						y.type="password";
					}
				
			}
		</script>
	    </div>
</div>
<div class="control-group">
	<label class="control-label"> پسورد را تکرار کنید</label>
		<div class="controls">
		<input type="password" id="mypass2"  class="input-xlarge" name="c_password2">
	    </div>
</div>
<div class="control-group">
	<label class="control-label">جنسیت</label>
	<div class="controls">
      <select name="c_gender" >
		  <?php
		  if(isset($c_gender)){
			  echo ('<option value="'.$c_gender.'" >'.$c_gender.'</option>"');
		  }?>
		<option >جنسیت مورد نظرتان را انتخاب نمایید.</option>
		<option value="مرد" >مرد</option>
		<option value="زن" >زن</option>
	  </select>
														
	</div>
</div>

</div><!--span1-->
</form>