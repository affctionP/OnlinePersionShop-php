<?php 
	//start (condition enter admin)
	if(isset($_SESSION['admin_email'])){
?>
<?php
    @include('db.php')
     ?>

    <form method="post" action="" enctype="multipart/form-data" > 
    <table>
        <caption> فرم درج محصول در فروشگاه</caption>
        <tr>
            <th><b> ویژگی محصول</b></th>
            <th><b>مقادیر هر ویژگی را وارد کنید</b></th>
        </tr>
        <tr>
            <td><b>نام محصول</b></td>
            <td><input type="text" name="product_title" required></td>

        </tr>
        <tr>
            <td><b>دسته بندی محصول</b></td>
            <td>
                <select name="product_category" required >
                <option>دسته ی مورد نظر خود را انتخاب کنید</option>
                    <?php
                      
                        
                        $get_cat="select * from categories";
                        //for farsi
                        $run_cat=@mysqli_query($con,"SET NAME utf8");
                        $run_cat=@mysqli_query($con,"SET CHARACTER SET utf8");
                    
                        $run_cat=@mysqli_query($con,$get_cat);
                        while($row_cat=@mysqli_fetch_array($run_cat)){
                            $cat_id=$row_cat['cat_id'];
                            $cat_title=$row_cat['cat_title'];
                            echo "<option value='$cat_id'>$cat_title </option>";
                    
                        }
                    
                      
                    ?>
                
                </select>
            </td>
        </tr>
        <tr>
            <td><b>مارک محصول</b></td>
            <td>
                <select name="product_brand" required>
                <option>برند محصول را انتخاب کنید</option>
                    <?php
                     
                     $get_brand="select * from brands";
                     $run_brand=@mysqli_query($con,"SET NAME utf8");
                     $run_brand=@mysqli_query($con,"SET CHARACTER SET utf8");
                     $run_brand=@mysqli_query($con,$get_brand);
                     while($row_brand=@mysqli_fetch_array($run_brand)){
                     $brand_id=$row_brand['brand_id'];
                     $brand_title=$row_brand['brand_title'];
                     echo "<option value='$brand_id'>$brand_title</option>";

                  }?>

                </select>
            </td>
        </tr>
        <tr>
            <td><b>قیمت محصول</b></td>
            <td><input type="text" name="product_price" required ></td>
        </tr>
        <tr>
            <td><b>توصیف محصول</b></td>
            <td><textarea name="product_desc"  cols="30" rows="10"  ></textarea></td>
        </tr>
        <tr>
            <td><b>کلمات کلیدی</b></td>
            <td><input type="text" name="product_keys" required ></td>
        </tr>
        <tr>
            <td><b>تصویر محصول</b></td>
            <td><input type="file" name="product_image" required></td>
        </tr>
        <tr>
        <tr>
            <td><b>وضعیت محصول در انبار</b></td>
            <td>
                <select name="status" >
                    <option> وضعیت را انتخاب کنید</option>
                    <option value="موجودی دارد"> موجودی دار</option>
                    <option value="در انبار موجود نیست">در انبار موجود نیست</option>
                </select>
            </td>
        </tr>
            <td><input type="submit" name="submit" value="اضافه کردن" class="btn btn-primary"></td>
            <td><input type="reset"  name="reset" value="ریست کردن" class=" btn btn-info"></td>
        </tr>

    </table>


    </form>
    <?php
    //get_data_from_product_form
    
    if(isset($_POST['submit'])){
        $product_title=$_POST['product_title'];
        $product_cat=$_POST['product_category'];
        $product_brand=$_POST['product_brand'];
        $product_price=$_POST['product_price'];
        $product_des=$_POST['product_desc'];
        $product_key=$_POST['product_keys'];
        $product_status=$_POST['status'];
        //get_image
        $product_image_name=$_FILES['product_image']['name'];
        $product_image_tmp=$_FILES['product_image']['tmp_name'];
        $address_images='products_images/'.$product_image_name;
        move_uploaded_file($product_image_tmp,$address_images);
        //insert to database
        $insert_to="INSERT INTO products(product_cat,product_brand,product_title,
        product_price,product_desc,product_image,product_keywords,p_status)
        VALUES ($product_cat,$product_brand,N'$product_title',$product_price,N'$product_des',N'$address_images',N'$product_key','$product_status')";
        $insert_pro=mysqli_query($con,$insert_to);
        if($insert_pro){
            
            echo"<script>alert('تبریک...داده های مربوط به محصول شما به درستی وارد شد.')</script>";
            echo"<script>window.open('index.php','_self')</script>";

        }
    }
    ?>
    </body>
</html>
<?php 
		//end( condition enter admin )
		
		}else{
		echo "
		<html lang='fa'  dir='rtl'>
		<head>
		<meta http-equiv='Content-Type' content='text/html'; charset='utf-8' />
		</head>";
		
		echo "<script>window.open('login.php?not_admin=اگر مدبر سایت هستید وارد شوید','_self')</script>";
	}
?>